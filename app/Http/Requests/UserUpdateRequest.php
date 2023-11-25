<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name'=>['nullable','string'],
            'email'=>['nullable','unique:users,email','email:rfc'],
            'password'=>['nullable','min:6'],
        ];
    }

    public function messages()
    {
        return[
            'name:string'=>'Only letters are allowed.',
            'email.unique'=>'Use a unique email value.',
            'email.email'=>'Use a valid email format.',
            'password.min'=>'Password must have a minimum of 8 characters.',
        ];
    }
}
