<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $barang = ['id'];
    
    public function Peminjaman(){
        return $this->belongsTo(Peminjaman::class);
    }
}
