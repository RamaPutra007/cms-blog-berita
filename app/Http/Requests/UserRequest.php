<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $user = $this->route('user');

        return [

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user),
            ],

            'password' => [
                $this->isMethod('POST') ? 'required' : 'nullable',
                'min:8',
                'confirmed',
            ],

            'role' => [
                'required',
                'in:admin,penulis',
            ],

        ];
    }


    public function messages(): array
    {
        return [

            'name.required' => 'Nama wajib diisi.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sama.',

            'role.required' => 'Role wajib dipilih.',

        ];
    }
}
