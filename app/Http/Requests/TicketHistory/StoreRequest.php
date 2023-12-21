<?php

namespace App\Http\Requests\TicketHistory;

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
            "comments" => "nullable|min:3|max:200",
            "user_id" => "required",
            "ticket_id" => "required",
            "title" => "nullable",
            "user_type" => "nullable",
            "dateTime" => "nullable",
        ];
    }
}
