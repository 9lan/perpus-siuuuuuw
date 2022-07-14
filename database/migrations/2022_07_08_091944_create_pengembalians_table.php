<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembaliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_kembali');
            $table->date('jatuh_tempo');
            $table->integer('jumlah_hari')->default(0);
            $table->integer('total_denda')->default(0);
            $table->integer('buku_id');
            $table->enum('status', ['Tepat Waktu', 'Denda', 'Terbayar']);
            $table->integer('admin_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('pengembalians');
    }
}
