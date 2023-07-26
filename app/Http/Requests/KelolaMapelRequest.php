<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelolaMapelRequest extends FormRequest
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
            'nama' => 'required|max:255',
            'rombel_id' => 'required',
            'guru_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama Mata Pelajaran harus diisi',
            'nama.max' => 'Nama Mata Pelajaran tidak boleh lebih dari 255 karakter',
            'rombel_id.required' => 'Rombel harus diisi',
            'guru_id.required' => 'Guru harus diisi',
        ];
    }
}
