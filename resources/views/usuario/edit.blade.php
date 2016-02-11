@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i>
             Usuários

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li>Usuários</li>
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

                    {!! Form::model($usuario->toArray(), ['route' => ['usuarios.update',$usuario->id],'method' => 'put','id' => 'form'] ) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('login','Login:') !!}
                            {!! Form::text('login',null,['class' => 'form-control input-lg','id' => 'login']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('nome','Nome') !!}
                            {!! Form::text('nome',null,['class' => 'form-control input-lg','id' => 'nome']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('senha','Senha:') !!}
                            {!! Form::password('senha',['class' => 'form-control input-lg','id' => 'senha']) !!}
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('tipo','Tipo') !!}
                                {!! Form::select('tipo',['' => 'Selecione o Tipo de Usuário','admin' => 'Admin', 'mestre' => 'Mestre de Sala'],null,['class' => 'form-control input-lg','id' => 'tipo']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            {!! Form::label('turmas','Turmas') !!}
                            <input type="checkbox" id="checkbox" > Selecionar Todas

                            <select class="form-control select2"  id="turmas" name="turmas[]" multiple="multiple">

                                @foreach($turmas as $turma)
                                    <option {!! in_array($turma->id,$usuarioturmas ) ? "selected" : ""  !!} value="{!! $turma->id !!}"   >{!! $turma->serie->nome." - ".$turma->letra !!}</option>

                                @endforeach
                            </select>


                        </div>
                    </div>




                    <div class="row">
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
            $("#turmas").select2();
            $("#checkbox").click(function(){
                if($("#checkbox").is(':checked') ){
                    $("#turmas > option").prop("selected","selected");
                    $("#turmas").trigger("change");
                }else{
                    $("#turmas > option").removeAttr("selected");
                    $("#turmas").trigger("change");
                }
            });

        });
    </script>
@endsection
