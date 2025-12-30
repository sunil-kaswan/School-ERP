<?php

namespace App\Http\Requests\ManageStaff;

use Illuminate\Foundation\Http\FormRequest;

class ManageStaffCreate extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:6|max:150',
            'gender' => 'required|string',
            'phone' => 'sometimes|nullable|string|min:10|max:12',
            'email' => 'sometimes|nullable|email|max:100|unique:users',
            'photo' => 'sometimes|nullable|image|mimes:jpeg,gif,png,jpg|max:2048',
            'state_id' => 'required',
            'nal_id' => 'required',
            'bg_id' => 'required',
            'district_id' => 'required',
            'tehsil_id' => 'required',
            'village_id' => 'sometimes|nullable',
            'date_of_joining' => 'required|string',
            'salary' => 'required|numeric|min:0',
            'session_id' => 'sometimes|nullable',
            'id_adhar' => 'required|digits:12|unique:manage_staffs,id_adhar',
            'designation' => 'required',
            
        ];
    }

    public function attributes()
    {
        return  [
            'session_id' => 'Session',
            'nal_id' => 'Nationality',
            'district_id' => 'District',
            'state_id' => 'State',
            'bg_id' => 'Blood Group',
            'tehsil_id' => 'Tehsil',
            'village_id' => 'Village',
        ];
    }

}
