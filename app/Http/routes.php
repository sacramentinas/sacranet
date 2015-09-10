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

Route::get('/alunos',['as' => 'alunos.index', 'uses' => 'AlunoController@index']);
Route::get('/alunos/importar', ['as' => 'alunos.importar', 'uses' => 'AlunoController@importar'] );
Route::post('/alunos/upload',['as' => 'alunos.upload', 'uses' => 'AlunoController@upload'] );
Route::get('/alunos/cadastrar',['as' => 'alunos.cadastrar', 'uses' => 'AlunoController@create'] );
Route::get('/alunos/{id}/editar',['as' => 'alunos.editar', 'uses' => 'AlunoController@edit'] );
Route::put('/alunos/{id}/editar',['as' => 'alunos.update', 'uses' => 'AlunoController@update'] );
Route::post('/alunos/cadastrar', ['as' => 'alunos.store','uses' => 'AlunoController@store']);
Route::get('/alunos/fotos', ['as' => 'alunos.fotos','uses' => 'AlunoController@fotos']);
Route::post('/alunos/uploadfotos',['as' => 'alunos.uploadfotos', 'uses' => 'AlunoController@uploadFotos']);


Route::get('/turmas',['as' => 'turmas.index', 'uses' => 'TurmaController@index']);
Route::get('/turmas/dados',['as' => 'turmas.dados', 'uses' => 'TurmaController@dados']);
Route::get('/turmas/cadastrar',['as' => 'turmas.cadastrar', 'uses' => 'TurmaController@create']);
Route::get('/turmas/{id}/editar/',['as' => 'turmas.editar', 'uses' => 'TurmaController@edit']);
Route::post('/turmas/cadastrar',['as' => 'turmas.store', 'uses' => 'TurmaController@store']);
Route::put('/turmas/{id}/editar',['as' => 'turmas.update', 'uses' => 'TurmaController@update']);
Route::delete('/turmas/{id}/excluir',['as' => 'turmas.excluir', 'uses' => 'TurmaController@destroy']);
