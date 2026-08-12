<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Barang') }}
        </h2>
    </x-slot>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-sm border border-gray-200 dark:border-gray-700 p-6">

                @if(auth()->user()->role == 'admin')
                <a href="{{ route('products.create') }}"
                    class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-emerald-600 text-white text-sm font-semibold hover:bg-emerald-700 transition mb-6">
                    TAMBAH DATA BARANG
                </a>
                @endif

                <div class="mb-5 flex justify-between items-center">
                    <form action="{{ route('products.index') }}" method="GET" id="searchForm" class="flex gap-2 w-full max-w-2xl">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nama barang..."
                            class="w-full max-w-xs px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">

                        <select
                            name="category_id"
                            onchange="this.form.requestSubmit()"
                            class="px-3 pr-10 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Semua Kategori</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>

                        <button type="submit" class="px-4 py-2 bg-gray-900 dark:bg-gray-600 text-white rounded-lg text-sm font-semibold hover:bg-gray-800 dark:hover:bg-gray-500 transition">
                            Cari
                        </button>

                        @if(request('search') || request('category_id'))
                        <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-lg text-sm font-semibold hover:bg-gray-300 dark:hover:bg-gray-500 transition">
                            Reset
                        </a>
                        @endif
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                        <thead class="bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-300">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold border-b dark:border-gray-700">GAMBAR</th>
                                <th class="px-4 py-3 text-left font-semibold border-b dark:border-gray-700">NAMA</th>
                                <th class="px-4 py-3 text-left font-semibold border-b dark:border-gray-700">KATEGORI</th>
                                <th class="px-4 py-3 text-left font-semibold border-b dark:border-gray-700">HARGA</th>
                                <th class="px-4 py-3 text-left font-semibold border-b dark:border-gray-700">STOK</th>
                                <th class="px-4 py-3 text-center font-semibold border-b dark:border-gray-700 w-[240px]">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr class="border-b dark:border-gray-700 last:border-b-0 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                                <td class="px-4 py-3">
                                    <div class="flex justify-start">
                                        <img src="{{ asset('/storage/products/'.$product->image) }}" class="w-16 h-16 object-cover rounded-lg border border-gray-200 dark:border-gray-600" alt="{{ $product->title }}">
                                    </div>
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 dark:text-gray-100">
                                    {{ $product->title }}
                                </td>
                                <td class="px-4 py-3 text-sm text-blue-600 dark:text-blue-400 font-semibold">
                                    {{ $product->category?->name ?? 'Belum ada kategori' }}
                                </td>
                                <td class="px-4 py-3 text-gray-700 dark:text-gray-300">
                                    {{ "Rp " . number_format($product->price, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-3">
                                    @if ($product->stock == 0)
                                    <span class="px-2 py-0.5 text-[10px] uppercase tracking-wider text-gray-700 bg-gray-200 dark:bg-gray-700 dark:text-gray-300 rounded-full font-bold">
                                        Habis
                                    </span>
                                    @elseif ($product->stock <= 5)
                                        <div class="flex items-center gap-2 text-red-600 dark:text-red-400 font-bold">
                                        <span>{{ $product->stock }}</span>
                                        <span class="px-2 py-0.5 text-[10px] uppercase tracking-wider text-red-800 bg-red-100 dark:bg-red-900/30 dark:text-red-400 rounded-full">
                                            Kritis
                                        </span>
                </div>
                @else
                <span class="text-gray-700 dark:text-gray-300 font-semibold">{{ $product->stock }}</span>
                @endif
                </td>
                <td class="px-4 py-3">
                    <div class="flex items-center justify-center gap-2">
                        <a href="{{ route('products.show', $product->id) }}" class="px-3 py-1.5 bg-gray-500 hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500 text-white text-xs font-bold rounded shadow-sm transition">
                            DETAIL
                        </a>

                        @if(auth()->user()->role === 'admin')
                        <a href="{{ route('products.edit', $product->id) }}" class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded shadow-sm transition">
                            EDIT
                        </a>

                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form m-0 p-0 inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded shadow-sm transition">
                                HAPUS
                            </button>
                        </form>
                        @endif
                    </div>
                </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-6">
                        <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-400 rounded-lg px-4 py-3 text-center font-semibold">
                            Data Barang Belum Ada.
                        </div>
                    </td>
                </tr>
                @endforelse
                </tbody>
                </table>
            </div>
        </div>

        <div class="mt-5">
            {{ $products->links() }}
        </div>
    </div>
    </div>
    </div>

    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#ffffff',
                    color: document.documentElement.classList.contains('dark') ? '#f3f4f6' : '#111827'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session("success") }}',
            timer: 3000,
            showConfirmButton: false,
            background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#ffffff',
            color: document.documentElement.classList.contains('dark') ? '#f3f4f6' : '#111827'
        });
        @endif

        document.getElementById('searchForm').addEventListener('submit', function(e) {
            const searchElement = this.querySelector('input[name="search"]');
            const categoryElement = this.querySelector('select[name="category_id"]');

            const searchInput = searchElement.value.trim();
            const categorySelect = categoryElement.value;

            const urlParams = new URLSearchParams(window.location.search);
            const currentSearch = urlParams.get('search') || '';
            const currentCategory = urlParams.get('category_id') || '';

            if (searchInput === currentSearch && categorySelect === currentCategory) {
                e.preventDefault();
                return;
            }

            if (searchInput === '') {
                searchElement.removeAttribute('name');
            }
            if (categorySelect === '') {
                categoryElement.removeAttribute('name');
            }
        });
    </script>
</x-app-layout>