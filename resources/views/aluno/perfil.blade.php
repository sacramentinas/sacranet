@extends('template.principal')

@section('breadcrumb')
    <section class="content-header">
        <h1>
            <?php

            ?>
            <i class="fa fa-user"></i> Alunos
            <a href="{!! Session::get('url',route('alunos.index')) !!}"  class="btn btn-default">&larr; Voltar</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li>Alunos</li>
            <li class="active">Perfil</li>
        </ol>
    </section>

@endsection


@section('conteudo')
    <?php

    if( file_exists( public_path().'/fotoaluno/'.intval($aluno->matricula).'.jpg')){
        $foto = asset('fotoaluno/'.intval($aluno->matricula).'.jpg');

    }else{
        $foto = asset('fotoaluno/foto-indisponivel.png');

    }

    ?>

    <div class="row">





        <div class="col-md-3 ">

            <!-- Profile Image -->
            <div class="box box-info hidden-print">
                <div class="box-body box-profile">
                    <span class="badge bg-teal">{{ $aluno->numero }}</span>
                    <div class="user-image">

                        <img  src=" {!! $foto !!}" >

                    </div>
                    <h3 class="profile-username text-center text-info">{{ str_limit($aluno->nomealuno, 32) }}</h3>
                    <p class="text-center">
                          <span class="badge bg-aqua-active ">
                               {!! $aluno->turma->serie->nome . " - " . $aluno->turma->letra  !!}
                          </span>
                    </p>






                    <h5>Ocorrências</h5>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Positivas</b> <a class="pull-right">{{ $quantidade['positiva'] }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Negativas</b> <a class="pull-right">{{ $quantidade['negativa'] }}</a>
                        </li>
                    </ul>

                    <a href="{!! route('alunos.ocorrencia',[$aluno->id]) !!}" class="btn btn-primary btn-block"> <i class="fa fa-plus">
                        </i> Criar Ocorrencia</a>
                    @if(Auth::admin()->user()->tipo == 'admin' )
                    <a href="{!! route('alunos.editar',[$aluno->id]) !!}" class="btn btn-warning btn-block"> <i class="fa fa-pencil">
                        </i>  Editar</a>
                    @endif

                </div><!-- /.box-body -->
            </div><!-- /.box -->



        </div>





        <div class="col-md-9">

             <div class="nav-tabs-custom">

                        <ul class="nav nav-tabs responsive no-print" id="myTabs">
                            <li  class="active"><a aria-controls="dados" href="#dados">Dados</a></li>
                            <li><a aria-controls="boletim" href="#boletim">Boletim</a></li>
                            <li><a aria-controls="ocorrencias" href="#ocorrencias">Ocorrências</a></li>
                            <li><a aria-controls="senha" href="#senha">Senha</a></li>
                        </ul>


                        <div class="tab-content ">
                            <div role="tabpanel" class="tab-pane active" id="dados" aria-live="dados">


                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td>
                                        <p>
                                          <small><strong>Data de Nascimento:</strong></small>
                                           {{ Carbon\Carbon::parse($aluno->datanascimento)->format("d/m/Y") }}
                                        </p>
                                        </td>
                                        <td>
                                        <p>
                                            <small><strong>Sexo:</strong></small>
                                            {{ ($aluno->sexo == 'M' ? 'Masculino' : 'Feminino' ) }}
                                        </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                        <p>
                                            <small><strong>Endereço:</strong></small>
                                            {{ $aluno->endereco }} - {{ $aluno->bairro }}
                                        </p>
                                        </td>
                                    </tr>
                                    <tr >
                                        <td >
                                        <p>
                                            <small><strong>Telefone:</strong></small>
                                            {{ $aluno->telefone }}
                                            {{ $aluno->telefonecomercial }}
                                            <small><strong>Celular:</strong></small>
                                            {{ $aluno->celular }}

                                        </p>
                                        </td>
                                        <td>
                                        <p>
                                            <small><strong>Email:</strong></small>
                                            {{ $aluno->emailcontratante }}
                                        </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">

                                                       <p>
                                                           <small><strong>Pai:</strong></small>
                                                           {{ $aluno->nomepai }}
                                                       </p>
                                        </td>
                                    </tr>
                                    <tr>

                                         <td>

                                            <p>
                                                <small><strong>Email:</strong></small>
                                                {{ $aluno->emailpai }}
                                            </p>
                                          </td>
                                          <td>

                                            <p>
                                                <small><strong>Telefone:</strong></small>
                                                {{ $aluno->telefonepai }}
                                            </p>
                                          </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">

                                            <p>
                                                <small><strong>Mãe:</strong></small>
                                                {{ $aluno->nomemae }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>

                                            <p>
                                                <small><strong>Email:</strong></small>
                                                {{ $aluno->emailmae }}
                                            </p>
                                        </td>
                                        <td>

                                            <p>
                                                <small><strong>Telefone:</strong></small>
                                                {{ $aluno->telefonemae }}
                                            </p>
                                        </td>
                                    </tr>




                                </table>



                            </div>

                            <div role="tabpanel" class="tab-pane" id="boletim" aria-live="boletim">
                                <table class="table table-bordered table-striped table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Disciplinas</th>
                                        <th>I Unidade</th>
                                        <th>II Unidade</th>
                                        <th>III Unidade</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($aluno->notas as $nota)
                                        <tr>
                                            <td>{{$nota->disciplina->descricao }}</td>
                                            @if($nota->nota1unidade < 6)
                                                <?php $classe = "text-danger" ?>
                                            @else
                                                <?php $classe = "text-primary" ?>
                                            @endif
                                            <td><span class="{{$classe}}">{{$nota->nota1unidade }}</span></td>
                                            @if($nota->nota2unidade < 6)
                                                <?php $classe = "text-danger" ?>
                                            @else
                                                <?php $classe = "text-primary" ?>
                                            @endif
                                            <td><span class="{{$classe}}">{{$nota->nota2unidade }}</span></td>
                                            @if($nota->nota1unidade < 6)
                                                <?php $classe = "text-danger" ?>
                                            @else
                                                <?php $classe = "text-primary" ?>
                                            @endif
                                            <td><span class="{{$classe}}">{{$nota->nota3unidade }}</span></td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>


                            </div>
                            <div role="tabpanel" class="tab-pane" id="ocorrencias" aria-live="ocorrencias">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <!-- The time line -->
                                        <ul class="timeline bg-gray-light">

                                            @foreach($ocorrencias as $data => $o)








                                            <!-- timeline time label -->
                                            <li class="time-label">

                                              <span class="bg-blue">
                                               {{ \Carbon\Carbon::parse($data)->format('d/m/Y') }}
                                              </span>
                                            </li>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->

                                          @foreach($o as $ocorrencia)

                                            <li id="">

                                                @if(isset($ocorrencia->tipoocorrencias[0]))
                                                    @if($ocorrencia->tipoocorrencias[0]->tipo == 'Negativa' )
                                                        <i class="fa fa-thumbs-o-down bg-red"></i>
                                                    @elseif($ocorrencia->tipoocorrencias[0]->tipo == 'Positiva')
                                                        <i class="fa fa-thumbs-o-up bg-green"></i>
                                                    @else
                                                        <i class="fa fa-envelope bg-blue"></i>
                                                    @endif
                                                    @else
                                                            <i class="fa fa-envelope bg-blue"></i>
                                                    @endif

                                                <div class="timeline-item">


                                                  <h3 class="timeline-header"> <span class="text-blue">{{$ocorrencia->disciplina->descricao }}</span> <span class="badge bg-teal"> {{ $ocorrencia->unidadeConverte() }}</span>
                                                      <div class="btn-group pull-right">
                                                      <a href="{!! route('ocorrencias.turma.editar',[$aluno->turma->id,$ocorrencia->id]) !!}" class="btn btn-info btn-xs"> <i class="fa fa-edit"></i> Editar</a>
                                                      <a href="{!! route('ocorrencias.excluir.aluno',[$ocorrencia->id,$aluno->id]) !!}" class="btn btn-danger btn-xs" id="excluir"> <i class="fa fa-remove"></i> Excluir Aluno da Ocorrência</a>

                                                      </div>
                                                  </h3>

                                                    <div class="timeline-body">
                                                      @if(count($ocorrencia->tipoocorrencias))
                                                       <h4 class="text-teal">Ocorrências:</h4>
                                                        <ul>
                                                        @foreach($ocorrencia->tipoocorrencias as $tipo)
                                                            <li>{{$tipo->descricao }}</li>
                                                        @endforeach
                                                        </ul>
                                                      @endif
                                                      @if($ocorrencia->descricao)
                                                      <h4 class="text-aqua">Descrição:</h4>
                                                          {{ $ocorrencia->descricao }}
                                                      @endif


                                                    </div>

                                                </div>

                                            </li>
                                             <!-- END timeline item -->
                                           @endforeach

                                        @endforeach
                                                <li>
                                                    <i class="glyphicon glyphicon-minus bg-gray"></i>
                                                </li>
                                         </ul>
                                    </div><!-- /.col -->
                                </div>




                            </div>
                            <div role="tabpanel" class="tab-pane" id="senha">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <h3>{{$aluno->nomealuno}}</h3>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Série</b> <span class="text-info">  {!! $aluno->turma->serie->nome . " - " . $aluno->turma->letra  !!} </span>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Matrícula</b> <span class="text-info">{{$aluno->matricula}}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Senha</b> <span class="text-info">{{$aluno->senhatexto}}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <p class="text-center"><b>wwww.colegiosacramentinas.com.br</b></p>
                                    </li>

                                </ul>
                            </div>
                        </div>




                    </div>









@endsection

@section('script')
    <script>
       /* $('#myTabs a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')

        })*/
       var hash = window.location.hash;
       hash && $('ul.nav a[href="' + hash + '"]').tab('show');




       $('#myTabs a').click(function (e) {
           e.preventDefault()
           $(this).tab('show');
           window.location.hash = this.hash;
           $('html,body').scrollTop(0);

       });


       $(document).on("click","#excluir",function(e) {
           e.preventDefault();
           var url = $(this).attr('href');
           var row = $(this).parent().parent().parent().parent();



           swal({
                       title: "Você tem certeza?",
                       text: "Este aluno será excluído da Ocorrência e em caso de ser o único, a ocorrência será excluída",
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

                                   row.hide();
                               },
                               error: function(msg){
                                   console.log(msg);
                               }

                           });


                       }
                   });

       });

    </script>

@endsection

