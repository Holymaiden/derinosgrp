<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface UserContract
{
        public function paginated(Request $request);

        public function store(array $request);

        public function find($id);

        public function update(array $data, $id);

        public function delete($id);
}
