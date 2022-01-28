<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    public $table = "peminjaman";

    protected $guarded = ['id'];

    public function DetailPeminjaman(){
        return $this->belongsTo(DetailPeminjaman::class);
    }

    public function Barang(){
        return $this->hasOne(Barang::class, 'id_barang', 'id');
    }

}
