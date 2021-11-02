<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;

class AdminKecamatanController extends Controller
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
            $kecamatan = Kecamatan::all();
            return view('admin.kecamatan', ['kecamatan' => $kecamatan]);
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
            return view('admin.kecamatanDetail', [
                'type' => 'Create',
                'url' => '/admin/kecamatan',
                'kecamatan' => null
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
            $kecamatan = new Kecamatan;
            $kecamatan->kecamatan = $request->input('kecamatan');
            $kecamatan->save();
    
            return redirect()->action([AdminKecamatanController::class, 'index']);
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
            $kecamatan = Kecamatan::find($id);
            return view('admin.kecamatanDetail', [
                'type' => 'Update',
                'url' => '/admin/kecamatan/'.$id,
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
            $kecamatan = Kecamatan::find($id);
            $kecamatan->kecamatan = $request->input('kecamatan');
            $kecamatan->save();
    
            return redirect()->action([AdminKecamatanController::class, 'index']);
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
            $kecamatan = Kecamatan::find($id);
            $kecamatan->delete();

            return redirect()->action([AdminKecamatanController::class, 'index']);
        } else {
            return redirect()->action([AdminAuthController::class, 'index']);
        }
    }
}
