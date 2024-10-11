<?php

namespace App\Http\Controllers\Laporan;

use App\Exports\LaporanPerumahanExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contracts\PerumahanContract;
use App\Services\Contracts\TransactionContract;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

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
        'perumahan' => 'required',
        'blok' => 'required',
        'customer' => 'required',
        'transaction_date' => 'required',
        'transaction' => 'required',
      ]);

      // if fail
      if ($validatedData->fails()) {
        return response()->json(['message' => "Terjadi Kesalahan"], 500);
      }

      $data = $request->all();

      if ($request->hasFile('bukti_transfer'))
        $data['bukti_transfer'] = $request->file('bukti_transfer');

      return $this->transactionContract->store($data);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }

  public function destroy($id)
  {
    try {
      $customer = $this->transactionContract->delete($id);

      if ($customer == 0) {
        return response()->json(['message' => 'Transaksi not found!', 'code' => 404], 404);
      }


      return response()->json(['message' => 'Transaksi has been deleted!', 'code' => 200], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }
  public function exportEXCEL(Request $request)
  {
    try {
      $perumahan_id = $request->all()['perumahan'];
      return Excel::download(new LaporanPerumahanExport($perumahan_id), 'perumahan.xlsx');
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }
}
