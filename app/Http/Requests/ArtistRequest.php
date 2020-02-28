<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ArtistRequest extends FormRequest
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
        $start_date = date('d-m-Y', strtotime('-90 year'));
        $now = date('d-m-Y', strtotime('now'));
        return [
            'Artist.name' => 'required|min:1',
            'Artist.dob' => "required|before:$now|after:$start_date",
            'Artist.information' => 'required|min:5',
            'Artist.avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000'
        ];
    }
}
