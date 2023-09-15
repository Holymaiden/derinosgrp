<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Contracts\CavlingContract;
use App\Services\Contracts\MarketingContract;
use App\Services\Contracts\PerumahanContract;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $title = 'Dashboard', $cavlingContract, $perumahanContract, $marketingContract;

    public function __construct(CavlingContract $cavlingContract, PerumahanContract $perumahanContract, MarketingContract $marketingContract)
    {
        $this->cavlingContract = $cavlingContract;
        $this->perumahanContract = $perumahanContract;
        $this->marketingContract = $marketingContract;
    }

    public function index()
    {
        $title = $this->title;
        return view('content.dashboard.index', compact('title'));
    }

    public function data(Request $request)
    {
        try {
            $data_cavling = $this->cavlingContract->data($request)->count();
            $data_transaction = $this->perumahanContract->paginatedLaporan($request)['total_data'];
            $data_marketing = $this->marketingContract->paginated($request)['total_data'];

            $data = [
                'cavling' => $data_cavling,
                'transaction' => $data_transaction,
                'marketing' => $data_marketing
            ];

            $view = view('content.dashboard.data', compact('data'))->with('i', ($request->input('page', 1) -
                1) * $request->input('length'))->render();
            return response()->json(['html' => $view, 'message' => 'Success!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
        }
    }
}
