<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelolaSiswaRequest extends FormRequest
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
            'name' => 'required|max:255',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'sometimes|min:4',
            'nis' => 'required|max:18',
            'nisn' => 'required|max:8',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'thn_masuk' => 'required',
            'agama' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama siswa harus diisi',
            'name.max' => 'Nama siswa tidak boleh lebih dari 255 karakter',
            'username.required' => 'Username siswa harus diisi',
            'username.unique' => 'Username siswa telah digunakan',
            'email.required' => 'Email siswa harus diisi',
            'email.unique' => 'Email siswa telah digunakan',
            'password.min' => 'Password siswa harus lebih dari 4 karakter',
            'nis.required' => 'NIS siswa harus diisi',
            'nis.max' => 'NIS siswa tidak boleh lebih dari 18 karakter',
            'nisn.required' => 'NISN siswa harus diisi',
            'nisn.max' => 'NISN siswa tidak boleh lebih dari 8 karakter',
            'tmp_lahir.required' => 'Tempat Lahir siswa harus diisi',
            'tgl_lahir.required' => 'Tanggal Lahir siswa harus diisi',
            'jk.required' => 'Jenis Kelamin siswa harus diisi',
            'thn_masuk.required' => 'Tahun Masuk siswa harus diisi',
            'agama.required' => 'Agama siswa harus diisi',
        ];
    }
}
