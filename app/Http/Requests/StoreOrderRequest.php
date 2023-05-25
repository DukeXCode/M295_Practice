<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:orders',
            'credit_card_number' => 'required|string',
            'credit_card_expiration_date' => 'required|string',
            'total' => 'required|numeric',
            'status' => 'required|string|in:processed,completed,pending',
            'notes' => 'nullable|string',
        ];
    }
}
