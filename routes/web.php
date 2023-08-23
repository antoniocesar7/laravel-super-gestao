<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos','SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato','ContatoController@contato')->name('site.contato');
Route::post('/contato','ContatoController@salvar')->name('site.contato');

// Route::prefix('/app')->group(function(){
//     Route::get('/clientes', function(){return 'Clientes';});
// });
