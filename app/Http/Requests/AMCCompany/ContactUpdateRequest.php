<?php

namespace App\Http\Requests\AMCCompany;

use App\Traits\failedValidationWithName;
use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
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
            "name" => "required|min:3|max:20",
            "number" => "required|min:3|max:20",
            "position" => "required|min:3|max:20",
            "whatsapp" => "required|min:3|max:20",
            "email" => "required|min:3|max:20",
            "company_id" => "required",
        ];
    }
}
