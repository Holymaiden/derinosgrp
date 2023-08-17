<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blok', function (Blueprint $table) {
            $table->id();
            $table->integer('perumahan_id');
            $table->integer('customer_id')->nullable();
            $table->string('kode');
            $table->double('panjang');
            $table->double('lebar');
            $table->double('luas');
            $table->double('harga_permeter');
            $table->double('harga_jual');
            $table->integer('status_blok_id');
            $table->integer('status_bayar_id');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blok');
    }
};
