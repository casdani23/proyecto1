<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permisos;

class Permiso extends Controller
{

    

    public function getGeneral(Request $request){
        return User::Select('users.name','users.email','roles.Rol','permisos.Descripcion')
        ->join('roles','roles.id','=','users.Rol')
        ->join('permisos','permisos.id_permiso','=','roles.Permisos')
        ->get();

      
      


    }

    public function Insertar(Request $request){

        $permiso = Permisos::create([
            'id_permiso'=>$request->id_permiso,
            'Descripcion'=>$request->Descripcion,

        ]);
        return $permiso;

    }

    public function EliminarPermiso($id){
        $permiso=Permisos::find($id);

        $permiso->delete();
        return $permiso;
    }

    public function Modificarpermiso(Request $request, $id){

         $permiso=Permisos::find($id);

         $permiso->Descripcion=$request->Descripcion;
         $permiso->save(); 

         return $permiso;
    }

    public function MostrarPermiso(Request $request){
        $permiso=Permisos::all();
        return $permiso;
    }

    
}
