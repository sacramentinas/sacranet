$('.excluirfoto').click(function(){


    $.ajax({
        type     :   'GET',
        url      :   "{!! route('alunos.removerfoto') !!}",
        data     :   {'matricula' : $('#matricula').val() },
        dataType :   'json',
        encode   :   true,
        success  :   function(msg){

            $('.sucesso').html("<i class='icon fa fa-check'></i> "+msg.sucesso)
            $('.alert-success').fadeIn('fast');
            $('#mensagem').animate({top:"0"}, 500);

            setTimeout(function(){
                $('#mensagem').animate({top: -$('#mensagem').outerHeight()},1500);
                $(".alert-success").fadeOut(3000);

            },4000);



            $enderecoatual =  $(".foto-edit").attr('src').split('/');
            $enderecoatual = $enderecoatual.filter(function(e){return e});
            if($enderecoatual[0] == " http:" || $enderecoatual[0] == "http:"){
                $enderecoatual.shift();
            }
            $enderecoatual.pop();
            $enderecoatual = "http://"+$enderecoatual.join("/")+"/foto-indisponivel.png";

            $(".foto-edit").attr('src',$enderecoatual);
            $('.excluirfoto').addClass("invisivel");


        }

    });

});

var uploadObj = $("#fileuploader").uploadFile({
    url: "{!! route('alunos.uploadfotos') !!}",
    fileName:"fotos",
    autoSubmit:true,
    multiple:false,
    sequential:true,
    sequentialCount:1,
    dragDrop:false,
    acceptFiles:"image/*",
    uploadStr:"Selecione a foto",
    dragDropStr: "<span><b>Arraste e solte as imagens</b></span>",
    abortStr:"Cancelar",
    cancelStr:"Cancelar",
    doneStr:"Pronto!",
    multiDragErrorStr: "Plusieurs Drag &amp; Drop de fichiers ne sont pas autorisés.",
    extErrorStr:"Extensão não autorizada:",
    sizeErrorStr:"Tamanho do arquivo inválido:",
    uploadErrorStr:"Upload não está autorizado",
    showDone:true,
    showCancel:false,
    showProgress:false,
    statusBarWidth:'90%',
    dragdropWidth:'500px',
    showStatusAfterSuccess:false,
    showFileCounter:false,
    showQueueDiv: "output",
    onSubmit:function(files)
    {

        $('#carregandoupload').fadeIn();

    },
    dynamicFormData: function()
    {
        var $matricula = $('#matricula').val();
        var data ={ 'matricula': $matricula};
        return data;
    },
    onSuccess:function(files,data,xhr,pd)
    {


        $imagem = data.split('/').pop();
        $enderecoatual =  $(".foto-edit").attr('src').split('/');
        $enderecoatual = $enderecoatual.filter(function(e){return e});
        if($enderecoatual[0] == " http:" || $enderecoatual[0] == "http:"){
            $enderecoatual.shift();
        }
        $enderecoatual.pop();
        $enderecoatual = "http://"+$enderecoatual.join("/")+"/"+$imagem+"?lastmod="+Date.now();
        $(".foto-edit").attr('src',$enderecoatual);
        $('.excluirfoto').removeClass("invisivel");

    },
    afterUploadAll:function(obj)
    {
        $quantidade = obj.getFileCount();

        // console.log(obj);

        $('#carregandoupload').fadeOut(3000);
        $('.sucesso').html("<i class='icon fa fa-check'></i> "+$quantidade+" Foto(s) Enviadas");
        $('.alert-success').fadeIn('fast');
        $('#mensagem').animate({top:"0"}, 500);
        obj.container.fadeOut(1000);

        setTimeout(function(){
            $('#mensagem').animate({top: -$('#mensagem').outerHeight()},1500);
            $(".alert-success").fadeOut(3000);
            $('#enviarFotos').html(' <i class="fa fa-upload"></i> Enviar').removeAttr('disabled');

        },4000);

        setTimeout(function(){
            uploadObj.reset();
            obj.container.fadeIn();
        }, 5000);

    }

});
