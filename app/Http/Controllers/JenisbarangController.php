<?php

namespace App\Http\Controllers;
use App\Models\JenisBarang;
use Inertia\Inertia;

use Illuminate\Http\Request;

class JenisbarangController extends Controller
{
     public function index()
    {
        $jenisBarang = JenisBarang::all();
        return Inertia::render('JenisBarang/Index', [
            'jenisBarang' => $jenisBarang
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        JenisBarang::create($request->only('nama'));

        return redirect()->back()->with('success', 'Jenis Barang berhasil ditambahkan.');
    }

    public function update(Request $request, JenisBarang $jenisBarang)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $jenisBarang->update($request->only('nama'));

        return redirect()->back()->with('success', 'Jenis Barang berhasil diperbarui.');
    }

    public function destroy(JenisBarang $jenisBarang)
    {
      $jenisBarang->delete();

    return redirect()->back()->with('success', 'Jenis Barang berhasil dihapus.');
    }
}
