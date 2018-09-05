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
                <img src="../img/logo2.png" width="125px" height="100px">
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav  navbar-right nav-pills">
                   <li><a href="{{url('welcome')}}" class="page-scroll">Inicio</a></li>
                    <li><a href="{{ url('sign') }}" class="page-scroll">Registrate</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <!-- Home Page
==========================================-->


    <div id="tf-home" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="content ">
                    <h1 > <span style="color:#9d9d9d"> Bienvenido a</span> <strong><span style="color:#1DD14A">MRservice</span></strong></h1>
                    <p class="lead">Registrate por aca <strong>A&ntilde;os de experiencia </strong> y de <strong>personas extraordinarias</strong></p>

                    <div class="col-lg-6">
                    </div>
                </div>
                <div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <h3 class="panel-title">Please sign in</h3>
                            </div>

                            <div class="panel-body">

                                {!! Form::open(['method'=>'post', 'url'=>'login']) !!}
                                    <fieldset>
                                        <div class="form-group">
                                            {!! Form::text('email', null, array('class' => 'form-control','placeholder'=>'tu correo')) !!}
                                        </div>
                                        <div class="form-group">
                                            <input name="password" value="{{Input::old('password')}}" type="password" class="form-control col-lg-12" id="exampleInputPassword"
                                                   placeholder="Password">
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button>
                                    </fieldset>
                                {!! Form::close() !!}
                            </div>
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