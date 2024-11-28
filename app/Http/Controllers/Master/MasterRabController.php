<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contracts\MasterRabContract;
use Illuminate\Support\Facades\Validator;

class MasterRabController extends Controller
{
  private $masterRabContract, $title;

  public function __construct(MasterRabContract $masterRabContract)
  {
    $this->masterRabContract = $masterRabContract;
    $this->title = 'Master RAB';
  }
  /**
   * Redirect to master-rab-management view.
   *
   */
  public function index()
  {
    $title = $this->title;
    return view('content.master-rab.index', compact('title'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function paginated(Request $request)
  {
    try {
      $datas = $this->masterRabContract->paginated($request);
      $data = $datas['data'];
      $view = view('content.master-rab.data', compact('data'))->with('i', ($request->input('page', 1) -
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
      $validatedData = Validator::make($request->all(), [
        'name' => 'required|unique:master_rab',
      ]);

      // if fail
      if ($validatedData->fails()) {
        return response()->json(['message' => "Terjadi kesalahan", 'code' => 500], 500);
      }

      return $this->masterRabContract->store($request->all());
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
      $data = $this->masterRabContract->find($id);

      return response()->json(['message' => 'Success!', 'code' => 200, 'data' => $data], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => "Master RAB Tidak Ditemukan"], 500);
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
      $marketing = $this->masterRabContract->find($id);
      return response()->json($marketing);
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
        'name' => 'required',
      ]);

      // if fail
      if ($validatedData->fails()) {
        return response()->json(['message' => "Terjadi kesalahan", 'code' => 500], 500);
      }

      return $this->masterRabContract->update($request->all(), $id);
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
      $data = $this->masterRabContract->delete($id);

      if ($data == 0) {
        return response()->json(['message' => 'Master RAB not found!', 'code' => 404], 404);
      }

      return response()->json(['message' => 'Master RAB has been deleted!', 'code' => 200], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }
}
