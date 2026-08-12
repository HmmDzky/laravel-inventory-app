<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Kategori
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-300">Nama Kategori</label>
                        <input type="text" name="name" value="{{ old('name', $category->name) }}" class="w-full mt-1 p-2 bg-gray-700 border border-gray-600 rounded text-white" required>
                        @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Perbarui</button>
                    <a href="{{ route('categories.index') }}" class="ml-2 text-gray-400">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>