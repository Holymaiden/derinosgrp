<?php

namespace App\Http\Controllers\Master;

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
    $this->title = 'Perumahan';
  }
  /**
   * Redirect to blok-management view.
   *
   */
  public function index()
  {
    $title = $this->title;
    return view('content.perumahan.index', compact('title'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function paginated(Request $request)
  {
    try {
      $datas = $this->perumahanContract->paginated($request);
      $data = $datas['data'];
      $view = view('content.perumahan.data', compact('data'))->with('i', ($request->input('page', 1) -
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
        'kode' => 'required|unique:bloks,kode',
        'panjang' => 'required|numeric',
        'lebar' => 'required|numeric',
        'luas' => 'required|numeric',
        'harga_permeter' => 'required|numeric',
        'harga_jual' => 'required|numeric',
        'keterangan' => 'required',
        'status_blok_id' => 'required',
        'status_bayar' => 'required',
        'perumahan' => 'required',
      ]);

      // if fail
      if ($validatedData->fails()) {
        return response()->json(['message' => "Terjadi Kesalahan", 'code' => 500], 500);
      }

      return $this->perumahanContract->store($request->all());
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
      $data = $this->perumahanContract->find($id);

      return response()->json(['message' => 'Success!', 'code' => 200, 'data' => $data], 200); // ['data' => $data
    } catch (\Exception $e) {
      return response()->json(['message' => "Perumahan Tidak Ditemukan"], 500);
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
      $data = $this->perumahanContract->find($id);
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
        'kode' => 'required|unique:bloks,kode,' . $id,
        'panjang' => 'required|numeric',
        'lebar' => 'required|numeric',
        'luas' => 'required|numeric',
        'harga_permeter' => 'required|numeric',
        'harga_jual' => 'required|numeric',
        'keterangan' => 'required',
        'status_blok_id' => 'required',
        'status_bayar' => 'required',
      ]);

      // if fail
      if ($validatedData->fails()) {
        return response()->json(['message' => "Terjadi Kesalahan", 'code' => 500], 500);
      }

      return $this->perumahanContract->update($request->all(), $id);
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
      $customer = $this->perumahanContract->delete($id);

      if ($customer == 0) {
        return response()->json(['message' => 'Perumahan not found!', 'code' => 404], 404);
      }


      return response()->json(['message' => 'Perumahan has been deleted!', 'code' => 200], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }
}
