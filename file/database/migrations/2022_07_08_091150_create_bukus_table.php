<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku', 20)->unique()->nullable();
            $table->string('judul', 100)->nullable();
            $table->text('sinopsis', 100)->nullable();
            $table->string('penulis', 100)->nullable();
            $table->string('kode_rak', 12)->nullable();
            $table->text('foto')->nullable();
            $table->enum('status', ['tersedia', 'dipinjam'])->default('tersedia')->nullable();
            $table->integer('denda')->default(0)->nullable();
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
        Schema::dropIfExists('bukus');
    }
}
