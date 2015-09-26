@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i>
             Ocorrências em Massa

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
            <div class="box box-info ">
                <div class="box-header">
                    <h3 class="box-title">Cadastrar Ocorrências em Massa</h3>

                </div><!-- /.box-header -->
                <div class="box-footer text-black">
                    {!! Form::open( ['route' =>'turmas.store','id' => 'form','method' => 'POST'] ) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <select multiple="multiple" id="my-select" name="my-select[]">
                                @foreach($alunos as $aluno)
                                <option value='{{$aluno->id}}'>{{$aluno->numero}} - {{$aluno->nomealuno}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-reddit" id="select-all">Selecionar Todos</button>

                    </div>
                    <div class="row ">
                        <div class="col-md-12 margintop">
                            <div id="turmacontainer">

                            {!! Form::label('todas','Turmas:',['id' => 'turmas']) !!}
                                <div class="checkboxmsg">
                            <div class="checkbox-inline">
                                <label>
                                    {!! Form::checkbox('','',false,['id' => 'todas']) !!}
                                    Todas
                                </label>
                            </div>

                            <div class="checkbox-inline">
                               <label>
                                    {!! Form::checkbox('turmas[]','A',null) !!}A
                               </label>
                            </div>

                            <div class="checkbox-inline">
                                <label>
                                    {!! Form::checkbox('turmas[]','B',null) !!} B
                                </label>
                            </div>

                            <div class="checkbox-inline">

                               <label>
                                   {!! Form::checkbox('turmas[]','C',null) !!} C
                               </label>
                            </div>

                            <div class="checkbox-inline">
                                <label>
                                    {!! Form::checkbox('turmas[]','D',null) !!} D
                                </label>
                            </div>

                            <div class="checkbox-inline">
                                <label>
                                    {!! Form::checkbox('turmas[]','E',null) !!} E
                                </label>
                            </div>

                            <div class="checkbox-inline">
                               <label>
                                   {!! Form::checkbox('turmas[]','F',null) !!} F
                               </label>
                            </div>
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
    <script>
        $(document).ready(function(){


            $('#my-select').multiSelect({
                keepOrder: true,



            });
            $('#select-all').click(function(e){
                e.preventDefault();
                $('#my-select').multiSelect('select_all');

            });



        });
    </script>
@endsection

