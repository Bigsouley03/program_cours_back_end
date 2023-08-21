<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCoursDeroulerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "date"  => 'required',
            "nombreHeure"  => 'required',
            "objectifs"  => 'required',
            "cours_enroller_id"  => 'required|exists:cours_enrollers,id',
            "id"=>'required|exists:classes,id',
        ];
    }
}
