<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'title'=>['nullable','string'],
            'body'=>['nullable','string'],
            'user_ids'=>['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'title.string'=>'Only text allowed.',
            'title.required'=>'Add a title.',
            'body.required'=>'Add content to the post body.',
            'body.string'=>'Only text values allowed here.',
        ];
    }
}
