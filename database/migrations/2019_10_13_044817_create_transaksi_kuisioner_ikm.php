<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiKuisionerIkm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_kuisioner_ikm', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('umur')->nullable();
            $table->string('kel',2)->nullable();
            $table->string('pendidikan',4)->nullable();
            $table->string('pekerjaan',100)->nullable();
            $table->text('layanan')->nullable();
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
        Schema::dropIfExists('transaksi_kuisioner_ikm');
    }
}
