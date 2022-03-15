<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Permiso;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Rol;
use App\Http\Controllers\usuario;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//------------------------------------PERMISOS-------------------------------------//
//Mostrar//
Route::get('/MostrarPermiso',[Permiso::class,'MostrarPermiso']);
//Eliminar Permiso//
Route::post('/EliminarPermiso/{id}',[Permiso::class,'EliminarPermiso']);

//Insertar Permiso//
Route::post('/InsertarP',[Permiso::class,'Insertar']);

//modificar Permiso//
Route::post('/EditarPermiso/{id}',[Permiso::class,'Modificarpermiso']);

//-------------------------------PERMISOS--------------------------------------------//

//-------------------------------Roles--------------------------------------------//
//Insertar Rol//
Route::post('/InsertarR',[Rol::class,'Insertar']);
//Eliminar Rol//
Route::post('/EliminarR/{id}',[Rol::class,'EliminarR']);
//Modificar rol//
Route::post('/ModificarR/{id}',[Rol::class,'ModificarRol']);
//Mostrar//
Route::get('/MostrarR',[Rol::class,'MostrarR']);


//-------------------------------Usuarios--------------------------------------------//
//Insertar Usuario//
Route::post('/InsertarU',[usuario::class,'InsertarU']);
//Eliminar Usuario//
Route::post('/EliminarU/{id}',[usuario::class,'EliminarU']);
//Modificar usuario
Route::post('/ModificarU/{id}',[usuario::class,'ModificarU']);
//Mostrar Usuario
Route::get('/MostrarU',[usuario::class,'start']);


//--------------------------------Relaciones-----------------------------------------------//
Route::get('/MostrarUusarioRol',[Rol::class,'RelacionUsuarioRol']);

Route::get('/Rolpermis',[Rol::class,'RolPermiso']);



//consumir API FAKE PRUEBA//

Route::get('getApi',function()
{
                 $response=Http::get('https://io.adafruit.com/');
                 $posts = json_decode($response->body());
                 foreach($posts as $posts){
                          
                    echo $posts->body;
                    die();
                 }
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');




Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('user','App\Http\Controllers\UserController@getAuthenticatedUser');

});

