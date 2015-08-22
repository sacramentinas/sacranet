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
Route::get('/turmas/cadastrar',['as' => 'turmas.cadastrar', 'uses' => 'TurmaController@create']);
Route::post('/turmas/cadastrar',['as' => 'turmas.store', 'uses' => 'TurmaController@store']);