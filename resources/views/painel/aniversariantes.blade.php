
  @extends('template.principal')



@section('breadcrumb')
    <section class="content-header">
        <h1>
            Aniversariantes

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li class="active">Aniversariantes</li>
        </ol>
    </section>

@endsection



@section('conteudo')
    <div class="row">
        {!! Form::open(['route' => 'aniversariantes.index','method' => 'GET','id' => 'form' ] ) !!}
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <i class="fa fa-users"></i>
                    <h3 class="box-title">Mês</h3>


                </div><!-- /.box-header -->
                <div class="box-footer text-black">
                    <div class="input-group">
                        <select class="form-control input-lg" name="m" id="campot">
                            <option value="">Selecione o Mês</option>
                            <option value="1" {!! (Request::input('m') == '1' ) ? "SELECTED" : ""  !!}>Janeiro</option>
                            <option value="2" {!! (Request::input('m') == '2' ) ? "SELECTED" : ""  !!}>Fevereiro</option>
                            <option value="3" {!! (Request::input('m') == '3' ) ? "SELECTED" : ""  !!}>Março</option>
                            <option value="4" {!! (Request::input('m') == '4' ) ? "SELECTED" : ""  !!}>Abril</option>
                            <option value="5" {!! (Request::input('m') == '5' ) ? "SELECTED" : ""  !!}>Maio</option>
                            <option value="6" {!! (Request::input('m') == '6' ) ? "SELECTED" : ""  !!}>Junho</option>
                            <option value="7" {!! (Request::input('m') == '7' ) ? "SELECTED" : ""  !!}>Julho</option>
                            <option value="8" {!! (Request::input('m') == '8' ) ? "SELECTED" : ""  !!}>Agosto</option>
                            <option value="9" {!! (Request::input('m') == '9' ) ? "SELECTED" : ""  !!}>Setembro</option>
                            <option value="10" {!! (Request::input('m') == '10' ) ? "SELECTED" : ""  !!}>Outubro</option>
                            <option value="11" {!! (Request::input('m') == '11' ) ? "SELECTED" : ""  !!}>Novembro</option>
                            <option value="12" {!! (Request::input('m') == '12' ) ? "SELECTED" : ""  !!}>Dezembro</option>

                        </select>
              <span class="input-group-btn">
                <button type="submit"  id="search-btn" class="btn btn-flat btn-success btn-lg"><i class="fa fa-search"></i></button>
              </span>
                    </div>

                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->



        {!! Form::close() !!}
    </div>



    <div class="clearfix"></div>
@if(Request::input('m') )
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <i class="fa fa-users"></i>
                    <h3 class="box-title">Aniversariantes do Mês</h3>
                       @foreach($aniversariantes as $i => $aniversario)
                            <h4>{{ $i.'/'.Request::input('m').'/'.date('Y') }}</h4>
                           @foreach($aniversario as $a)
                               <li><strong>{{ $a->nomealuno }}</strong> -  {!! $a->turma->serie->nome . " - " . $a->turma->letra  !!}</li>
                           @endforeach
                       @endforeach
                </div><!-- /.box-header -->
                <div class="box-footer text-black">
                    </div>
                </div>
            </div>
    </div>
@endif
    @endsection