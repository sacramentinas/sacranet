@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i>
           Gerenciar Disciplinas

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li class="active">Disciplinas</li>
       </ol>
    </section>


@endsection

@section('conteudo')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info ">

                <div class="box-footer text-black">

                    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="dados-tabela">
                        <thead>
                        <tr>
                            <th>Descrição</th>
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
                pageLength: 5,
                stateSave: true,
                'fnDrawCallback': function (oSettings) {
                    $('.add').each(function () {
                        $(this).html(' <a href="{{ route('disciplinas.cadastrar') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Cadastrar</a>');
                    });
                },
                ajax: {
                    'url' : '{!! route("disciplinas.dados") !!}'
                },
                columns: [

                    { data: 'descricao', name: 'descricao' },
                    { width:'10%', data: 'acoes', name: 'acoes', orderable: false, searchable: false},


                ],
                "language": {
                    url: ' {!! url("plugins/datatables/Portuguese-Brasil.json") !!}'
                }
            });





            $(document).on("click","#excluir",function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                var row = $(this).parent().parent();


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

                                        $('.sucesso').html("<i class='icon fa fa-check'></i> "+msg.sucesso)
                                        $('.alert-success').fadeIn('fast');
                                        $('#mensagem').animate({top:"0"}, 500);

                                        setTimeout(function(){
                                            $('#mensagem').animate({top: -$('#mensagem').outerHeight()},1500);
                                            $(".alert-success").fadeOut(3000);
                                        },4000);

                                        $('#dados-tabela').dataTable().fnDeleteRow(row);
                                    },
                                    error: function(msg){
                                        console.log(msg);
                                    }

                                });


                            }
                        });

            });







        });
    </script>

@endsection


