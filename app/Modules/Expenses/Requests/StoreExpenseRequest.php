<?php

namespace App\Modules\Expenses\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       return [
        'title' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
        'category' => ['required', Rule::in(ExpenseCategory::cases())],
        'expense_date' => 'required|date',
        'notes' => 'nullable|string',
        ];
    }
}
