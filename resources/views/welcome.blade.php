<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bazar</title>
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/png">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
  <link rel="stylesheet" href={{asset('assets/css/LineIcons.css')}}>
  <link rel="stylesheet" href="{{asset('assets/css/default.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
</head>
<body >
  <div class="preloader">
    <div class="spin">
      <div class="cube1"></div>
      <div class="cube2"></div>
    </div>
  </div>
  <header class="header-area" style="position: relative;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{route('index')}}" onclick="nopanel();">
              BAZAR
            </a> <!-- Logo -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="bar-icon"></span>
              <span class="bar-icon"></span>
              <span class="bar-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul id="nav" class="navbar-nav ml-auto">
                @guest
                <li class="nav-item active hideSesionStart" >
                  <a href="#" data-toggle="modal" data-target="#iniciaSesion">Iniciar Sesion</a>
                </li>
                <li class="nav-item active hideSesionStart">
                  <a href="#" data-toggle="modal" data-target="#registrarse">Registrarse</a>
                </li>
                @else
                <li class="nav-item active ">
                  <a href="#"  onclick="getPanel();">panel de control</a>
                </li>

                <li class="nav-item active ">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); nopanel(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </li>
                @endguest
              </ul> <!-- navbar nav -->
            </div>
          </nav> <!-- navbar -->
        </div>
      </div> <!-- row -->
    </div> <!-- container -->
  </header>

  <section id='body'>
    <!--====== PRODUCT PART START ======-->
    <section id="product" class="product-area pt-100 pb-130"></section>

    <section id="registro">
      <div class="modal fade" id="registrarse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Registrarse</h5>
              <button type="button" class="close Rreset" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="alert alert-danger" role="alert" id="Rerror">
                algo salio mal revisa el formulario
              </div>
                @csrf
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Nombre: </label>
                  <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required  autofocus>
                  </div>
                </div>
                <div class="form-group row mt-1">
                  <label for="lastname" class="col-md-4 col-form-label text-md-right">Apellido Paterno: </label>
                  <div class="col-md-6">
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"  required autocomplete="lastname" autofocus>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="second_lastname" class="col-md-4 col-form-label text-md-right">Apellido Materno: </label>
                  <div class="col-md-6">
                    <input id="second_lastname" type="text" class="form-control @error('second_lastname') is-invalid @enderror" name="second_lastname"  required autocomplete="second_lastname" autofocus>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="sexo" class="col-md-4 col-form-label text-md-right">Sexo</label>
                  <div class="col-md-6">
                    <select class="form-control @error('sexo') is-invalid @enderror" name="sexo" id="sexo"  required autocomplete="sexo">
                      <option value="1">Masculino</option>
                      <option value="2">Femenino</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mt-1">
                  <label for="remail" class="col-md-4 col-form-label text-md-right">Correo</label>
                  <div class="col-md-6">
                    <input id="remail" type="email" class="form-control @error('email') is-invalid @enderror" name="remail" required autocomplete="remail">
                  </div>
                </div>
                <div class="form-group row mt-1">
                  <label for="repassword" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                  <div class="col-md-6">
                    <input id="repassword" type="password" class="form-control @error('password') is-invalid @enderror" name="repassword" required autocomplete="new-password">
                  </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary Rreset" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="btnRegistro">Guardar</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="iniciar sesion">
      <div class="modal fade" id="iniciaSesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesion</h5>
              <button type="button" class="close reset" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error">
                <strong>Error</strong> Error en los datos
              </div>
              @csrf
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Usuario</label>
                <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>
                  <span class="invalid-feedback" role="alert" id="error"><strong></strong></span>
                </div>
              </div>
              <div class="form-group row mt-3">
                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                </div>
              </div>
            </div>
            <div class="modal-footer mt-3">
              <button type="button" class="btn btn-secondary reset" data-dismiss="modal"id="reset"> Cancelar </button>
              <button type="button" class="btn btn-primary" id="login"> Iniciar sesion </button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>



  <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>
  <script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
  <script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/slick.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{{asset('assets/js/jquery.nav.js')}}}"></script>
  <script src="{{asset('assets/js/jquery.nice-number.min.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="{{asset('/js/ajax.js')}}"></script>
</body>
</html>
