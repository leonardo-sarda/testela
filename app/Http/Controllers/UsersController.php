<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    //

    public function index()
    {
        // $users = UsersModel::all();
        // return response()->json($users);

         $users = DB::select('SELECT * FROM usuario');
         return response()->json($users);
    }


    public function store(StoreUserRequest $request)
    {

        $validarDados = $request->validated();

        $user = UsersModel::Create([
            'nome'=>$validarDados['nome'],
            'login' => $validarDados['login'],
            'senha' => bcrypt($validarDados['senha']),
            'ativo'=> $validarDados['ativo']
        ]);

        return response()->json(['message' =>'Usario feito', 'user'],201);
    }
}
