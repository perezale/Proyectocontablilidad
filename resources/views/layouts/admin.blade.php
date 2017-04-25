<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Asoviz</title>

    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script>
    <!-- Font Awesome -->
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('css/nprogress.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
</head>

<body class="nav-md">

    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/home" class="site_title"><i class="fa fa-pagelines"></i> <span>ASOVIZ</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="{{asset('../images/img.jpg')}}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bienvenido,</span>
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">

                            <br /> <br /> <br /><br />

                            <ul class="nav side-menu">
                                @permission('cuentas_manuales')
                                <li><a><i class="fa fa-edit"></i> Cuentas <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/contabilidad-manual">Contabilidad Manual</a></li>
                                        <li><a href="/balance">Balance</a></li>
                                        <li><a href="/kardex">Kardex</a></li>
                                    </ul>
                                </li>
                                @endpermission 
                                @if(Auth::user()->can('crear-usuario')||Auth::user()->can('crear-rol'))
                                <li><a><i class="fa fa-user" aria-hidden="true"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                       @permission('crear-usuario'||'editar-usuario')
                                        <li><a href="/users">Usuarios</a></li>
                                        @endpermission
                                        @permission('crear-rol'||'editar-rol')
                                        <li><a href="/roles">Roles</a></li>
                                        @endpermission
                                    </ul>
                                </li>
                                @endif
                                @permission('administrar-puc')
                                <li><a href="/puc"><i class="fa fa-pied-piper-pp"></i> Administracion del PUC </a>
                                </li>
                                @endpermission
                                @if(Auth::user()->can('facturar-ventas')||Auth::user()->can('facturar-compras'))
                                <li><a><i class="fa fa-shopping-cart"></i> Facturacion <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                       @permission('facturar-ventas')
                                        <li><a href="/ventas">Ventas</a></li>
                                        @endpermission
                                        @permission('facturar-compras')
                                        <li><a href="/compras">Compras</a></li>
                                        @endpermission
                                    </ul>
                                </li>
                                @endif
                                @if(Auth::user()->can('articulo')||Auth::user()->can('categoria'))
                                <li><a><i class="fa fa-building"></i> Almacen <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                       @permission('articulo')
                                            <li><a href="/almacen/articulo">Articulos</a></li>
                                        @endpermission
                                        @permission('categoria')
                                            <li><a href="/almacen/categoria">Categorias</a></li>
                                        @endpermission
                                    </ul>
                                </li>
                                @endif
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="top" title="Logout">
               {{ csrf_field() }}
                <span  class="glyphicon glyphicon-off" aria-hidden="true"></span>
                
              </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset('../images/img.jpg')}}" alt="">{{ Auth::user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="javascript:;"> Perfil</a></li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Ajustes</span>
                                        </a>
                                    </li>
                                    <li><a href="javascript:;">Ayuda</a></li>

                                    <li>
                                        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out pull-right"></i> Salir</a>
                                    </li>
                                </ul>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <?php $articulos = DB::table('articulos')->select('nom_articulo','stock','minimo','maximo')->get(); $cuantos=0;?>
                            @foreach($articulos as $articulo)
                                @if($articulo->stock <= $articulo->minimo)
                                    {{$cuantos++}}
                                @endif
                            @endforeach
                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell-o"></i>
                                    @if($cuantos>0)
                                        <span class="badge bg-green">{{$cuantos}}</span>
                                    @endif
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                   @foreach($articulos as $articulo)
                                        @if($articulo->stock <= $articulo->minimo)
                                            <li>
                                                <a>
                                                    <span>
                                                      <span>{{$articulo->nom_articulo}}</span>
                                                    </span>
                                                    <span class="message">
                                                          El articulo presenta pocas existencias.
                                                    </span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    @include('entrust-gui::partials.notifications')@yield('contenido')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    <a href="https://colorlib.com"></a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
    <!-- jQuery -->
    <!--script src="{{asset('js/jquery.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('js/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('js/nprogress.js')}}"></script>

    <script src="{{asset('js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/transition.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/collapse.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>
