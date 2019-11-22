<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $users = User::with('roles')->paginate(5) ;



        return view('users.index', compact('users'));
    }

    public function create(Role $role)
    {
        $roles = Role::get();
        return view('users.create',compact('roles'));
    }

    public function store(Request $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password')
        ]);
        if ($request->roles != ''){
            $user->assignRole($request->roles);
        }
        else{
            $user->assignRole('Guest');
        }


        toastr()->success('Usuario creado con exito!');
//        return redirect()->route('products.edit',$product->id);
        return redirect()->route('users.index');
    }



    public function show(User $user){
        return view('users.show',compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        toastr()->error('Usuario eliminado con exito!');
        return back();
    }

    public function edit(User $user)
    {
        $roles = Role::get();


        return view('users.edit',compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {

        //Actualice el usuario
        $user->update($request->all());

        //Acutalice los roles
        if ($request->get('roles') != ''){
            $user->roles()->sync($request->get('roles'));
        }
        else{
            $user->assignRole('Guest');
        }

        toastr()->success('Usuario actualizado con exito!');
        return redirect()->route('users.index');
    }
}
