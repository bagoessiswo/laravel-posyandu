<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class AdminRoleController extends Controller
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
                $role = Role::where('role', 'like', '%' . $request->input('search') . '%')->paginate(5);
            } else { 
                $role = Role::paginate(5);
            }
            return view('admin.role', ['role' => $role]);
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
            return view('admin.roleDetail', [
                'type' => 'Create',
                'url' => '/admin/role',
                'role' => null
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
            $role = new Role;
            $role->role = $request->input('role');
            $role->save();
    
            return redirect()->action([AdminRoleController::class, 'index']);
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
            $role = Role::find($id);
            return view('admin.roleDetail', [
                'type' => 'Update',
                'url' => '/admin/role/'.$id,                
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
            $role = Role::find($id);
            $role->role = $request->input('role');
            $role->save();
    
            return redirect()->action([AdminRoleController::class, 'index']);
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
            $role = Role::find($id);
            $role->delete();

            return redirect()->action([AdminRoleController::class, 'index']);
        } else {
            return redirect()->action([AdminAuthController::class, 'index']);
        }
    }
}
