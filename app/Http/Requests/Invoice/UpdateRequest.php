<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            "items" => "required|array",
            "sub_total" => "required",
            "vat" => "required",
            "total" => "required",
            "description" => "required",
            "status" => "required",
            "company_id" => "required",
            "quotation_id" => "required",
            "date" => "nullable",
        ];
    }
}
