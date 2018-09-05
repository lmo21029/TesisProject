@extends('admin.base')

@section('content')


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Registro <small>de empresas</small>
                    </h1>

                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-heading">

                        @if(isset($edit))
                            {!! Form::model($edit, ['route'=>['empresas.update', $edit->id], 'method'=>'patch']) !!}
                        @else
                            {!! Form::open(array('method'=>'POST', 'route'=>'empresas.store')) !!}
                        @endif

                        {!! Form::open(['method'=>'post', 'route'=>'empresas.store']) !!}

                        <div class="form-group">
                            {!! Form::label('nomcat', 'Nombre de su empresa') !!}
                            {!! Form::text('nombre_empresa', Input::old('nombre_empresa'), array('class'=>'form-control', 'placeholder'=>'Nombre empresa')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('codcat', 'RIF de su empresa') !!}
                            {!! Form::text('rif_empresa', Input::old('rif_empresa'), array('class'=>'form-control', 'placeholder'=>'RIF de la empresa')) !!}


                            {!! Form::label('codcat', 'Direccion de su empresa') !!}
                            {!! Form::text('direccion_empresa', Input::old('direccion_empresa'), array('class'=>'form-control', 'placeholder'=>'Direccion de la empresa')) !!}

                            {!! Form::label('codcat', 'Telefono de su empresa') !!}
                            {!! Form::text('telefono_empresa', Input::old('telefono_empresa'), array('class'=>'form-control', 'placeholder'=>'Telefono de su empresa')) !!}

                            <div class="pull-right">
                                @if(isset($edit))
                                    <button type="submit" class="btn btn-success">Actualizar Empresa</button>
                                @else
                                    <button type="submit" class="btn btn-success">Registrar Empresa</button>
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
                            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Panel de empresas registradas</h3>
                        </div>



                        <div class="panel-body">
                            <div class="table-responsive">
                                @if (!$empresas->isEmpty())
                                    <table class="table table-bordered table-hover table-striped">
                                        <tr>
                                            <td>ID</td>
                                            <td>Nombre empresa</td>
                                            <td>Rif empresa</td>
                                            <td>Direccion empresa</td>
                                            <td>Telefono empresa</td>
                                            <td>Acciones</td>
                                        </tr>

                                        @foreach($empresas as $empresa)
                                            <tr>
                                                <td>{{ $empresa->id }}</td>
                                                <td>{{ $empresa->nombre_empresa }}</td>
                                                <td>{{ $empresa->rif_empresa }}</td>
                                                <td>{{ $empresa->direccion_empresa }}</td>
                                                <td>{{ $empresa->telefono_empresa }}</td>
                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['empresas.destroy', $empresa->id]]) !!}
                                                    <a href="{{ URL::to("/empresas/{$empresa->id}/edit") }}" class="btn btn-warning col-lg-6">Editar</a>
                                                    {!! Form::submit('Eliminar', array('class'=>'btn btn-danger col-lg-6')) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                    {!! $empresas->render()!!}
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