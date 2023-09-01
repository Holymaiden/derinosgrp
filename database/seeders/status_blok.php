<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class status_blok extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = ['Kosong', 'Booking', 'Proses Berkas', 'Sudah Akad', 'Pembelian Cash'];
        $warna = ['light', 'success', 'info', 'danger', 'warning'];
        $icon = ['fas fa-circle', 'fas fa-calendar-check', 'fas fa-file-alt', 'fas fa-handshake', 'fas fa-money-bill-wave'];

        // Transaction
        foreach (range(0, count($status) - 1) as $i) {
            DB::table('status_bloks')->insert([
                'status' => $status[$i],
                'warna' => $warna[$i],
                'icon' => $icon[$i],
            ]);
        }
    }
}
