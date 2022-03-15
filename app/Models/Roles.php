<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table='roles';
    
    protected $fillable=['id','Rol','Permisos'];

    public $timestamps=false;

   //relacion---------------------------------------
public function usuario(){
    return $this->hasOne(User::class,'Rol','id');
}
 
public function permiso(){
    return $this->hasOne(Permisos::class,'id_permiso','id',);
}

    
}
