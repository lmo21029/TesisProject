@extends('admin.base')

@section('content')

    <div id="page-wrapper">

        < class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-4">
                    <h1 class="page-header">
                        Menu  <small>Administrador</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <h3>INFORMACION DE INTERES </h3>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->


            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                     <div class="huge"> {{$usuarios}}   </div>

                                    <div>Usuarios Registrados</div>
                                </div>
                            </div>
                        </div>
                        <a href="registro_roles">
                            <div class="panel-footer">
                                <span class="pull-left">Ver mas detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$choferes}}</div>
                                    <div>Choferes Registrados</div>
                                </div>
                            </div>
                        </div>
                        <a href="choferes">
                            <div class="panel-footer">
                                <span class="pull-left">Ver mas detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$servi}}</div>
                                    <div>Servicios Realizados</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Ver mas detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$pago}}</div>
                                    <div>Choferes Pagados</div>
                                </div>
                            </div>
                        </div>
                        <a href="pagos">
                            <div class="panel-footer">
                                <span class="pull-left">Ver mas detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area de Graficas</h3>
                        </div>
                        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
                        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
                            <div class="container">
                                <div class="container-fluid">
                                    <div id="mainDiv" style="">
                                        <div id="myfirstchart" style="height: 250px;"></div>
                                    </div>

                                    <div class="box box-primary" style="position: relative; bottom: 200px;">
                                        <div class="box-header with-border">
                                            <h3 align="center" class="box-title">Cantidad de servicios y facturas Realizadas por Mes (A&ntilde;o: 2015) </h3>
                                        </div>
                                        <div class="box-body" >
                                            <div class="chart" style="overflow-x: scroll;">
                                                <div id="grafica1" style="height: 400px; "></div>
                                                <script>new Morris.Bar({
                                                        element: 'grafica1',
                                                        data: [
                                                            { mes: 'Enero', value: '{{count(\App\Servicios::whereBetween('created_at',[new DateTime('2015-01-01'),new DateTime('2015-01-30')])->get())}}'},
                                                            { mes: 'Febrero', value: '{{count(\App\Servicios::whereBetween('created_at',[new DateTime('2015-02-01'),new DateTime('2015-02-28')])->get())}}'},
                                                            { mes: 'Marzo', value: '{{count(\App\Servicios::whereBetween('created_at',[new DateTime('2015-03-01'),new DateTime('2015-03-30')])->get())}}'},
                                                            { mes: 'Abril', value: '{{count(\App\Servicios::whereBetween('created_at',[new DateTime('2015-04-01'),new DateTime('2015-04-30')])->get())}}'},
                                                            { mes: 'Mayo', value: '{{count(\App\Servicios::whereBetween('created_at',[new DateTime('2015-05-01'),new DateTime('2015-05-30')])->get())}}'},
                                                            { mes: 'Junio', value: '{{count(\App\Servicios::whereBetween('created_at',[new DateTime('2015-06-01'),new DateTime('2015-06-30')])->get())}}'},
                                                            { mes: 'Julio', value: '{{count(\App\Servicios::whereBetween('created_at',[new DateTime('2015-07-01'),new DateTime('2015-07-30')])->get())}}'},
                                                            { mes: 'Agosto', value: '{{count(\App\Servicios::whereBetween('created_at',[new DateTime('2015-08-01'),new DateTime('2015-08-30')])->get())}}'},
                                                            { mes: 'Noviembre', value:'{{count(\App\Servicios::whereBetween('created_at',[new DateTime('2015-11-01'),new DateTime('2015-11-30')])->get())}}'},

                                                        ],
                                                        xkey: 'mes',
                                                        ykeys: ['value'],
                                                        labels: ['Servicios']
                                                    });</script>
                                            </div>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                   <!-- <iframe frameborder="0" id="charts" width="100%" height="700px"  src="http://bootsnipp-env.elasticbeanstalk.com/iframe/ZkOAl" itemscope="http://schema.org/Code"></iframe> -->
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->



@stop