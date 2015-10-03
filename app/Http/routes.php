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
Route::get('/alunos/removerfoto', ['as' => 'alunos.removerfoto','uses' => 'AlunoController@removerfoto']);
Route::post('/alunos/uploadfotos',['as' => 'alunos.uploadfotos', 'uses' => 'AlunoController@uploadFotos']);
Route::get('/alunos/{id}/perfil', ['as' => 'alunos.perfil','uses' => 'AlunoController@perfil']);


Route::get('/ocorrencias/turma/{turma}',['as' => 'ocorrencias.turma', 'uses' => 'OcorrenciaController@turma']);
Route::post('/ocorrencias/turma/{turma}',['as' => 'ocorrencias.turma.salvar', 'uses' => 'OcorrenciaController@turmaSalvar']);



Route::get('/notas', ['as' => 'notas.importar', 'uses' => 'NotaController@importar'] );
Route::post('/notas/upload',['as' => 'notas.upload', 'uses' => 'NotaController@upload'] );


Route::get('/tipos',['as' => 'tipos.index', 'uses' => 'TipoOcorrenciaController@index']);
Route::get('/tipos/dados',['as' => 'tipos.dados', 'uses' => 'TipoOcorrenciaController@dados']);
Route::get('/tipos/cadastrar',['as' => 'tipos.cadastrar', 'uses' => 'TipoOcorrenciaController@create']);
Route::post('/tipos/cadastrar',['as' => 'tipos.store', 'uses' => 'TipoOcorrenciaController@store']);
Route::get('/tipos/{id}/editar',['as' => 'tipos.editar', 'uses' => 'TipoOcorrenciaController@edit']);
Route::put('/tipos/{id}/editar',['as' => 'tipos.update', 'uses' => 'TipoOcorrenciaController@update']);
Route::delete('/tipos/{id}/excluir',['as' => 'tipos.excluir', 'uses' => 'TipoOcorrenciaController@destroy']);

Route::get('/disciplinas',['as' => 'disciplinas.index', 'uses' => 'DisciplinaController@index']);
Route::get('/disciplinas/dados',['as' => 'disciplinas.dados', 'uses' => 'DisciplinaController@dados']);
Route::get('/disciplinas/cadastrar',['as' => 'disciplinas.cadastrar', 'uses' => 'DisciplinaController@create']);
Route::post('/disciplinas/cadastrar',['as' => 'disciplinas.store', 'uses' => 'DisciplinaController@store']);
Route::get('/disciplinas/{id}/editar',['as' => 'disciplinas.editar', 'uses' => 'DisciplinaController@edit']);
Route::put('/disciplinas/{id}/editar',['as' => 'disciplinas.update', 'uses' => 'DisciplinaController@update']);
Route::delete('/disciplinas/{id}/excluir',['as' => 'disciplinas.excluir', 'uses' => 'DisciplinaController@destroy']);

Route::get('/turmas',['as' => 'turmas.index', 'uses' => 'TurmaController@index']);
Route::get('/turmas/dados',['as' => 'turmas.dados', 'uses' => 'TurmaController@dados']);
Route::get('/turmas/cadastrar',['as' => 'turmas.cadastrar', 'uses' => 'TurmaController@create']);
Route::get('/turmas/{id}/editar/',['as' => 'turmas.editar', 'uses' => 'TurmaController@edit']);
Route::post('/turmas/cadastrar',['as' => 'turmas.store', 'uses' => 'TurmaController@store']);
Route::put('/turmas/{id}/editar',['as' => 'turmas.update', 'uses' => 'TurmaController@update']);
Route::delete('/turmas/{id}/excluir',['as' => 'turmas.excluir', 'uses' => 'TurmaController@destroy']);
