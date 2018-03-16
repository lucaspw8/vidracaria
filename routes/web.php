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


//Rota personalizada criada para a pesquisa de cliente por nome
Route::post('cliente/buscar','ClienteController@pesquisar')->name("pesquisarCli");

//Recursos de rotas dos modelos
Route::resource('cliente','ClienteController');
Route::resource('espessura','EspessuraController');
Route::resource('acessorio','AcessorioController');
Route::resource('ferragem','FerragemController');
Route::resource('tamanho','TamanhoController');

