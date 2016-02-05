<!DOCTYPE html>
<html>
<head>


    <meta charset="UTF-8">
    <title>SACRANET</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    {!! Html::style('css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons 2.0.0 -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
   {!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
   {!! Html::style('plugins/datatables/dataTables.responsive.css') !!}


    {!! Html::style('css/AdminLTE.min.css') !!}
    {!! Html::style('css/skins/_all-skins.min.css') !!}
    {!! Html::style('css/sweet-alert.css') !!}
    {!! Html::style('css/font-awesome-animation.min.css') !!}
    {!! Html::style('css/uploadfile.css') !!}
    {!! Html::style('plugins/multiselect/css/multi-select.css') !!}
    {!! Html::style('css/estilo.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="wrapper">
    

        <!-- Content Header (Page header) -->
        @yield('breadcrumb')
        <!-- Main content -->
        <section class="content">


            @yield('conteudo')



         </section>




</div>
<!-- jQuery 2.1.4 -->
{!! Html::script('plugins/jQuery/jQuery-2.1.4.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}

{!! Html::script('js/sweet-alert.min.js') !!}
{!! Html::script('js/app.min.js') !!}

{!! Html::script('plugins/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('plugins/datatables/dataTables.bootstrap.min.js') !!}
{!! Html::script('plugins/datatables/dataTables.responsive.min.js') !!}


<script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':'{!! csrf_token() !!}'
        }
    });
</script>


        @yield('script')

</body>
</html>

