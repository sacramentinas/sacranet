@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i>
             Tipos de Ocorrência
             <a href="{!! route('tipos.index') !!}" class="btn btn-default">← Voltar</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li>Tipos Ocorrência</li>
            <li class="active">Cadastrar</li>
        </ol>
    </section>


@endsection

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info ">
                <div class="box-header">
                    <h3 class="box-title">Cadastrar Tipos de Ocorrência</h3>

                </div><!-- /.box-header -->
                <div class="box-footer text-black">
                    {!! Form::open( ['route' =>'tipos.store','id' => 'form','method' => 'POST'] ) !!}
                    <div class="row">
                        <div class="col-md-8">
                    {!! Form::label('descricao','Descrição:') !!}
                    {!! Form::text('descricao',null,['class' => 'form-control input-lg','id' => 'descricao']) !!}
                        </div>

                        <div class="col-md-4">
                    {!! Form::label('tipo','Tipo') !!}
                    {!! Form::select('tipo',['' => 'Selecione o Tipo de Ocorrência','Positiva' => 'Positiva', 'Negativa' => 'Negativa','Mensagens' => 'Mensagens'],null,['class' => 'form-control input-lg','id' => 'tipo']) !!}
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
    <script>
        $(document).ready(function(){

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

                        $('#form').trigger("reset");
                        $('#salvar').html('<i class="fa fa-save"></i> Salvar').removeAttr('disabled');


                    },
                    error   :   function(msg){


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


        });
    </script>
@endsection

