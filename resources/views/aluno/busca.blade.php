@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            <i class="fa fa-user"></i>
            Alunos

            <span class="badge bg-teal">{!! $alunos->total() !!} alunos cadastrados</span>
            @if($btnOcorrencias)
            <a href="{!! route('ocorrencias.turma',[Request::input('t')]) !!}" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Ocorrências</a>
            @endif
        </h1>


        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li class="active">Alunos</li>

        </ol>

    </section>

@endsection

@section('conteudo')

<div class="row">
    {!! Form::open(['route' => 'alunos.index','method' => 'GET','id' => 'form' ] ) !!}
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header">
                <i class="fa fa-users"></i>
                <h3 class="box-title">Turmas</h3>


            </div><!-- /.box-header -->
            <div class="box-footer text-black">
                 <div class="input-group">
                        <select class="form-control input-lg" name="t" id="campot">
                            <option value="">Selecione a Turma</option>
                            @foreach($turmas as $turma)
                            <option value="{!! $turma->id !!}" {!! (Request::input('t') == $turma->id ) ? "SELECTED" : ""  !!}>{!! $turma->serie->nome." - ".$turma->letra !!}</option>

                            @endforeach
                        </select>
              <span class="input-group-btn">
                <button type="submit"  id="search-btn" class="btn btn-flat btn-success btn-lg"><i class="fa fa-search"></i></button>
                 <a href="{!! route('alunos.index') !!}" title="Limpar Pesquisa" class="btn btn-default btn-lg btn-flat" id="limpart"><i class="fa fa-close"></i></a>
              </span>
                    </div>

            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div><!-- /.col -->


        <div class="col-md-6">
            <div class="box box-info ">
                <div class="box-header">
                    <i class="fa fa-user"></i>
                    <h3 class="box-title">Busca</h3>

                </div><!-- /.box-header -->
                <div class="box-footer text-black">

                    <div class="input-group">
                        {!! Form::text('p', Request::input('p') ? Request::input('p') : '' ,['class' => 'form-control input-lg','placeholder' => 'Buscar Aluno...','id' => 'campop']) !!}
                  <span class="input-group-btn">
                         <button type="submit"  id="search-btn" class="btn btn-flat btn-info btn-lg"><i class="fa fa-search"></i></button>
                         <a href="{!! route('alunos.index') !!}" title="Limpar Pesquisa" class="btn btn-default btn-lg btn-flat"  id="limparp"><i class="fa fa-close"></i></a>
                  </span>
                </div>


                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    {!! Form::close() !!}
</div>

    @foreach($alunos as $aluno)

    <div class="col-md-3 col-sm-3 col-xs-12">

        <div class="well profile_view">
            <div class="box-profile">
            <span class="badge bg-teal">{{ $aluno->numero }}</span>
            <div class="user-image">

                <?php

                  if( file_exists( public_path().'/fotoaluno/'.intval($aluno->matricula).'.jpg')){
                      $foto = asset('fotoaluno/'.intval($aluno->matricula).'.jpg');
                  }else{
                      $foto = asset('fotoaluno/foto-indisponivel.png');
                  }

                ?>

                <img  src=" {!! $foto !!}" >

            </div>
            <div class="col-sm-12 dados-aluno">
                <h4 class="text-center text-aqua">{{ str_limit($aluno->nomealuno, 32) }}</h4>
                <?php if($aluno->turma_id) {   ?>
                <p class="text-center">
                  <span class="badge bg-aqua-active ">
                       {!! $aluno->turma->serie->nome . " - " . $aluno->turma->letra  !!}
                  </span>
               </p>
                <?php } ?>

            </div>

                <div class="botoes">
                    <div class="btn-group btn-group-lg btn-group-justified botoes-int" role="group">
                        <a href="{!! route('alunos.perfil',[$aluno->id]) !!}" class="btn btn-info "> <i class="fa fa-eye">
                            </i> <small>Visualizar</small></a>


                        <a href="{!! route('alunos.editar',[$aluno->id]) !!}" class="btn btn-warning"> <i class="fa fa-pencil">
                            </i>  <small>Editar</small></a>
                    </div>




                </div>
                </div>
            </div>
     </div>


    @endforeach

  {!! $alunos->appends(Request::except('page'))->render() !!}

  <div class="clearfix"></div>

@endsection

@section('script')
        <script>
            $(document).ready(function (){
                var form = $('#form');
                $("#limparp").click(function(e){
                        e.preventDefault();
                        $('#campop').val("");
                        form.submit();

                });
                $("#limpart").click(function(e){
                    e.preventDefault();
                    $('#campot').val("");
                    form.submit();

                });
            });

        </script>

@endsection