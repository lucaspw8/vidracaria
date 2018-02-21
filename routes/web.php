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
    return view('welcome');
});

Route::get('/cliente', function () {
    return view('clienteTeste');
});

Route::get('/teste', function () {
   $teste = DB::table('clientes')->get();
   dd($teste);
  
    return 'welcome';
});
//Rota personalizada criada para a pesquisa de cliente por nome
Route::get('cliente/{nomeCli}','ClienteController@pesquisar')->name("pesquisarCli");

//Recursos de rotas dos modelos
Route::resource('cliente','ClienteController');
Route::resource('espessura','EspessuraController');
Route::resource('acessorio','AcessorioController');


