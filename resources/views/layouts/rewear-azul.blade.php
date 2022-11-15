<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ENPJRLEL52"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-ENPJRLEL52');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="playera sustentable, playera ecologica, t-shirt, playera basica, sustentable, sustainable wear, rewear">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/nav.css') }}">
    @livewireStyles
    @stack('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="  {{ route('home.index') }} ">
                <img src="{{ asset('/img/rewear-azul.svg') }}" width="150" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <!-- Inicio -->
                        <a class="nav-link" href="{{ route('home.index') }}">{{ __('Nosotros') }}</a> 
                    </li>
                    <!-- <li class="nav-item pr-3">
                        <a class="nav-link" href="{{ route('about') }}">{{ __('Nosotros') }}</a>
                    </li> -->
                    <li class="nav-item pr-3">
                        <!-- Catalogo -->
                        <a class="btn btn-sm btn-outline-success button-productos" href="{{ route('catalogue.index') }}">{{ __('Productos') }}</a>

                    </li>
                    <!-- <li class="nav-item pr-3">
                        <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
                    </li> -->
                    <li class="nav-item pr-3">
                        <a class="nav-link" href="{{ route('faq') }}">{{ __('FAQ') }}</a>
                    </li>
                    <li class="nav-item pr-3">
                        <a class="nav-link" href="{{ route('contact') }}">{{ __('Contacto') }}</a>
                    </li>
                    <div class="dropdown">
                        @if (session()->get('divisa') == 'MXN')
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-expanded="false" style="color: #f003057ff">
                                MXN
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item gelion-bold" href="{{ route('divisas', 'USD') }}"
                                    style="color: #fff">
                                    USD
                                </a>
                            </div>
                        @else
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-expanded="false" style="color: #f003057ff">
                                USD
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item gelion-bold" href="{{ route('divisas', 'MXN') }}"
                                    style="color: #fff">
                                    MXN
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="bag">
                        @livewire('dropdown-cart')
                    </div>
                    <li class="nav-item pr-3">
                        <a class="nav-link" href="{{ route('profile.index') }}">
                            <i class="fas fa-user"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('set.lang', 'es') }}" class="nav-link">
                            ES
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            |
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('set.lang', 'en') }}" class="nav-link">
                            EN
                        </a>
                    </li>
                </ul>
            </div>
            <div class="d-block d-sm-block d-md-block d-lg-none">
                <div class="bag">
                    @livewire('dropdown-cart')
                </div>
            </div>
        </div>
    </nav>
    @yield('content')


    @include('rewear.footer')
    @livewireScripts
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="/js/carrusel.js"></script>
    @stack('js')
</body>

</html>
