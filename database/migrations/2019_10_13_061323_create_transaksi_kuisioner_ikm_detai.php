<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiKuisionerIkmDetai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_kuisioner_ikm_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kuisioner_ikm_id')->unsigned();
            $table->integer('pilihan_id')->unsigned();
            $table->timestamps();

            $table->foreign('kuisioner_ikm_id')->references('id')->on('transaksi_kuisioner_ikm')->onDelete('cascade');
            $table->foreign('pilihan_id')->references('id')->on('pilihans')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_kuisioner_ikm_detail');
    }
}
