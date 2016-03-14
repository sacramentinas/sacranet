@extends('template.responsavel')

@section('breadcrumb')

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
        <div class="col-md-12 col-sm-12">
            <a class="btn btn-primary pull-right" href="{!! route('responsavel.sair') !!}">
                <i class="fa fa-sign-out"></i> Sair
            </a>
        </div>

    </div>
<br>
    <div class="row">

        <div class="col-md-12 col-sm-12">

            <!-- Profile Image -->
            <div class="box box-info">
                <div class="box-body box-profile">
                    <div class="col-md-2 col-sm-2 col-xs-2">
                       <div class="user-image">

                        <img  src=" {!! $foto !!}" >

                       </div>
                    </div>
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <h3 class="profile-username text-info">{{ str_limit($aluno->nomealuno, 32) }}</h3>
                        <p>
                            <small><strong>SÉRIE:</strong></small>
                            {!! $aluno->turma->serie->nome . " - " . $aluno->turma->letra  !!}
                        </p>

                        <p>
                            <small><strong>PAI:</strong></small>
                            {{ $aluno->nomepai }}
                        </p>
                        <p>
                            <small><strong>MÃE:</strong></small>
                            {{ $aluno->nomemae }}
                        </p>
                    </div>

                </div><!-- /.box-body -->
            </div><!-- /.box -->



        </div>





        <div class="col-md-12">

             <div class="nav-tabs-custom">

                        <ul class="nav nav-tabs responsive no-print" id="myTabs">
                            <li class="active"><a href="#ocorrencias">Ocorrências</a></li>
                            <li><a href="#boletim">Boletim</a></li>
                        </ul>


                        <div class="tab-content ">
                            <div role="tabpanel" class="tab-pane active" id="ocorrencias">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <!-- The time line -->
                                     @if(count($ocorrencias))
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

                                                    <li>

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


                                                            <h3 class="timeline-header"> <span class="text-blue">{{$ocorrencia->disciplina->descricao }}</span> <span class="badge bg-teal"> {{ $ocorrencia->unidadeConverte() }}</span></h3>
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
                                         @else
                                        <h4>Nenhuma Ocorrência Cadastrada no Sistema</h4>
                                        @endif
                                    </div><!-- /.col -->
                                </div>




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



                            </div>
                        </div>




                    </div>









@endsection

@section('script')
    <script>
        document.domain = "colegiosacramentinas.com.br";
        $('#myTabs a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>

@endsection

