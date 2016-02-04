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
                    <li><a href="{!! route('ocorrencias.index') !!}"><i class="fa fa-circle-o"></i>Gerenciar Ocorrências</a></li>
                    <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                </ul>
            </li>
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
                <a href="pages/mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mensagens</span>
                    <small class="label pull-right bg-yellow">12</small>
                </a>
            </li>
            <li>
                <a href="{{ route('turmas.index') }}">
                    <i class="fa fa-users"></i> <span>Turmas</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Relatórios</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>
            </li>

            <li>
                <a href="pages/calendar.html">
                    <i class="fa fa-calendar"></i> <span>Aniversariantes</span>
                    <small class="label pull-right bg-red">3</small>
                </a>
            </li>




        </ul>
    </section>
    <!-- /.sidebar -->
</aside>