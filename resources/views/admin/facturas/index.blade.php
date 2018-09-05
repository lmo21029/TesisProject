@extends('admin.base')

@section('content').

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Reportes de servicios <small> </small>
                </h1>

            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel-heading">

                    @if(isset($edit))
                        {!! Form::model($edit, ['route'=>['facturas.update', $edit->id], 'method'=>'patch']) !!}



                        <fieldset disabled>

                            <div class="form-group">
                                {!! Form::label('nomcat', 'Origen del servicio') !!}
                                {!! Form::text('origen', Input::old('origen'), array('class'=>'form-control', 'placeholder'=>'Origen')) !!}
                            </div>

                            <div class="form-group">
                            {!! Form::label('codcat', 'Destino del servicio') !!}
                            {!! Form::text('destino', Input::old('destino'), array('class'=>'form-control', 'placeholder'=>'Destino')) !!}


                            {!! Form::label('codcat', 'Chofer que realizara el servicio') !!}
                            {!! Form::text('placa', Input::old('placa'), array('class'=>'form-control', 'placeholder'=>'placa grua')) !!}


                            {!! Form::label('codcat', 'Monto del servicio a realizar') !!}
                            {!! Form::text('monto', Input::old('monto'), array('class'=>'form-control', 'placeholder'=>'monto del servicio')) !!}


                            {!! Form::label('codcat', 'Precio del kilometros') !!}
                            {!! Form::text('kilometros', Input::old('kilometros'), array('class'=>'form-control', 'placeholder'=>'precio del kilometro')) !!}


                            {!! Form::label('codcat', 'Tipo del servicio') !!}
                            {!! Form::text('tipo_servicio', Input::old('tipo_servicio'), array('class'=>'form-control', 'placeholder'=>'tipo del servicio')) !!}
                        </fieldset>


                        @else
                        {!! Form::open(array('method'=>'POST', 'route'=>'facturas.store')) !!}
                    @endif

                    {!! Form::open(['method'=>'post', 'route'=>'facturas.store']) !!}



                    <div class="form-group">




                    </div>



                    {!! Form::close() !!}

                </div>


            </div>

        </div>


        <div class="row">

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Panel de reportes</h3>
                    </div>



                    <div class="panel-body">
                        <div class="table-responsive">
                            @if (!$servicios->isEmpty())
                                <table class="table table-bordered table-hover table-striped">
                                    <tr>
                                        <td>ID</td>
                                        <td>origen</td>
                                        <td>destino</td>
                                        <td>Chofer</td>
                                        <td>monto</td>
                                        <td>tipo de servicio</td>
                                        <td>Precio del kilometro</td>
                                        <td>Fecha de realizacion</td>

                                        <td>Acciones</td>
                                    </tr>

                                    @foreach($servicios as $servicio)
                                        <tr>
                                            <td>{{ $servicio->id }}</td>
                                            <td>{{ $servicio->origen }}</td>
                                            <td>{{ $servicio->destino }}</td>
                                            <td>{{ $servicio->placa }}</td>
                                            <td>{{ $servicio->monto }}</td>
                                            <td>{{ $servicio->tipo_servicio }}</td>
                                            <td>{{ $servicio->kilometros }}</td>
                                            <td>{{ $servicio->created_at }}</td>

                                            <td>

                                                <a href="{{ URL::to("/facturas/{$servicio->id}/edit") }}" class="btn btn-success col-lg-12 ">Cargar datos para visualizar</a>


                                            </td>
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
<!-- /#page-wrapper --NDO</h1>

@stop