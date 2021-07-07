<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <title>Dashboard</title>

   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('librerias/bootstrap-4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('librerias/datatable/jquery.dataTables.min.css')}}" >
  
    <link rel="stylesheet" href="{{asset('librerias/font-awesome/css/font-awesome.min.css')}}">
    <link href="{{ asset('librerias/datetimepicker/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('librerias/datetimepicker/bootstrap-datepicker.standalone.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">

    @stack('css')
   

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container col-md-12 ">
                <a class="navbar-brand hidden-xs col-2" href="{{ url('/') }}">
                   <img src="{{url('images/logo.png') }}" alt="logo" style="width: 60%;" >
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::check())
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/backend') }}">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Usuarios
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{  route('user') }}">Lista de usaurios</a>
                                    <a class="dropdown-item" href="{{  route('crear.user') }}">Crear Usuarios</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Páginas
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{  route('paginas') }}">Lista de páginas</a>
                                    <a class="dropdown-item" href="{{  route('crear.paginas') }}">Crear páginas</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('media') }}">Multimedia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('menu') }}">Menu</a>
                            </li>
                           
                        @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                           
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    
                                    <img src="{{url('images/user.png') }}" alt="logo_user" style="width: 60px;">
                                    
                                    <i class="fa fa-ellipsis-v" aria-hidden="true" style="margin-left: 0.255em; vertical-align: -12px; font-size: 31px;"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <script src="{{ url('librerias/jquery/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('librerias/popper.min.js') }}" ></script>
    <script src="{{ url('librerias/bootstrap-4/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('librerias/moment.min.js') }}" ></script>
    <script src="{{ asset('librerias/datetimepicker/bootstrap-datepicker.min.js') }}" ></script>
    <script src="{{ asset('librerias/datatable/jquery.dataTables.min.js') }}" ></script>
    <script src="{{ asset('librerias/sweetalert2/sweetalert2.all.min.js') }}" ></script>
    
    @stack('scripts')
    

    
</body>
</html>
