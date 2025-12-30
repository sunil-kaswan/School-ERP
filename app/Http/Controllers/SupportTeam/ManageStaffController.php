<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Helpers\Mk;
use App\Http\Requests\ManageStaff\ManageStaffCreate;
use App\Http\Requests\ManageStaff\ManageStaffUpdate;
use App\Repositories\LocationRepo;
use App\Repositories\MyClassRepo;
use App\Models\ManageStaff;
use App\Repositories\UserRepo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ManageStaffController extends Controller
{
    protected $loc, $user;

   public function __construct(LocationRepo $loc, UserRepo $user)
   {
       $this->middleware('teamSA', ['only' => ['edit','update', 'reset_pass', 'create', 'store', 'graduated'] ]);
       $this->middleware('super_admin', ['only' => ['destroy',] ]);

        $this->loc = $loc;
        $this->user = $user;
   }

    public function index()
    {

        $d['manage_staffs'] = ManageStaff::with(['session'])->whereHas('session', fn ($q) => $q->current())->get();
        // echo "<pre>";print_r($d['manage_staffs']);die();
        $ut = $this->user->getAllTypes()->where('level','>=',2);
        $ut2 = $ut->where('level', '>', 2);
        $d['user_types'] = Qs::userIsAdmin() ? $ut2 : $ut;
        $d['states'] = $this->loc->getStates();
        $d['users'] = $this->user->getPTAUsers();
        $d['nationals'] = $this->loc->getAllNationals();
        $d['blood_groups'] = $this->user->getBloodGroups();
        return view('pages.support_team.manage_staffs.index', $d);
    }

    public function store(ManageStaffCreate $req)
    {
       DB::beginTransaction();

        try {

            $data = $req->only($this->getUserField());
            $sr   = $req->only($this->getStaffField());

            $data['name'] = ucwords($req->name);

            $user = $this->user->findByEmail($data['email']);

            if ($user) {
                unset($data['password'], $data['photo'], $data['code']);
                $this->user->update($user->id, $data);
                $user->refresh();
            } else {
                $data['code']     = strtoupper(Str::random(10));
                $data['photo']    = Qs::getDefaultUserImage();
                $data['password'] = Hash::make($req->password);
                $user = $this->user->create($data);
            }

            // Staff entry per session
            $exists = ManageStaff::where('user_id', $user->id)
                ->where('session_id', $sr['session_id'])
                ->exists();

            if ($exists) {
                return response()->json([
                    'message' => 'Staff already exists for this session'
                ], 422);
            }

            $sr['user_id'] = $user->id;
            ManageStaff::create($sr);

            DB::commit();
            return Qs::jsonStoreOk();

        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }


    }

    // ManageStaffController.php mein ye methods add karein

    public function edit($st_id)
    {
        $st_id = Qs::decodeHash($st_id);
        if(!$st_id){return Qs::goWithDanger();}

        $d['staff'] = ManageStaff::with('user', 'session')->findOrFail($st_id);
        
        $ut = $this->user->getAllTypes()->where('level','>=',2);
        $ut2 = $ut->where('level', '>', 2);
        $d['user_types'] = Qs::userIsAdmin() ? $ut2 : $ut;
        $d['states'] = $this->loc->getStates();
        $d['nationals'] = $this->loc->getAllNationals();
        $d['blood_groups'] = $this->user->getBloodGroups();
        
        return view('pages.support_team.manage_staffs.edit', $d);
    }

    public function update(ManageStaffUpdate $req, $st_id)
    {
        // Decode staff ID
        // $decodedStaffId = Qs::decodeHash($st_id);
        // if(!$decodedStaffId){return Qs::goWithDanger();}

        DB::beginTransaction();

        try {
            $staff = ManageStaff::with('user')->findOrFail($st_id);
            
            $data = $req->only($this->getUserField());
            $sr = $req->only($this->getStaffField());

            $data['name'] = ucwords($req->name);

            // Password update sirf agar naya password diya gaya ho
            if($req->password) {
                $data['password'] = Hash::make($req->password);
            } else {
                unset($data['password']);
            }

            // Photo upload
            if($req->hasFile('photo')) {
                $photo = $req->file('photo');
                $f = Qs::getFileMetaData($photo);
                $f['name'] = 'photo.' . $f['ext'];
                $f['path'] = $photo->storeAs(Qs::getUploadPath('staff').$staff->user->code, $f['name']);
                $data['photo'] = asset('storage/' . $f['path']);
            }

            // User update
            $this->user->update($staff->user->id, $data);

            // Check if session is being changed
            if($staff->session_id != $sr['session_id']) {
                $exists = ManageStaff::where('user_id', $staff->user_id)
                    ->where('session_id', $sr['session_id'])
                    ->where('id', '!=', $decodedStaffId)
                    ->exists();

                if ($exists) {
                    DB::rollBack();
                    return response()->json([
                        'message' => 'Staff already exists for this session'
                    ], 422);
                }
            }

            // Staff record update
            $staff->update($sr);

            DB::commit();
            return Qs::jsonUpdateOk();

        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($st_id)
    {
        $st_id = Qs::decodeHash($st_id);
        if(!$st_id){return Qs::goWithDanger();}

        $d['staff'] = ManageStaff::with('user.blood_group', 'user.nationality', 'user.state', 'user.district', 'user.tehsil', 'user.village', 'session')
            ->findOrFail($st_id);
        
        return view('pages.support_team.manage_staffs.show', $d);
    }
    public function destroy($st_id)
    {
        $st_id = Qs::decodeHash($st_id);
        if(!$st_id){return Qs::goWithDanger();}

        DB::beginTransaction();

        try {
            // Get staff record with user
            $staff = ManageStaff::with('user')->findOrFail($st_id);
            
            // Get user code for photo path
            $userCode = $staff->user->code;
            $userId = $staff->user->id;

            // Delete staff record first
            $staff->delete();

            // Check if user has any other staff records in different sessions
            $otherStaffRecords = ManageStaff::where('user_id', $userId)->count();

            // If no other staff records exist, delete user and photos
            if($otherStaffRecords == 0) {
                // Delete user photos from storage
                $path = Qs::getUploadPath('staff') . $userCode;
                if(Storage::exists($path)) {
                    Storage::deleteDirectory($path);
                }

                // Delete user record
                $this->user->delete($userId);
            }

            DB::commit();
            return back()->with('flash_success', __('msg.del_ok'));

        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('flash_danger', __('msg.del_failed'));
        }
    }

    private function getUserField(){
        return ['user_type','name','username','email','password','phone','phone2','gender','bg_id','nal_id','district_id','tehsil_id','village_id','state_id'];
    }
    private function getStaffField(){
        return ['session_id', 'date_of_joining', 'relieving_date', 'salary', 'id_adhar', 'designation','qualifications','previous_salary_increment','experience'];
    }

}
