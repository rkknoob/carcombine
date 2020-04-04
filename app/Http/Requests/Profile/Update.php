<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'name'     => 'required|unique:users,name,'.Auth::user()->id,
            'username' => 'required|unique:users,username,'.Auth::user()->id,
            'password' => 'confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.unique'     => 'มีชื่อนี้ในระบบแล้ว',
            'username.unique' => 'มีชื่อผู้ใช้งานนี้ในระบบแล้ว',
        ];
    }
}
