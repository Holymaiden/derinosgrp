<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contracts\PerumahanContract;
use App\Services\Contracts\TransactionContract;
use Illuminate\Support\Facades\Validator;

class PerumahanController extends Controller
{
  private $perumahanContract, $transactionContract, $title;

  public function __construct(PerumahanContract $perumahanContract, TransactionContract  $transactionContract)
  {
    $this->perumahanContract = $perumahanContract;
    $this->transactionContract = $transactionContract;
    $this->title = 'Laporan Perumahan';
  }
  /**
   * Redirect to blok-management view.
   *
   */
  public function index()
  {
    $title = $this->title;
    return view('content.laporan.perumahan.index', compact('title'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function paginated(Request $request)
  {
    try {
      $datas = $this->perumahanContract->paginatedLaporan($request);
      $data = $datas['data'];
      $view = view('content.laporan.perumahan.data', compact('data'))->with('i', ($request->input('page', 1) -
        1) * $request->input('length'))->render();
      return response()->json(['html' => $view, 'total_data' => $datas['total_data'], 'total_page' => $datas['total_page'], 'message' => 'Success!'], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
    }
  }

  public function customer(Request $request)
  {
    try {
      $data = $request->all();
      if (!$data['customer'] || !$data['blok'])
        return response()->json(['message' => "Customer Tidak Ditemukan"], 500);

      $transaction = $this->transactionContract->customer($data);

      $customer = [
        'blok' => $data['blok'],
        'count' => count($transaction) === 0 ? 0 + 1 : count($transaction) + 1,
      ];

      return response()->json(['message' => 'Success!', 'code' => 200, 'data' => ['transaction' => $transaction, 'customer' => $customer]], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
    }
  }

  public function store(Request $request)
  {
    try {
      // Validate the value...
      $validatedData = Validator::make($request->all(), [
        'blok' => 'required',
        'customer' => 'required',
        'transaction_date' => 'required',
        'transaction' => 'required',
      ]);

      // if fail
      if ($validatedData->fails()) {
        return response()->json(['message' => "Terjadi Kesalahan"], 500);
      }

      return $this->transactionContract->store($request->all());
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }
}
