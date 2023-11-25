<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
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
            'body'=>['required','string','max:200'],
            'user_id'=>['required','integer'],
            'post_id'=>['required','integer'],
        ];
    }

    public function messages()
    {
        return[
            'body.required'=>'Fill in the body.',
            'body.string'=>'Only letters are allowed',
            'body.max'=>'Too long comments not allowed.Must not be above 200 characters',
            'user_id.required'=>'User id is missing.',
            'user_id.integer'=>'User id must be a number.',
            'post_id.required'=>'Post-id is missing.',
            'post_id.integer'=>'Post-id must be a number.',
        ];
    }
}
