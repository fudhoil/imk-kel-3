<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    protected $guarded = ['foreignId'];

    public function Peminjaman(){
            return $this->hasOne(Peminjaman::class);
    }
    public function Barang(){
        return $this->hasOne(Barang::class);
    }
}
