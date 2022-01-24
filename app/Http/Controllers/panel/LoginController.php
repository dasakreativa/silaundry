<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\LoginRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  /**
   * Login System
   * To showing the login page
   *
   * @package Silaundry
   * @since 1.0.0
   * @author Dasa Kreativa Studio
   */
  function index()
  {
    $data['title'] = 'Masuk ke Sistem &mdash; ' . config('app.name');
    return view('panel.login.index', $data);
  }

  /**
   * Processing Data Login
   * To processing request the login data
   *
   * @package Silaundry
   * @since 1.0.0
   * @author Dasa Kreativa Studio
   */
  function process(Request $request, LoginRecord $record)
  {
    # Initialize The Variables
    $username = htmlspecialchars(strip_tags($request->username));
    $password = htmlspecialchars(strip_tags($request->password));
    $remember = htmlspecialchars(strip_tags($request->remember));

    $check    = Auth::attempt(['username' => $username, 'password' => $password], $remember);

    if($check)
    {
      event(new \App\Events\UserLoginRecord($record, auth()->user(), $request));

      return response()->json([
        'debug'   => $request->all(),
        'return'  => route('main'),
        'title'   => __('login.title.success'),
        'message' => __('login.message.success'),
        'error'   => false,
        'success' => true,
      ], 200);
    } else {
      return response()->json([
        'debug'   => $request->all(),
        'return'  => route('main'),
        'title'   => __('login.title.failure'),
        'message' => __('login.message.failure'),
        'error'   => true,
        'success' => false,
      ], 401);
    }
  }
}
