<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Helpers
{
        public static function getData($param)
        {
                $data = DB::table($param)->get();
                return isset($data) ? $data : null;
        }

        public static function arrayToString($param)
        {
                $data = null;
                foreach ($param as $v) {
                        if ($data == null) {
                                $data = $v;
                        } else {
                                $data = $data . "," . $v;
                        }
                }
                return $data;
        }

        public static function getPerumahan()
        {
                $data = DB::table('master_perumahans')->select('id', 'nama_perumahan', 'alamat');
                $access_id = Auth::user()->perumahan_id;
                if ($access_id != null || isset($access_id)) {
                        $access_id = explode(',', $access_id);
                        $data = $data->whereIn('id', $access_id);
                        return $data->get();
                }

                $data = $data->get();

                return isset($data) ? $data : null;
        }

        public static function getStatus($status)
        {
                $data = null;
                switch ($status) {
                        case 'planned':
                                $data = 'Direncanakan';
                                break;
                        case 'on_going':
                                $data = 'Proses';
                                break;
                        case 'done':
                                $data = 'Selesai';
                                break;
                        case 'delayed':
                                $data = 'Terlambat';
                                break;
                        default:
                                $data = 'Tidak Diketahui';
                                break;
                }
                return $data;
        }

        public static function tranformToIDR($param)
        {
                return 'Rp ' . number_format($param, 0, ',', '.');
        }
}
