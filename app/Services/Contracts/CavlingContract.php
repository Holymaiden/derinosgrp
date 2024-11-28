<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

interface CavlingContract
{
        public function data(Request $request);

        public function findByCriteria(array $criteria): ?Model;

        public function detail($perumahan_id, $blok);


        public function update(array $data, $id);

        public function getKode(Request $request);
}
