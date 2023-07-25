<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelolaGtkRequest extends FormRequest
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
            'nip' => 'required|max:18',
            'jabatan' => 'required',
            'jk' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama user harus diisi',
            'name.max' => 'Nama user tidak boleh lebih dari 255 karakter',
            'username.required' => 'Username user harus diisi',
            'username.unique' => 'Username user telah digunakan',
            'email.required' => 'Email user harus diisi',
            'email.unique' => 'Email user telah digunakan',
            'password.min' => 'Password user harus lebih dari 4 karakter',
            'nip.required' => 'NIP user harus diisi',
            'nip.max' => 'NIP user tidak boleh lebih dari 18 karakter',
            'jabatan.required' => 'Jabatan user harus diisi',
            'jk.required' => 'Jenis Kelamin user harus diisi',
        ];
    }
}
