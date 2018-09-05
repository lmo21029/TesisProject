@extends('admin.base')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Registro  <small> de choferes</small>
                    </h1>

                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-heading">



            @if(isset($edit))
                {!! Form::model($edit, ['route'=>['choferes.update', $edit->id], 'method'=>'patch']) !!}
            @else
                {!! Form::open(array('method'=>'POST', 'route'=>'choferes.store')) !!}
            @endif

            <div class="form-group">
                {!! Form::label('nomcat', 'Nombre del chofer') !!}
                {!! Form::text('nombre_chofer', Input::old('nombre_chofer'), array('class'=>'form-control', 'placeholder'=>'Nombre chofer')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('codcat', 'Cedula del chofer') !!}
                {!! Form::text('cedula_chofer', Input::old('cedula_chofer'), array('class'=>'form-control', 'placeholder'=>'Cedula chofer')) !!}


                {!! Form::label('codcat', 'Telefono del chofer') !!}
                {!! Form::text('telefono_chofer', Input::old('telefono_chofer'), array('class'=>'form-control', 'placeholder'=>'Telefono chofer')) !!}



                {!! Form::label('codcat', 'Grua adjunta al chofer') !!}
                {!! Form::select('gruas_id', App\Gruas::todogruass(), Input::old('gruas_id'),array('class'=>'form-control')) !!}


                {!! Form::label('codcat', 'Usuario que registra el chofer') !!}
                {!! Form::select('users_id', App\User::todousers(), Input::old('users_id'),array('class'=>'form-control')) !!}



                {!! Form::label('codcat', 'Cantidad de servicios realizados') !!}
                {!! Form::hidden('servicios_realizados',0) !!}





                {!! Form::label('codcat', 'Seleccione el estado del chofer') !!}
                {!! Form::select('estado', [
                     'Activo' => 'Activo',
                     'Inactivo' => 'Inactiva',],

                     Input::old('estado')


                  )  !!}




                <div class="pull-right">
                    @if(isset($edit))
                        <button type="submit" class="btn btn-success">Actualizar Choferes</button>
                    @else
                        <button type="submit" class="btn btn-success">Registrar Choferes</button>
                    @endif

                </div>

                {!! Form::close() !!}


            </div>


                    </div>

                </div>


                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Panel de choferes registrados</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                @if (!$choferes->isEmpty())
                                    <table class="table table-bordered table-hover table-striped">
                                        <tr>
                                            <td>ID</td>
                                            <td>Nombre del chofer</td>
                                            <td>Cedula del chofer</td>
                                            <td>Telefono del chofer</td>
                                            <td>Estado del chofer</td>
                                            <td>Servicios realizados</td>
                                            <td>Acciones</td>
                                        </tr>

                                        @foreach($choferes as $chofer)
                                            <tr>
                                                <td>{{ $chofer->id }}</td>
                                                <td>{{ $chofer->nombre_chofer }}</td>
                                                <td>{{ $chofer->cedula_chofer }}</td>
                                                <td>{{ $chofer->telefono_chofer }}</td>
                                                <td>{{ $chofer->estado }}</td>
                                                <td>{{ $chofer->servicios_realizados }}</td>

                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['choferes.destroy', $chofer->id]]) !!}

                                                    <a href="{{ URL::to("/choferes/{$chofer->id}/edit") }}" class="btn btn-warning col-lg-4">Editar</a>

                                                    {!! Form::submit('Eliminar',  array('class'=>'btn btn-danger col-lg-4' )) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                    {!! $choferes->render()!!}
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