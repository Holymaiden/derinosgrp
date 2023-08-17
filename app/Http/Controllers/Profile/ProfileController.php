<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        $title = 'Profile';
        return view('content.profile.index', [
            'user' => $request->user(),
            'title' => $title,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function updateEmail(Request $request)
    {
        // cek password
        if (!Hash::check($request->confirmemailpassword, $request->user()->password)) {
            return response()->json(['message' => ['Password is not valid!']], 500);
        }

        $messages = [
            'email.required' => 'Email is required!',
            'email.email' => 'Email is not valid!',
            'email.unique' => 'Email already exists!',
            'confirmemailpassword.required' => 'Password is required!',
            'confirmemailpassword.min' => 'Password must be at least 8 characters!',
        ];

        $validatedData = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'confirmemailpassword' => 'required|string|min:8',
        ], $messages);

        if ($validatedData->fails()) {
            return response()->json(['message' => $validatedData->errors()], 500);
        }

        $request->user()->forceFill([
            'email' => $request->email,
            'email_verified_at' => null,
        ])->save();

        return response()->json(['message' => 'Email updated successfully.', 'code' => 200]);
    }

    /**
     * Delete the user's account.
     */
    public function updatePassword(Request $request)
    {
        // cek password
        if (!Hash::check($request->currentpassword, $request->user()->password)) {
            return response()->json(['message' => ['Password is not valid!']], 500);
        }

        $messages = [
            'password.required' => 'Password is required!',
            'password.min' => 'Password must be at least 8 characters!',
        ];

        $validatedData = Validator::make($request->all(), [
            'password' => 'required|string|min:8'
        ], $messages);

        if ($validatedData->fails()) {
            return response()->json(['message' => $validatedData->errors()], 500);
        }

        $request->user()->forceFill([
            'password' => Hash::make($request->password),
        ])->save();

        return response()->json(['message' => 'Password updated successfully.', 'code' => 200]);
    }
}
