<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title'=>['required','string'],
            'body'=>['required','string'],
            'user_ids'=>['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Add a title.',
            'title.string'=>'Only letters are allowed',
            'body.required'=>'Add body content',
            'body.string'=>'Only letters are allowed',
        ];
    }
}
