
  @extends('template.principal')



@section('breadcrumb')
    <section class="content-header">
        <h1>
            Painel de Controle

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li class="active">Painel de Controle</li>
        </ol>
    </section>

@endsection



@section('conteudo')
    <div class="row">
        {!! Form::open(['route' => 'alunos.index','method' => 'GET','id' => 'form' ] ) !!}
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header">
                    <i class="fa fa-users"></i>
                    <h3 class="box-title">Turmas</h3>


                </div><!-- /.box-header -->
                <div class="box-footer text-black">
                    <div class="input-group">
                        <select class="form-control input-lg" name="t" id="campot">
                            <option value="">Selecione a Turma</option>
                            @foreach($turmas as $turma)
                                <option value="{!! $turma->id !!}" {!! (Request::input('t') == $turma->id ) ? "SELECTED" : ""  !!}>{!! $turma->serie->nome." - ".$turma->letra !!}</option>

                            @endforeach
                        </select>
              <span class="input-group-btn">
                <button type="submit"  id="search-btn" class="btn btn-flat btn-success btn-lg"><i class="fa fa-search"></i></button>
              </span>
                    </div>

                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->


        <div class="col-md-6">
            <div class="box box-info ">
                <div class="box-header">
                    <i class="fa fa-user"></i>
                    <h3 class="box-title">Busca</h3>

                </div><!-- /.box-header -->
                <div class="box-footer text-black">

                    <div class="input-group">
                        {!! Form::text('p', Request::input('p') ? Request::input('p') : '' ,['class' => 'form-control input-lg','placeholder' => 'Buscar Aluno...','id' => 'campop']) !!}
                  <span class="input-group-btn">
                         <button type="submit"  id="search-btn" class="btn btn-flat btn-info btn-lg"><i class="fa fa-search"></i></button>
                  </span>
                    </div>


                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        {!! Form::close() !!}
    </div>



    <div class="clearfix"></div>

<div class="row">
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-calendar-o"></i>
                <h3 class="box-title">Aniversariantes do dia</h3>

            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped table-bordered ">
                    <tr>
                        <td> <img class="direct-chat-img" src="http://lorempixel.com/output/people-q-c-640-480-4.jpg" alt="message user image"></td>
                        <td><h5>LIVIA MIRANDA BERLINK SANTOS</h5></td>
                        <td> <span class="label label-danger">1ª Série A - Ensino Médio</span></td>

                    </tr>
                    <tr>
                        <td> <img class="direct-chat-img" src="http://lorempixel.com/output/people-q-c-640-480-4.jpg" alt="message user image"></td>
                        <td><h5>LIVIA MIRANDA BERLINK SANTOS</h5></td>
                        <td> <span class="label label-danger">1ª Série A - Ensino Médio</span></td>

                    </tr>
                    <tr>
                        <td> <img class="direct-chat-img" src="http://lorempixel.com/output/people-q-c-640-480-4.jpg" alt="message user image"></td>
                        <td><h5>LIVIA MIRANDA BERLINK SANTOS</h5></td>
                        <td> <span class="label label-danger">1ª Série A - Ensino Médio</span></td>

                    </tr>
                    <tr>
                        <td> <img class="direct-chat-img" src="http://lorempixel.com/output/people-q-c-640-480-4.jpg" alt="message user image"></td>
                        <td><h5>LIVIA MIRANDA BERLINK SANTOS</h5></td>
                        <td> <span class="label label-danger">1ª Série A - Ensino Médio</span></td>

                    </tr>


                </table>
            </div><!-- /.box-body -->

        </div>
    </div>
    <div class="col-md-6">

    </div>
</div>

    @endsection