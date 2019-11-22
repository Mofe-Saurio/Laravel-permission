<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(5);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Permission::where('tag','users')->get();
        $products = Permission::where('tag','products')->get();
        $roles = Permission::where('tag','roles')->get();

        $permissions[0]= $users;
        $permissions[1]= $products;
        $permissions[2]= $roles;

        return view('roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $role =  Role::create(['name' => $request->name]);
        $role->givePermissionTo($request->get('permissions'));
        toastr()->success('Rol creado con exito!');
        return redirect()->route('roles.index',$role->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $users = Permission::where('tag','users')->get();
        $products = Permission::where('tag','products')->get();
        $roles = Permission::where('tag','roles')->get();

        $permissions[0]= $users;
        $permissions[1]= $products;
        $permissions[2]= $roles;
        return view('roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        $role->update($request->except(['permissions']));

        $role->permissions()->sync($request->get('permissions'));
        toastr()->success('Rol actualizado con exito!');
        return redirect()->route('roles.index',$role->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        toastr()->error('Rol eliminado con exito!');
        return back();
    }
}
