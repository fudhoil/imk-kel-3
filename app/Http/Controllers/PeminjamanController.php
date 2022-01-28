<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use App\Models\DetailPeminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('peminjaman', [
            "title" => "Peminjaman",
            "peminjaman" => Peminjaman::all()
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $id = $request->id_barang;
        if (Barang::where('id', '=', $request->get('id_barang'))->exists() and Barang::where('status_barang', 'Tidak Terpinjam')) {
            // user found
         

            $validatedData = $request->validate([
                'nama_peminjam' => 'required|max:255',
                'tgl_peminjaman' => 'required|max:255',
                'id_barang' => 'required'
            ]);
            
            $peminjaman = Peminjaman::create($validatedData);
            $peminjaman->save();
            $barang = Barang::where('id', $peminjaman->id_barang)->update(['status_barang' => 'Terpinjam']);
            DetailPeminjaman::create([
                'id_barang' => $peminjaman->id_barang,
                'id_peminjaman' => $peminjaman->id
            ]);

            return redirect('/peminjaman')->with('success', 'Detail Peminjaman baru berhasil ditambahkan!');
        }
        
        return redirect('/peminjaman')->with('error', 'Gagal menambahkan, tidak terdapat barang dengan ID'.$id.'!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
