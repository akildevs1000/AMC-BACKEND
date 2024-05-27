<?php

namespace App\Http\Requests\Contract;

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
            "date" => "required",
            "start_date" => "required",
            "expire_date" => "required",
            "amc_type_id" => "required",
            "visit_type_id" => "required",
            // "service_call_type_id" => "required",
            "value" => "required|min:3|max:200",
            "attachment" => "nullable",
            "status" => "required",

            "lpo_number" => "nullable",
        ];
    }
}
