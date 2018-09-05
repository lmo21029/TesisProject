@extends('admin.base')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Confirmar <small> y enviar Servicios</small>
                    </h1>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6">
                    <div class="panel-heading">







                        @if(isset($edit))
                            {!! Form::model($edit, ['route'=>['servicios.update', $edit->id], 'method'=>'patch']) !!}

                        @else
                            {!! Form::open(array('method'=>'POST', 'route'=>'servicios.store', )) !!}

                        @endif



                        <div class="form-group">
                            {!! Form::label('nomcat', 'Origen del servicio') !!}
                            {!! Form::text('origen', Input::old('origen'), array('class'=>'form-control', 'placeholder'=>'Origen')) !!}
                        </div>

                            {!! Form::label('codcat', 'Referencia del origen') !!}
                            {!! Form::text('reforigen', Input::old('reforigen'), array('class'=>'form-control', 'placeholder'=>'Referencia del origen')) !!}

                        <div class="form-group">
                            {!! Form::label('codcat', 'Destino del servicio') !!}
                            {!! Form::text('destino', Input::old('destino'), array('class'=>'form-control', 'placeholder'=>'Destino')) !!}


                            {!! Form::label('codcat', 'Referencia del destino') !!}
                            {!! Form::text('refdestino', Input::old('refdestino'), array('class'=>'form-control', 'placeholder'=>'Referencia del destino')) !!}



                            {!! Form::label('codcat', 'Placa del vehiculo a remolcar') !!}
                            {!! Form::text('placa', Input::old('placa'), array('class'=>'form-control', 'placeholder'=>'Placa del vehiculo a remolcar')) !!}


                            {!! Form::label('codcat', 'Monto del servicio a realizar') !!}
                            {!! Form::text('monto', Input::old('monto'), array('class'=>'form-control', 'placeholder'=>'monto del servicio')) !!}



                            {!! Form::label('codcat', 'Precio del kilometros') !!}
                            {!! Form::text('kilometros', Input::old('kilometros'), array('class'=>'form-control', 'placeholder'=>'precio del kilometro')) !!}


                            {!! Form::label('codcat', 'Tipo del servicio') !!}
                            {!! Form::text('tipo_servicio', Input::old('tipo_servicio'), array('class'=>'form-control', 'placeholder'=>'tipo del servicio')) !!}


                            {!! Form::label('codcat', ' Tipo de cliente') !!}
                            {!! Form::text('tipo_cliente', Input::old('tipo_cliente'), array('class'=>'form-control', 'placeholder'=>'tipo de cliente')) !!}

                            {!! Form::label('codcat', 'Usuario que manda el servicio') !!}
                            {!! Form::select('users_id', App\User::todousers(), Input::old('users_id'),array('class'=>'form-control')) !!}

                            {!! Form::label('codcat', 'Chofer que realiza  el servicio') !!}
                            {!! Form::select('chofer_id', App\Choferes::todochofere(), Input::old('chofer_id'),array('class'=>'form-control')) !!}


                            {!! Form::label('codcat', 'Empresa que solicita el servicio') !!}
                            {!! Form::select('empresa_id', App\Empresas::todoempresa(), Input::old('empresa_id'),array('class'=>'form-control')) !!}

                            {!! Form::hidden('servicios_pagados',0)!!}


                            <div class="pull-right">
                                @if(isset($edit))
                                    <button type="submit" class="btn btn-success">Actualizar Servicio</button>
                                @else
                                    <button type="submit" class="btn btn-success">Registrar Servicio</button>
                                @endif

                            </div>

                            {!! Form::close() !!}


                        </div>


                    </div>

                </div>


                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Panel de SERVICIOS</h3>
                        </div>
                        <div class="panel-body" >
                            <div class="table-responsive">
                                @if (!$servicios->isEmpty())
                                    <table class="table table-bordered table-hover table-striped" style="overflow-x: scroll;">
                                        <tr>
                                            <td>ID</td>
                                            <td>origen</td>
                                            <td>referencia del
                                                origen</td>
                                            <td>destino</td>
                                            <td>referencia del destino</td>
                                            <td>Placa del vehiculo a remolcar</td>
                                            <td>monto</td>
                                            <td>Precio del kilometro</td>
                                            <td>tipo de servicio</td>
                                            <td>tipo de cliente</td>
                                            <td>Usuario que solicita</td>
                                            <td>Chofer que realizara el servicio</td>
                                            <td>Empresa o persona que solicita</td>


                                            <td>Acciones para el administrador</td>
                                        </tr>

                                        @foreach($servicios as $servicio)
                                            <tr>
                                                <td>{{ $servicio->id }}</td>
                                                <td>{{ $servicio->origen }}</td>
                                                <td>{{ $servicio->reforigen }}</td>
                                                <td>{{ $servicio->destino }}</td>
                                                <td>{{ $servicio->refdestino }}</td>
                                                <td>{{ $servicio->placa }}</td>
                                                <td>{{ $servicio->monto }}</td>
                                                <td>{{ $servicio->kilometros }}</td>
                                                <td>{{ $servicio->tipo_servicio }}</td>
                                                <td>{{ $servicio->tipo_cliente }}</td>
                                                <td>{{ $servicio->usuarios->name}}</td>
                                                <td>{{ $servicio->choferes->nombre_chofer}}</td>
                                                <td>{{ $servicio->empresa->nombre_empresa}}</td>


                                                @if (Auth::user()->id_rol == 1)
                                                    <td>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['servicios.destroy', $servicio->id]]) !!}
                                                        <a href="{{ URL::to("/servicios/{$servicio->id}/edit") }}" class="btn btn-warning col-lg-6">Editar</a>
                                                        {!! Form::submit('Eliminar', array('class' => 'btn btn-danger col-lg-6')) !!}
                                                        {!! Form::close() !!}
                                                    </td>

                                                    @endif

                                            </tr>
                                        @endforeach

                                    </table>
                                    {!! $servicios->render()!!}
                                @else
                                    no existe registro
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



@stop