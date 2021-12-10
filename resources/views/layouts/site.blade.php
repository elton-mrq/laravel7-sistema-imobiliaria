<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo') }}</title>
    <meta name="description" content="{{ isset($seo['descricao']) ?: config('seo.descricao') }}">

    <!-- Twiter Card Data-->
    <meta name="twiter:card" value="summary">

    <!-- Open Graph -->
    <meta property="org:title" content="{{ isset($seo['titulo']) ?: config('seo.titulo') }}">
    <meta property="org:type" content="website">
    <meta property="org:url" content="{{ isset($seo['url']) ?: config('app.url') }}">
    <meta property="org:image" content="{{ isset($seo['imagem']) ?: config('seo.imagem')}}">
    <meta property="org:description" content="{{ isset($seo['descricao']) ?: config('seo.imagem') }}">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        @include('layouts._site._nav')
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
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                <li><a class="grey-text text-lighten-3" href="{{route('site.home')}}">Home</a></li>
                <li><a class="grey-text text-lighten-3" href="{{route('site.sobre')}}">Sobre</a></li>
                <li><a class="grey-text text-lighten-3" href="{{route('site.contato')}}">Contato</a></li>
                </ul>
            </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
            © 2021 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="{{ asset('js/init.js') }}"></script>
</body>
</html>
