<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name'=>['required','string'],
            'email'=>['required','unique:users,email','email:rfc'],
            'password'=>['required'],
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'Fill in your name',
            'name.string'=>'Only letters are allowed',
            'email.required'=>'Fill in the email',
            'email.unique'=>'Email already taken',
            'email.email'=>'Invalid email format',
            'password.required'=>'Provide your password',
        ];
    }
}
