<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\JenisBarang;
use Inertia\Inertia;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('jenisBarang')->get();
        return Inertia::render('Barang/Index', [
            'barangs' => $barangs
        ]);
    }

    public function create()
    {
        $jenis = JenisBarang::all();
        return Inertia::render('Barang/Create', [
            'jenis' => $jenis
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_barang_id' => 'required|exists:jenis_barangs,id',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }
}
