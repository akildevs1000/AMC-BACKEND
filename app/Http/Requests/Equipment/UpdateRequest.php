<?php

namespace App\Http\Requests\Equipment;

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
            "equipment_category_id" => "required",
            "name" => "required|min:2|max:20",
            "brand_name" => "required|min:2|max:20",
            "model_number" => "required|min:2|max:30",
            "specification" => "required|min:2|max:50",
            "other" => "required|min:2|max:200",
            "software_version" => "required|min:2|max:50",
            "qty" => "required|min:2|max:50",
            "remarks" => "required|min:2|max:200",
            "company_id" => "required",
        ];
    }
}
