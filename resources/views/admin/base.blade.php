<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Code">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css2/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css2/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css2/sb-admin.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('css2/plugins/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.js"></script>
    <![endif]-->


</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="admin">INICIO ADMINISTRADOR</a>
        </div>

        <img src="../img/logo2.png" width="125px" height="100px">
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {!! Auth::user()->name !!} {!! Auth::user()->apellido !!} <b class="caret"></b></a>
                <ul class="dropdown-menu">


                    <li>
                        <a href="{{url('logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">




                <li>
                    <a href="{{route('gruas.index')}}"><i class="fa fa-fw fa-dashboard"></i> Gruas</a>
                </li>



                <li>

                    <a href="{{route('choferes.index')}}"><i class="fa fa-fw fa-dashboard"></i> Choferes</a>
                </li>



                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-arrows-v"></i> Servicios <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo3" class="collapse">
                        <li>
                            <a href="{{route('servicios.index')}}">Servicios</a>
                        </li>

                    </ul>
                </li>


                <li>
                    <a href="{{route('empresas.index')}}"><i class="fa fa-fw fa-bar-chart-o"></i> Empresas</a>
                </li>


                <li>
                    <a href="{{route('facturas.index')}}"><i class="fa fa-fw fa-wrench"></i> Reportes de Servicios</a>
                </li>


                <li>
                    <a href="{{route('pagos.index')}}"><i class="fa fa-fw fa-file"></i>Pagos a los choferes</a>
                </li>


                <li>
                    <a href="{{route('registro_roles.index')}}"><i class="fa fa-fw fa-file"></i>Registro de Administrador</a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->


    </nav>


    @yield('content')

</div>

<!-- /#wrapper -->

<!-- jQuery -->
<script src="js2/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js2/bootstrap.js"></script>
<script src="js2/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js2/morris.js"></script>
<script src="js2/plugins/morris.min.js"></script>
<script src="js2/plugins/morris-data.js"></script>
<script src="js2/plugins/raphael.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>




</body>

</html>
