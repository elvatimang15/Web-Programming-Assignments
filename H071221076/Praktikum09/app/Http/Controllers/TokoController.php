<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tokos = Toko::orderBy('created_at', 'DESC')->get();
        return view('index', compact('tokos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        // Periksa apakah ada nilai kosong di dalam $requestData
        if (in_array(null, $requestData, true)) {
            return redirect()->back()->with('failled', 'Tolong isi semua field');
        }

        // Jika tidak ada nilai kosong, lanjutkan untuk menyimpan data
        Toko::create($requestData);

        return redirect()->route('toko.index')->with('success', 'Item berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $toko = Toko::findOrFail($id);
        return view('show', compact('toko'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $toko = Toko::findOrFail($id);
        return view('edit', compact('toko'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $toko = Toko::findOrFail($id);
        $toko->update($request->all());
        return redirect()->route('toko.index')->with('success', 'Item berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $toko = Toko::findOrFail($id);
        $toko->delete();
        return redirect()->route('toko.index')->with('success', 'Item berhasil dihapus');
    }

    public function search(Request $request)
    {
        $warna = $request->input('warna'); // Ambil nilai yang diinputkan pengguna

        $tokos = Toko::where('warna', $warna)->get();
        return view('warna', ['tokos' => $tokos]);
    }
}
