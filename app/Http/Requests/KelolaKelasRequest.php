<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelolaKelasRequest extends FormRequest
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
            'jurusan_id' => 'required',
            'kkm' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama Kelas harus diisi',
            'nama.max' => 'Nama Kelas tidak boleh lebih dari 255 karakter',
            'jurusan.required' => 'Nama jurusan harus diisi',
            'kkm.required' => 'Nilai KKM harus diisi',
        ];
    }
}
