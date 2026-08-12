<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Barang') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">

                <div class="flex items-center justify-between mb-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">FORM EDIT BARANG</h4>
                    <a href="{{ route('products.index') }}"
                        class="px-4 py-2 rounded-lg bg-gray-900 dark:bg-gray-600 text-white text-sm font-semibold hover:bg-gray-800 dark:hover:bg-gray-500 transition">
                        KEMBALI
                    </a>
                </div>

                <form id="form-edit" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Gambar</label>

                        <div class="mb-3">
                            <img src="{{ asset('/storage/products/'.$product->image) }}"
                                class="w-[200px] rounded-lg border border-gray-200 dark:border-gray-600"
                                alt="{{ $product->title }}">
                        </div>

                        <input type="file" name="image"
                            class="block w-full text-sm text-gray-900 dark:text-gray-300
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-lg file:border-0
                                      file:bg-gray-900 dark:file:bg-gray-600 file:text-white
                                      hover:file:bg-gray-800 dark:hover:file:bg-gray-500
                                      border border-gray-200 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700">
                        @error('image')
                        <div class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nama Barang</label>
                        <input type="text" name="title" value="{{ old('title', $product->title) }}"
                            placeholder="Masukkan Nama Barang"
                            class="w-full border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('title')
                        <div class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Kategori</label>
                        <select name="category_id" class="w-full mt-2 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('category_id') border-red-500 @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="mt-2 text-sm text-red-600 dark:text-red-400">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Deskripsi</label>
                        <textarea name="description" id="description" rows="6"
                            class="w-full border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Deskripsi Barang">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                        <div class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Harga</label>
                            <input type="number" name="price" value="{{ old('price', $product->price) }}"
                                placeholder="Masukkan Harga Barang"
                                class="w-full border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('price')
                            <div class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Stok</label>
                            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                                placeholder="Masukkan Stok Barang"
                                class="w-full border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('stock')
                            <div class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center gap-2 pt-4">
                        <button type="submit"
                            class="inline-flex items-center justify-center px-6 py-2 rounded-lg bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700 transition">
                            UPDATE
                        </button>

                        <button type="reset"
                            class="inline-flex items-center justify-center px-6 py-2 rounded-lg bg-amber-500 text-white text-sm font-semibold hover:bg-amber-600 transition">
                            RESET
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
@if ($errors->any())
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const element = document.getElementById("form-edit");
        if (element) {
            element.scrollIntoView({
                behavior: 'auto',
                block: 'center'
            });
        }
    });
</script>
@endif