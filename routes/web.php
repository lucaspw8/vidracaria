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
//Rotas
Route::get('/', function () {
    return view('home');
})->name("home");

Route::get('/material', function () {
    return view('materialHome');
})->name("material");

//Rotas de deletar
Route::get('/cliente/delete/{id}','ClienteController@delete')->name("cliente.delete");
Route::get('/espessura/delete/{id}','EspessuraController@delete')->name("espessura.delete");
Route::get('/tamanho/delete/{id}','TamanhoController@delete')->name("tamanho.delete");
Route::get('/acessorio/delete/{id}','AcessorioController@delete')->name("acessorio.delete");
Route::get('/ferragem/delete/{id}','FerragemController@delete')->name("ferragem.delete");
Route::get('/vidro/delete/{id}','VidroController@delete')->name("vidro.delete");
Route::get('/kitbox/delete/{id}','KitBoxController@delete')->name("kitbox.delete");
Route::get('/outros/delete/{id}','OutrosController@delete')->name("outros.delete");

//Rota personalizada criada para a pesquisa por nome
Route::post('acessorio/buscar','AcessorioController@pesquisar')->name("pesquisarAcessorio");
Route::post('cliente/buscar','ClienteController@pesquisar')->name("pesquisarCli");
Route::post('ferragem/buscar','FerragemController@pesquisar')->name("pesquisarFerra");
Route::post('Vidro/buscar','VidroController@pesquisar')->name("pesquisarVidro");
Route::post('kitbox/buscar','KitBoxController@pesquisar')->name("pesquisarkitbox");
Route::post('outros/buscar','OutrosController@pesquisar')->name("pesquisarOutros");




//Recursos de rotas dos modelos
Route::resource('cliente','ClienteController');
Route::resource('espessura','EspessuraController');
Route::resource('acessorio','AcessorioController');
Route::resource('ferragem','FerragemController');
Route::resource('vidro','VidroController');
Route::resource('tamanho','TamanhoController');
Route::resource('kitbox','KitBoxController');
Route::resource('outros','OutrosController');

