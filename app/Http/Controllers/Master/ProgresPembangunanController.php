<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ProgressBlockContract;
use App\Services\Contracts\PropertiContract;
use App\Services\Contracts\CavlingContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgresPembangunanController extends Controller
{
  private $title, $progressBlockContract, $propertiContract, $cavlingContract;

  public function __construct(ProgressBlockContract $progressBlockContract, PropertiContract $propertiContract, CavlingContract $cavlingContract)
  {
    $this->progressBlockContract = $progressBlockContract;
    $this->propertiContract = $propertiContract;
    $this->cavlingContract = $cavlingContract;
    $this->title = 'Progres Pembangunan';
  }
  /**
   * Redirect to user-management view.
   *
   */
  public function index()
  {
    $title = $this->title;
    return view('content.progress.index', compact('title'));
  }

  public function data(Request $request)
  {
    try {
      $data =  $this->progressBlockContract->data($request);

      if (empty($data)) {
        return response()->json(['message' => "Data Tidak Ditemukan"], 404);
      }

      return response()->json(['message' => "Data Ditemukan", 'data' => $data], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
    }
  }

  public function cavling(Request $request)
  {
    try {
      $data =  $this->propertiContract->find($request->perumahan);

      if (empty($data)) {
        return response()->json(['message' => "Data Tidak Ditemukan"], 404);
      }

      $view = view('content.progress.map.' . $data->url_maps)->render();
      return response()->json(['html' => $view, 'message' => 'Success!'], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
    }
  }

  public function show(Request $request, $id)
  {
    try {
      $data = $this->progressBlockContract->findProgres(['kode' => $id, 'perumahan_id' => $request->perumahan]);
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
      return $this->progressBlockContract->update($request->all(), $request->id);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
    }
  }

  public function detail($blok)
  {
    $user = Auth::user();

    $title = "Laporan Progres Pembangunan";

    $data = $this->cavlingContract->detail($user->perumahan_id, $blok);

    $progress = $data->progressDetail->sortBy(['date', 'progress']);

    return view('content.progress.detail', compact('title', 'blok', 'data', 'progress'));
  }
}
