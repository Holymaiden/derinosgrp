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
        Schema::rename('customer', 'customers');
        Schema::rename('master_perumahan', 'master_perumahans');
        Schema::rename('status_blok', 'status_bloks');
        Schema::rename('blok', 'bloks');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
