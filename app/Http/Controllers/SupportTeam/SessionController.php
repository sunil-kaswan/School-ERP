<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Models\Session;
use App\Http\Requests\Session\SessionCreate;
use App\Http\Requests\Session\SessionUpdate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('teamSA', ['except' => ['destroy',] ]);
        $this->middleware('super_admin', ['only' => ['destroy',] ]);

    }

    public function index()
    {
        $d['sessions'] = Session::get();
        return view('pages.support_team.sessions.index', $d);
    }

    public function store(SessionCreate $req)
    {
        if ($req->is_current_session == 1) {
	        Session::where('is_current_session', 1)->update([
	            'is_current_session' => 0
	        ]);
	    }

	    Session::create($req->only(['name', 'is_current_session']));
        return Qs::jsonStoreOk();
    }

    public function edit($id)
    {
        $d['s'] = $s = Session::find($id);
        return is_null($s) ? Qs::goWithDanger('sessions.index') :view('pages.support_team.sessions.edit', $d);
    }

    // public function update(SessionUpdate $req, $id)
    // {
    //     $data = $req->only(['name']);
    //     Session::find($id)->update($data);;
    //     return Qs::jsonUpdateOk();
    // }

    public function update(SessionUpdate $req, Session $session)
	{
	    if ($req->is_current_session == 1) {
	        Session::where('id', '!=', $session->id)
	            ->where('is_current_session', 1)
	            ->update(['is_current_session' => 0]);
	    }

	    $session->update($req->only('name','is_current_session'));
	    return Qs::jsonUpdateOk();

	}

    public function destroy($id)
    {
        if(Session::where(['id' => $id, 'is_current_session' => 1])->exists()){
            return back()->with('pop_warning', 'This Session is Current Session, You Cannot Delete It');
        }
        Session::destroy($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }

    public function setCurrentSessions(Request $request)
    {
        $request->validate([
            'session_id' => 'required|exists:sessions,id',
        ]);

        DB::transaction(function () use ($request) {
            Session::where('is_current_session', 1)
                ->update(['is_current_session' => 0]);

            Session::where('id', $request->session_id)
                ->update(['is_current_session' => 1]);
        });

        return redirect()->back()->with('flash_success', 'Current Session Updated');
    }

}
