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
                    <p class="text-gray"><i class="fa fa-exclamation-triangle"></i> Selecione a turma para o envio das fotos. Caso as fotos já estejam numeradas pela matricula, deixe a opção todas!</p>

                </div><!-- /.box-header -->
                <div class="box-footer text-black relative">
                    <div class="botao-enviar ">
                        <div class="col-md-8">
                        {!! Form::select('turmas',$turmas,null,['class' => 'form-control input-lg', 'id' => 'turmas']) !!}
                        </div>
                        <div class="col-md-4">
                    <a class="btn btn-success btn-lg" id="enviarFotos" href="#"> <i class="fa fa-upload"></i> Enviar</a>
                        </div>
                    </div>
                    <div id="fileuploader">

                        Selecione as fotos...
                    </div>


                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->


@endsection


@section('script')


    {!! Html::script('js/jquery.uploadfile.js') !!}

        <script>
            $(document).ready(function(){
                var uploadObj = $("#fileuploader").uploadFile({
                    url: "{!! route('alunos.uploadfotos') !!}",
                    fileName:"fotos",
                    autoSubmit:false,
                    multiple:true,
                    sequential:true,
                    sequentialCount:1,
                    dragDrop:true,
                    acceptFiles:"image/*",
                    uploadStr:"Selecione as fotos...",
                    dragDropStr: "<span><b>Arraste e solte as imagens</b></span>",
                    abortStr:"Cancelar",
                    cancelStr:"Cancelar",
                    doneStr:"Pronto!",
                    multiDragErrorStr: "Plusieurs Drag &amp; Drop de fichiers ne sont pas autorisés.",
                    extErrorStr:"Extensão não autorizada:",
                    sizeErrorStr:"Tamanho do arquivo inválido:",
                    uploadErrorStr:"Upload não está autorizado",
                    showDone:true,
                    statusBarWidth:'90%',
                    dragdropWidth:'500px',
                    showStatusAfterSuccess:true,
                    showFileCounter:false,
                    dynamicFormData: function()
                    {
                        var $turma = $('#turmas').val();
                        var data ={ 'turma': $turma};
                        return data;
                    },
                    onSuccess:function(files,data,xhr,pd)
                    {
                        //files: list of files
                        //data: response from server
                        console.log(data);
                        //xhr : jquer xhr object
                    },
                    afterUploadAll:function(obj)
                    {
                        $quantidade = obj.getFileCount();




                        $('.sucesso').html("<i class='icon fa fa-check'></i> "+$quantidade+" Foto(s) Enviadas");
                        $('.alert-success').fadeIn('fast');
                        $('#mensagem').animate({top:"0"}, 500);
                        obj.container.fadeOut(1000);

                        setTimeout(function(){
                            $('#mensagem').animate({top: -$('#mensagem').outerHeight()},1500);
                            $(".alert-success").fadeOut(3000);
                            $('#enviarFotos').html(' <i class="fa fa-upload"></i> Enviar').removeAttr('disabled');                    },4000);

                        setTimeout(function(){
                            uploadObj.reset();
                            obj.container.fadeIn();
                        }, 5000);

                    }

                });

                $('#enviarFotos').click(function(event){
                    event.preventDefault();
                    $(this).html('<i class="fa fa-spinner faa-spin animated"></i> Carregando...').attr('disabled','disabled');
                    uploadObj.startUpload();

                });


            });

        </script>

@endsection