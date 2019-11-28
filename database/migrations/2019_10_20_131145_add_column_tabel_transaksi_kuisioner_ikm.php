<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTabelTransaksiKuisionerIkm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi_kuisioner_ikm', function (Blueprint $table) {
            $table->string('rating_pelayanan',25)->nullable();
            $table->text('kritik_saran')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi_kuisioner_ikm', function (Blueprint $table) {
            //
        });
    }
}
