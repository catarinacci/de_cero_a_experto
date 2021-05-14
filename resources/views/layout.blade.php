<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> --}}


    <link href="/css/app.css" rel="stylesheet" >


    <title>Mi sitio</title>
</head>
<body>
    <header>

        <?php function activeMenu($url){
            return request()->is($url) ? 'active' : '';
        }?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="{{ activeMenu('/') }} nav-link" aria-current="page" href="{{route('home')}}">Inicio <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="{{ activeMenu('saludo*') }} nav-link active" aria-current="page" href="{{route('saludo', 'Gabriel')}}">Saludo</a>
              </li>
              <li class=" {{ activeMenu('mensaje/create')}} nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('mensaje.create')}}">Contacto</a>
              </li>

              @auth
              <li class="nav-item">
                  <a class="{{ activeMenu('mensaje')}} nav-link active"  aria-current="page" href="{{route('mensaje.index')}}">Mensajes</a>
              </li>
                @if (Auth()->user()->hasRoles(['Administrador', 'Estudiante']))
                <li class="nav-item">
                    <a class="{{ activeMenu('usuarios')}} nav-link active"  aria-current="page" href="{{route('usuarios.index')}}">Usuarios</a>
                </li>
                @endif
              @endauth

              @guest
                  <li class="nav-item">
                      <a class="{{ activeMenu('login')}} nav-link active" aria-current="page" href="/login">Login</a>
                  </li>
              @else
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{auth()->user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="/logout" >Crerrar seción</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li>

              @endguest


            </ul>
          </div>
        </nav>
    </header>
    @yield('contenido')
    <div class="container">
        <footer>Copyright {{date('Y')}}</footer>
    </div>
    {{-- <script src="/js/app" type="tex/javascrip"></script> --}}
    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
