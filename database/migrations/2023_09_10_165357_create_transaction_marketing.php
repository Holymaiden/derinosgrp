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
        Schema::create('transaction_marketing', function (Blueprint $table) {
            $table->id();
            $table->integer('perumahan_id');
            $table->integer('marketing_id');
            $table->integer('blok_id');
            $table->integer('count');
            $table->float('transaction');
            $table->date('transaction_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_marketing');
    }
};
