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
                    @if(Auth::check())
                        <li><a href="" class="page-scroll">{!! Auth::user()->name !!} {!! Auth::user()->apellido !!}</a></li>
                    @endif
                    <li>
                        <a href="{{url('logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- Home Page
    ==========================================-->
    <a class="navbar-brand" href="index.html"><img src="../img/logo2.png" style="position: relative; bottom: 20px;" width="280px" height="230px"></a>

    <div id="tf-home" class="text-center">

        <div class="overlay">
            <div class="content">
                <h1><span style="color:#9d9d9d"> Bienvenido a</span><strong><span style="color:#1DD14A"> MRservice</span></strong></h1>
                <p class="lead">Registrate por aca <strong>A&ntilde;os de experiencia </strong> y de <strong>personas extraordinarias</strong></p>


                <a href="#tf-about" class="fa fa-angle-down page-scroll"></a>
            </div>
        </div>

    </div>


    <!-- About Us Page
    ==========================================-->
    <div id="tf-about">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="position: relative; right: 80px;">
                    <img src="img/grua1.png" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h4>La empresa</h4>
                            <h2>Acerca de <strong>nosotros </strong></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <p class="intro">Somos la primera empresa dedicada al servicio de auxilio vial de gruas y otros tipos de servicios a nivel del municipio San Diego y estamos
                        dispuestos brindarle la mejor experiencia a nuestra clientela</p>

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
    <div id="tf-testimonials" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="section-title center">
                    <h2><strong>Mision vision</strong> y objetivos</h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div id="testimonial" class="owl-carousel owl-theme">
                            <div class="item">
                                <h5>La mision principal es ser la principal empresa de servicios de auxilio vial en el municipio san diego estado carabobo</h5>
                                <p><strong>MRservice</strong></p>
                            </div>

                            <div class="item">
                                <h5>La vision seria encontrarnos dentro de un periodo de tiempo con una mayor amplitud de nuestros servicios brindados y con mayor extension del municipio San Diego</h5>
                                <p><strong>MRservice</strong></p>
                            </div>

                            <div class="item">
                                <h5>El objetivo principal de nuestra empresa es brindarle la mejor atencion, dedicacion y servicio de auxilio vial a todos los ciudadados recidentes dentro del municipio San Diego</h5>
                                <p><strong>MRservice</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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





    </body>

@endsection