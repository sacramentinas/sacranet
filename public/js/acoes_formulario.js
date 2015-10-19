    $('#form').submit(function(event){
        event.preventDefault();

        $('#salvar').html('<i class="fa fa-spinner faa-spin animated"></i> Carregando...').attr('disabled','disabled');





        var dados =  $(this).serialize();
        var url = $(this).attr('action');
        var metodo = $("input[name='_method'").attr('value');
        if(!metodo){
            metodo = $(this).attr('method');
        }


        $('.texto-erro').fadeOut();
        $('.texto-erro').remove();
        $('.erro').removeClass('erro');


        $.ajax({
            type     :   metodo,
            url      :   url,
            data     :   dados,
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

                if(metodo != 'PUT'){
                    $('#form').trigger("reset");
                    $('#alunos').multiSelect('refresh');
                }
                $('#salvar').html('<i class="fa fa-save"></i> Salvar').removeAttr('disabled');


            },
            error   :   function(msg){

               // console.log(msg.responseJSON);
                $.each(msg.responseJSON, function(i,item){
                    $('#'+i).parent().addClass('erro');
                    $('#'+i).parent().append("<small class='text-danger texto-erro'>"+item+"<small>");
                    // console.log(item);
                });



                $('.alert-danger').fadeIn('fast');
                $('#mensagem').animate({top:"0"}, 500);
                $('.erro-msg').html("<i class='icon fa  fa-exclamation-triangle'></i> Dados Obrigatórios Não foram Preenchidos");

                setTimeout(function(){
                    $('#mensagem').animate({top: -$('#mensagem').outerHeight()},1500);
                    $(".alert-danger").fadeOut(3000);

                },4000);

                $('#salvar').html('<i class="fa fa-save"></i> Salvar').removeAttr('disabled');
            }

        });



    });


