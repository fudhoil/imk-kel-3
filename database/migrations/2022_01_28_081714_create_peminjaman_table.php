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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id()->notnull();
            $table->foreignId('id_barang')->unique();
            $table->string("nama_peminjam");
            $table->date('tgl_peminjaman');
            $table->date('tgl_pengembalian')->nullable();
            $table->string('status_peminjaman')->default('Terpinjam');
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
        Schema::dropIfExists('peminjaman');
    }
}