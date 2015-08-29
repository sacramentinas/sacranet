<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('painel.inicial');
});
Route::get('/alunos/importar', function () {
    return view('aluno.importar');
});

Route::post('/alunos/upload',['as' => 'alunos.upload', 'uses' => 'AlunoController@upload'] );

Route::get('/turmas',['as' => 'turmas.index', 'uses' => 'TurmaController@index']);
Route::get('/turmas/dados',['as' => 'turmas.dados', 'uses' => 'TurmaController@dados']);
Route::get('/turmas/cadastrar',['as' => 'turmas.cadastrar', 'uses' => 'TurmaController@create']);
Route::get('/turmas/{id}/editar/',['as' => 'turmas.editar', 'uses' => 'TurmaController@edit']);
Route::post('/turmas/cadastrar',['as' => 'turmas.store', 'uses' => 'TurmaController@store']);
Route::put('/turmas/{id}/editar',['as' => 'turmas.update', 'uses' => 'TurmaController@update']);
Route::delete('/turmas/{id}/excluir',['as' => 'turmas.excluir', 'uses' => 'TurmaController@destroy']);
