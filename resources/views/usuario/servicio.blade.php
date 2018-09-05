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
    <a class="navbar-brand" href="index.html"><img src="../img/logo2.png" style="position: relative; bottom: 20px;" width="240px" height="210px"></a>
    <!-- Home Page
==========================================-->
    <div id="tf-home" class="text-center">

        <div class="overlay">
            <div class="content">
                <div id="Mapa">
                    <h1 style="color: whitesmoke; margin-right: 280px;">Mapa</h1>
                    <div class="col-md-9">
                        <div id="map" style="height: 500px; width: 100%; border-radius: 10px;" onload="initAutocomplete()"></div><br>
                    </div>
                    <div class="col-md-3">

                        <form>
                            <!--<div class="carousel slide" id="">-->
                            <div>
                                <!--<div class="carousel-inner">-->
                                <div>
                                    <!--<div class="item active">-->
                                    <div>
                                        <ul class="thumbnails">
                                            <li class="col-md-12">
                                                <div style="position: relative; bottom: 80px;">
                                                    <input style="font-size:20px;" class="btn btn-primary btn-success" type="button" id="" onclick="mylocation()" value="Posicion Actual"><br>
                                                    <label  style="color: #9d9d9d; font-size: 20px;">ORIGEN*</label><br>
                                                    <img src="../img/Check.png" id="check2" style="height: 30px; width:30px; position: absolute; margin-left: 100px; margin-top: 15px; visibility: hidden;" >

                                                    <input type="text" id="searchmap" class="form-control"><br><br>
                                                    <label style="color: #9d9d9d; font-size: 15px;">Referencia Origen*</label><br>
                                                    <input type="text" id="reforigen1" class="form-control" ><br><br>


                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="item">
                                        <ul class="thumbnails">
                                            <li class="col-md-12">
                                                <div class="fff" style="position: relative; bottom: 80px;">
                                                    <label style="color: #9d9d9d; font-size: 20px;">DESTINO</label><br>
                                                    <img src="../img/Check.png" id="check" style="height: 30px; width:30px; position: absolute; margin-left: 100px; margin-top: 15px; visibility: hidden;" >

                                                    <input type="text" id="searchmap1" class="form-control"><br><br><br>
                                                    <label style="color: #9d9d9d; font-size: 15px;">Referencia Destino*</label><br>
                                                    <input type="text" id="refdestino1" class="form-control" ><br><br>
                                                    <label style="color: #9d9d9d; font-size: 15px;">CAMPOS REQUERIDOS(*)</label><br>
                                                    <ul class="control-box">
                                                        <li ><a data-slide="prev" href="" class="btn btn-primary btn-success">Atras</a></li>
                                                        <li><a href="#tf-about2" style="font-size:20px;" class="btn btn-primary btn-success page-scroll" onclick="informacion()">Solicitar</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <script>

                                    </script>

                                </div>

                            </div>
                        </form>

                        <!--<nav>
                            <ul class="control-box pager">
                                <li><a data-slide="prev" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
                                <li><a data-slide="next" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></a></li>
                            </ul>
                        </nav>-->
                    </div>
                </div>
                <!--<a href="#tf-about" class="fa fa-angle-down page-scroll"></a>-->
            </div>
        </div>
    </div>

    <!-- About Us Page
    ==========================================-->
    <div id="tf-about2" >
        <div class="container" style="margin-left: 500px;">
            <div class="row" >
                <div class="col-lg-12" >
                    <div class="about-text">
                        <div class="section-title" >

                            <h1 style="color: white; ">Resumen y termino del Servicio</h1><br><br><br>


                            @if(isset($edit))
                                {!! Form::model($edit, ['route'=>['usuario.servicio.update', $edit->id], 'method'=>'patch']) !!}

                            @else
                                {!! Form::open(array('method'=>'POST', 'route'=>'usuario.servicio.store', )) !!}

                            @endif



                            <div class="form-group" style="color: white; font-size: 20px;">
                               <div class="col-lg-5" id="info1">


                                   {!! Form::label('codcat', 'Placa del vehiculo a remolcar', array('class'=>'resumen') ) !!}
                                   {!! Form::text('placa', Input::old('placa'), array('class'=>'form-control', 'maxlength'=>'7', 'placeholder'=>'Placa del vehiculo a remolcar')) !!}


                                   {!! Form::label('codcat', 'Empresa que solicita el servicio', array('class'=>'resumen')) !!}
                                   {!! Form::select('empresa_id', App\Empresas::todoempresa(), Input::old('empresa_id'),array('class'=>'form-control')) !!}


                                   {!! Form::label('codcat', 'Tipo del servicio',array('class'=>'resumen') ) !!}
                                   {!! Form::select('tipo_servicio', [  'Grua' => 'Grua', 'Plataforma' => 'Plataforma', 'Otros' => 'Otros'],  Input::old('tipo_servicio'), array('id'=>'tiposervicio', 'class'=>'form-control')  )  !!}


                                   {!! Form::hidden('tipo_cliente','usuario')!!}



                                   {!! Form::label('codcat', 'Monto del servicio a realizar', array('class'=>'resumen')) !!}
                                   {!! Form::hidden('monto', Input::old('monto'), array('class'=>'form-control', 'id'=>'monto','', 'placeholder'=>'monto del servicio')) !!}
                                   {!! Form::text('monto', Input::old('monto'), array('class'=>'form-control', 'id'=>'monto2','disabled', 'placeholder'=>'monto del servicio')) !!}




                               </div>

                    <div class="col-lg-5" id="info2">


                        {!! Form::label('nomcat', 'Origen del servicio', array('class'=>'resumen')) !!}
                        {!! Form::hidden('origen', Input::old('origen'), array('class'=>'form-control', 'id'=>'origen', '', 'placeholder'=>'Origen')) !!}
                        {!! Form::text('origen', Input::old('origen'), array('class'=>'form-control', 'id'=>'origen2', 'disabled', 'placeholder'=>'Origen')) !!}


                        {!! Form::label('codcat', 'Referencia del origen', array('class'=>'resumen')) !!}
                        {!! Form::hidden('reforigen', Input::old('reforigen'), array('class'=>'form-control', 'id'=>'reforigen', '', 'placeholder'=>'Referencia del origen')) !!}
                        {!! Form::text('reforigen', Input::old('reforigen'), array('class'=>'form-control', 'id'=>'reforigen2', 'disabled', 'placeholder'=>'Referencia del origen')) !!}


                        {!! Form::label('codcat', 'Destino del servicio', array('class'=>'resumen')) !!}
                        {!! Form::hidden('destino', Input::old('destino'), array('class'=>'form-control', 'id'=>'destino','', 'placeholder'=>'Destino')) !!}
                        {!! Form::text('destino', Input::old('destino'), array('class'=>'form-control', 'id'=>'destino2','disabled', 'placeholder'=>'Destino')) !!}


                        {!! Form::label('codcat', 'Referencia del destino', array('class'=>'resumen')) !!}
                        {!! Form::hidden('refdestino', Input::old('refdestino'), array('class'=>'form-control','id'=>'refdestino', '', 'placeholder'=>'Referencia del destino')) !!}
                        {!! Form::text('refdestino', Input::old('refdestino'), array('class'=>'form-control','id'=>'refdestino2', 'disabled', 'placeholder'=>'Referencia del destino')) !!}


                        <label class="resumen">Distancia</label>
                        <input class="form-control" type="hidden" id="distancia"  >
                        <input class="form-control" type="text" id="distancia2" disabled >

                        {!! Form::hidden('kilometros',200)!!}


                        {!! Form::hidden('servicios_pagados',0)!!}


                            {!! Form::hidden('users_id', Auth::user()->id) !!}





                        </div>


                            </div>


                            <!--

                                <div class="col-md-3">
                                <label>Origen</label><br>
                                <input type="text" id="origen"><br><br>
                                <label>Referencia de Origen</label><br>
                                <input type="text" id="reforigen"><br><br>
                                <label>Destino</label><br>
                                <input type="text" id="destino"><br><br>
                                <label>Referencia de Destino</label><br>
                                <input type="text" id="refdestino"><br><br>
                                <label>Tipo de Servicio</label><br>
                                <input type="text" id="servicio"><br><br>
                            </div>
                            <div class="col-md-3">
                                <label>Tipo de Cliente</label><br>
                                <select id="Factura">
                                    <option></option>
                                    <option onselect="">Empresa</option>
                                    <option onselect="">Particular</option>
                                </select><br><br>
                                <label>Empresa</label><br>
                                <select id="empresa" >
                                    <option></option>
                                    <option onselect="">Empresa</option>
                                    <option onselect="">Particular</option>
                                </select><br><br>


                               <label>Precio</label><br>
                                <input type="text" id="precio">

                            </div>
                        -->


                                <div class="pull-right" id="informacion3">
                                    @if(isset($edit))
                                        <button  type="submit" class="btn btn-success">Actualizar Servicio</button>
                                    @else
                                        <button style="margin-right: 200px; font-size: 25px;"  type="submit" class="btn btn-success">Registrar Servicio</button>
                                    @endif

                                </div>

                            <div class="col-lg-6" style="margin-bottom: 20px;">
                               <!-- <div id="map2" style="height: 300px; width: 100%; border-radius: 10px" ></div>-->


                            </div>


                                {!! Form::close() !!}


                            {!! Form::close() !!}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Team Page
    ==========================================-->


    <!-- Services Section
    ==========================================-->


    <!-- Clients Section
    ==========================================-->


    <!-- Portfolio Section
    ==========================================-->


    <!-- Testimonials Section
    ==========================================-->


    <!-- Contact Section
    ==========================================-->
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