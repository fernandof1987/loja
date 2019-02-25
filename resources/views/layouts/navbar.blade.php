<!--nav class="navbar navbar-expand-md navbar-light navbar-laravel"-->
<!--nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top"-->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{-- config('app.name', 'Laravel') --}}
            LOJA SIMPLES
            <span class="oi oi-tags"></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <form class="form-inline my-2 my-lg-0" method="POST" action="/products_search">

                    {{--@if(isset(Auth::user()->name))--}}
                        <a href="/order" class="btn btn-outline-info">
                            <span class="oi oi-clipboard"></span>
                            Meus Pedidos
                        </a>
                    {{--@endif--}}

                    &nbsp;

                    <input class="form-control mr-sm-2"
                           type="text"
                           placeholder="Produto ou categoria..."
                           aria-label="Search"
                           name="keyword"
                           value="{{ app('request')->input('search_keyword') }}"
                           required>
                    <button class="btn btn-outline-info" type="submit">
                        <span class="oi oi-magnifying-glass large"></span>
                        Buscar
                    </button>

                    &nbsp;

                    <a href="/cart" class="btn btn-outline-info">
                        @if(isset(session('cart')->items))
                            {{  count(session('cart')->items) }}
                        @else
                            0
                        @endif
                        <span class="oi oi-cart large"></span>
                    </a>

                </form>

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-info" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-info" href="{{ route('register') }}">{{ __('Registrar-se') }}</a>
                        </li>
                    @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-info" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-info" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Sair') }}
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
<br />
<br />