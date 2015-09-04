@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            <i class="fa fa-user"></i>
            Alunos
            <span class="badge bg-teal">{!! $alunos->total() !!} alunos cadastrados</span>
        </h1>


        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li class="active">Alunos</li>

        </ol>

    </section>

@endsection

@section('conteudo')

<div class="row">
    {!! Form::open(['route' => 'alunos.index','method' => 'GET'] ) !!}
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header">
                <i class="fa fa-users"></i>
                <h3 class="box-title">Turmas</h3>


            </div><!-- /.box-header -->
            <div class="box-footer text-black">
                 <div class="input-group">
                        <select class="form-control input-lg" name="t">
                            <option value="">Selecione a Turma</option>
                            @foreach($turmas as $turma)
                            <option value="{!! $turma->id !!}" {!! (Request::input('t') == $turma->id ) ? "SELECTED" : ""  !!}>{!! $turma->serie->nome." - ".$turma->letra !!}</option>

                            @endforeach
                        </select>
              <span class="input-group-btn">
                <button type="submit"  id="search-btn" class="btn btn-flat btn-success btn-lg"><i class="fa fa-search"></i></button>
                 <a href="{!! route('alunos.index') !!}" title="Limpar Pesquisa" class="btn btn-default btn-lg btn-flat"><i class="fa fa-close"></i></a>
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
                        {!! Form::text('p', Request::input('p') ? Request::input('p') : '' ,['class' => 'form-control input-lg','placeholder' => 'Buscar Aluno...']) !!}
                  <span class="input-group-btn">
                         <button type="submit"  id="search-btn" class="btn btn-flat btn-info btn-lg"><i class="fa fa-search"></i></button>
                         <a href="{!! route('alunos.index') !!}" title="Limpar Pesquisa" class="btn btn-default btn-lg btn-flat"><i class="fa fa-close"></i></a>
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
            <div class="user-image">
                <img  src="http://lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" class="img-circle img-responsive">
            </div>
            <div class="col-sm-12 dados-aluno">
                <h4 class="text-center text-aqua">{{ str_limit($aluno->nomealuno, 32) }}</h4>


                    <p class="text-primary text-center">{{ $aluno->turma->serie->nome . " - " . $aluno->turma->letra  }} </p>


            </div>

                <div class="col-md-12 botoes">

                    <a href="" class="btn btn-primary btn-block"> <i class="fa fa-user">
                        </i> Visualizar Aluno </a>


                </div>
            </div>
     </div>


    @endforeach

  {!! $alunos->appends(Request::except('page'))->render() !!}

  <div class="clearfix"></div>

@endsection

@section('script')


@endsection