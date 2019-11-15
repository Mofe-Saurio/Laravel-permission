<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        return view('home');
    }

    public function usersList(){
        return dataTables()->of(User::latest()->get())
            ->addColumn('action', function($data){

                //Boton para editar
                $button = '<button class="edit-modal-button btn btn-warning" data-toggle="modal" data-target="#editar" style="margin-left:30%"
                                data-id="'.$data->id.'" data-nombre="'.$data->name.'" data-email="'.$data->email.'"><i class="fas fa-low-vision"></i></button>';
                $button .= '&nbsp;&nbsp;';
//                //Boton para cambiar la password
//                $button .= '<button class="changepassword-modal-button btn btn-sm" data-toggle="modal" data-target="#cambiarpass"
//                                data-id="'.$data->id.'" data-nombre="'.$data->name.'" data-apellido="'.$data->lastname.'"><i class="fas fa-key"></i></button>';
//                $button .= '&nbsp;&nbsp;';
//                //Boton para eliminar
//                $button .= '<button class="delete-modal-button btn btn-sm" data-toggle="modal" data-target="#borrar"
//                                data-id="'.$data->id.'" data-nombre="'.$data->name.'" data-apellido="'.$data->lastname.'"><i class="fas fa-trash"></i></button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
