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

Route::get('/cliente/delete/{id}','ClienteController@delete')->name("cliente.delete");

Route::get('/teste', function () {
   $teste = App\Modelos\Cliente::find(1);
   dd($teste->endereco);
  
    return 'welcome';
});
//Rota personalizada criada para a pesquisa de cliente por nome
Route::get('cliente/buscar/{nomeCli}','ClienteController@pesquisar')->name("pesquisarCli");

//Recursos de rotas dos modelos
Route::resource('cliente','ClienteController');
Route::resource('espessura','EspessuraController');
Route::resource('acessorio','AcessorioController');
Route::resource('ferragem','FerragemController');


