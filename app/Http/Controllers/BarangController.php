<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('barang.index', ['barangs' => Barang::all()]);
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required',
            'nama_barang' => 'required',
            'deskripsi' => 'nullable',
            'harga_satuan' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto-barang', 'public');
        }

        Barang::create($data);

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $data = $request->validate([
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'harga_satuan' => 'required|integer',
            'jumlah' => 'required|integer',
            'foto' => 'nullable|image'
        ]);

        if ($request->hasFile('foto')) {
            if ($barang->foto) Storage::delete('public/' . $barang->foto);
            $data['foto'] = $request->file('foto')->store('foto_barang', 'public');
        }

        $barang->update($data);
        return redirect()->route('barangs.index');
    }

    public function destroy(Barang $barang)
    {
        if ($barang->foto) Storage::delete('public/' . $barang->foto);
        $barang->delete();
        return redirect()->route('barangs.index');
    }
    }
