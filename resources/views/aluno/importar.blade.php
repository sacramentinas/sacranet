@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            <i class="fa fa-user"></i> Importar Alunos

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
                    <i class="fa fa-upload"></i>
                    <h3 class="box-title">Enviar Arquivo texto gerado pelo SEI</h3>

                </div><!-- /.box-header -->
                <div class="box-footer text-black">
                    <form action="{!! route('alunos.upload') !!}" method="post" enctype="multipart/form-data" id="form">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" >
                        <div class="input-group envio">
                            <input type="file" name="alunos" id="alunos" class="form-control" >

                        </div>

                        <button type="submit" id="salvar" class="pull-right btn btn-flat btn-info btn-lg"><i class="fa fa-upload"></i> Enviar</button>

                    </form>
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->



@endsection

@section('script')
        <script>
            $(document).ready(function(){
                $('#form').submit(function(e){
                    e.preventDefault();
                    var dados = new FormData();
                    dados.append('alunos',$('#alunos')[0].files[0]);

                    var url = $(this).attr('action');
                    $('#salvar').html('<i class="fa fa-spinner faa-spin animated"></i> Carregando...').attr('disabled','disabled');


                    $.ajax({
                        type     :   'POST',
                        url      :   url,
                        processData: false,
                        dataType: 'json',
                        encode   :   true,
                        cache: false,
                        contentType: false,
                        data     :  dados,
                        success  :   function(msg){


                             if(msg.sucesso){

                                $('.sucesso').html("<i class='icon fa fa-check'></i> "+msg.sucesso)
                                $('.alert-success').fadeIn('fast');
                                $('#mensagem').animate({top:"0"}, 500);

                                setTimeout(function(){
                                    $('#mensagem').animate({top: -$('#mensagem').outerHeight()},1500);
                                    $(".alert-success").fadeOut(3000);

                                },4000);

                                $('#form').trigger("reset");


                             }else{

                                 $('.alert-danger').fadeIn('fast');
                                 $('#mensagem').animate({top:"0"}, 500);
                                 $('.erro-msg').html("<i class='icon fa  fa-exclamation-triangle'></i>Erro no arquivo de importação");

                                 setTimeout(function(){
                                     $('#mensagem').animate({top: -$('#mensagem').outerHeight()},1500);
                                     $(".alert-danger").fadeOut(3000);
                                 },4000);

                             }
                            $('#salvar').html('<i class="fa fa-upload"></i> Enviar').removeAttr('disabled');

                        }

                    });


                });
            });

        </script>

@endsection