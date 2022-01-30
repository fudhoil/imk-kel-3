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
            "peminjaman" => Peminjaman::filter()->orderBy('nama_peminjam', 'asc')->orderBy('tgl_peminjaman', 'asc')->paginate(10)
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
        if (Barang::where('id', '=', $request->get('id_barang'))->where('status_barang', '=', 'Tidak Terpinjam')->exists() or Peminjaman::where('id_barang', '=', $request->get('id_barang'))->where('status_peminjaman', 'Tidak Terpinjam')->exists()) {
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
        
        return redirect('/peminjaman')->with('error', 'Gagal menambahkan, tidak terdapat barang dengan ID '.$id.'! atau Barang masih terpinjam');
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
        // dd($peminjaman);
        $peminjaman = Peminjaman::findOrFail($id);
        return back()->with('success',' Peminjaman dengan ID '.$id.' telah diperbaharui!');
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
        $id_barang = Peminjaman::select('id_barang')
                                ->where('id', '=' , $request->id)
                                ->first();
        // value = id barang
        // dd($id_barang);
        $id = $request->id;
        $date = date('Y-m-d H:i:s');
        $p = $peminjaman->where('id', $id);
        $p->update(['tgl_pengembalian' => $date]);
        $p->update(['status_peminjaman' => 'Kembali']);

        // $barang = Barang::find($id_barang);
        $barang = Barang::findOrFail($id_barang)->first()->fill(['status_barang' => 'Tidak Terpinjam'])->save();
        // dd($barang);
        
        return back()->with('success',' Data dengan ID '.$id.' telah diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $id = $peminjaman->id;
        Peminjaman::destroy($peminjaman->id);
        return redirect('/peminjaman')->with('success', 'Data Peminjaman dengan ID "'.$id.'" telah berhasil dihapus!');

    }
}
