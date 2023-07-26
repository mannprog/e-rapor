<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelolaJurusanRequest extends FormRequest
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
            'nama' => 'required|max:255|unique:jurusans,nama',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama jurusan harus diisi',
            'nama.max' => 'Nama jurusan tidak boleh lebih dari 255 karakter',
            'nama.unique' => 'Nama jurusan telah digunakan',
        ];
    }
}
