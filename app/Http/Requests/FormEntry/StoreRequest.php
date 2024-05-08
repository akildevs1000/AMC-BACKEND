<?php

namespace App\Http\Requests\FormEntry;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            "work_id" => "required",
            "work_type" => "nullable",
            "summary" => "required",
            "before_attachment" => "nullable",
            "after_attachment" => "nullable",
            "equipment_category_id" => "required",
            "technician_id" => "required",

            "actual_problem" => "nullable",
            "action_taken" => "nullable",
            "description" => "nullable",
            "sign" => "nullable",
            
            "defective_area" => "nullable",
            "customer_name" => "nullable",
            "customer_phone" => "nullable",
            "customer_sign" => "nullable",

        ];
    }
}
