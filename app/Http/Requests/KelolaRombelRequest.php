<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelolaRombelRequest extends FormRequest
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
            'kelas_id' => 'required',
            'ta_id' => 'required',
            'walas_id' => 'required|unique:rombels,walas_id',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama rombel harus diisi',
            'nama.max' => 'Nama rombel tidak boleh lebih dari 255 karakter',
            'kelas_id.required' => 'Kelas harus diisi',
            'ta_id.required' => 'Tahun Ajaran harus diisi',
            'walas_id.required' => 'Walikelas harus diisi',
            'walas_id.unique' => 'Walikelas telah digunakan',
        ];
    }
}
