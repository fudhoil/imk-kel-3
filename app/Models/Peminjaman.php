<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    public $table = "peminjaman";

    protected $guarded = ['id'];

    public function scopeFilter($query)
    {
        if(request('search')){
        return $query->where('id', 'like', '%'.request('search').'%')
                       ->orWhere('nama_peminjam', 'like', '%'.request('search').'%')
                       ->orWhere('tgl_peminjaman', 'like', '%'.request('search').'%')
                       ->orWhere('tgl_pengembalian', 'like', '%'.request('search').'%')
                       ->orWhere('status_peminjaman', 'like', '%'.request('search').'%');
        }
    }

    public function DetailPeminjaman(){
        return $this->belongsTo(DetailPeminjaman::class);
    }

    public function Barang(){
        return $this->hasOne(Barang::class, 'id_barang', 'id');
    }

    public function Barangs(){
        return $this->hasOne(Barang::class);
    }



}
