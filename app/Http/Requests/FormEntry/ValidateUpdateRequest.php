<?php

namespace App\Http\Requests\FormEntry;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUpdateRequest extends FormRequest
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
            "summary" => "required",
            "defective_area" => "required",

            "work_id" => "nullable",
            "work_type" => "nullable",
          
            "before_attachment" => "nullable",
            "after_attachment" => "nullable",
            "equipment_category_id" => "nullable",
            "technician_id" => "nullable",

            "actual_problem" => "nullable",
            "action_taken" => "nullable",
            "description" => "nullable",
            "sign" => "nullable",

            "technician_signed_datetime" => "nullable",

            'checklist.*.questions.*.selectedOption' => 'required|in:Excellent,Good,Poor,Yes,No,N/A',

        ];
    }
}
