@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            <i class="fa fa-user"></i>
            Alunos
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
                $("#campot").change(function(e){
                    e.preventDefault();
                    form.submit();
                });
            });

        </script>

@endsection