<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $users = User::with('roles')->get() ;


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
        $user->assignRole($request->roles);

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
        return back()->with('info','Eliminado correctamente');
    }

    public function edit(User $user)
    {
        $roles = Role::get();
        foreach ($roles as $role){
            $rolename[] = $role->name;
        }

        return view('users.edit',compact('user','roles','rolename'));
    }

    public function update(Request $request, User $user)
    {

        //Actualice el usuario
        $user->update($request->all());

        //Acutalice los roles
        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.edit',$user->id)->with('info'.'Usuario actualizado con exito!');
    }
}
