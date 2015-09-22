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
                            <b>Positivas</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Negativas</b> <a class="pull-right">13,287</a>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Criar Ocorrência</b></a>
                </div><!-- /.box-body -->
            </div><!-- /.box -->



        </div>





        <div class="col-md-9">

             <div class="nav-tabs-custom">

                        <ul class="nav nav-tabs responsive no-print" id="myTabs">
                            <li class="active"><a href="#dados">Dados</a></li>
                            <li><a href="#boletim">Boletim</a></li>
                            <li><a href="#messages">Ocorrências</a></li>
                            <li><a href="#settings">Observações</a></li>
                            <li><a href="#senha">Senha</a></li>
                        </ul>


                        <div class="tab-content ">
                            <div role="tabpanel" class="tab-pane active" id="dados">


                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td>
                                        <p>
                                          <small><strong>Data de Nascimento:</strong></small>
                                          {{$aluno->datanascimento->format('d/m/Y')}}
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
                            <div role="tabpanel" class="tab-pane" id="boletim">
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
                            <div role="tabpanel" class="tab-pane" id="messages">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                            <div role="tabpanel" class="tab-pane" id="settings">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passage..</div>
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
        $('#myTabs a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>

@endsection

