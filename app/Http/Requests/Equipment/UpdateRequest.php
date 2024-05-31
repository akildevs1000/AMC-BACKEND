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

    public function rules()
    {
        $arr = [];



        if ($this->equipment_category_id == 1) {
            $arr = [
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
        } else if ($this->equipment_category_id == 2) {

            $arr = [
                "controller_brand" => "required",
                "controller_qty" => "required",
                "controller_type" => "required",

                "work_station" => "required|min:3|max:50",
                "work_station_qty" => "required|min:1|max:50",

                "monitor" => "required|min:3|max:50",
                "monitor_qty" => "required|min:1|max:50",

                "reader" => "required|min:3|max:50",
                "reader_qty" => "required|min:1|max:50",
                "reader_type" => "nullable|min:3|max:50",

                "lock" => "required|min:3|max:50",
                "lock_qty" => "required|min:1|max:50",
                "lock_type" => "nullable|min:3|max:50",

                "ups" => "required|min:3|max:50",
                "ups_qty" => "required|min:1|max:50",
                "ups_specs" => "nullable|min:3|max:50",

                "network" => "required|min:3|max:50",
                "network_qty" => "required|min:1|max:50",
                "network_specs" => "nullable|min:3|max:50",

                "exit_switch" => "required|min:3|max:50",
                "fire_switch" => "required|min:1|max:50",
                "remote" => "nullable|min:3|max:50",

            ];
        } else if ($this->equipment_category_id == 3) {
            $arr = [
                "work_station" => "required",
                "work_station_qty" => "required",

                "monitor" => "required",
                "monitor_qty" => "required",

                "reader" => "required",
                "reader_qty" => "required",
                "reader_type" => "required",
            ];
        } else if ($this->equipment_category_id == 4) {
            $arr = [
                "controller_brand" => "required",
                "controller_qty" => "required",
                "controller_type" => "required",

                "monitor" => "required|min:3|max:50",
                "monitor_qty" => "required|min:1|max:50",
                "monitor_type" => "required|min:1|max:50",
                "monitor_size" => "required|min:1|max:50",

                "reader" => "required|min:3|max:50",
                "reader_qty" => "required|min:1|max:50",
                "reader_type" => "nullable|min:3|max:50",

                "lock" => "required|min:3|max:50",
                "lock_qty" => "required|min:1|max:50",
                "lock_type" => "nullable|min:3|max:50",

                "network" => "required|min:3|max:50",
                "network_qty" => "required|min:1|max:50",
                "network_specs" => "nullable|min:3|max:50",

                "exit_switch" => "required|min:3|max:50",
                "fire_switch" => "required|min:1|max:50",
                "remote" => "nullable|min:3|max:50",

            ];
        } else if ($this->equipment_category_id == 5) {

            $arr = [
                "controller_brand" => "required",
                "controller_qty" => "required",
                "controller_type" => "required",

                "sensor" => "required|min:3|max:50",
                "sensor_qty" => "required|min:1|max:50",
                "sensor_type" => "required|min:1|max:50",

                "keypad" => "required|min:3|max:50",
                "keypad_qty" => "required|min:1|max:50",
                "keypad_type" => "nullable|min:3|max:50",

                "ups" => "required|min:3|max:50",
                "ups_qty" => "required|min:1|max:50",
                "ups_type" => "nullable|min:3|max:50",

                // "exit_switch" => "required|min:3|max:50",
                // "fire_switch" => "required|min:1|max:50",
                // "remote" => "nullable|min:3|max:50",

                "auto_light" => "nullable|min:3|max:50",
                "auto_light_qty" => "nullable|min:3|max:50",
            ];
        }


        $arr["equipment_category_id"] = "required";


        return  $arr;
    }
}
