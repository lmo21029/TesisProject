@extends('adminpersonal.base')
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
                <div class="col-lg-12">
                    <div class="panel-heading">


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
                                                {!! Form::open(['method' => 'PUT', 'route' => ['admin_grua.update', $grua->id]]) !!}

                                                @if($grua->estado != "Inactiva")

                                                    <input type="submit" name="desactivar" value="Desactivar" class="btn btn-warning col-lg-12">

                                                @else

                                                    <input type="submit" name="activar" value="Activar" class="btn btn-success col-lg-12">


                                                @endif

                                                {!! Form::close() !!}

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