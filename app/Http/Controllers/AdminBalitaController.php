<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;
use App\Models\Posyandu;
use App\Models\User;
use App\Models\UserRole;

class AdminBalitaController extends Controller
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

        if($authUser && ($authRole->role === 'Super Admin'|| $authRole->role === 'Admin')) {  
            $balita = Balita::with('posyandu')->get();
            return view('admin.balita', ['balita' => $balita]);
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

        if($authUser && ($authRole->role === 'Super Admin'|| $authRole->role === 'Admin')) {
            $posyandu = Posyandu::all();
            return view('admin.balitaDetail', [
                'type' => 'Create',
                'url' => '/admin/balita',
                'balita' => null,
                'posyandu' => $posyandu
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

        if($authUser && ($authRole->role === 'Super Admin'|| $authRole->role === 'Admin')) { 
            $balita = new Balita;
            $balita->nama_balita = $request->input('nama_balita');
            $balita->nik_orang_tua = $request->input('nik_orang_tua');
            $balita->nama_orang_tua = $request->input('nama_orang_tua');
            $balita->tgl_lahir_balita = $request->input('tgl_lahir_balita');
            $balita->jenis_kelamin_balita = $request->input('jenis_kelamin_balita');
            $balita->status = $request->input('status');
            $balita->id_posyandu = $request->input('id_posyandu');
            $balita->save();

            $user = new User;
            $user->username = $request->input('nik_orang_tua');
            $user->password = '123456';
            $user->save();

            $userRole = new UserRole;
            $userRole->id_user = $user->id;
            $userRole->id_role = 3;
            $userRole->save();
    
            return redirect()->action([AdminBalitaController::class, 'index']);
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

        if($authUser && ($authRole->role === 'Super Admin'|| $authRole->role === 'Admin')) {  
            $balita = Balita::find($id);
            $posyandu = Posyandu::all();
            return view('admin.balitaDetail', [
                'type' => 'Update',
                'url' => '/admin/balita/'.$id,                
                'balita' => $balita,
                'posyandu' => $posyandu
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

        if($authUser && ($authRole->role === 'Super Admin'|| $authRole->role === 'Admin')) {
            $balita = Balita::find($id);
            $balita->nama_balita = $request->input('nama_balita');
            $balita->nik_orang_tua = $request->input('nik_orang_tua');
            $balita->nama_orang_tua = $request->input('nama_orang_tua');
            $balita->tgl_lahir_balita = $request->input('tgl_lahir_balita');
            $balita->jenis_kelamin_balita = $request->input('jenis_kelamin_balita');
            $balita->status = $request->input('status');
            $balita->id_posyandu = $request->input('id_posyandu');
            $balita->save();
    
            return redirect()->action([AdminBalitaController::class, 'index']);
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

        if($authUser && ($authRole->role === 'Super Admin'|| $authRole->role === 'Admin')) {
            $balita = Balita::find($id);
            $balita->delete();

            return redirect()->action([AdminBalitaController::class, 'index']);
        } else {
            return redirect()->action([AdminAuthController::class, 'index']);
        }
    }
}
