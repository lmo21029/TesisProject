@extends('welcome')

@section('content')

    <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="../img/logo2.png" style="position: relative; bottom: 20px;" width="125px" height="100px"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav  navbar-right nav-pills">
                    <li><a href="{{ url('from') }}" class="page-scroll">Inicio</a></li>
                    <li><a href="{{ url('usuario/servicio') }}" class="page-scroll">Servicios</a></li>
                    <li><a href="{{ url('usuario/perfil') }}" class="page-scroll">Perfil</a></li>
                    <li><a href="{{url('from')}}" class="page-scroll">{!! Auth::user()->name !!} {!! Auth::user()->apellido !!}</a></li>
                    <li>
                        <a href="{{url('logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <!-- Home Page
==========================================-->
    <div id="tf-home" class="text-center">
        <div class="overlay">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <!--<div class="col-md-5  toppad  pull-right col-md-offset-3 ">
                            <A href="edit.html" >Edit Profile</A>

                            <A href="edit.html" >Logout</A>
                            <br>
                            <p class=" text-info">May 05,2014,03:00 pm </p>
                        </div>-->
                        <!--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >-->


                        <div class="panel panel-info">
                            <div class="panel-heading" style="background-color: #9d9d9d">
                                <h3 class="panel-title" style="color:#000000">Nombre del Usuario</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3 " align="center"> <img alt="Imagen Perfil" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQCkJyfCTYa2fm-1xRY2i2_8H_USbjmRxSp2cQHLLYhrg8iU5L" class="img-circle img-responsive"> </div>

                                    <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                                      <dl>
                                        <dt>DEPARTMENT:</dt>
                                        <dd>Administrator</dd>
                                        <dt>HIRE DATE</dt>
                                        <dd>11/12/2013</dd>
                                        <dt>DATE OF BIRTH</dt>
                                           <dd>11/12/2013</dd>
                                        <dt>GENDER</dt>
                                        <dd>Male</dd>
                                      </dl>
                                    </div>-->





                                    <div class=" col-md-6 col-lg-6 ">
                                        <table class="table table-user-information">
                                            {!! Form::open(['method'=>'post', 'route'=>'usuario.perfil.store']) !!}

                                            @if(isset($edit))
                                                {!! Form::model($edit, ['route'=>['usuario.perfil.update', $edit->id], 'method'=>'patch']) !!}
                                            @else
                                                {!! Form::open(['method'=>'post', 'route'=>'usuario.perfil.store']) !!}
                                            @endif

                                            <tbody>
                                            <tr>
                                                <td>Nombre:</td>
                                                <td>{!! Form::text('name',null,  array('class' => 'form-control', 'placeholder'=>'Nombre')) !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Apellido:</td>
                                                <td>  {!! Form::text('apellido', null, array('class' => 'form-control','placeholder'=>'Apellido')) !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Correo</td>
                                                <td> {!! Form::text('email', null, array('class' => 'form-control','placeholder'=>'Correo')) !!}</td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>Telefono</td>
                                                <td>{!! Form::text('telefono', null, array('class' => 'form-control','placeholder'=>'Ingresa tu telefono')) !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Direccion</td>
                                                <td>   {!! Form::text('direccion', null, array('class' => 'form-control','placeholder'=>'Ingresa tu Direccion')) !!}</td>
                                            </tr>
                                            <!--<td>Phone Number</td>
                                            <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                                            </td>-->

                                            </tr>

                                            </tbody>
                                        </table>
                                        {!! Form::close() !!}
                                                <!--<a href="#" class="btn btn-primary">My Sales Performance</a>
                                            <a href="#" class="btn btn-primary">Team Sales Performance</a>-->
                                    </div>




                                    @if(isset($edit))
                                        <button type="submit" class="btn btn-success">Actualizar Perfil</button>
                                    @endif

                                    {!! Form::close() !!}

                                    <div class="col-md-3 col-lg-3">

                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer"  style="background-color: #9d9d9d">
                                <!--<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>-->
                        <span class="pull-right">
                            <a href={{URL::to("/usuario/perfil/{$editusuario->id}/edit")}} data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <!--<a data-original-title="Desactivar Usuario" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>-->
                        </span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    </nav>

    <nav id="footer">
        <div class="container">
            <div class="pull-left fnav">
                <p>TODOS LOS DERECHOS RESERVADOS. COPYRIGHT © 2014. diseno por Luiggi Mendonca Andres Rodriguez</p>
            </div>
            <div class="pull-right fnav">
                <ul class="footer-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
@endsection