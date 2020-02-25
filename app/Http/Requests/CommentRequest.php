<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment_content' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'comment_content.required' => trans('messages.content_required'),
            'comment_content.min' => trans('messages.content_min'),
        ];
    }
}
