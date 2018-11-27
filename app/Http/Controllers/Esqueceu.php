<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class Esqueceu extends Controller
{
    public function esqueceu_senha(Request $request){
        $email = $request->input('email');

       $usuario = User::where('email', $email)->first();
       if($usuario != null ){
           $token = md5($email).str_random(4);
           return response([
                           'status' => 'sucesso',
                           'token'  => $token,

           ]);


       } }
        public function recuperar_senha(Request $request){
            $senha = $request->input('senha');

            $recuperar = User::where('senha', $senha);

            if($senha != null ){
                return response([
                    'status' => 'sucesso',

                ]);

            }
    }
}

