<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface CavlingContract
{
        public function data(Request $request);

        public function findByCriteria(array $criteria);

        public function update(array $data, $id);

        public function getKode(Request $request);
}
