<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image'       => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'       => 'required|min:5|unique:products,title',
            'description' => 'required|min:10',
            'price'       => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'image.required'       => 'Gambar barang wajib diisi.',
            'title.required'       => 'Nama barang wajib diisi.',
            'title.min'            => 'Nama barang minimal 5 karakter.',
            'title.unique'         => 'Nama barang sudah terdaftar.',
            'description.required' => 'Deskripsi barang wajib diisi.',
            'description.min'      => 'Deskripsi minimal 10 karakter.',
            'price.required'       => 'Harga barang wajib diisi.',
            'price.min'            => 'Harga tidak boleh negatif.',
            'stock.required'       => 'Stok barang wajib diisi.',
            'stock.min'            => 'Stok tidak boleh negatif.',
            'category_id.required' => 'Kategori barang wajib dipilih.',
        ];
    }
}
