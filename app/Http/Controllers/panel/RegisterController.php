<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  /**
   * For registration
   *
   * @package Silaundry
   * @since 1.0.0
   * @author Dasa Kreativa Studio
   */
  function index()
  {
    return view('panel.register.index');
  }
}
