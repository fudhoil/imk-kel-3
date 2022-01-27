<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($request)
    {
        return $request->where('id', 'like', '%'.$request->id.'%')
                       ->orWhere('nama_barang', 'like', '%'.$request->nama_barang.'%')
                       ->orWhere('type_barang', 'like', '%'.$request->type_barang.'%')
                       ->orWhere('kondisi_barang', 'like', '%'.$request->kondisi_barang.'%')
                       ->orWhere('status_barang', 'like', '%'.$request->status_barang.'%');
    }
    
    public function DetailPeminjaman(){
        return $this->belongsTo(DetailPeminjaman::class);
    }
}
