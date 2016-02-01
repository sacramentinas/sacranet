@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i>
             Ocorrência Individual
            <a href="{!! route('alunos.perfil',[$aluno->id]) !!}"  class="btn btn-default">&larr; Voltar</a>
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li>Ocorrências</li>
            <li class="active">Cadastrar</li>
        </ol>

    </section>


@endsection

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success ">
                <div class="box-header with-border">
                    <h2  class="box-title text-success">  {!! $aluno->nomealuno." - ".$aluno->turma->serie->nome." - ".$aluno->turma->letra  !!}</h2>
                </div><!-- /.box-header -->
                <div class="box-footer text-black">
                    {!! Form::open( ['route' => ['ocorrencias.individual.salvar', $aluno->turma->id ],'id' => 'form','method' => 'POST'] ) !!}
                   <div class="row extra-margin-footer">
                       {!! Form::hidden('alunos',$aluno->id) !!}
                       <div class="col-md-3 ">
                           {!! Form::label('data','Data:') !!}
                           {!! Form::date('data',Carbon\Carbon::now(),['class' => 'form-control','id' => 'data']) !!}
                       </div>
                       <div class="col-md-3">
                           {!! Form::label('unidade','Unidade:') !!}
                           {!! Form::select('unidade',['' => '',1 => 'I Unidade', 2 => 'II Unidade', 3 => 'III Unidade'],null,['class' => 'form-control','id' => 'unidade']) !!}
                       </div>

                       <div class="col-md-6 ">
                           {!! Form::label('disciplina_id','Disciplina:') !!}
                           {!! Form::select('disciplina_id',$disciplinas,null,['class' => 'form-control','id' => 'disciplina_id']) !!}
                       </div>




                   </div>


                    <div class="row">



                    </div>
                    <div class="row ">
                        <div class="col-md-12 margintop">
                          <div id="turmacontainer">

                            {!! Form::label('ocorrencia','Ocorrência:',['id' => 'ocorrencia']) !!}

                                <?php
                                    $cont = 0;
                                    $quant = count($tipoOcorrencias);

                                ?>
                          <div class="checkboxmsg">
                            <div class="row ">

                          <div class="col-md-6">

                                @foreach($tipoOcorrencias as $tipo)
                                <?php $cont++ ?>
                              <div class="checkbox">
                                   <label>
                                        {!! Form::checkbox('ocorrencia[]',$tipo->id, null) !!} {{$cont." - ".$tipo->descricao}}
                                   </label>
                              </div>

                                   @if($cont == round($quant/2))
                                        </div>
                                        <div class="col-md-6">
                                   @endif
                                    @endforeach

                            </div>
                                </div>

                           </div>
                          </div>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::label('descricao','Descrição:') !!}
                                {!! Form::textarea('descricao',null,['class' => 'form-control', 'id' => 'descricao','rows'=>3]) !!}

                            </div>

                        </div>




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
    {!! Html::script('js/acoes_formulario.js') !!}
    {!! Html::script('plugins/multiselect/js/jquery.multi-select.js') !!}
    {!! Html::script('js/jquery.quicksearch.js') !!}

@endsection

