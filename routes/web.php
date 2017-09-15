<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
  return response()->json(['message' => 'API teste', 'created by' => 'Felipe Moreira de castro']);;
});

Route::post('/cadastro', 'UsuarioController@store');

Route::post('/login', 'AuthController@authenticate');

Route::get('/pokemons', 'PokemonController@index');

Route::get('/pokemon/{id}', 'PokemonController@show');

Route::post('/pokemon/add', 'PokemonController@store');

Route::put('/pokemon/{id}', 'PokemonController@update');

Route::delete('/pokemon/{id}', 'PokemonController@destroy');


//Route::get('/teste/{id}', 'PokemonController@teste');
 


/*Auth::routes();

Route::get('/home', 'HomeController@index');*/
