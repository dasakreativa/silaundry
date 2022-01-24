<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OutletController extends Controller
{
  /**
   * Helper for api user data
   *
   * @return Illuminate\Http\JsonResponse
   */
  public function __userdata(Request $request)
  {
    $search = Str::lower(htmlspecialchars(strip_tags($request->search)));
    $user   = User::where('fullname', 'LIKE', "%{$search}%")->role(['admin', 'outlet']);
    if($user->count() > 0)
    {
      $user = $user->get()->each(function($user) {
        $role = $user->getRoleNames();
        $data['roles'] = $role[0];
        return $data;
      });
      return response()->json([
        'data'    => $user,
        'status'  => 200,
        'error'   => false,
        'success' => true,
        'messae'  => 'Semua pengguna yang memiliki peran "Admin" dan "Penjaga Outlet" behrasil diambil.'
      ], 200, ['Accept' => 'application/json']);
    } else {
      return response()->json([
        'data'    => [],
        'status'  => 200,
        'error'   => true,
        'success' => false,
        'messae'  => 'Data pengguna tidak ada.'
      ], 200, ['Accept' => 'application/json']);
    }
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data['title'] = __('outlet.main.title') . " &mdash; " . config('app.name');
    return view('panel.outlet-index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $data['title'] = __('outlet.create.title') . " &mdash; " . config('app.name');
    return view('panel.outlet-create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
