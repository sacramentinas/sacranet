@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i>
           Gerenciar Turmas

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li class="active">Turmas</li>
       </ol>
    </section>


@endsection

@section('conteudo')
    <div class="row">
    <div class="col-md-12">
        <div class="box box-info ">

            <div class="box-footer text-black">

                <table class="table table-bordered table-hover" id="dados-tabela">
                    <thead>
                    <tr>
                        <th>Codigo Sei</th>
                        <th>Nome</th>
                        <th></th>
                        <th></th>


                    </tr>
                    </thead>
                </table>



              </div>
 </div>
 </div>
</div>

@endsection


@section('script')




        <script>



            $(document).ready(function(){



               $('#dados-tabela').DataTable({
                    processing: true,
                    serverSide: true,
                    lengthChange: false,
                    pageLength: 1,
                    stateSave: true,
                    ajax: {
                        'url' : '{!! route("turmas.dados") !!}'
                         },
                    columns: [
                    { data: 'cod_sei', name: 'cod_sei' },
                    { data: 'nome', name: 'nome' },
                    {width:'100px', data: 'editar', name: 'editar', orderable: false, searchable: false},
                    {width:'100px', data: 'excluir', name: 'excluir', orderable: false, searchable: false},
                ],
                "language": {
                    url: ' {!! url("plugins/datatables/Portuguese-Brasil.json") !!}'
                }
            });




               /* $(document).on("click","#excluir",function(e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    /*var row = $(this).parent().parent();*/

                    /*
                    swal({
                                title: "Você tem certeza?",
                                text: "Não será possível recuperar esssa turma!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "Excluir",
                                closeOnConfirm: true,
                                closeOnCancel:true,
                            },
                            function(confirmed){
                                if(confirmed){
                                    $.ajax({
                                        type     :   'DELETE',
                                        url      :   url,
                                        dataType :   'json',
                                        encode   :   true,
                                        success: function(msg){

                                            /*  $('.sucesso').html("<i class='icon fa fa-check'></i> "+msg.sucesso)
                                             $('.alert-success').fadeIn('fast');
                                             $('#mensagem').animate({top:"0"}, 500);

                                             setTimeout(function(){
                                             $('#mensagem').animate({top: -$('#mensagem').outerHeight()},1500);
                                             $(".alert-success").fadeOut(3000);
                                             },4000);

                                             $('#dados-tabela').dataTable().fnDeleteRow(row);*/
                /* },
                                        error: function(msg){
                                            console.log(msg);
                                        }

                                    });


                                }
                            });

                });*/







            });
        </script>

@endsection


