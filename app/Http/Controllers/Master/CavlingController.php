<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Services\Contracts\CavlingContract;
use App\Services\Contracts\CustomerContract;
use Illuminate\Http\Request;

class CavlingController extends Controller
{
  private $cavlingContract, $customerContract, $title;

  public function __construct(CavlingContract $cavlingContract, CustomerContract $customerContract)
  {
    $this->cavlingContract = $cavlingContract;
    $this->customerContract = $customerContract;
    $this->title = 'Cavling';
  }
  /**
   * Redirect to user-management view.
   *
   */
  public function index()
  {
    $title = $this->title;
    return view('content.cavling.index', compact('title'));
  }

  public function data(Request $request)
  {
    try {
      return $this->cavlingContract->data($request);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
    }
  }

  public function cavling()
  {
    try {
      $view = view('content.cavling.data')->render();
      return response()->json(['html' => $view, 'message' => 'Success!'], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
    }
  }

  public function getKode(Request $request)
  {
    try {
      return $this->cavlingContract->getKode($request);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
    }
  }

  public function getCustomer(Request $request)
  {
    try {
      $data =  $this->customerContract->paginated($request);
      return response()->json(['data' => $data['data']], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
    }
  }

  public function show(Request $request, $id)
  {
    try {
      $data = $this->cavlingContract->findByCriteria(['kode' => $id, 'perumahan_id' => $request->perumahan]);
      if (empty($data)) {
        return response()->json(['message' => "Data Tidak Ditemukan"], 404);
      }

      return response()->json(['message' => "Data Ditemukan", 'data' => $data], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
    }
  }

  public function update(Request $request)
  {
    try {
      return $this->cavlingContract->update($request->all(), $request->id);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
    }
  }
}
