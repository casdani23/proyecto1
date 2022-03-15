<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Permisos;
use App\Models\User;

class Rol extends Controller
{
    public function RolPermiso(){
        $roles = Roles::with('permiso')->get();
    
        foreach ($roles as $book) {
            echo $book->permiso;'<br>';
            return $book;
}


}
    public function RelacionUsuarioRol(Request $request){
            
        $roles = Roles::with('usuario')->get();
    
            foreach ($roles as $book) {
                echo $book->usuario;  '<br>';
                return$book;
    }
       }
   public function MostrarR(Request $request){
            
         $roles=Roles::all();
         return $roles;
}
   

    public function Insertar(Request $request){
        $roles=Roles::create([
            'id'=>$request->id,
            'Rol'=>$request->Rol,
            'Permisos'=>$request->Permisos,


        ]);
        return $roles;
    }


    public function EliminarR($id){
        $roles=Roles::find($id);

        $roles->delete();

        return $roles;
    }
    public function ModificarRol(Request $request, $id){

        $roles=Roles::find($id);
        $roles->Rol=$request->Rol;
        $roles->save();

         return $roles;
    }
}
