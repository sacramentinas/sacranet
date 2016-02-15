
  @extends('template.principal')



@section('breadcrumb')
    <section class="content-header">
        <h1>
            Listagem de Alunos
            <a href="{!! Session::get('url',route('alunos.index')) !!}"  class="btn btn-default">&larr; Voltar</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li class="active">Listagem</li>
        </ol>
    </section>

@endsection



@section('conteudo')


    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <i class="fa fa-users"></i>
                    <h3 class="box-title">Listagem de Alunos</h3>
                    <h2>{!! $alunos[0]->turma->serie->nome . " - " . $alunos[0]->turma->letra  !!}</h2>
                    <?php
                        $masculino = 0;
                        $feminino = 0;
                    ?>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Numero</th>
                            <th>Nome</th>
                            <th>Data de Nascimento</th>
                        </tr>
                       @foreach($alunos as $i => $a)
                           <tr>
                               <td>{{ $a->numero }} </td>
                               <td><strong>{{ $a->nomealuno }}</strong> </td>
                               <td>{{ \Carbon\Carbon::parse($a->datanascimento)->format("d/m/Y") }}</td>
                           </tr>

                           <?php
                                if($a->sexo == 'M'){
                                    $masculino++;
                                }else{
                                    $feminino++;
                                }

                           ?>

                       @endforeach
                        <tr>

                            <td colspan="3">( Homens = {{$masculino}} | Mulheres = {{$feminino}} )</td>

                        </tr>

                    </table>
                </div><!-- /.box-header -->
                <div class="box-footer text-black">
                    </div>
                </div>
            </div>
    </div>

    @endsection