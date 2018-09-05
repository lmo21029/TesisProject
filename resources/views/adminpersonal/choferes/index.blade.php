@extends('adminpersonal.base')
@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Choferes <small>estado de los choferes</small>
                    </h1>

                </div>
            </div>

            {{$name = DB::table('choferes')->where('nombre_chofer')->pluck('nombre_chofer')}}

            <div class="row">


                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
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
                                            <td>Acciones</td>
                                        </tr>

                                        @foreach($choferes as $chofer)
                                            <tr>
                                                <td>{{ $chofer->id }}</td>
                                                <td>{{ $chofer->nombre_chofer }}</td>
                                                <td>{{ $chofer->cedula_chofer }}</td>
                                                <td>{{ $chofer->telefono_chofer }}</td>
                                                <td>{{ $chofer->estado }}</td>

                                                <td>
                                                    {!! Form::open(['method' => 'PUT', 'route' => ['admin_chofer.update', $chofer->id]]) !!}

                                                        @if($chofer->estado != "Inactivo")

                                                           <input type="submit" name="desactivar" value="Desactivar" class="btn btn-warning col-lg-12">

                                                            @else

                                                        <input type="submit" name="activar" value="Activar" class="btn btn-success col-lg-12">

                                                    @endif

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