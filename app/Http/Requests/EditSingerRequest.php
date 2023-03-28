<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSingerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'Name'=>'required|max:255',
            'Age'=>'required|numeric|min:10|max:100',
            'Bio'=>'required|min:16',
        ];
    }
}
