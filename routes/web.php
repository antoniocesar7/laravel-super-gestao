<?php

//use App\Http\Middleware\LogAcessoMiddleware;
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
Route::get('/','PrincipalController@principal')->name('site.index')->middleware('log.acesso');

        //rota sobre nós
Route::get('/sobre-nos','SobreNosController@sobreNos')->name('site.sobrenos');

        //rota contato
Route::get('/contato','ContatoController@contato')->name('site.contato');
        //post contato
Route::post('/contato','ContatoController@salvar')->name('site.contato');

Route::get('/login', function () {
    return 'Login';
})->name('site.login');

//Grupo de rotas app
Route::prefix('/app')->group(function(){
        //rota cliente
    Route::middleware('autenticacao')
                ->get('/clientes', function(){return 'Clientes';})->name('app.clientes');

        //rota fornecedores
    Route::middleware('autenticacao')
                ->get("/fornecedores","FornecedorController@index")->name('app.fornecedores');

        //rota produtos
    Route::middleware('autenticacao')
                ->get('produtos',function(){return 'produtos';})->name('app.produtos');
});

//Route::get('/teste/{p1}/{p1}','TesteController@teste')->name('teste');

Route::fallback(function(){
        echo 'A rota acessada não existe.<a href="'.route('site.index').'">clique aqui</a>';
});
