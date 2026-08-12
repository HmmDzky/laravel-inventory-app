<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk dengan fitur pencarian, filter kategori, dan paginasi.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $categoryId = $request->input('category_id');

        $products = Product::with('category')
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })
            ->when($categoryId, function ($query, $categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Menampilkan form tambah produk.
     */
    public function create(): View
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:1',
            'stock'       => 'required|integer|min:1',
        ], [
            'image.required'       => 'Gambar produk wajib diunggah.',
            'image.image'          => 'File yang diunggah harus berupa gambar.',
            'image.mimes'          => 'Format gambar tidak valid. Harus berupa JPEG, PNG, atau JPG.',
            'image.max'            => 'Ukuran gambar maksimal adalah 2MB.',
            'title.required'       => 'Nama barang wajib diisi.',
            'title.max'            => 'Nama barang maksimal 255 karakter.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid.',
            'price.required'       => 'Harga wajib diisi.',
            'price.numeric'        => 'Harga harus berupa angka.',
            'price.min'            => 'Harga tidak boleh 0 atau bernilai negatif.',
            'stock.required'       => 'Stok wajib diisi.',
            'stock.integer'        => 'Stok harus berupa angka bulat.',
            'stock.min'            => 'Stok tidak boleh 0 atau bernilai negatif.',
        ]);

        return DB::transaction(function () use ($request) {
            $image = $request->file('image');
            $imagePath = $image->store('products', 'public');
            $imageName = basename($imagePath);

            Product::create([
                'image'       => $imageName,
                'title'       => $request->title,
                'description' => $request->description ?? '',
                'price'       => $request->price,
                'stock'       => $request->stock,
                'category_id' => $request->category_id
            ]);

            return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
        });
    }

    /**
     * Menampilkan detail produk beserta riwayat transaksi terbatas (mencegah loading berat).
     */
    public function show(string $id): View
    {
        $product = Product::with([
            'category',
            'transactions' => fn($q) => $q->latest()->take(10),
            'transactions.user'
        ])->findOrFail($id);

        return view('products.show', compact('product'));
    }

    /**
     * Menampilkan form edit produk.
     */
    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Mengubah data produk di database.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:1',
            'stock'       => 'required|integer|min:1',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'image.image'          => 'File yang diunggah harus berupa gambar.',
            'image.mimes'          => 'Format gambar tidak valid. Harus berupa JPEG, PNG, atau JPG.',
            'image.max'            => 'Ukuran gambar maksimal adalah 2MB.',
            'title.required'       => 'Nama barang wajib diisi.',
            'title.max'            => 'Nama barang maksimal 255 karakter.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid.',
            'price.required'       => 'Harga wajib diisi.',
            'price.numeric'        => 'Harga harus berupa angka.',
            'price.min'            => 'Harga tidak boleh 0 atau bernilai negatif.',
            'stock.required'       => 'Stok wajib diisi.',
            'stock.integer'        => 'Stok harus berupa angka bulat.',
            'stock.min'            => 'Stok tidak boleh 0 atau bernilai negatif.',
        ]);

        return DB::transaction(function () use ($request, $id) {
            $product = Product::findOrFail($id);

            $data = [
                'title'       => $request->title,
                'description' => $request->description,
                'price'       => $request->price,
                'stock'       => $request->stock,
                'category_id' => $request->category_id
            ];

            if ($request->hasFile('image')) {
                if ($product->image && Storage::disk('public')->exists('products/' . $product->image)) {
                    Storage::disk('public')->delete('products/' . $product->image);
                }

                $image = $request->file('image');
                $imagePath = $image->store('products', 'public');
                $data['image'] = basename($imagePath);
            }

            $product->update($data);

            return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diubah!']);
        });
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy($id): RedirectResponse
    {
        return DB::transaction(function () use ($id) {
            $product = Product::findOrFail($id);

            if ($product->image && Storage::disk('public')->exists('products/' . $product->image)) {
                Storage::disk('public')->delete('products/' . $product->image);
            }

            $product->delete();

            return redirect()->route('products.index')->with(['success' => 'Data Berhasil Dihapus!']);
        });
    }
}
