<?php

namespace App\Http\Requests\ManageStaff;

use Illuminate\Foundation\Http\FormRequest;
use App\Helpers\Qs;
use App\Models\ManageStaff;

class ManageStaffUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // Get the staff ID from route parameter
        $staffId = $this->route('manage_staff'); // This is the hashed ID from route
        
        // Decode the hashed ID
        $decodedStaffId = Qs::decodeHash($staffId);
        
        // Get staff record with user
        $staff = ManageStaff::with('user')->find($decodedStaffId);
        
        if (!$staff || !$staff->user) {
            return []; // Return empty rules if staff not found
        }
        
        $userId = $staff->user_id;
        
        return [
            'name' => 'required|string|min:3|max:150',
            'username' => [
                'nullable',
                'string',
                'min:3',
                'max:50',
                'unique:users,username,' . $userId . ',id'
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email,' . $userId . ',id'
            ],
            'password' => 'nullable|string|min:6',
            'phone' => 'required|string|size:10',
            'phone2' => 'nullable|string|size:10',
            'gender' => 'required|string|in:Male,Female',
            'bg_id' => 'nullable|exists:blood_groups,id',
            'nal_id' => 'required|exists:nationalities,id',
            'district_id' => 'required|exists:districts,id',
            'tehsil_id' => 'required|exists:tehsils,id',
            'village_id' => 'nullable|exists:villages,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'user_type' => 'required|string',
            
            // Staff specific fields
            'session_id' => 'required|exists:sessions,id',
            'date_of_joining' => 'required|date',
            'relieving_date' => 'nullable|date|after:date_of_joining',
            'designation' => 'required|string|max:100',
            'qualifications' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'salary' => 'required|numeric|min:0',
            'previous_salary_increment' => 'nullable|numeric|min:0',
            'id_adhar' => [
                'required',
                'digits:12',
                'unique:manage_staffs,id_adhar,' . $decodedStaffId . ',id'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'full name',
            'phone' => 'phone number',
            'phone2' => 'telephone',
            'bg_id' => 'blood group',
            'nal_id' => 'nationality',
            'district_id' => 'district',
            'tehsil_id' => 'tehsil',
            'village_id' => 'village',
            'session_id' => 'session',
            'date_of_joining' => 'date of joining',
            'relieving_date' => 'relieving date',
            'id_adhar' => 'Adhar ID',
            'previous_salary_increment' => 'previous salary increment',
        ];
    }

    public function messages()
    {
        return [
            'phone.size' => 'Phone number must be exactly 10 digits',
            'phone2.size' => 'Telephone must be exactly 10 digits',
            'id_adhar.digits' => 'Adhar ID must be exactly 12 digits',
            'id_adhar.unique' => 'This Adhar ID is already registered with another staff member',
            'email.unique' => 'This email is already registered with another user',
            'username.unique' => 'This username is already taken by another user',
            'relieving_date.after' => 'Relieving date must be after date of joining',
        ];
    }
}