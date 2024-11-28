<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contracts\RabContract;

class RabController extends Controller
{
  private $rabContract, $title;

  public function __construct(RabContract $rabContract)
  {
    $this->rabContract = $rabContract;
    $this->title = 'Rencana Anggaran Biaya';
  }
  /**
   * Redirect to blok-management view.
   *
   */
  public function index()
  {
    $title = $this->title;
    return view('content.rab.index', compact('title'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function paginated(Request $request)
  {
    try {
      $datas = $this->rabContract->paginated($request);
      $data = $datas['data'];

      $view = view('content.rab.data', compact('data'))->with('i', ($request->input('page', 1) -
        1) * $request->input('length'))->render();
      return response()->json(['html' => $view, 'total_data' => $datas['total_data'], 'total_page' => $datas['total_page'], 'message' => 'Success!'], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
    }
  }
}
