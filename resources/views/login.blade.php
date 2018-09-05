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

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav  navbar-right nav-pills">
                    <li><a href="{{url('welcome')}}" class="page-scroll">Inicio</a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <!-- Home Page
==========================================-->
    <div id="tf-home" class="text-center">
        <div class="overlay">
            <div class="content">
                <h1 > <span style="color:#9d9d9d"> Bienvenido a</span> <strong><span style="color:#1DD14A">MRservice</span></strong></h1>
                <p class="lead">Registrate por aca <strong>A&ntilde;os de experiencia </strong> y de <strong>personas extraordinarias</strong></p>

                <div class="center">
                <div class="col-md-12">


                {!! Form::open(['method'=>'post', 'route'=>'registro.store']) !!}


            <div class="col-md-6" style="padding-left: 150px; margin-left: 400px;">


                {!! Form::text('name',null,  array('class' => 'form-control', 'placeholder'=>'Nombre')) !!}

                {!! Form::text('apellido', null, array('class' => 'form-control','placeholder'=>'Apellido')) !!}

                {!! Form::text('email', null, array('class' => 'form-control','placeholder'=>'Correo')) !!}

                {!! Form::text('cedula', null, array('class' => 'form-control','placeholder'=>'Ingresa tu cedula')) !!}


                {!! Form::hidden('id_rol', 2, array('class' => 'form-control','placeholder'=>'id_rol')) !!}


                 <input name="password" value="{{Input::old('password')}}" type="password" class="form-control col-lg-12" id="exampleInputPassword"
                         placeholder="Password">


                {!! Form::text('direccion', null, array('class' => 'form-control','placeholder'=>'Ingresa tu Direccion')) !!}

                {!! Form::text('telefono', null, array('class' => 'form-control','placeholder'=>'Ingresa tu telefono')) !!}

                <button type="submit" class="btn tf-btn btn-success col-lg-4" style="margin-top: 10px; margin-left: 200px;">Submit</button></div>


                {!! Form::close() !!}
                </div>

                </div>
                </div>

            </div>
        </div>
    </div>

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