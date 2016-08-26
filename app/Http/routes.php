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

Route::get('/login',['as' => 'admin.login', 'uses' => 'AdminLoginController@index']);
Route::post('/login',['as' => 'admin.login', 'uses' => 'AdminLoginController@login']);


Route::get('/responsavel/login',['as' => 'responsavel.login', 'uses' => 'ResponsavelController@index']);
Route::post('/responsavel/login',['as' => 'responsavel.login', 'uses' => 'ResponsavelController@login']);
Route::post('/responsavel/loginsite',['as' => 'responsavel.loginsite', 'uses' => 'ResponsavelController@loginsite']);

Route::get('/responsavel/',['as' => 'responsavel.perfil', 'middleware' => 'responsavel', 'uses' => 'ResponsavelController@perfil']);
Route::get('/responsavel/sair',['as' => 'responsavel.sair', 'uses' => 'ResponsavelController@sair']);



Route::group(['middleware' => 'auth'], function() {

    Route::get('/sair',['as' => 'admin.sair', 'uses' => 'AdminLoginController@sair']);
    Route::get('/',['as' => 'admin.index', 'uses' => 'AdminLoginController@painel']);
    Route::get('/aniversariantes',['as' => 'aniversariantes.index', 'uses' => 'AdminLoginController@aniversariantes']);

    Route::get('/alunos', ['as' => 'alunos.index', 'uses' => 'AlunoController@index']);
    Route::get('/alunos/importar', ['as' => 'alunos.importar', 'uses' => 'AlunoController@importar']);
    Route::post('/alunos/upload', ['as' => 'alunos.upload', 'uses' => 'AlunoController@upload']);
    Route::post('/alunos/importacaodados', ['as' => 'alunos.importacaodados', 'uses' => 'AlunoController@importacaodados']);
    Route::get('/alunos/regenerarnotas', ['as' => 'alunos.regenerarnotas', 'uses' => 'AlunoController@regenerarnotas']);
    Route::get('/alunos/regenerarocorrencias', ['as' => 'alunos.regenerarocorrencias', 'uses' => 'AlunoController@regenerarocorrencias']);
    Route::get('/alunos/cadastrar', ['as' => 'alunos.cadastrar', 'uses' => 'AlunoController@create']);
    Route::get('/alunos/{id}/editar', ['as' => 'alunos.editar', 'uses' => 'AlunoController@edit']);
    Route::put('/alunos/{id}/editar', ['as' => 'alunos.update', 'uses' => 'AlunoController@update']);
    Route::post('/alunos/cadastrar', ['as' => 'alunos.store', 'uses' => 'AlunoController@store']);
    Route::get('/alunos/fotos', ['as' => 'alunos.fotos', 'uses' => 'AlunoController@fotos']);
    Route::get('/alunos/removerfoto', ['as' => 'alunos.removerfoto', 'uses' => 'AlunoController@removerfoto']);
    Route::post('/alunos/uploadfotos', ['as' => 'alunos.uploadfotos', 'uses' => 'AlunoController@uploadFotos']);
    Route::get('/alunos/{id}/perfil', ['as' => 'alunos.perfil', 'uses' => 'AlunoController@perfil']);
    Route::get('/alunos/{id}/ocorrencia', ['as' => 'alunos.ocorrencia', 'uses' => 'AlunoController@ocorrencia']);

    Route::get('/alunos/{turma}/listar', ['as' => 'aluno.listagem', 'uses' => 'AlunoController@turmalistagem']);
    Route::get('/alunos/{turma}/carteirinha', ['as' => 'aluno.carteirinha', 'uses' => 'AlunoController@carteirinha']);

    Route::get('/ocorrencias/turma/{turma}', ['as' => 'ocorrencias.turma', 'uses' => 'OcorrenciaController@turma']);
    Route::post('/ocorrencias/turma/{turma}', ['as' => 'ocorrencias.turma.salvar', 'uses' => 'OcorrenciaController@turmaSalvar']);
    Route::post('/ocorrencias/individual/{turma}', ['as' => 'ocorrencias.individual.salvar', 'uses' => 'OcorrenciaController@individualSalvar']);
    Route::get('/ocorrencias/turma/{turma}/editar/{id}', ['as' => 'ocorrencias.turma.editar', 'uses' => 'OcorrenciaController@turmaeditar']);
    Route::put('/ocorrencias/turma/{turma}/editar/{id}', ['as' => 'ocorrencias.turma.editar', 'uses' => 'OcorrenciaController@turmaupdate']);
    Route::get('/ocorrencias/', ['as' => 'ocorrencias.index', 'uses' => 'OcorrenciaController@index']);
    Route::get('/ocorrencias/dados', ['as' => 'ocorrencias.dados', 'uses' => 'OcorrenciaController@dados']);
    Route::delete('/ocorrencias/{id}/excluir', ['as' => 'ocorrencias.excluir', 'uses' => 'OcorrenciaController@destroy']);
    Route::delete('/ocorrencias/{id}/excluir/{aluno}', ['as' => 'ocorrencias.excluir.aluno', 'uses' => 'OcorrenciaController@excluirAluno']);

    Route::get('/notas', ['as' => 'notas.importar', 'uses' => 'NotaController@importar']);
    Route::post('/notas/upload', ['as' => 'notas.upload', 'uses' => 'NotaController@upload']);
    Route::get('/notas/upload', ['as' => 'notas.upload', 'uses' => 'NotaController@salvar']);

    Route::get('/boletos', ['as' => 'boletos.importar', 'uses' => 'BoletoController@importar']);
    Route::post('/boletos/upload', ['as' => 'boletos.upload', 'uses' => 'BoletoController@upload']);

    Route::get('/tipos', ['as' => 'tipos.index', 'uses' => 'TipoOcorrenciaController@index']);
    Route::get('/tipos/dados', ['as' => 'tipos.dados', 'uses' => 'TipoOcorrenciaController@dados']);
    Route::get('/tipos/cadastrar', ['as' => 'tipos.cadastrar', 'uses' => 'TipoOcorrenciaController@create']);
    Route::post('/tipos/cadastrar', ['as' => 'tipos.store', 'uses' => 'TipoOcorrenciaController@store']);
    Route::get('/tipos/{id}/editar', ['as' => 'tipos.editar', 'uses' => 'TipoOcorrenciaController@edit']);
    Route::put('/tipos/{id}/editar', ['as' => 'tipos.update', 'uses' => 'TipoOcorrenciaController@update']);
    Route::delete('/tipos/{id}/excluir', ['as' => 'tipos.excluir', 'uses' => 'TipoOcorrenciaController@destroy']);

    Route::get('/disciplinas', ['as' => 'disciplinas.index', 'uses' => 'DisciplinaController@index']);
    Route::get('/disciplinas/dados', ['as' => 'disciplinas.dados', 'uses' => 'DisciplinaController@dados']);
    Route::get('/disciplinas/cadastrar', ['as' => 'disciplinas.cadastrar', 'uses' => 'DisciplinaController@create']);
    Route::post('/disciplinas/cadastrar', ['as' => 'disciplinas.store', 'uses' => 'DisciplinaController@store']);
    Route::get('/disciplinas/{id}/editar', ['as' => 'disciplinas.editar', 'uses' => 'DisciplinaController@edit']);
    Route::put('/disciplinas/{id}/editar', ['as' => 'disciplinas.update', 'uses' => 'DisciplinaController@update']);
    Route::delete('/disciplinas/{id}/excluir', ['as' => 'disciplinas.excluir', 'uses' => 'DisciplinaController@destroy']);

    Route::get('/turmas', ['as' => 'turmas.index', 'uses' => 'TurmaController@index']);
    Route::get('/turmas/dados', ['as' => 'turmas.dados', 'uses' => 'TurmaController@dados']);
    Route::get('/turmas/cadastrar', ['as' => 'turmas.cadastrar', 'uses' => 'TurmaController@create']);
    Route::get('/turmas/{id}/editar/', ['as' => 'turmas.editar', 'uses' => 'TurmaController@edit']);
    Route::post('/turmas/cadastrar', ['as' => 'turmas.store', 'uses' => 'TurmaController@store']);
    Route::put('/turmas/{id}/editar', ['as' => 'turmas.update', 'uses' => 'TurmaController@update']);
    Route::delete('/turmas/{id}/excluir', ['as' => 'turmas.excluir', 'uses' => 'TurmaController@destroy']);


    Route::get('/usuarios', ['as' => 'usuarios.index', 'uses' => 'UsuarioController@index']);
    Route::get('/usuarios/dados', ['as' => 'usuarios.dados', 'uses' => 'UsuarioController@dados']);
    Route::get('/usuarios/cadastrar', ['as' => 'usuarios.cadastrar', 'uses' => 'UsuarioController@create']);
    Route::get('/usuarios/{id}/editar/', ['as' => 'usuarios.editar', 'uses' => 'UsuarioController@edit']);
    Route::post('/usuarios/cadastrar', ['as' => 'usuarios.store', 'uses' => 'UsuarioController@store']);
    Route::put('/usuarios/{id}/editar', ['as' => 'usuarios.update', 'uses' => 'UsuarioController@update']);
    Route::delete('/usuarios/{id}/excluir', ['as' => 'usuarios.excluir', 'uses' => 'UsuarioController@destroy']);

});