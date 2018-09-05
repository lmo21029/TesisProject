@extends('adminpersonal.base')

@section('content')


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        PAGOS <small>realizacion de los pagos a los choferes</small>
                    </h1>

                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-heading">

                        @if(isset($servicios))
                            {!! Form::open(['route'=>['admin_pagos.update', $servicios[0]->chofer_id], 'method'=>'patch']) !!}
                        @else
                            {!! Form::open(array('method'=>'GET', 'route'=>'adminpagos.servicios')) !!}
                        @endif


                            <div class="form-group">
                                {!! Form::label('codcat', 'Chofer que se le paga') !!}
                                {!! Form::select('chofer_id', App\Choferes::todochofere2(), Input::old('chofer_id'),array('class'=>'form-control')) !!}

                            </div>


                            <div class="form-group">



                            <div class="pull-right">
                                @if(isset($servicios))
                                    <button type="submit" class="btn btn-success">Registrar Pago</button>
                                @endif
                            </div>
                                <button type="submit" class="btn btn-success">mostrar servicios</button>

                        </div>

                        {!! Form::close() !!}

                    </div>


                </div>

            </div>


            </table>

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Panel de pagos</h3>
                        </div>



                        <div class="panel-body">
                            <div class="table-responsive">
                                @if(isset($mensaje1))
                                    {{$mensaje1}}
                                    @endif
                                @if (isset($servicios))
                                    <table class="table table-bordered table-hover table-striped">
                                        <tr>
                                            <td>ID</td>
                                            <td>Nombre chofer</td>
                                            <td>monto del servicio</td>
                                            <td>Monto de pago al chofer</td>

                                        </tr>

                                        @foreach($servicios as $servicio)
                                            <tr>
                                                <td>{{ $servicio->id }}</td>
                                                <td>{{ $servicio->chofer_id}}</td>
                                                <td>{{ $servicio->monto}}</td>
                                                <td>{{ $servicio->monto*0.1}}</td>


                                            </tr>
                                        @endforeach

                                    </table>
                                    {!! $servicios->render()!!}
                                @else

                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper --NDO</h1>

 @stop