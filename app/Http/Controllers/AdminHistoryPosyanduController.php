<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryPosyandu;
use App\Models\Balita;
use App\Models\User;

class AdminHistoryPosyanduController extends Controller
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

        if($authUser && ($authRole->role === 'Super Admin'|| $authRole->role === 'Admin')) {
            if ($request->input('search') !== null && $request->input('search') !== "") {
                $balita = Balita::where('nama_balita', 'like', '%' . $request->input('search') . '%')->first();
                if ($balita) {
                    $history = HistoryPosyandu::where('id_balita', $balita->id)->with('balita.posyandu')->paginate(5);
                } else {
                    $history = HistoryPosyandu::where('id_balita', null)->with('balita.posyandu')->paginate(5);
                }
            } else {
                $history = HistoryPosyandu::with('balita.posyandu')->paginate(5);
            }
            return view('admin.historyPosyandu', ['history' => $history]);
        } else {
            return  redirect()->action([AdminAuthController::class, 'index']);
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
            $balita = Balita::all();
            return view('admin.historyPosyanduDetail', [
                'type' => 'Create',
                'url' => '/admin/history-posyandu',
                'history' => null,
                'balita' => $balita
            ]);
        } else {
            return  redirect()->action([AdminAuthController::class, 'index']);
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
            $history = new HistoryPosyandu;
            $history->id_balita = $request->input('id_balita');
            $history->tgl_posyandu = $request->input('tgl_posyandu');
            $history->berat_badan_balita = $request->input('berat_badan_balita');
            $history->tinggi_badan = $request->input('tinggi_badan');
            $history->save();

            $balita = Balita::find($request->input('id_balita'));
            $balita->status = 1;
            $balita->save();
            
            if ($history) {
                $user = User::where('username', $balita->nik_orang_tua)->first();
                $user->id_history_posyandu = $history->id;
                $user->save();
            }
           
    
            return redirect()->action([AdminHistoryPosyanduController::class, 'index']);
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
            $history = HistoryPosyandu::find($id);
            $balita = Balita::all();
            return view('admin.historyPosyanduDetail', [
                'type' => 'Update',
                'url' => '/admin/history-posyandu/'.$id,                
                'history' => $history,
                'balita' => $balita
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
            $history = HistoryPosyandu::find($id);
            $history->id_balita = $request->input('id_balita');
            $history->tgl_posyandu = $request->input('tgl_posyandu');
            $history->berat_badan_balita = $request->input('berat_badan_balita');
            $history->tinggi_badan = $request->input('tinggi_badan');
            $history->save();
    
            return redirect()->action([AdminHistoryPosyanduController::class, 'index']);
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
            $history = HistoryPosyandu::find($id);
            $history->delete();

            return redirect()->action([AdminHistoryPosyanduController::class, 'index']);
        } else {
            return redirect()->action([AdminAuthController::class, 'index']);
        }
    }
}
