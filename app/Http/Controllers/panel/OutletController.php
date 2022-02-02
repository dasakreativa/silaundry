<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\User;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OutletController extends Controller
{
  /**
   * Data outlet
   *
   * @return json
   */
  public function __data(Outlet $outlet)
  {
    return Datatables::of($outlet->query())
    ->addColumn('owner_name', function($outlet) {
      return $outlet->getUser()->first()->fullname;
    })->make(true);
  }

  /**
   * Helper for api user data
   *
   * @return Illuminate\Http\JsonResponse
   */
  public function __userdata(Request $request)
  {
    $search = Str::lower(htmlspecialchars(strip_tags($request->search)));
    $type   = Str::lower(htmlspecialchars(strip_tags($request->type)));

    $user   = User::where($type, 'LIKE', "%{$search}%");

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
        'message' => 'Semua pengguna yang memiliki peran "Admin" dan "Penjaga Outlet" behrasil diambil.'
      ], 200, ['Accept' => 'application/json']);
    } else {
      return response()->json([
        'data'    => [],
        'status'  => 200,
        'error'   => true,
        'success' => false,
        'message' => 'Data pengguna tidak ada.'
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
  public function store(Request $request, Outlet $outlet)
  {
    try {
      $input = $request->except(['ipinfo', '_token', 'keep']);
      $data  = $outlet->create($input);

      return response()->json([
        'debug'     => $data,
        'status'    => 200,
        'error'     => false,
        'success'   => true,
        'title'     => 'Data berhasil disimpan!',
        'redirect'  => (bool) $request->keep == true ? null : route('outlet.index'),
        'message'   => 'Data berhasil disimpan'
      ], 200, ['Accept' => 'application/json']);
    } catch (\Exception $e) {
      return response()->json([
        'debug'   => $e->getMessage(),
        'status'  => 400,
        'error'   => true,
        'success' => false,
        'title'   => 'Kesalahan!',
        'message' => 'Kesalahan server, karena ' . $e->getMessage(),
      ], 400, ['Accept' => 'application/json']);
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
