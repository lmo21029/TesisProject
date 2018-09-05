@extends('admin.base')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Registro de Administrador o Administrativo <small></small>
                    </h1>

                </div>
            </div>


            <div class="row">
                <div class="col-lg-6">
                    <div class="panel-heading">

                        @if(isset($edit))
                            {!! Form::model($edit, ['route'=>['registro_roles.update', $edit->id], 'method'=>'patch']) !!}
                        @else
                            {!! Form::open(['method'=>'post', 'route'=>'registro.store']) !!}
                        @endif



                {!! Form::text('name',null,  array('class' => 'form-control', 'placeholder'=>'Nombre')) !!}

                {!! Form::text('apellido', null, array('class' => 'form-control','placeholder'=>'Apellido')) !!}

                {!! Form::text('email', null, array('class' => 'form-control','placeholder'=>'Correo')) !!}

                {!! Form::text('cedula', null, array('class' => 'form-control','placeholder'=>'Ingresa tu cedula')) !!}


                {!! Form::label('codcat', 'Seleccione el rol del usuario') !!}
                {!! Form::select('id_rol', ['1' => 'Administrador', '3' => 'Administrativo',], Input::old('id_rol') )  !!}



                <input name="password" value="{{Input::old('password')}}" type="password" class="form-control col-lg-12" id="exampleInputPassword"
                       placeholder="Password">



                {!! Form::text('direccion', null, array('class' => 'form-control','placeholder'=>'Ingresa tu Direccion')) !!}

                {!! Form::text('telefono', null, array('class' => 'form-control','placeholder'=>'Ingresa tu telefono')) !!}


                            <div class="pull-right">
                                @if(isset($edit))
                                    <button type="submit" class="btn btn-success">Actualizar usuario</button>
                                @else
                                    <button type="submit" class="btn btn-success">Registrar usuario</button>
                                @endif
                            </div>


                {!! Form::close() !!}






            </div>

                    </div>

                    </div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                @if (!$roles->isEmpty())
                    <table class="table table-bordered table-hover table-striped">
                        <tr>
                            <td>ID</td>
                            <td>Nombre usuario</td>
                            <td>Apellido usuario</td>
                            <td>Correo usuario</td>
                            <td>Cedula usuario</td>
                            <td>Tipo de rol</td>
                            <td>Acciones</td>
                        </tr>

                        @foreach($roles as $rols)
                            <tr>
                                <td>{{ $rols->id }}</td>
                                <td>{{ $rols->name }}</td>
                                <td>{{ $rols->apellido }}</td>
                                <td>{{ $rols->email }}</td>
                                <td>{{ $rols->cedula }}</td>
                                <td>{{ $rols->roles->nombre_rol }}</td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['registro_roles.destroy', $rols->id]]) !!}
                                    <a href="{{ URL::to("/registro_roles/{$rols->id}/edit") }}" class="btn btn-warning col-lg-6">Editar</a>
                                    {!! Form::submit('Eliminar', array('class'=>'btn btn-danger col-lg-6')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    {!! $roles->render()!!}
                @else
                    no existe NINGUN registro
                @endif
            </div>
    </div>




    </div>
@stop