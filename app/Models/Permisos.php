<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    use HasFactory;
    protected $table='permisos';

    protected $primaryKey='id_permiso';
    
    protected $fillable=['id_permiso','Descripcion'];
    public $timestamps=false;
   
    
   
    
}
