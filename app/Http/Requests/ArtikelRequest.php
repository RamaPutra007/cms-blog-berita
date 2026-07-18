<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtikelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules.
     */
    public function rules(): array
    {
        return [
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'nullable|in:draft,publish',
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages(): array
    {
        return [
            'judul.required' => 'Judul wajib diisi.',
            'kategori_id.required' => 'Kategori wajib dipilih.',
            'kategori_id.exists' => 'Kategori tidak valid.',
            'isi.required' => 'Isi artikel wajib diisi.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
        ];
    }
}
