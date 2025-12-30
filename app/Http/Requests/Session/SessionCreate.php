<?php

namespace App\Http\Requests\Session;

use Illuminate\Foundation\Http\FormRequest;

class SessionCreate extends FormRequest
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
            'name' => 'required|string|unique:sessions,name',
            'is_current_session' => 'required|boolean',
        ];
    }


}
