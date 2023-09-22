<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contracts\PerumahanContract;
use App\Services\Contracts\MarketingTransactionContract;
use Illuminate\Support\Facades\Validator;

class MarketingController extends Controller
{
  private $perumahanContract, $marketingTransactionContract, $title;

  public function __construct(PerumahanContract $perumahanContract, MarketingTransactionContract  $marketingTransactionContract)
  {
    $this->perumahanContract = $perumahanContract;
    $this->marketingTransactionContract = $marketingTransactionContract;
    $this->title = 'Laporan Marketing';
  }
  /**
   * Redirect to blok-management view.
   *
   */
  public function index()
  {
    $title = $this->title;
    return view('content.laporan.marketing.index', compact('title'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function paginated(Request $request)
  {
    try {
      $datas = $this->perumahanContract->paginatedMarketing($request);
      $data = $datas['data'];
      $view = view('content.laporan.marketing.data', compact('data'))->with('i', ($request->input('page', 1) -
        1) * $request->input('length'))->render();
      return response()->json(['html' => $view, 'total_data' => $datas['total_data'], 'total_page' => $datas['total_page'], 'message' => 'Success!'], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
    }
  }

  public function marketing(Request $request)
  {
    try {
      $data = $request->all();
      if (!$data['marketing'] || !$data['blok'])
        return response()->json(['message' => "Marketing Tidak Ditemukan"], 500);

      $transaction = $this->marketingTransactionContract->marketing($data);

      $marketing = [
        'blok' => $data['blok'],
        'count' => count($transaction) === 0 ? 0 + 1 : count($transaction) + 1,
      ];

      return response()->json(['message' => 'Success!', 'code' => 200, 'data' => ['transaction' => $transaction, 'marketing' => $marketing]], 200);
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
        'marketing' => 'required',
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

      return $this->marketingTransactionContract->store($data);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }

  public function destroy($id)
  {
    try {
      $marketing = $this->marketingTransactionContract->delete($id);

      if ($marketing == 0) {
        return response()->json(['message' => 'Transaksi not found!', 'code' => 404], 404);
      }


      return response()->json(['message' => 'Transaksi has been deleted!', 'code' => 200], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }
}
