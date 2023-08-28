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

Route::get('/login/{erro?}','LoginController@index')->name('site.login');
Route::post('/login','LoginController@autenticar')->name('site.login');

//Grupo de rotas app
Route::middleware('autenticacao:padrao,visitante,p3,p4')->prefix('/app')->group(function(){
        
        Route::get('/home', 'HomeController@index')->name('app.home');

        Route::get('/sair', 'LoginController@sair')->name('app.sair');

        //rota cliente
        Route::get('/cliente', 'ClienteController@index')->name('app.cliente');

        //rota fornecedores
        Route::get("/fornecedor","FornecedorController@index")->name('app.fornecedor');

        //rota produtos
        Route::get('produto','ProdutoController@index')->name('app.produto');
});

//Route::get('/teste/{p1}/{p1}','TesteController@teste')->name('teste');

Route::fallback(function(){
        echo 'A rota acessada não existe.<a href="'.route('site.index').'">clique aqui</a>';
});
