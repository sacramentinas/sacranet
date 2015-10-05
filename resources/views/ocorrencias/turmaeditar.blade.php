@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i>
             Ocorrências em Massa
            <a href="{!! route('ocorrencias.index') !!}"  class="btn btn-default">&larr; Voltar</a>
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li>Ocorrências</li>
            <li class="active">Editar</li>
        </ol>

    </section>


@endsection

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success ">
                <div class="box-header with-border">
                    <h2  class="box-title text-success">  {!! $alunos[0]->turma->serie->nome." - ".$alunos[0]->turma->letra  !!}</h2>
                </div><!-- /.box-header -->
                <div class="box-footer text-black">
                    {!! Form::model($ocorrencia, ['route' => ['ocorrencias.turma.editar', $alunos[0]->turma->id, $ocorrencia->id  ],'id' => 'form','method' => 'PUT'] ) !!}
                   <div class="row extra-margin-footer">
                       <div class="col-md-3 ">
                           {!! Form::label('data','Data:') !!}
                           {!! Form::date('data',null,['class' => 'form-control','id' => 'data']) !!}
                       </div>
                       <div class="col-md-3">
                           {!! Form::label('unidade','Unidade:') !!}
                           {!! Form::select('unidade',['' => '',1 => 'I Unidade', 2 => 'II Unidade', 3 => 'III Unidade'],null,['class' => 'form-control','id' => 'disciplina']) !!}
                       </div>

                       <div class="col-md-6 ">
                           {!! Form::label('disciplina_id','Disciplina:') !!}
                           {!! Form::select('disciplina_id',$disciplinas,null,['class' => 'form-control','id' => 'disciplina']) !!}
                       </div>




                   </div>


                    <div class="row">
                        <div class="col-md-12">
                            <select multiple="multiple" id="alunos" name="alunos[]">
                                @foreach($alunos as $aluno)
                                <option value='{{$aluno->id}}' @if($ocorrencia->alunos->contains($aluno->id)) {{'selected'}} @endif >{{$aluno->numero}} - {{$aluno->nomealuno}}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                    <div class="row ">
                        <div class="col-md-12 margintop">


                            {!! Form::label('ocorrencia','Ocorrência:',['id' => 'ocorrencia']) !!}

                                <?php
                                    $cont = 0;
                                    $quant = count($tipoOcorrencias);

                                ?>
                            <div class="row ">
                          <div class="col-md-6">
                                @foreach($tipoOcorrencias as $tipo)
                                <?php $cont++ ?>
                              <div class="checkbox">
                                   <label>
                                        {!! Form::checkbox('ocorrencia[]',$tipo->id, ($ocorrencia->tipoocorrencias->contains($tipo->id)) ? 1 : 0 ) !!} {{$cont." - ".$tipo->descricao}}
                                   </label>
                              </div>

                                   @if($cont == round($quant/2))
                                        </div>
                                        <div class="col-md-6">
                                   @endif
                                    @endforeach
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
    <script>
        $(document).ready(function(){


            $('#alunos').multiSelect({
                keepOrder: true,
                selectableFooter: "<button class='btn btn-bitbucket btn-block btn-sm' id='select-all'>Selecionar Todos</button>",
                selectionFooter:  "<button class='btn btn-google btn-block btn-sm' id='remove-all'>Remover Todos</button>",
                selectableHeader: "<input type='search' class='search-input form-control' autocomplete='off' placeholder='Busca'>",
                selectionHeader: "<input type='search' class='search-input form-control' autocomplete='off' placeholder='Busca'>",
                afterInit: function(ms){
                    var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function(e){
                                if (e.which === 40){
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function(e){
                                if (e.which == 40){
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                },
                afterSelect: function(){
                    this.qs1.cache();
                    this.qs2.cache();
                },
                afterDeselect: function(){
                    this.qs1.cache();
                    this.qs2.cache();
                }



            });
            $('#select-all').click(function(e){
                e.preventDefault();
                $('#alunos').multiSelect('select_all');

            });
            $('#remove-all').click(function(e){
                e.preventDefault();
                $('#alunos').multiSelect('deselect_all');

            });




        });
    </script>
@endsection

