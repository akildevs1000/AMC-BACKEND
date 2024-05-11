<?php

namespace App\Http\Requests\Equipment;

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
            "equipment_category_id" => "required",
            "company_id" => "required",


            "recorder_brand" => "required|min:3|max:50",
            "recorder_qty" => "required|min:1|max:50",
            "recorder_capacity" => "nullable|min:3|max:50",

            "work_station" => "required|min:3|max:50",
            "work_station_qty" => "required|min:1|max:50",

            "camera" => "required|min:3|max:50",
            "camera_qty" => "required|min:1|max:50",

            "monitor" => "required|min:3|max:50",
            "monitor_qty" => "required|min:1|max:50",

            "ups" => "required|min:3|max:50",
            "ups_qty" => "required|min:1|max:50",
            "ups_specs" => "nullable|min:3|max:50",

            "network" => "required|min:3|max:50",
            "network_qty" => "required|min:1|max:50",
            "network_specs" => "nullable|min:3|max:50",
        ];
    }
}
