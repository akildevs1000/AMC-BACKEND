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
            "customer_note" => "nullable",

            "technician_signed_datetime" => "nullable",
            "customer_signed_datetime" => "nullable",

            "company_id" => "nullable",

            // 'questions' => 'required|array', // Ensure 'questions' is present and an array

            // 'questions.*.selectedOption' => 'array|required|in:Excellent,Good,Poor,Yes,No,N/A',

        ];
    }


    // public function messages()
    // {
    //     return [
    //         'questions.required' => 'The questions field is required.',
    //         'questions.array' => 'The questions must be an array.',
    //         'questions.*.selectedOption.required' => 'Please select an option for all questions.',
    //         'questions.*.selectedOption.in' => 'The selected option for :attribute is invalid.',
    //     ];
    // }
}
