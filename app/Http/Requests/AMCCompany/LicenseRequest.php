<?php

namespace App\Http\Requests\AMCCompany;

use App\Traits\failedValidationWithName;
use Illuminate\Foundation\Http\FormRequest;

class LicenseRequest extends FormRequest
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
            "license_no" => "required|min:3|max:20",
            "trn_number" => "required|min:3|max:20",
            "issue_date" => "required",
            "expiry_date" => "required",
            "issued_by" => "required|min:3|max:20",
            "company_id" => "required",
        ];
    }
}
