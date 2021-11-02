<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelurahan;
use App\Models\Kecamatan;

class AdminKelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authUser = session('user');
        $authRole = session('role');

        if($authUser && $authRole->role === 'Super Admin') {  
            $kelurahan = Kelurahan::with('kecamatan')->get();
            return view('admin.kelurahan', ['kelurahan' => $kelurahan]);
        } else {
            return redirect()->action([AdminAuthController::class, 'index']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authUser = session('user');
        $authRole = session('role');

        if($authUser && $authRole->role === 'Super Admin') {  
            $kecamatan = Kecamatan::all();
            return view('admin.kelurahanDetail', [
                'type' => 'Create',
                'url' => '/admin/kelurahan',
                'kelurahan' => null,
                'kecamatan' => $kecamatan
            ]);
        } else {
            return redirect()->action([AdminAuthController::class, 'index']);
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
        $authUser = session('user');
        $authRole = session('role');

        if($authUser && $authRole->role === 'Super Admin') {  
            $kelurahan = new Kelurahan;
            $kelurahan->kelurahan = $request->input('kelurahan');
            $kelurahan->id_kecamatan = $request->input('id_kecamatan');
            $kelurahan->save();
    
            return redirect()->action([AdminKelurahanController::class, 'index']);
        } else {
            return redirect()->action([AdminAuthController::class, 'index']);
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
        $authUser = session('user');
        $authRole = session('role');

        if($authUser && $authRole->role === 'Super Admin') {  
            $kelurahan = Kelurahan::find($id);
            $kecamatan = Kecamatan::all();
            return view('admin.kelurahanDetail', [
                'type' => 'Update',
                'url' => '/admin/kelurahan/'.$id,
                'kelurahan' => $kelurahan,
                'kecamatan' => $kecamatan
            ]);
        } else {
            return redirect()->action([AdminAuthController::class, 'index']);
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
        $authUser = session('user');
        $authRole = session('role');

        if($authUser && $authRole->role === 'Super Admin') {  
            $kelurahan = Kelurahan::find($id);
            $kelurahan->kelurahan = $request->input('kelurahan');
            $kelurahan->id_kecamatan = $request->input('id_kecamatan');
            $kelurahan->save();
    
            return redirect()->action([AdminKelurahanController::class, 'index']);
        } else {
            return redirect()->action([AdminAuthController::class, 'index']);
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
        $authUser = session('user');
        $authRole = session('role');

        if($authUser && $authRole->role === 'Super Admin') {  
            $kelurahan = Kelurahan::find($id);
            $kelurahan->delete();

            return redirect()->action([AdminKelurahanController::class, 'index']);
        } else {
            return redirect()->action([AdminAuthController::class, 'index']);
        }
    }
}
