@extends('admin.base')

@section('content')


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        PAGOS <small>Aca se registraran los pagos a los choferes</small>
                    </h1>

                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-heading">

                        @if(isset($edit))
                            {!! Form::model($edit, ['route'=>['pagos.update', $edit->id], 'method'=>'patch']) !!}
                        @else
                            {!! Form::open(array('method'=>'POST', 'route'=>'pagos.store')) !!}
                        @endif

                        {!! Form::open(['method'=>'post', 'route'=>'pagos.store']) !!}


                            <div class="pull-right">
                                @if(isset($edit))
                                @else
                                @endif
                            </div>

                        </div>



                        {!! Form::close() !!}

                    </div>


                </div>

            </div>


            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Tabla de pagos</h3>
                        </div>



                        <div class="panel-body">
                            <div class="table-responsive">
                                @if (!$pagos->isEmpty())
                                    <table class="table table-bordered table-hover table-striped">
                                        <tr>
                                            <td>ID</td>
                                            <td>Nombre chofer que se le paga</td>
                                            <td>cantidad de servicios realizados</td>
                                            <td>Fecha y hora de pago</td>
                                            <td>Monto de pagado al chofer</td>
                                            <td>Acciones</td>

                                        </tr>

                                        @foreach($pagos as $pago)
                                            <tr>
                                                <td>{{ $pago->id }}</td>
                                                <td>{{ $pago->choferes->nombre_chofer}}</td>
                                                <td>{{ $pago->cantidad_servicios }}</td>
                                                <td>{{ $pago->created_at }}</td>
                                                <td>{{ $pago->monto_pago }}</td>

                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['pagos.destroy', $pago->id]]) !!}
                                                    {!! Form::submit('Eliminar', array('class'=>'btn btn-danger col-lg-8')) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                    {!! $pagos->render()!!}
                                @else
                                    no existe NINGUN registro
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