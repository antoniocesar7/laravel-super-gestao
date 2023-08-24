<?php

use App\Http\Middleware\LogAcessoMiddleware;
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

/*Route::get('/','PrincipalController@principal')
    ->name('site.index')
    ->middleware(LogAcessoMiddleware::class);*/
    //Ou podemos escrever conforme abaixo que tem um sentido lógico mais claro:
        //rota raiz
Route::middleware(LogAcessoMiddleware::class)
->get('/','PrincipalController@principal')   
->name('site.index');

        //rota sobre nós
Route::get('/sobre-nos','SobreNosController@sobreNos')->name('site.sobrenos');

        //rota contato
Route::middleware(LogAcessoMiddleware::class)
    ->get('/contato','ContatoController@contato')
    ->name('site.contato');
        //post contato
Route::post('/contato','ContatoController@salvar')->name('site.contato');

// Route::prefix('/app')->group(function(){
//     Route::get('/clientes', function(){return 'Clientes';});
// });
