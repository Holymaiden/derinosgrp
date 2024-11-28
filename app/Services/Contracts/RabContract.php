<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface RabContract
{
        public function paginated(Request $request);

        
}
