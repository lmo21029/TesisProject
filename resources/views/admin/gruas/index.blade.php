@extends('admin.base')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        GRUAS <small> VISTA DE LAS GRUAS</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-16">
                    <div class="panel-heading">

                        @if(isset($edit))
                            {!! Form::model($edit, ['route'=>['gruas.update', $edit->id], 'method'=>'patch']) !!}
                        @else
                            {!! Form::open(array('method'=>'POST', 'route'=>'gruas.store')) !!}
                        @endif

                        {!! Form::open(['method'=>'post', 'route'=>'gruas.store']) !!}

                        <div class="form-group col-md-4=">

                            {!! Form::label('codcat', 'Seleccione el estado de la grua') !!}
                            {!! Form::select('tipo_grua', [  'plataforma' => 'Plataforma', 'gancho ' => 'Gancho'],  Input::old('tipo_grua')  )  !!}


                        </div>

                        <div class="form-group col-md-4">

                            {!! Form::label('codcat', 'Seleccione el estado de la grua') !!}
                            {!! Form::select('marca_grua', [  'chevrolet' => 'Chevrolet', 'ford ' => 'Ford', 'chrysler' => 'Chrysler'],  Input::old('marca_grua')  )  !!}

                        </div>


                            <div class="form-group col-md-4">
                            {!! Form::label('codcat', 'Seleccione el estado de la grua') !!}
                            {!! Form::select('estado', [  'Activo' => 'Activo', 'Inactiva' => 'Inactiva', 'Reparacion' => 'Reparacion'],  Input::old('estado')  )  !!}
                    </div>


                            <div class="form-group col-md-4">

                                {!! Form::label('codcat', 'Placa de la grua') !!}
                                {!! Form::text('placa_grua', Input::old('placa_grua'), array('class'=>'form-control', 'placeholder'=>'placa')) !!}
                            </div>





                            <div class="pull-right">
                            @if(isset($edit))
                                <button type="submit" class="btn btn-warning">Actualizar grua</button>
                            @else
                                <button type="submit" class="btn btn-success">Registrar grua</button>
                            @endif
                        </div>

                        {!! Form::close() !!}

                    </div>


                </div>

            </div>



                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Lista de gruas registradas</h3>
                        </div>


                        <div class="panel-body">
                            <div class="table-responsive">
                                    @if (!$gruas->isEmpty())
                                    <table class="table table-bordered table-hover table-striped">
                                        <tr>
                                            <td>ID</td>
                                            <td>tipo grua</td>
                                            <td>Marca grua</td>
                                            <td>Placa grua</td>
                                            <td>Estado de la grua</td>
                                            <td>Acciones</td>
                                        </tr>

                                        @foreach($gruas as $grua)
                                            <tr>
                                                <td>{{ $grua->id }}</td>
                                                <td>{{ $grua->tipo_grua }}</td>
                                                <td>{{ $grua->marca_grua }}</td>
                                                <td>{{ $grua->placa_grua }}</td>
                                                <td>{{ $grua->estado }}</td>





                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['gruas.destroy', $grua->id]]) !!}
                                                    <a href="{{ URL::to("/gruas/{$grua->id}/edit") }}" class="btn btn-warning col-lg-4">Editar</a>
                                                    {!! Form::submit('Eliminar',  array('class'=>'btn btn-danger col-lg-4' )) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                        {!! $gruas->render()!!}
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