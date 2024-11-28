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
        Schema::create('progress_block', function (Blueprint $table) {
            $table->id();
            $table->integer('perumahan_id');
            $table->integer('blok_id');
            $table->date('date');
            $table->float('progress');
            $table->string('noted')->nullable();
            $table->string('images')->nullable();
            $table->enum('status', ['planned', 'on_going', 'done', 'delayed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress_block');
    }
};
