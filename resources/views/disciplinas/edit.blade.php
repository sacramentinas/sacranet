@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i>
            Disciplinas
            <a href="{!! route('disciplinas.index') !!}" class="btn btn-default">← Voltar</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li>Disciplinas</li>
            <li class="active">Editar</li>
        </ol>
    </section>


@endsection

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info ">
                <div class="box-header">
                    <h3 class="box-title">Editar Disciplina</h3>

                </div><!-- /.box-header -->
                <div class="box-footer text-black">
                    {!! Form::model($disciplina,['route' => ['disciplinas.update',$disciplina->id],'id' => 'form','method' => 'PUT'] ) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('descricao','Descrição:') !!}
                            {!! Form::text('descricao',null,['class' => 'form-control input-lg','id' => 'descricao']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('nome_sei','Nome da disciplina no Sei:') !!}
                            {!! Form::text('nome_sei',null,['class' => 'form-control input-lg','id' => 'nome_sei']) !!}
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

    {!! Html::script('plugins/select2/select2.min.js') !!}
    {!! Html::script('plugins/multiselect/js/jquery.multi-select.js') !!}
    {!! Html::script('js/acoes_formulario.js') !!}
@endsection



