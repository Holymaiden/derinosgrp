<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contracts\PerumahanContract;
use Illuminate\Support\Facades\Validator;

class PerumahanController extends Controller
{
  private $perumahanContract, $title;

  public function __construct(PerumahanContract $perumahanContract)
  {
    $this->perumahanContract = $perumahanContract;
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
}
