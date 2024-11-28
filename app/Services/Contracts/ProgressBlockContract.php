<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface ProgressBlockContract
{
        public function paginated(Request $request);

        public function data(Request $request);

        public function progress(array $request);

        public function findProgres(array $criteria);

        public function store(array $request);

        public function find($id);

        public function update(array $data, $id);

        public function delete($id);
}
