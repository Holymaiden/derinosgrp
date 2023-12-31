<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contracts\UserContract;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  private $userContract, $title;

  public function __construct(UserContract $userContract)
  {
    $this->userContract = $userContract;
    $this->title = 'Users';
  }
  /**
   * Redirect to user-management view.
   *
   */
  public function index()
  {
    $title = $this->title;
    return view('content.users.index', compact('title'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function paginated(Request $request)
  {
    try {
      $datas = $this->userContract->paginated($request);
      $data = $datas['data'];
      $view = view('content.users.data', compact('data'))->with('i', ($request->input('page', 1) -
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
        'name.required' => 'Name is required!',
        'email.required' => 'Email is required!',
        'email.email' => 'Email is not valid!',
        'email.unique' => 'Email is already exist!',
        'password.required' => 'Password is required!',
        'password.min' => 'Password must be at least 8 characters!',
      ];

      // Validate the value...
      $validatedData = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
      ], $messages);

      // if fail
      if ($validatedData->fails()) {
        return response()->json(['message' => $validatedData->errors()], 500);
      }

      return $this->userContract->store($request->all());
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
      $users = $this->userContract->find($id);

      return response()->json(['message' => 'Success!', 'code' => 200, 'data' => $users], 200); // ['data' => $users
    } catch (\Exception $e) {
      return response()->json(['message' => "User Tidak Ditemukan"], 500);
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
      $users = $this->userContract->find($id);
      return response()->json($users);
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

      return $this->userContract->update($request->all(), $id);
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
      $users = $this->userContract->delete($id);

      if ($users == 0) {
        return response()->json(['message' => 'User not found!', 'code' => 404], 404);
      }


      return response()->json(['message' => 'User has been deleted!', 'code' => 200], 200);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }
}
