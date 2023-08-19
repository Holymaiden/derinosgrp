<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Services\Contracts\UserContract;
use Illuminate\Http\Request;

class CavlingController extends Controller
{
    private $userContract, $title;

  public function __construct()
  {
    // $this->userContract = $userContract;
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

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
//   public function paginated(Request $request)
//   {
//     try {
//       $datas = $this->userContract->paginated($request);
//       $data = $datas['data'];
//       $view = view('content.users.data', compact('data'))->with('i', ($request->input('page', 1) -
//         1) * $request->input('length'))->render();
//       return response()->json(['html' => $view, 'total_data' => $datas['total_data'], 'total_page' => $datas['total_page'], 'message' => 'Success!'], 200);
//     } catch (\Exception $e) {
//       return response()->json(['message' => $e->getMessage(), 'line' => $e->getLine()], 500);
//     }
//   }
}
