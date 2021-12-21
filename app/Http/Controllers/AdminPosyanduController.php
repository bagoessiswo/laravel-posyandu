<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posyandu;
use App\Models\Kelurahan;

class AdminPosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authUser = session('user');
        $authRole = session('role');

        if($authUser && $authRole->role === 'Super Admin') {
            if ($request->input('search') !== null && $request->input('search') !== "") {
                $posyandu = Posyandu::where('nama_posyandu', 'like', '%' . $request->input('search') . '%')->with('kelurahan.kecamatan')->paginate(5);
            } else {
                $posyandu = Posyandu::with('kelurahan.kecamatan')->paginate(5);
            }
            return view('admin.posyandu', ['posyandu' => $posyandu]);
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
            $kelurahan = Kelurahan::all();
            return view('admin.posyanduDetail', [
                'type' => 'Create',
                'url' => '/admin/posyandu',
                'posyandu' => null,
                'kelurahan' => $kelurahan
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
            $posyandu = new Posyandu;
            $posyandu->nama_posyandu = $request->input('nama_posyandu');
            $posyandu->alamat_posyandu = $request->input('alamat_posyandu');
            $posyandu->id_kelurahan = $request->input('id_kelurahan');
            $posyandu->save();
    
            return redirect()->action([AdminPosyanduController::class, 'index']);
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
            $posyandu = Posyandu::find($id);
            $kelurahan = Kelurahan::all();
            return view('admin.posyanduDetail', [
                'type' => 'Update',
                'url' => '/admin/posyandu/'.$id,                
                'posyandu' => $posyandu,
                'kelurahan' => $kelurahan
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
            $posyandu = Posyandu::find($id);
            $posyandu->nama_posyandu = $request->input('nama_posyandu');
            $posyandu->alamat_posyandu = $request->input('alamat_posyandu');
            $posyandu->id_kelurahan = $request->input('id_kelurahan');
            $posyandu->save();
    
            return redirect()->action([AdminPosyanduController::class, 'index']);
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
            $posyandu = Posyandu::find($id);
            $posyandu->delete();

            return redirect()->action([AdminPosyanduController::class, 'index']);
        } else {
            return redirect()->action([AdminAuthController::class, 'index']);
        }
    }
}
