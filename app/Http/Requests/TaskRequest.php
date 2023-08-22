<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TaskRequest extends FormRequest
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
            'title' => ['required'],
            'description' => ['required'],
            'status' => ['required'],
            'dua_date' => ['date_format:Y-m-d'],
        ];
    }

    public function messages()
    {
        return [
            'dua_date.date_format' => 'The Dua Date must be in the format Y-m-d.',
        ];
    }
}
