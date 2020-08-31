<?php

use Illuminate\Support\Facades\Route;

/*
 * ----------------------------------------------
 * Sistema de controle de Tarefas
 * ----------------------------------------------
 */
Route::get('/','HomeController');

Route::prefix('/tarefas')->group(function(){
    Route::get('/', 'TarefasController@list')->name('tarefas.list'); // Listagem de tarefas
    Route::get('add', 'TarefasController@add')->name('tarefas.add'); // Tela de adição
    Route::post('add', 'TarefasController@addAction'); // Ação de adição
    Route::get('edit/{id}', 'TarefasController@edit')->name('tarefas.edit'); // Tela de edição
    Route::post('edit/{id}', 'TarefasController@editAction'); // Ação de edição
    Route::get('delete/{id}', 'TarefasController@del')->name('tarefas.del'); // Ação de deletar
    Route::get('marcar/{id}', 'TarefasController@done')->name('tarefas.done'); // Marcar resolvido
});

Route::fallback(function(){
    return view('404');
});












