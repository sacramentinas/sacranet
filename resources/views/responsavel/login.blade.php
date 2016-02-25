@extends('template.responsavel')

@section('breadcrumb')


@endsection



@section('conteudo')




    <div class="login-box">

        <div class="login-logo">
            <a href="#"><b>Sacra</b>NET</a>
        </div>
        <!-- /.login-logo -->


        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(Session::has('erro'))
            <div class="alert alert-danger">
                {!!Session::get('erro') !!}
            </div>
        @endif





        <div class="login-box-body">

            {!! Form::open(['route' => 'responsavel.login', 'method' => 'post']) !!}
                <div class="form-group has-feedback">
                    {!! Form::text('matricula',null,['class' => 'form-control','placeholder' => 'Matricula']) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    {!! Form::password('senha',['class' => 'form-control','placeholder' => 'Senha']) !!}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                    </div>


                </div>
                    <!-- /.col -->
                </div>
        {!! Form::close() !!}


        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

@endsection

@section('script')
    <script>
        document.domain = "colegiosacramentinas.com.br";
        
    </script>

@endsection
