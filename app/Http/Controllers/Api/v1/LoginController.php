<?php

namespace App\Http\Controllers\Api\v1;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
  /**
   * Handle a login request to the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  public function login(Request $request) {
    $this->validateLogin($request);

    if(auth()->attempt($request->only('email', 'password'))) {
      $user = auth()->user();
      $user->api_token = Str::random(80);
      $user->save();

      return response()->json([
        'status' => 200,
        'message' => 'Success Login',
        'data' => $user,
        'meta' => [
          '_token' => $user->api_token
        ],
      ], 200);
    }

    return response()->json([
      'status' => 500,
      'message' => 'These credentials do not match our records.',
    ], 500);
  }

  /**
   * Handle a logout request to the application.
   *
   * @return \Illuminate\Http\Response
   */
  public function logout() {
    if(Auth::check()) {
      $user = Auth::user();
      $user->api_token = null;
      $user->save();

      return response()->json([
        'status' => 200,
        'message' => 'Success Logout.',
      ], 200);
    }
  }

  /**
   * Validate the user login request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return void
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  protected function validateLogin(Request $request)
  {
    $request->validate([
      'email' => 'required',
      'password' => 'required',
    ]);
  }
}
