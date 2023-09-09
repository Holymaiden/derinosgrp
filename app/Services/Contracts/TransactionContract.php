<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface TransactionContract
{
        public function store(array $request);

        public function customer(array $request);
}
