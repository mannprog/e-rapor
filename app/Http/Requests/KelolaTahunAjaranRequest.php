<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelolaTahunAjaranRequest extends FormRequest
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
            'ta' => 'required|max:255',
            'semester' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ta.required' => 'Tahun Ajaran harus diisi',
            'ta.max' => 'Tahun Ajaran tidak boleh lebih dari 255 karakter',
            'semester.required' => 'Semester harus diisi',
        ];
    }
}
