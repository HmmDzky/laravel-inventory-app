<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('product');

        return [
            'image'       => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'title'       => 'required|min:5|unique:products,title,' . $productId,
            'description' => 'required|min:10',
            'price'       => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.unique' => 'Nama barang sudah terdaftar.',
        ];
    }
}
