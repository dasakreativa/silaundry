<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Homepage Administrator
   * Halaman bernada untukmenampilkan data administrator
   *
   * @package Silaundry
   * @since 1.0.0
   * @author Dasa Kreativa Studio
   */
  function index()
  {
    $data['title'] = 'Halaman Administrator &mdash; ' . config('app.name');
    return view('panel.home', $data);
  }

  /**
   * About Page
   * Menampilkan halaman tentang software ini.
   *
   * @package Silaundry
   * @since 1.0.0
   * @author Dasa Kreativa Studio
   */
  function about()
  {
    $data['title'] = 'Tentang Sistem &mdash; ' . config('app.name');
    return view('panel.about', $data);
  }
}
