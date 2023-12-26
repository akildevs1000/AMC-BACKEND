<?php

namespace App\Http\Requests\AMCCompany;

use App\Traits\failedValidationWithName;
use Illuminate\Foundation\Http\FormRequest;

class GeographicRequest extends FormRequest
{
    use failedValidationWithName;

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
            "lat" => "required",
            "lon" => "required",
            "makani_number" => "required",
            "address" => "required",
            "location" => "required",
            "company_id" => "required",
        ];
    }
}
