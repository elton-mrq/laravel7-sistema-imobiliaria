<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        @include('layouts._admin._nav')
    </header>

    <main>

        @if (session('status'))

        <div class="container">
            <div class="row">
                <div class="card {{session('status')['class']}}">
                    <div align="center" class="card-content">
                        {{session('status')['msg']}}
                    </div>
                </div>
            </div>
        </div>

        @endif
        
        @yield('content')
    </main>

    <footer class="page-footer blue">
        <div class="container">
            <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">SysAdmin</h5>
                <p class="white-text">Sitema de Administração</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                <li><a class="grey-text text-lighten-3" href="{{ route('admin.principal') }}">Inicio</a></li>
                <li><a class="grey-text text-lighten-3" href="{{ route('site.home') }}">Site</a></li>
                </ul>
            </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
            © 2021 Copyright SysAdmin
            <a class="grey-text text-lighten-4 right" href="#!">Elton Marques</a>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="{{ asset('js/init.js') }}"></script>
</body>
</html>
