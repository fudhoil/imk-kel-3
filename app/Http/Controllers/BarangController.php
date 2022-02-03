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
            "barang" => Barang::filter()->orderBy('nama_barang', 'asc')->orderBy('type_barang', 'asc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangRequest $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'nama_barang' => 'required|max:255',
            'type_barang' => 'required|max:255',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'type_barang' => $request->type_barang,
            'kondisi_barang' => 'Baik',
            'status_barang' => 'Tidak Terpinjam'
        ]);

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
        $barang = Barang::findOrFail($id);

        return view('barang', [
            "title" => "Barang",
            "barang" => Barang::filter()->orderBy('nama_barang', 'asc')->orderBy('type_barang', 'asc')->paginate(10)
        ]);
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
        // dd($request);
        $id = $request->id;
        if($request->kondisi_barang=='Rusak'){
            $barang = Barang::where('id', $request->id)->update(['status_barang' => 'Dalam Perbaikan']); 
        }

        $barang = Barang::where('id', $request->id)->update($request->except(['_token'])); 
         
        return back()->with('success',' Data dengan ID '.$id.' telah diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $id = $barang->id;
        Barang::destroy($barang->id);
        return redirect('/barang')->with('success', 'Data barang dengan ID "'.$id.'" telah berhasil dihapus!');
    }
}