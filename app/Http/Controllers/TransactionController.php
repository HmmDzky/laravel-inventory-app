<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'type'     => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'notes'    => 'nullable|sometimes|string|max:255'
        ], [
            'type.required'     => 'Tipe transaksi harus dipilih.',
            'type.in'           => 'Tipe transaksi tidak valid. Pilih "in" atau "out".',
            'quantity.required' => 'Jumlah barang harus diisi.',
            'quantity.integer'  => 'Jumlah barang harus berupa angka.',
            'quantity.min'      => 'Jumlah barang minimal 1.',
            'notes.string'      => 'Catatan harus berupa teks.',
            'notes.max'         => 'Catatan maksimal 255 karakter.'
        ]);

        $product = Product::findOrFail($productId);

        if ($request->type === 'out' && $request->quantity > $product->stock) {
            return back()->withInput()->with(['error' => 'Gagal! Stok barang tidak mencukupi untuk dikeluarkan.'])->withFragment('form-transaksi');
        }

        return DB::transaction(function () use ($request, $product) {
            Transaction::create([
                'product_id' => $product->id,
                'user_id'    => Auth::id(),
                'type'       => $request->type,
                'quantity'   => $request->quantity,
                'notes'      => $request->notes
            ]);

            if ($request->type === 'in') {
                $product->stock += $request->quantity;
            } else {
                $product->stock -= $request->quantity;
            }
            $product->save();

            return back()->with(['success' => 'Transaksi berhasil dicatat dan stok telah diupdate otomatis!'])->withFragment('form-transaksi');
        });
    }
}
