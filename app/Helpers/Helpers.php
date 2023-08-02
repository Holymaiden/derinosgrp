<?php

namespace App\Helpers;

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
}
