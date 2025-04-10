<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('daftar_tamus', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama_tamu');
            $table->string('instansi');
            $table->string('pic');
            $table->text('keterangan');
            $table->time('jam_kedatangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_tamus');
    }
};
