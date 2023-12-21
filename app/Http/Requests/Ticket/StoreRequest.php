<?php

namespace App\Http\Requests\Ticket;

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
            "title" => "required|min:3|max:30",
            "description" => "nullable|min:3|max:500",
            "prority" => "required",
            "status" => "nullable",
            "ticket_open_date_time" => "nullable",
            "ticket_close_date_time" => "nullable",
            "attachment" => "nullable",
            "user_id" => "nullable",
            "branch_id" => "nullable",
            "company_id" => "nullable",
        ];
    }
}
