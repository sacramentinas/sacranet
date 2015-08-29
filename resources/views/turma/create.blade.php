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
            <li class="active">Cadastrar</li>
        </ol>
    </section>


@endsection

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info ">
                <div class="box-header">
                    <h3 class="box-title">Cadastrar Turmas</h3>

                </div><!-- /.box-header -->
                <div class="box-footer text-black">
                    {!! Form::open( ['route' =>'turmas.store','id' => 'form','method' => 'POST'] ) !!}
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
                                    {!! Form::checkbox('','',false,['id' => 'todas']) !!}
                                    Todas
                                </label>
                            </div>

                            <div class="checkbox-inline">
                               <label>
                                    {!! Form::checkbox('turmas[]','A',null) !!}A
                               </label>
                            </div>

                            <div class="checkbox-inline">
                                <label>
                                    {!! Form::checkbox('turmas[]','B',null) !!} B
                                </label>
                            </div>

                            <div class="checkbox-inline">

                               <label>
                                   {!! Form::checkbox('turmas[]','C',null) !!} C
                               </label>
                            </div>

                            <div class="checkbox-inline">
                                <label>
                                    {!! Form::checkbox('turmas[]','D',null) !!} D
                                </label>
                            </div>

                            <div class="checkbox-inline">
                                <label>
                                    {!! Form::checkbox('turmas[]','E',null) !!} E
                                </label>
                            </div>

                            <div class="checkbox-inline">
                               <label>
                                   {!! Form::checkbox('turmas[]','F',null) !!} F
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
    <script>
        $(document).ready(function(){

            $('#form').submit(function(event){
                 event.preventDefault();

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

                    },
                    error   :   function(msg){


                       $.each(msg.responseJSON, function(i,item){
                           $('#'+i).parent().addClass('erro');
                           $('#'+i).parent().append("<small class='text-danger texto-erro'>"+item+"<small>");
                           // console.log(item);
                        });



                        $('.alert-danger').fadeIn('fast');
                        $('#mensagem').animate({top:"0"}, 500);

                        setTimeout(function(){
                            $('#mensagem').animate({top: -$('#mensagem').outerHeight()},1500);
                            $(".alert-danger").fadeOut(3000);
                        },4000);


                    }

                });



            });

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

