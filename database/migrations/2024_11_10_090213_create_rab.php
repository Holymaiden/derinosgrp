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
        Schema::create('rab', function (Blueprint $table) {
            $table->id();
            $table->integer('perumahan_id');
            $table->integer('blok_id');
            $table->integer('master_rab_id');
            $table->float('amount', 10, 2);
            $table->string('unit', 20);
            $table->float('price', 10, 2);
            $table->float('total', 10, 2);
            $table->string('noted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rab');
    }
};
