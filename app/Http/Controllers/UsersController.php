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
//        dd(User::with('roles')->get());


        return view('home');
    }

    public function usersList(){
        $user = Auth::user();
//        $model = User::with('roles')->get();

        if ($user->hasPermissionTo('crud')){
            return dataTables()->of(User::with('roles')->get())
//            return dataTables()->of(User::with('roles')->select('users.*'))
//            return DataTables::eloquent($model)
                ->addColumn('action', function($data){

                    //Boton para editar
                    $button = '<button class="edit-modal-button btn btn-warning" data-toggle="modal" data-target="#editar" style="margin-left:30%"
                                data-id="'.$data->id.'" data-nombre="'.$data->name.'" data-email="'.$data->email.'" data-rol="'.$data->roles[0]['name'].'"><i class="fas fa-low-vision"></i></button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);

        }
        elseif ($user->hasPermissionTo('read')){
            return dataTables()->of(User::with('roles')->get())
                ->addColumn('action', function($data){

                    //Boton para editar
                    $button = '<button disabled class="edit-modal-button btn btn-warning" data-toggle="modal" data-target="#editar" style="margin-left:30%"
                                data-id="'.$data->id.'" data-nombre="'.$data->name.'" data-email="'.$data->email.'"><i class="fas fa-low-vision"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }

    public function crearUsuario(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'rol' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }else{
            $user = User::Create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make('password')

                ]
            );
            $user->assignRole($request->input('rol'));

            return response()->json(['success'=>'Usuario creado con exito']);
        }

    }

    public function changeRol(Request $request){
        $user = User::find($request->id);
        $user->syncRoles($request->input('rol'));
        return response()->json(['success'=>'Rol cambiado']);

    }
}
