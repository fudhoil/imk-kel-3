<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('barang', [
            "title" => "Barang",
            "barang" => Barang::paginate(10)
        ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangRequest $request)
    {
        $vaidatedData = $request->validate([
            'nama_barang' => 'required|max:255',
            'type_barang' => 'required|max:255'
        ]);

        Barang::create($vaidatedData);
        return redirect('/barang')->with('success', 'Barang baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        Barang::destroy($barang->id_barang);
        return redirect('/barang')->with('success', 'Data barang telah berhasil dihapus!');
    }
}
