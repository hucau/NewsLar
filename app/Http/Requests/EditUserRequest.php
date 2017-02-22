<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'txtRepass' => 'required|same:txtPass'
        ];
    }
    public function messages(){
        return [
            'txtRepass.same' => 'Password and repassword is not same',
            'txtRepass.required' => 'RePassword have to empty'
        ];
    }
}
