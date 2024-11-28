<?php

namespace App\Http\Controllers\Master;

use App\Exports\LaporanRabDetailExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contracts\RabDetailContract;
use App\Services\Contracts\CavlingContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;


class RabDetailController extends Controller
{
  private $rabDetailContract, $title, $cavlingContract;

  public function __construct(RabDetailContract $rabDetailContract, CavlingContract $cavlingContract)
  {
    $this->rabDetailContract = $rabDetailContract;
    $this->cavlingContract = $cavlingContract;
    $this->title = 'Rencana Anggaran Biaya';
  }
  /**
   * Redirect to rab-detail-management view.
   *
   */
  public function index($blok)
  {
    $title = $this->title;

    $user = Auth::user();

    $cavling = $this->cavlingContract->detail($user->perumahan_id, $blok);

    return view('content.rab-detail.index', compact('title', 'cavling'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function paginated(Request $request)
  {
    try {
      $datas = $this->rabDetailContract->paginated($request);
      $data = $datas['data'];

      $view = view('content.rab-detail.data', compact('data'))->with('i', ($request->input('page', 1) -
        1) * $request->input('length'))->render();
      return response()->json(['html' => $view, 'total_data' => $datas['total_data'], 'total_page' => $datas['total_page'], 'message' => 'Success!'], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
    }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    try {

      // Validate the value...
      $validatedData =  Validator::make($request->all(), [
        'perumahan' => 'required',
        'blok_id' => 'required',
        'master_rab_id' => 'required',
        'amount' => 'required|numeric',
        'unit' => 'required',
        'price' => 'required|numeric',
        'total' => 'required|numeric',
      ]);

      // if fail
      if ($validatedData->fails()) {
        return response()->json(['message' => "Terjadi Kesalahan", 'code' => 500], 500);
      }

      return $this->rabDetailContract->store($request->all());
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    try {
      $data = $this->rabDetailContract->find($id);

      return response()->json(['message' => 'Success!', 'code' => 200, 'data' => $data], 200); // ['data' => $data
    } catch (\Exception $e) {
      return response()->json(['message' => "Rab Tidak Ditemukan"], 500);
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {

    try {
      $data = $this->rabDetailContract->find($id);
      return response()->json($data);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    try {

      // Validate the value...
      $validatedData = Validator::make($request->all(), [
        'perumahan' => 'required',
        'master_rab_id' => 'required',
        'amount' => 'required|numeric',
        'unit' => 'required',
        'price' => 'required|numeric',
        'total' => 'required|numeric',
      ]);

      // if fail
      if ($validatedData->fails()) {
        return response()->json(['message' => "Terjadi Kesalahan", 'code' => 500], 500);
      }

      return $this->rabDetailContract->update($request->all(), $id);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $data = $this->rabDetailContract->delete($id);

      if ($data == 0) {
        return response()->json(['message' => 'Rab not found!', 'code' => 404], 404);
      }


      return response()->json(['message' => 'Rab has been deleted!', 'code' => 200], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }

  public function export(Request $request)
  {
    try {
      $req  = $request->all();

      $perumahan_id = $req['perumahan'];
      $blok_id = $req['blok'];

      return Excel::download(new LaporanRabDetailExport($perumahan_id, $blok_id), 'rab-detail.xlsx');
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }
}
