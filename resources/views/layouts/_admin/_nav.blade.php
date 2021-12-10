
<nav>
    <div class="nav-wrapper blue">
        <div class="container">
            <a href="#" class="brand-logo">SysAdmin</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ route('admin.principal') }}">Inicio</a></li>
                <li><a target="_blanck" href="{{ route('site.home') }}">Site</a></li>
                    @if (Auth::guest())
                        <li><a href="{{ route('admin.login') }}">Login</a></li>
                    @else
                        <li><a class="dropdown-trigger" href="#!" data-activates="dropdown1">{{ Auth::user()->name }}
                        <i class="material-icons right">arrow_drop_down</i></a></li>

                        <ul id="dropdown1" class="dropdown-content">
                            <li><a href="#">{{Auth::user()->name}}</a></li>
                            @can('usuario_listar')
                                <li><a href="{{route('admin.usuarios')}}">Usuários</a></li>
                            @endcan
                            @can('perfil_listar')
                                <li><a href="{{route('admin.perfil')}}">Perfis de Usuários</a></li>
                            @endcan

                            <li><a href="{{route('admin.paginas')}}">Páginas</a></li>
                            <li><a href="{{route('admin.tipos')}}">Tipos</a></li>
                            <li><a href="{{route('admin.cidades')}}">Cidades</a></li>
                            <li><a href="{{route('admin.imoveis')}}">Imóveis</a></li>
                            <li><a href="{{route('admin.slides')}}">Slides</a></li>
                        </ul>

                        <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                    @endif
            </ul>

            <!-- Mobile -->
            <ul class="side-nav" id="mobile-demo">
                <li><a href="{{ route('admin.principal') }}">Inicio</a></li>
                <li><a target="_blanck" href="{{ route('site.home') }}">Site</a></li>
                @if (Auth::guest())
                  <li><a href="{{ route('admin.login') }}">Login</a></li>
                @else
                    <li><a class="dropdown-triggerasdfasdf" href="#!" data-activates="dropdown1">{{ Auth::user()->name }}
                      <i class="material-icons right">arrow_drop_down</i></a></li>

                      <ul id="dropdown1" class="dropdown-content">
                        <li><a href="#">{{Auth::user()->name}}</a></li>
                            <li><a href="{{route('admin.usuarios')}}">Usuários</a></li>
                            <li><a href="{{route('admin.paginas')}}">Páginas</a></li>
                            <li><a href="{{route('admin.tipos')}}">Tipos</a></li>
                            <li><a href="{{route('admin.cidades')}}">Cidades</a></li>
                            <li><a href="{{route('admin.imoveis')}}">Imóveis</a></li>
                            <li><a href="{{route('admin.slides')}}">Slides</a></li>
                      </ul>

                    <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
