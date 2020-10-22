<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Rutas hacia personas
Route::get("personas/{id}", "App\Http\Controllers\API\PersonaController@index")->where("id","[0-9]+");

Route::get("personas", "App\Http\Controllers\API\PersonaController@index");

Route::post("personas", "App\Http\Controllers\API\PersonaController@guardar");

Route::put("personas/{id}", "App\Http\Controllers\API\PersonaController@editar");

Route::delete("personas/{id}", "App\Http\Controllers\API\PersonaController@destruir");
//Rutas hacia productos
Route::get("productos/{id}", "App\Http\Controllers\API\ProductoController@index")->where("id","[0-9]+");

Route::get("productos", "App\Http\Controllers\API\ProductoController@index");

Route::post("productos", "App\Http\Controllers\API\ProductoController@guardar");

Route::put("productos/{id}", "App\Http\Controllers\API\ProductoController@editar");

Route::delete("productos/{id}", "App\Http\Controllers\API\ProductoController@destruir");
//Rutas hacia comentarios
Route::get("comentarios/{id}", "App\Http\Controllers\API\ComentarioController@index")->where("id","[0-9]+");

Route::get("comentarios", "App\Http\Controllers\API\ComentarioController@index");

Route::get("personas/{id}/comentarios", [App\Http\Controllers\API\ComentarioController::class, 'commporpersona']);

Route::post("comentarios", "App\Http\Controllers\API\ComentarioController@guardar");

Route::put("comentarios/{id}", "App\Http\Controllers\API\ComentarioController@editar");

Route::delete("comentarios/{id}", "App\Http\Controllers\API\ComentarioController@destruir");
