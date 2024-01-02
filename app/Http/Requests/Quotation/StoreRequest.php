<?php

namespace App\Http\Requests\Quotation;

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
            "items" => "required|array",
            // 'items.*.title' => 'required|string',
            // 'items.*.warranty' => 'required|string',
            // 'items.*.qty' => 'required|integer|min:1',
            // 'items.*.unit_price' => 'required|numeric|min:0.01',
            // 'items.*.description' => 'required|string',
            "sub_total" => "required",
            "vat" => "required",
            "total" => "required",
            "description" => "nullable|min:5|max:500",
            "status" => "nullable",
            "company_id" => "required",
            "date" => "nullable",
        ];
    }

    public function messages()
    {
        return [
            'items.required' => 'The items field is required.',
            'items.array' => 'The items must be an array.',
            'items.*.title.required' => 'Title is required for all items.',
            'items.*.warranty.required' => 'Warranty is required for all items.',
            'items.*.qty.required' => 'Quantity is required for all items.',
            'items.*.qty.min' => 'Quantity must be at least :min for all items.',
            'items.*.unit_price.required' => 'Unit price is required for all items.',
            'items.*.unit_price.min' => 'Unit price must be at least :min for all items.',
            'items.*.description.required' => 'Description is required for all items.',
        ];
    }
}
