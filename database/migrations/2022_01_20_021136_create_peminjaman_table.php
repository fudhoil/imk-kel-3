<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman')->notnull();
            $table->string("nama peminjam");
            $table->date('tgl_peminjaman');
            $table->date('tgl_pengembalian');
            $table->enum('Status Peminjaman',['Terpinjam','Kembali']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('T_peminjaman');
    }
}
