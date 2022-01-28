<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{

    public $table = "detail_peminjaman";

    protected $guarded = ['foreignId'];

    public function Peminjaman(){
            return $this->hasOne(Peminjaman::class, 'id_peminjaman', 'id');
    }
    public function Barang(){
        return $this->hasOne(Barang::class, 'id_barang', 'id');
    }
}
