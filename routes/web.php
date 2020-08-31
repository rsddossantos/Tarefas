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

/*
 * ----------------------------------------------
 * Rotas básicas, com parâmetros e Regex+Provider
 * ----------------------------------------------
 */

Route::get('/', 'HomeController');
Route::view('/teste', 'teste');

//Digite o que quiser após /notícia que será direcionado para cá
Route::get('/noticia/{id}', function($id) {
   echo "Slug: " . $id;
});

// Ex: http://127.0.0.1:8000/noticia/nasceu-fulano-de-tal/comentario/orgulho-nacional
Route::get('/noticia/{id}/comentario/{coment}', function($id, $coment) {
    echo "Notícia: " . $id . "<br/>";
    echo "Comentário: " . $coment;
});

// Criando duas rotas para receber usuário. Uma se vier NOME e outra se vier ID
// A segunda rota abaixo tem um PROVIDER, uma regra para todas as vezes que receber o parâmetro ID
// Essa regra fica no método boot em app/provider/RouteServiceProvider
Route::get('/user/{name}', function($name) {
    echo "User Name: " . $name;
})->where('name', '[a-z]+');

Route::get('/user/{id}', function($id) {
    echo "User ID: " . $id;
});

/*
 * ----------------------------------------------
 * Rotas com nome+Redirect
 * ----------------------------------------------
 */

Route::get('/config', function(){
    // Sistema monta o link sozinho
    $link = route('info');
    return redirect()->route('permissoes');
    // Direcionando para a view config
    //return view('config');
});

Route::get('/config/info', function(){
    echo "Configurações INFO";
})->name('info');

Route::get('/config/permissoes', function(){
    echo "Configurações PERMISSÕES";
})->name('permissoes');

/*
 * ----------------------------------------------
 * Grupos de rotas + Controllers
 * ----------------------------------------------
 */

Route::prefix('/menu')->group(function() {
    Route::get('/', 'ConfigController@index');
    Route::post('/', 'ConfigController@index');
    Route::get('info', 'ConfigController@info');
    Route::get('permissoes', 'ConfigController@permissoes');
});

/*
 * ----------------------------------------------
 * CRUD básico - Sistema de controle de Tarefas
 * ----------------------------------------------
 */

Route::prefix('/tarefas')->group(function(){
    Route::get('/', 'TarefasController@list')->name('tarefas.list'); // Listagem de tarefas
    Route::get('add', 'TarefasController@add')->name('tarefas.add'); // Tela de adição
    Route::post('add', 'TarefasController@addAction'); // Ação de adição
    Route::get('edit/{id}', 'TarefasController@edit')->name('tarefas.edit'); // Tela de edição
    Route::post('edit/{id}', 'TarefasController@editAction'); // Ação de edição
    Route::get('delete/{id}', 'TarefasController@del')->name('tarefas.del'); // Ação de deletar
    Route::get('marcar/{id}', 'TarefasController@done')->name('tarefas.done'); // Marcar resolvido
});


/*
 * ----------------------------------------------
 * Fallback de rotas (colocar sempre no final)
 * ----------------------------------------------
 */

Route::fallback(function(){
    return view('404');
});












