<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contracts\CustomerContract;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
  private $customerContract, $title;

  public function __construct(CustomerContract $customerContract)
  {
    $this->customerContract = $customerContract;
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
      // Message Validation
      $messages = [
        'nik.required' => 'NIK is required!',
        'nik.unique' => 'NIK already exists!',
        'nik.min' => 'NIK must be at least 16 characters!',
        'nik.max' => 'NIK may not be greater than 16 characters!',
        'name.required' => 'Full Name is required!',
        'email.required' => 'Email is required!',
        'email.unique' => 'Email already exists!',
        'email.email' => 'Email must be a valid email address!',
        'telepon.required' => 'Telepon is required!',
        'telepon.min' => 'Telepon must be at least 10 characters!',
        'telepon.max' => 'Telepon may not be greater than 13 characters!',
        'alamat.required' => 'Alamat is required!',
      ];

      // Validate the value...
      $validatedData = Validator::make($request->all(), [
        'nik' => 'required|unique:customers|min:16|max:16',
        'name' => 'required',
        'email' => 'required|unique:customers|email',
        'telepon' => 'required|min:10|max:13',
        'alamat' => 'required',
      ], $messages);

      // if fail
      if ($validatedData->fails()) {
        return response()->json(['message' => $validatedData->errors()], 500);
      }

      $data = $request->all();

      if ($request->hasFile('ktp'))
        $data['ktp'] = $request->file('ktp');

      if ($request->hasFile('kk'))
        $data['kk'] = $request->file('kk');

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
      // Message Validation
      $messages = [
        'password.required' => 'Password is required!',
        'password.min' => 'Password must be at least 8 characters!',
      ];

      // Validate the value...
      $validatedData = Validator::make($request->all(), [
        'password' => 'required|min:8',
      ], $messages);

      // if fail
      if ($validatedData->fails()) {
        return response()->json(['message' => $validatedData->errors(), 'code' => 500], 500);
      }

      $data = $request->all();

      if ($request->hasFile('ktp'))
        $data['ktp'] = $request->file('ktp');

      if ($request->hasFile('kk'))
        $data['kk'] = $request->file('kk');

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
