<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail & Logistik: ') . $product->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-end mb-6">
                <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition font-semibold">
                    Kembali ke Daftar
                </a>
            </div>

            @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 rounded-lg font-semibold">{{ session('success') }}</div>
            @endif
            @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 rounded-lg font-semibold">{{ session('error') }}</div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="md:col-span-1 space-y-6">

                    <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <img src="{{ asset('/storage/products/'.$product->image) }}" class="w-full h-48 object-cover rounded-lg mb-4 border border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-2">{{ $product->title }}</h3>
                        <div class="flex items-center gap-2 mb-4">
                            <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 text-xs font-bold rounded uppercase">{{ $product->category->name ?? 'Tanpa Kategori' }}</span>
                            @if ($product->stock == 0)
                            <span class="px-2 py-1 bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300 text-xs font-bold rounded uppercase">
                                Stok: Habis
                            </span>
                            @elseif ($product->stock <= 5)
                                <span class="px-2 py-1 bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 text-xs font-bold rounded uppercase">
                                Stok: {{ $product->stock }} (Kritis)
                                </span>
                                @else
                                <span class="px-2 py-1 bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 text-xs font-bold rounded uppercase">
                                    Stok: {{ $product->stock }}
                                </span>
                                @endif
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">{{ $product->description }}</p>
                        <p class="text-lg font-bold text-gray-900 dark:text-gray-100">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>

                    <div id="form-transaksi" class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <h4 class="font-bold text-gray-800 dark:text-gray-200 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">Catat Transaksi Baru</h4>
                        <form action="{{ route('transactions.store', $product->id) }}" method="POST" class="space-y-4" novalidate>
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Jenis Transaksi</label>
                                <select name="type" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none">
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="in" {{ old('type') == 'in' ? 'selected' : '' }}>Barang Masuk (Restock)</option>
                                    <option value="out" {{ old('type') == 'out' ? 'selected' : '' }}>Barang Keluar (Terpakai)</option>
                                </select>
                                @error('type')
                                <div class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Jumlah</label>
                                <input type="number" name="quantity" value="{{ old('quantity') }}" min="1" required placeholder="" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none">
                                @error('quantity')
                                <div class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Keterangan (Opsional)</label>
                                <input type="text" name="notes" value="{{ old('notes') }}" placeholder="" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none">
                                @error('notes')
                                <div class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="w-full py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">
                                Simpan Transaksi
                            </button>
                        </form>
                    </div>

                </div>

                <div class="md:col-span-2">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden h-full">
                        <div class="p-5 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 flex justify-between items-center">
                            <h4 class="font-bold text-gray-800 dark:text-gray-200">Buku Log Digital (Riwayat)</h4>
                            <span class="text-xs text-gray-500 dark:text-gray-400">Tercatat Otomatis</span>
                        </div>

                        @if($product->transactions->isEmpty())
                        <div class="p-10 text-center text-gray-500 dark:text-gray-400">
                            Belum ada riwayat pergerakan untuk barang ini.
                        </div>
                        @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left">
                                <thead class="bg-gray-100 dark:bg-gray-700/50 text-gray-600 dark:text-gray-400">
                                    <tr>
                                        <th class="px-4 py-3">Tanggal</th>
                                        <th class="px-4 py-3">Karyawan</th>
                                        <th class="px-4 py-3">Aktivitas</th>
                                        <th class="px-4 py-3 text-center">Jumlah</th>
                                        <th class="px-4 py-3">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($product->transactions->sortByDesc('created_at') as $trx)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                                        <td class="px-4 py-3 text-gray-500 dark:text-gray-400 whitespace-nowrap">{{ $trx->created_at->format('d M Y, H:i') }}</td>
                                        <td class="px-4 py-3 font-medium text-gray-900 dark:text-gray-100">{{ $trx->user->name ?? 'Admin' }}</td>
                                        <td class="px-4 py-3">
                                            @if($trx->type === 'in')
                                            <span class="px-2 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 text-xs font-bold rounded-full uppercase">Masuk</span>
                                            @else
                                            <span class="px-2 py-1 bg-rose-100 dark:bg-rose-900/30 text-rose-700 dark:text-rose-400 text-xs font-bold rounded-full uppercase">Keluar</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-center font-bold {{ $trx->type === 'in' ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                                            {{ $trx->type === 'in' ? '+' : '-' }}{{ $trx->quantity }}
                                        </td>
                                        <td class="px-4 py-3 text-gray-500 dark:text-gray-400 italic">{{ $trx->notes ?: '-' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
@if ($errors->has('type') || $errors->has('quantity') || $errors->has('notes') || session('error'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const element = document.getElementById("form-transaksi");
        if (element) {
            element.scrollIntoView({
                behavior: 'auto',
                block: 'start'
            });
        }
    });
</script>
@endif