<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-2">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                            Selamat Datang, {{ Auth::user()->name }}!
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl p-6 text-white shadow-lg transition transform hover:scale-105 duration-300">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm font-medium uppercase tracking-wider opacity-80">Total Barang</p>
                                        <p class="text-4xl font-bold mt-2">{{ $totalProducts }}</p>
                                    </div>
                                    <div class="p-3 bg-white bg-opacity-20 rounded-lg">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 11m8 4V5M4 11v10l8 4"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-4 text-xs opacity-75 flex items-center">
                                    <a href="{{ route('products.index') }}" class="hover:underline flex items-center gap-1">
                                        Lihat Detail Data →
                                    </a>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-emerald-400 to-teal-500 rounded-xl p-6 text-white shadow-lg transition transform hover:scale-105 duration-300">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm font-medium uppercase tracking-wider opacity-80">Total Stok</p>
                                        <p class="text-4xl font-bold mt-2">{{ $totalStock }}</p>
                                    </div>
                                    <div class="p-3 bg-white bg-opacity-20 rounded-lg">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-4 text-xs opacity-75 flex items-center">
                                    <span class="flex items-center gap-1">
                                        Unit barang tersimpan
                                    </span>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-amber-400 to-orange-500 rounded-xl p-6 text-white shadow-lg transition transform hover:scale-105 duration-300">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm font-medium uppercase tracking-wider opacity-80">Total Aset</p>
                                        <p class="text-3xl font-bold mt-2">
                                            Rp {{ number_format($totalAsset, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <div class="p-3 bg-white bg-opacity-20 rounded-lg">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-4 text-xs opacity-75 flex items-center">
                                    <span class="flex items-center gap-1">
                                        Estimasi nilai seluruh inventaris
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

                            <div class="bg-[#1E293B] p-6 rounded-2xl shadow-sm border border-gray-700 flex flex-col">
                                <h3 class="text-lg font-bold text-gray-200 mb-4">5 Barang Stok Paling Kritis</h3>
                                <div class="relative h-72 w-full">
                                    <canvas id="stockChart"></canvas>
                                </div>
                            </div>

                            <div class="bg-[#1E293B] p-6 rounded-2xl shadow-sm border border-gray-700 flex flex-col items-center">
                                <h3 class="text-lg font-bold text-gray-200 mb-4 w-full text-left">Sebaran Kategori Barang</h3>
                                <div class="relative h-72 w-full flex justify-center">
                                    <canvas id="categoryChart"></canvas>
                                </div>
                            </div>

                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            const criticalStocks = @json($criticalStocks);
                            const categoriesChart = @json($categoriesChart);

                            const ctxStock = document.getElementById('stockChart').getContext('2d');
                            new Chart(ctxStock, {
                                type: 'bar',
                                data: {
                                    labels: criticalStocks.map(item => item.title),
                                    datasets: [{
                                        label: 'Sisa Stok',
                                        data: criticalStocks.map(item => item.stock),
                                        backgroundColor: 'rgba(244, 63, 94, 0.8)',
                                        borderRadius: 6
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            display: false
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            grid: {
                                                color: 'rgba(255,255,255,0.1)'
                                            },
                                            ticks: {
                                                color: '#9CA3AF'
                                            }
                                        },
                                        x: {
                                            grid: {
                                                display: false
                                            },
                                            ticks: {
                                                color: '#9CA3AF',
                                                callback: function(value) {
                                                    let label = this.getLabelForValue(value);
                                                    return label.length > 15 ? label.substr(0, 15) + '...' : label;
                                                }
                                            }
                                        }
                                    }
                                }
                            });

                            const ctxCategory = document.getElementById('categoryChart').getContext('2d');
                            new Chart(ctxCategory, {
                                type: 'doughnut',
                                data: {
                                    labels: categoriesChart.map(item => item.name),
                                    datasets: [{
                                        data: categoriesChart.map(item => item.products_count),
                                        backgroundColor: ['#8B5CF6', '#10B981', '#F59E0B', '#3B82F6', '#EC4899'],
                                        borderWidth: 0,
                                        hoverOffset: 4
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            position: 'right',
                                            labels: {
                                                color: '#9CA3AF',
                                                padding: 20
                                            }
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>