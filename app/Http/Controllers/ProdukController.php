<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = DB::table('produk')
            ->leftJoin(
                'kategori',
                'produk.kategori_id',
                '=',
                'kategori.id'
            )
            ->select(
                'produk.*',
                'kategori.nama_kategori as kategori_nama'
            )
            ->orderByDesc('produk.created_at')
            ->get();

        return view('admin.produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = DB::table('kategori')
            ->orderBy('nama_kategori')
            ->get();

        return view('admin.produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'nullable|exists:kategori,id',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|string|max:255',
        ]);

        $kategoriNama = null;

        if (!empty($validated['kategori_id'])) {
            $kategoriNama = DB::table('kategori')
                ->where('id', $validated['kategori_id'])
                ->value('nama_kategori');
        }

        DB::table('produk')->insert([
            'nama_produk' => $validated['nama_produk'],
            'kategori_id' => $validated['kategori_id'] ?? null,
            'kategori' => $kategoriNama,
            'deskripsi' => $validated['deskripsi'] ?? null,
            'harga' => $validated['harga'],
            'stok' => $validated['stok'],
            'gambar' => $validated['gambar'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $produk = DB::table('produk')
            ->leftJoin(
                'kategori',
                'produk.kategori_id',
                '=',
                'kategori.id'
            )
            ->select(
                'produk.*',
                'kategori.nama_kategori as kategori_nama'
            )
            ->where('produk.id', $id)
            ->first();

        abort_if(!$produk, 404);

        return view('admin.produk.show', compact('produk'));
    }

    public function edit(string $id)
    {
        $produk = DB::table('produk')
            ->where('id', $id)
            ->first();

        abort_if(!$produk, 404);

        $kategori = DB::table('kategori')
            ->orderBy('nama_kategori')
            ->get();

        return view('admin.produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, string $id)
    {
        $produk = DB::table('produk')
            ->where('id', $id)
            ->first();

        abort_if(!$produk, 404);

        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'nullable|exists:kategori,id',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|string|max:255',
        ]);

        $kategoriNama = null;

        if (!empty($validated['kategori_id'])) {
            $kategoriNama = DB::table('kategori')
                ->where('id', $validated['kategori_id'])
                ->value('nama_kategori');
        }

        DB::table('produk')
            ->where('id', $id)
            ->update([
                'nama_produk' => $validated['nama_produk'],
                'kategori_id' => $validated['kategori_id'] ?? null,
                'kategori' => $kategoriNama,
                'deskripsi' => $validated['deskripsi'] ?? null,
                'harga' => $validated['harga'],
                'stok' => $validated['stok'],
                'gambar' => $validated['gambar'] ?? null,
                'updated_at' => now(),
            ]);

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $produk = DB::table('produk')
            ->where('id', $id)
            ->first();

        abort_if(!$produk, 404);

        DB::table('produk')
            ->where('id', $id)
            ->delete();

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
