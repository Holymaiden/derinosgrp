<?php

namespace App\Http\Controllers\Master;

use App\Exports\CustomerExport;
use App\Exports\LaporanPerumahanExport;
use App\Http\Controllers\Controller;
use App\Models\Blok;
use App\Models\Customer;
use App\Services\Contracts\CavlingContract;
use Illuminate\Http\Request;
use App\Services\Contracts\CustomerContract;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
  private $customerContract, $cavlingContract, $title;

  public function __construct(
    CustomerContract $customerContract,
    CavlingContract $cavlingContract
    )
  {
    $this->customerContract = $customerContract;
    $this->cavlingContract = $cavlingContract;
    $this->title = 'Customers';
  }
  /**
   * Redirect to customer-management view.
   *
   */
  public function index()
  {
    $title = $this->title;
    return view('content.customers.index', compact('title'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function paginated(Request $request)
  {
    try {
      $datas = $this->customerContract->paginated($request);
      $data = $datas['data'];
      $view = view('content.customers.data', compact('data'))->with('i', ($request->input('page', 1) -
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
        'name' => 'required',
        'nik' => 'required|min:16|max:16',
        'telepon' => 'required|min:10|max:13',
        'alamat' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'jenis_kelamin' => 'required',
        'email' => 'required|email',
        'pekerjaan' => 'required',
      ]);

      // if fail
      if ($validatedData->fails()) {
        return response()->json(['message' => "Terjadi Kesalahan"], 500);
      }

      $data = $request->all();

      if ($request->hasFile('ktp'))
        $data['ktp'] = $request->file('ktp');

      return $this->customerContract->store($data);
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
      $customer = $this->customerContract->find($id);

      return response()->json(['message' => 'Success!', 'code' => 200, 'data' => $customer], 200); // ['data' => $customer
    } catch (\Exception $e) {
      return response()->json(['message' => "Customer Tidak Ditemukan"], 500);
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
      $customer = $this->customerContract->find($id);
      return response()->json($customer);
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
        'nik' => 'required|min:16|max:16',
        'telepon' => 'required|min:10|max:13',
        'alamat' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'jenis_kelamin' => 'required',
        'email' => 'required|email',
        'pekerjaan' => 'required',
      ]);

      // if fail
      if ($validatedData->fails()) {
        return response()->json(['message' => "Terjadi Kesalahan", 'code' => 500], 500);
      }

      $data = $request->all();

      if ($request->hasFile('ktp'))
        $data['ktp'] = $request->file('ktp');

      return $this->customerContract->update($data, $id);
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
      $customer = $this->customerContract->delete($id);

      if ($customer == 0) {
        return response()->json(['message' => 'Customer not found!', 'code' => 404], 404);
      }


      return response()->json(['message' => 'Customer has been deleted!', 'code' => 200], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }

  
}
