<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;




class usuario extends Controller
{


    public function start(){

        $usuario=User::all();

        foreach($usuario as $usuario){
            echo $usuario->User->name;
        }
        return $usuario;

}
    

    public function InsertarU(Request $request){
        $usuario=User::create([
            'id'=>$request->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'email_verified_at'=>$request->email_verified_at,
            'password'=>$request->password,
            'remember'=>$request->remember,
            'Rol'=>$request->Rol,





        ]);
        return $usuario;
    }


    public function EliminarU($id){
        $usuario=User::find($id);

        $usuario->delete();

        return $usuario;
    }
    public function ModificarU(Request $request, $id){

        $usuario=User::find($id);
        $usuario->name=$request->name;
        $usuario->save();

         return $usuario;
    }

}
