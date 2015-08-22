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
    <div class="col-md-12">
        <div class="box box-info ">
            <div class="box-header">
                <i class="fa fa-user"></i>
                <h3 class="box-title">Busca</h3>

            </div><!-- /.box-header -->
            <div class="box-footer text-black">
                <form action="#" method="get">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control input-lg" placeholder="Buscar Aluno...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info btn-lg"><i class="fa fa-search"></i></button>
              </span>
                    </div>
                </form>
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <i class="fa fa-users"></i>
                <h3 class="box-title">Turmas</h3>

            </div><!-- /.box-header -->
            <div class="box-footer text-black">
                <form action="#" method="get">
                    <div class="input-group">
                        <select class="form-control input-lg">
                            <option>Selecione a Turma</option>
                            <option value="">1ª Série A</option>
                        </select>
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success btn-lg "><i class="fa fa-search"></i></button>
              </span>
                    </div>
                </form>
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->

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