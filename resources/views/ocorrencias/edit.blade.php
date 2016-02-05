@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i>
             Turmas

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li>Turmas</li>
            <li class="active">Editar</li>
        </ol>
    </section>


@endsection

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info ">
                <div class="box-header">
                    <h3 class="box-title">Editar Turmas</h3>

                </div><!-- /.box-header -->
                <div class="box-footer text-black">

                    {!! Form::model($serie->toArray(), ['route' => ['turmas.update',$serie->id],'method' => 'put','id' => 'form'] ) !!}
                    <div clas="row">
                        <div class="col-md-4">
                    {!! Form::label('cod_sei','Código vindo do SEI:') !!}
                    {!! Form::text('cod_sei',null,['class' => 'form-control input-lg','id' => 'cod_sei']) !!}
                        </div>
                        <div class="col-md-8">
                    {!! Form::label('serie','Série') !!}
                    {!! Form::text('nome',null,['class' => 'form-control input-lg','id' => 'nome']) !!}
                        </div>
                    </div>
                    <div clas="row ">
                        <div class="col-md-12 margintop">
                            <div id="turmacontainer">

                            {!! Form::label('todas','Turmas:',['id' => 'turmas']) !!}
                                <div class="checkboxmsg">
                            <div class="checkbox-inline">
                                <label>

                                    <input type="checkbox" value="" name="" id="todas">
                                    Todas
                                </label>
                            </div>

                            <div class="checkbox-inline">

                               <label>
                                    {!! Form::checkbox('turmas[]','A',(in_array('A', $turmas) ? "true" : null)) !!}A
                               </label>
                            </div>

                            <div class="checkbox-inline">
                                <label>
                                    {!! Form::checkbox('turmas[]','B',(in_array('B', $turmas) ? "true" : null)) !!} B
                                </label>
                            </div>

                            <div class="checkbox-inline">

                               <label>
                                   {!! Form::checkbox('turmas[]','C',(in_array('C', $turmas) ? "true" : null)) !!} C
                               </label>
                            </div>

                            <div class="checkbox-inline">
                                <label>
                                    {!! Form::checkbox('turmas[]','D',(in_array('D', $turmas) ? "true" : null)) !!} D
                                </label>
                            </div>

                            <div class="checkbox-inline">
                                <label>
                                    {!! Form::checkbox('turmas[]','E',(in_array('E', $turmas) ? "true" : null)) !!} E
                                </label>
                            </div>

                            <div class="checkbox-inline">
                               <label>
                                   {!! Form::checkbox('turmas[]','F',(in_array('F', $turmas) ? "true" : null)) !!} F
                               </label>
                            </div>
                        </div>
                     </div>
                        </div>
                    </div>
                    <div clas="row">
                        <div class="col-md-12">

                        <button type="submit" id="salvar" class="botao pull-right btn btn-flat btn-info btn-lg"><i class="fa fa-save"></i> Salvar</button>

                        </div>
                    </div>
                   {!! Form::close() !!}
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->


@endsection

@section('script')

    {!! Html::script('plugins/select2/select2.min.js') !!}
    {!! Html::script('plugins/multiselect/js/jquery.multi-select.js') !!}
    {!! Html::script('js/acoes_formulario.js') !!}

    <script>
        $(document).ready(function(){

               $('#todas').change(function(){
               if(this.checked){
                  $('input[name="turmas[]"]').prop('checked',true) ;
                }else{
                  $('input[name="turmas[]"]').prop('checked',false) ;
                }
            });

        });
    </script>
@endsection
