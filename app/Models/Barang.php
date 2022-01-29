<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query)
    {
        if(request('search')){
        return $query->where('id', 'like', '%'.request('search').'%')
                       ->orWhere('nama_barang', 'like', '%'.request('search').'%')
                       ->orWhere('type_barang', 'like', '%'.request('search').'%')
                       ->orWhere('kondisi_barang', 'like', '%'.request('search').'%')
                       ->orWhere('status_barang', 'like', '%'.request('search').'%');
        }
    }
    
    public function DetailPeminjaman(){
        return $this->belongsTo(DetailPeminjaman::class);
    }

    public function Peminjaman(){
        return $this->belongsToMany(Peminjaman::class);
    }
}
