<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'txtUser'   => 'required|unique:mt95_users,username',
            'txtPass'   => 'required',
            'txtRepass' => 'same:txtPass'
        ];
    }

    public function messages(){
        return [
            'txtUser.required' => 'You must enter Username',
            'txtUser.unique' => 'Username already exists',
            'txtPass.required' => 'You must enter Password',
            'txtRepass.same' => 'Password and RePassword must be the same'
        ];
    }
}
