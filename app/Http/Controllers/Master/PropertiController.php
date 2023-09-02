<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contracts\PropertiContract;
use Illuminate\Support\Facades\Validator;

class PropertiController extends Controller
{
  private $propertiContract, $title;

  public function __construct(PropertiContract $propertiContract)
  {
    $this->propertiContract = $propertiContract;
    $this->title = 'Properti';
  }
  /**
   * Redirect to properti-management view.
   *
   */
  public function index()
  {
    $title = $this->title;
    return view('content.properti.index', compact('title'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function paginated(Request $request)
  {
    try {
      $datas = $this->propertiContract->paginated($request);
      $data = $datas['data'];
      $view = view('content.properti.data', compact('data'))->with('i', ($request->input('page', 1) -
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
        'nama_perumahan' => 'required|unique:master_perumahans',
        'alamat' => 'required',
      ]);

      // if fail
      if ($validatedData->fails()) {
        return response()->json(['message' => "Terjadi kesalahan", 'code' => 500], 500);
      }

      return $this->propertiContract->store($request->all());
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
      $properti = $this->propertiContract->find($id);

      return response()->json(['message' => 'Success!', 'code' => 200, 'data' => $properti], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => "Properti Tidak Ditemukan"], 500);
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
      $properti = $this->propertiContract->find($id);
      return response()->json($properti);
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
        'nama_perumahan' => 'required',
        'alamat' => 'required',
      ]);

      // if fail
      if ($validatedData->fails()) {
        return response()->json(['message' => "Terjadi kesalahan", 'code' => 500], 500);
      }

      return $this->propertiContract->update($request->all(), $id);
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
      $properti = $this->propertiContract->delete($id);

      if ($properti == 0) {
        return response()->json(['message' => 'Properti not found!', 'code' => 404], 404);
      }

      return response()->json(['message' => 'Properti has been deleted!', 'code' => 200], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }
}
