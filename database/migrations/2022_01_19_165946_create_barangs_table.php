<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_barangs', function (Blueprint $table) {
            $table->id('id_barang')->notnull();
            $table->string('nama barang');
            $table->string('type barang');
            $table->enum('kondisi barang',['Baik','Rusak']);
            $table->enum('status barang',['Tersedia','Tidak tersedia','Dalam perbaikan']);
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
        Schema::dropIfExists('T_barangs');
    }
}
