<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Laravelv9x') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand " href="{{ url('/home') }}" style="display: flex; align-items: center;">
                    <div style="width: 32px; height: 32px; overflow: hidden; margin-right: 10px;">
                        <img src="{{ asset('img/livewire.png') }}" alt="Logo" style="width: 100%; height: auto;">
                    </div>
                    {{ config('app.name', 'Laravelv9x') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
					@auth()
                    <ul class="navbar-nav ms-auto">
						<!--Nav Bar Hooks - Do not delete!!-->
						<li class="nav-item">
                            <a href="{{ url('/empresas') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Empresas</a> 
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/empleados') }}" class="nav-link"><i class="fab fa-brands fa-hashnode text-info"></i> Empleados</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/paises') }}" class="nav-link"><i class="fab fa-brands fa-hashnode text-info"></i> Paises</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/regiones') }}" class="nav-link"><i class="fab fa-brands fa-hashnode text-info"></i> Regiones</a>
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/comunas') }}" class="nav-link"><i class="fab fa-brands fa-hashnode text-info"></i> Comunas</a>
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/cargos') }}" class="nav-link"><i class="fab fa-brands fa-hashnode text-info"></i> Cargos</a>
                        </li>


                    </ul>
					@endauth()

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
    @livewireScripts
    <script type="module">
        const addModal = new bootstrap.Modal('#createDataModal');
        const editModal = new bootstrap.Modal('#updateDataModal');
        window.addEventListener('closeModal', () => {
           addModal.hide();
           editModal.hide();
        })
    </script>
</body>
</html>
