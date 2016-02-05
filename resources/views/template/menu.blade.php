<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header"><i class="fa fa-th"></i>  MENU</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa fa-edit"></i>
                    <span>Ocorrências</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if(Auth::admin()->user()->tipo == 'admin' )
                    <li><a href="{!! route('ocorrencias.index') !!}"><i class="fa fa-circle-o"></i>Gerenciar Ocorrências</a></li>
                    @endif
                    <li><a href="{!! route('alunos.index') !!}"><i class="fa fa-circle-o"></i>Adicionar Ocorrências</a></li>

                </ul>
            </li>
            @if(Auth::admin()->user()->tipo == 'admin' )
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-graduation-cap  "></i> <span>Alunos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('alunos.index') !!}"><i class="fa fa-circle-o"></i> Gerenciar Alunos</a></li>
                    <li><a href="{!! route('alunos.cadastrar') !!}"><i class="fa fa-circle-o"></i> Cadastrar Alunos</a></li>
                    <li><a href="{!! route('alunos.importar') !!}"><i class="fa fa-circle-o"></i> Importar Alunos</a></li>
                    <li><a href="{!! route('alunos.fotos') !!}"><i class="fa fa-circle-o"></i> Enviar Fotos</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('notas.importar') }}">
                    <i class="fa fa-users"></i> <span>Notas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('turmas.index') }}">
                    <i class="fa fa-users"></i> <span>Turmas</span>
                </a>
            </li>
             <li class="treeview">
                    <a href="#">
                        <i class="fa fa-graduation-cap  "></i> <span>Usuários</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{!! route('usuarios.index') !!}"><i class="fa fa-circle-o"></i> Gerenciar Usuários</a></li>
                        <li><a href="{!! route('usuarios.cadastrar') !!}"><i class="fa fa-circle-o"></i> Cadastrar Usuários</a></li>

                    </ul>
                </li>
           @endif

            <li>
                <a href="#">
                    <i class="fa fa-calendar"></i> <span>Aniversariantes</span>
                   <!-- <small class="label pull-right bg-red">3</small>-->
                </a>
            </li>




        </ul>
    </section>
    <!-- /.sidebar -->
</aside>