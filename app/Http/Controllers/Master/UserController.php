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
    $this->title = 'User';
  }
  /**
   * Redirect to user-management view.
   *
   */
  public function index()
  {
    $title = $this->title;
    return view('content.master.user.index', compact('title'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function paginated(Request $request)
  {
    try {
      return $this->userContract->paginated($request);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
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
      return response()->json($users);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
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
        return response()->json(['message' => $validatedData->errors()], 500);
      }

      $users = $this->userContract->update($request->all(), $id);
      return response()->json($users);
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
      return response()->json($users);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }
}
