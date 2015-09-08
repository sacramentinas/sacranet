@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            <i class="fa fa-user"></i> Enviar Fotos

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



                    <form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">

                        <div class="row fileupload-buttonbar">
                            <div class="col-lg-7">
                                <!-- The fileinput-button span is used to style the file input field as button -->
                                <span class="btn btn-success fileinput-button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span>Selecionar Arquivos...</span>
                                    <input type="file" name="files[]" multiple="">
                                </span>
                                <button type="submit" class="btn btn-primary start">
                                    <i class="glyphicon glyphicon-upload"></i>
                                    <span>Iniciar upload</span>
                                </button>
                                <button type="reset" class="btn btn-warning cancel">
                                    <i class="glyphicon glyphicon-ban-circle"></i>
                                    <span>Cancelar upload</span>
                                </button>


                                <!-- The global file processing state -->
                                <span class="fileupload-process"></span>
                            </div>
                            <!-- The global progress state -->
                            <div class="col-lg-5 fileupload-progress fade">
                                <!-- The global progress bar -->
                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                </div>
                                <!-- The extended global progress state -->
                                <div class="progress-extended">&nbsp;</div>
                            </div>
                        </div>
                        <!-- The table listing the files available for upload/download -->
                        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>






                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->



@endsection


@section('script')

    {!! Html::script('plugins/jQuery-File-Upload/js/vendor/jquery.ui.widget.js') !!}
    {!! Html::script('plugins/jQuery-File-Upload/js/jquery.fileupload.js') !!}

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