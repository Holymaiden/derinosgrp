<?php

namespace App\Http\Controllers\Laporan;

use App\Exports\LaporanProgresPembangunanExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contracts\ProgressBlockContract;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ProgressBlockController extends Controller
{
  private $progressBlockContract, $title;

  public function __construct(ProgressBlockContract $progressBlockContract)
  {
    $this->progressBlockContract = $progressBlockContract;
    $this->title = 'Laporan Progres Pembangunan';
  }
  /**
   * Redirect to blok-management view.
   *
   */
  public function index()
  {
    $title = $this->title;
    return view('content.laporan.progress-block.index', compact('title'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function paginated(Request $request)
  {
    try {
      $datas = $this->progressBlockContract->paginated($request);
      $data = $datas['data'];
      $view = view('content.laporan.progress-block.data', compact('data'))->with('i', ($request->input('page', 1) -
        1) * $request->input('length'))->render();
      return response()->json(['html' => $view, 'total_data' => $datas['total_data'], 'total_page' => $datas['total_page'], 'message' => 'Success!'], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
    }
  }

  public function progress(Request $request)
  {
    try {
      $data = $request->all();
      if (!$data['blok_id'])
        return response()->json(['message' => "Blok Tidak Ditemukan"], 500);

      $progress = $this->progressBlockContract->progress($data);

      return response()->json(['message' => 'Success!', 'code' => 200, 'data' => ['progress' => $progress, 'count' => count($progress) === 0 ?  1 : count($progress) + 1]], 200);
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
        'blok_id' => 'required',
        'date' => 'required',
        'progress' => 'required',
      ]);

      // if fail
      if ($validatedData->fails()) {
        return response()->json(['message' => "Terjadi Kesalahan"], 500);
      }

      $data = $request->all();

      $images = explode(',', $data['images']);

      if (count($images) > 0) {
        for ($i = 0; $i < count($images); $i++) {
          if ($request->hasFile('foto-' . $i)) {
            $data['foto-' . $i] = $request->file('foto-' . $i);
          }
        }
      }

      return $this->progressBlockContract->store($data);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }

  public function destroy($id)
  {
    try {
      $customer = $this->progressBlockContract->delete($id);

      if ($customer == 0) {
        return response()->json(['message' => 'Progres Pembangunan not found!', 'code' => 404], 404);
      }


      return response()->json(['message' => 'Progres Pembangunan has been deleted!', 'code' => 200], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }
  public function exportEXCEL(Request $request)
  {
    try {
      $perumahan_id = $request->all()['perumahan'];
      return Excel::download(new LaporanProgresPembangunanExport($perumahan_id), 'progres-pembangunan.xlsx');
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }
}
