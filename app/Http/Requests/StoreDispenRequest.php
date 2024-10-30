<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDispenRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'date' => 'required|date', // Tanggal wajib dan harus berupa format tanggal yang valid
            'permissionStatus' => 'required|string', // Status izin wajib dan berupa string
            'proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // File bukti wajib dan format file harus gambar/pdf
            'reason' => 'required|string|max:255', // Alasan wajib diisi dan berupa string
        ];
    }

    public function messages()
    {
        return [
            'date' => 'required|date', // Tanggal harus dipilih
            'permissionStatus' => 'required|string', // Status izin harus dipilih
            'proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Bukti harus berupa file gambar/pdf
            'reason' => 'required|string|max:255', // Deskripsi wajib diisi
        ];
    }
}
