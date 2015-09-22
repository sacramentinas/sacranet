@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            <?php

            ?>
            <i class="fa fa-user"></i> Alunos
            <a href="{!! Session::get('url',route('alunos.index')) !!}"  class="btn btn-default">&larr; Voltar</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li>Alunos</li>
            <li class="active">Editar</li>
        </ol>
    </section>

@endsection


@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info ">
                <div class="box-header">
                    <h3 class="box-title">Editar Alunos</h3>

                </div><!-- /.box-header -->
                <div class="box-footer text-black relative">
                    <?php

                    if( file_exists( public_path().'/fotoaluno/'.intval($aluno->matricula).'.jpg')){
                        $foto = asset('fotoaluno/'.intval($aluno->matricula).'.jpg');
                        $ex = "";
                    }else{
                        $foto = asset('fotoaluno/foto-indisponivel.png');
                        $ex = "invisivel";
                    }

                    ?>
                    <a class="badge bg-red excluirfoto {!! $ex !!}" title="Clique para Excluir a Foto">X</a>

                    <div class="user-image-edit">
                       <img  class="foto-edit" src=" {!! $foto !!}" >
                   </div>

                    <div id="carregandoupload">
                          <i class="fa fa-spinner faa-spin animated"></i> Enviando ...
                    </div>

                    <div id="fileuploader">
                        Selecione a foto
                    </div>

                    {!! Form::model($aluno->toArray(),['route' => ['alunos.update',$aluno->id],'id' => 'form','method' => 'PUT'] ) !!}
                    <div class="row">
                        <div class="col-md-8">
                            {!! Form::label('nomealuno','Nome do Aluno:') !!}
                            {!! Form::text('nomealuno',null,['class' => 'form-control input-lg','id' => 'nomealuno']) !!}
                        </div>
                        <div class="col-md-4">
                    {!! Form::label('matricula','Matrícula:') !!}
                    {!! Form::text('matricula',null,['class' => 'form-control input-lg','id' => 'matricula']) !!}
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('datanascimento','Data de Nascimento:') !!}
                            {!! Form::date('datanascimento',null,['class' => 'form-control input-lg','id' => 'datanascimento']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::label('sexo','Sexo:') !!}
                            {!! Form::select('sexo',['' => '','M' => 'Masculino','F' => 'Feminino'],null,['class' => 'form-control input-lg','id' => 'sexo']) !!}


                        </div>

                        <div class="col-md-2">
                            {!! Form::label('senhatexto','Senha Sei:') !!}
                            {!! Form::text('senhatexto',null,['class' => 'form-control input-lg','id' => 'senhatexto']) !!}
                        </div>
                        <div class="col-md-2">
                            {!! Form::label('numero','Número:') !!}
                            {!! Form::number('numero',null,['class' => 'form-control input-lg','id' => 'numero']) !!}
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            {!! Form::label('endereco','Endereço:') !!}
                            {!! Form::text('endereco',null,['class' => 'form-control input-lg','id' => 'endereco']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::label('bairro','Bairro:') !!}
                            {!! Form::text('bairro',null,['class' => 'form-control input-lg','id' => 'bairro']) !!}
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3">
                            {!! Form::label('cep','Cep:') !!}
                            {!! Form::text('cep',null,['class' => 'form-control input-lg','id' => 'cep']) !!}
                        </div>
                        <div class="col-md-5">
                            {!! Form::label('municipio','Município:') !!}
                            {!! Form::text('municipio',null,['class' => 'form-control input-lg','id' => 'municipio']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::label('emailcontratante','Email Contratante:') !!}
                            {!! Form::text('emailcontratante',null,['class' => 'form-control input-lg','id' => 'emailcontratante']) !!}
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            {!! Form::label('nomepai','Nome do Pai:') !!}
                            {!! Form::text('nomepai',null,['class' => 'form-control input-lg','id' => 'nomepai']) !!}
                        </div>


                        <div class="col-md-3">
                            {!! Form::label('telefonepai','Telefone do Pai:') !!}
                            {!! Form::text('telefonepai',null,['class' => 'form-control input-lg','id' => 'telefonepai']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::label('emailpai','Email do Pai:') !!}
                            {!! Form::text('emailpai',null,['class' => 'form-control input-lg','id' => 'emailpai']) !!}
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            {!! Form::label('nomemae','Nome da Mãe:') !!}
                            {!! Form::text('nomemae',null,['class' => 'form-control input-lg','id' => 'nomemae']) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label('telefonemae','Telefone da Mãe:') !!}
                            {!! Form::text('telefonemae',null,['class' => 'form-control input-lg','id' => 'telefonemae']) !!}
                        </div>

                        <div class="col-md-4">
                            {!! Form::label('emailmae','Email da Mãe:') !!}
                            {!! Form::text('emailmae',null,['class' => 'form-control input-lg','id' => 'emailmae']) !!}
                        </div>



                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            {!! Form::label('turma_id','Turma:') !!}
                            {!! Form::select('turma_id',$turmas,null,['class' => 'form-control input-lg','id' => 'turma_id']) !!}

                        </div>
                        <div class="col-md-4">
                            {!! Form::label('telefone','Telefone:') !!}
                            {!! Form::text('telefone',null,['class' => 'form-control input-lg','id' => 'telefone',  'placeholder' => '(__)____-____']) !!}
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <button type="submit" id="salvar" class="botao pull-right btn btn-info btn-lg"><i class="fa fa-save"></i> Salvar</button>

                        </div>
                    </div>
                    {!! Form::close() !!}



                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->


@endsection

@section('script')
    {!! Html::script('js/jquery.uploadfile.min.js') !!}
    {!! Html::script('js/acoes_formulario.js') !!}
    {!! Html::script('js/acoes_editar_foto_aluno.js') !!}

@endsection

