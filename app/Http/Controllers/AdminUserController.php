<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;

class AdminUserController extends Controller
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
            $user = User::with('role')->get();
            return view('admin.user', ['user' => $user]);
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
            $role = Role::all();
            return view('admin.userDetail', [
                'type' => 'Create',
                'url' => '/admin/user',
                'user' => null,
                'role' => $role
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
            $user = new User;
            $user->username = $request->input('username');
            $user->password = $request->input('password');
            $user->save();

            $userRole = new UserRole;
            $userRole->id_user = $user->id;
            $userRole->id_role = $request->input('id_role');
            $userRole->save();
    
            return redirect()->action([AdminUserController::class, 'index']);
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
            $user = User::find($id);
            $role = Role::all();
            return view('admin.userDetail', [
                'type' => 'Update',
                'url' => '/admin/user/'.$id,
                'user' => $user,
                'role' => $role
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
            $user = User::find($id);
            $user->username = $request->input('username');
            $user->password = $request->input('password');
            $user->save();

            $userRole = UserRole::where('id_user', $id)->first();
            $userRole->id_user = $user->id;
            $userRole->id_role = $request->input('id_role');
            $userRole->save();
    
            return redirect()->action([AdminUserController::class, 'index']);
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
            $userRole = UserRole::where('id_user', $id)->first();
            $userRole->delete();
            $user = User::find($id);
            $user->delete();

            return redirect()->action([AdminUserController::class, 'index']);
        } else {
            return redirect()->action([AdminAuthController::class, 'index']);
        }
    }
}
