
  @extends('template.principal')



@section('breadcrumb')
    <section class="content-header">
        <h1>
            Painel de Controle

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li class="active">Painel de Controle</li>
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
                  </span>
                    </div>


                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        {!! Form::close() !!}
    </div>



    <div class="clearfix"></div>

<div class="row">
    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header">
                <i class="fa fa-graduation-cap"></i>
                <h3 class="box-title">O Sacranet</h3>

            </div><!-- /.box-header -->
            <div class="box-body">
                <p>O Sacranet tem como proposta educacional auxiliar coordenações, direção, professores e pais e/ou responsáveis pelos alunos no monitoramento e controle da situação escolar do aluno através da Internet.</p>

                <p>O Sacra-Net funciona como uma extensão do controle disciplinar realizado em sala de aula e no Colégio, fornecendo aos responsáveis pelos alunos, um acompanhamento do dia-a-dia do aluno de uma forma rápida e a qualquer momento do dia.</p>

                <h5>Recomendações</h5>
                <li>Não forneça os seus dados de acesso ao sistema a ninguém;</li>
                <li>Para sair do sistema clique sempre no botão SAIR no menu acima, ao lado do nome do usuário;</li>
                <li>Cuidado ao excluir algum dado pois não será possível recuperá-lo;</li>
                <li>As informações inseridas no sistema são de responsabilidade dos seus usuários, neste caso, você.</li>
            </div><!-- /.box-body -->

        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-calendar-o"></i>
                <h3 class="box-title">Aniversariantes do dia</h3>

            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                @if( $aniversariantes->count() )
                    <table class="table table-striped table-bordered ">

                        @foreach($aniversariantes as $aluno)
                            <?php

                            if( file_exists( public_path().'/fotoaluno/'.intval($aluno->matricula).'.jpg')){
                                $foto = asset('fotoaluno/'.intval($aluno->matricula).'.jpg');

                            }else{
                                $foto = asset('fotoaluno/foto-indisponivel.png');

                            }

                            ?>
                            <tr>
                                <td> <img class="direct-chat-img" src="{!! $foto !!}"></td>
                                <td><h5>{{ $aluno->nomealuno }}</h5></td>
                                <td> <span class="label label-danger"> {!! $aluno->turma->serie->nome . " - " . $aluno->turma->letra  !!}</span></td>

                            </tr>
                        @endforeach



                    </table>
                @else
                    <h4>Nenhum aniversário na data de Hoje</h4>
                @endif
            </div><!-- /.box-body -->

        </div>
    </div>
</div>

    @endsection