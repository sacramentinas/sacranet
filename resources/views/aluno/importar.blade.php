@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            Importar Alunos

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li>Alunos</li>
            <li class="active">Importar</li>
        </ol>
    </section>

@endsection

@section('conteudo')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info ">
                <div class="box-header">
                    <i class="fa fa-user"></i>
                    <h3 class="box-title">Enviar Arquivo</h3>

                </div><!-- /.box-header -->
                <div class="box-footer text-black">
                    <form action="{!! route('alunos.upload') !!}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" >
                        <div class="input-group envio">
                            <input type="file" name="alunos" class="form-control" >

                        </div>

                        <button type="submit" name="search" id="search-btn" class="pull-right btn btn-flat btn-info btn-lg"><i class="fa fa-upload"></i> Enviar</button>

                    </form>
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->



@endsection