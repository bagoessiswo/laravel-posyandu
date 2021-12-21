<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\HistoryPosyandu;
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
    public function index(Request $request)
    {
        $authUser = session('user');
        $authRole = session('role');

        if($authUser && ($authRole->role === 'Super Admin'|| $authRole->role === 'Admin')) {
            if ($request->input('search') !== null && $request->input('search') !== "") {
                $balita = Balita::where('nama_balita', 'like', '%' . $request->input('search') . '%')->with('posyandu')->paginate(5);
            } else {
                $balita = Balita::with('posyandu')->paginate(5);
            }
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

        if ($authUser && ($authRole->role === 'Super Admin'|| $authRole->role === 'Admin')) {

                // handle file upload
            if ($request->hasFile('image')) {
                // get filename with extension
                $fileImageExt = $request->file('image')->getClientOriginalName();
                // get just filename
                $filename = pathinfo($fileImageExt, PATHINFO_FILENAME);
                // get just ext
                $extension = $request->file('image')->getClientOriginalExtension();
                // filename to store
                $fileImage = $filename.'_'.time().'.'.$extension;
                // upload image
                $path = $request->file('image')->storeAs('balita', $fileImage, 'public_uploads');
            } else {
                $fileImage = 'noimage.jpg';
            }

            $balita = new Balita;
            $balita->nama_balita = $request->input('nama_balita');
            $balita->nik_orang_tua = $request->input('nik_orang_tua');
            $balita->nama_orang_tua = $request->input('nama_orang_tua');
            $balita->tgl_lahir_balita = $request->input('tgl_lahir_balita');
            $balita->jenis_kelamin_balita = $request->input('jenis_kelamin_balita');
            $balita->status = $request->input('status');
            $balita->id_posyandu = $request->input('id_posyandu');
            $balita->image = $fileImage;
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

            // handle file upload
            if ($request->hasFile('image')) {
                // get filename with extension
                $fileImageExt = $request->file('image')->getClientOriginalName();
                // get just filename
                $filename = pathinfo($fileImageExt, PATHINFO_FILENAME);
                // get just ext
                $extension = $request->file('image')->getClientOriginalExtension();
                // filename to store
                $fileImage = $filename.'_'.time().'.'.$extension;
                // upload image
                $path = $request->file('image')->storeAs('balita', $fileImage, 'public_uploads');
                // delete file
                if ($path && $balita->image !== 'noimage.jpg' && $balita->image !== null && $balita->image !== '') {
                    Storage::disk('public_uploads')->delete('balita/'.$balita->image);
                }
            } else {
                if ($balita->image === null || $balita->image === '') {
                    $fileImage = 'noimage.jpg';
                } else {
                    $fileImage = $balita->image;
                }
            }

            $balita->nama_balita = $request->input('nama_balita');
            $balita->nik_orang_tua = $request->input('nik_orang_tua');
            $balita->nama_orang_tua = $request->input('nama_orang_tua');
            $balita->tgl_lahir_balita = $request->input('tgl_lahir_balita');
            $balita->jenis_kelamin_balita = $request->input('jenis_kelamin_balita');
            $balita->status = $request->input('status');
            $balita->id_posyandu = $request->input('id_posyandu');
            $balita->image = $fileImage;
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

            $history = HistoryPosyandu::where('id_balita', $id)->first();
            if ($history) {
                $history->delete();
            }

            return redirect()->action([AdminBalitaController::class, 'index']);
        } else {
            return redirect()->action([AdminAuthController::class, 'index']);
        }
    }
}
