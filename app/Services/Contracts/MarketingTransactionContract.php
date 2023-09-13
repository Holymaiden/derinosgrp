<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface MarketingTransactionContract
{
        public function store(array $request);

        public function marketing(array $request);

        public function delete($id);
}
