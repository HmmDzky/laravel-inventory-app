<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.string'   => 'Format nama harus berupa teks.',
            'name.max'      => 'Nama maksimal tidak boleh lebih dari 255 karakter.',

            'email.required'  => 'Alamat email wajib diisi.',
            'email.string'    => 'Format email harus berupa teks.',
            'email.lowercase' => 'Alamat email harus menggunakan huruf kecil.',
            'email.email'     => 'Format alamat email tidak valid.',
            'email.max'       => 'Email maksimal tidak boleh lebih dari 255 karakter.',
            'email.unique'    => 'Email ini sudah terdaftar oleh akun lain.',
        ];
    }
}
