<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Блог') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>

<body>
    <div class="edica-loader"></div>
    <header class="edica-header">
        <div class="container">
            <nav class="row navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand col-6 mr-0" href="{{ route('blog') }}"><h2 class="mb-0">{{ __('Блог') }}</h2></a>
                <div class="collapse navbar-collapse col-6 d-flex justify-content-end" id="edicaMainNav">
                    <ul class="navbar-nav mt-2 mt-lg-0 d-flex align-items-center">
                        @guest
                            <li class="nav-item">
                                <a class="btn btn-info px-3 py-2" href="{{ route('personal') }}">{{ __('Войти') }}</a>
                            </li>
                        @endguest
                        @auth
                            @if ((int) auth()->user()->role === 0)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin') }}" title="{{ __('Панель администратора') }}">
                                        <i class="nav-icon fas fa-cog fa__custom_setting"></i>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item mr-4">
                                <a class="nav-link text-center" href="{{ route('personal') }}" title="{{ __('Личный кабинет') }}">
                                    <i class="nav-icon fa fa-user-circle mb-1 fa__custom" aria-hidden="true"></i>
                                    <p class="mb-0 fs-6" style="font-size: 14px;">{{ auth()->user()->name }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <input type="submit" value="{{ __('Выйти') }}" class="btn btn-info">
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer class="edica-footer py-3 mt-4">
        <div class="container">
            <div class="row justify-content-between align-items-center footer-widget-area py-3 text-center">
                <div class="col-md-6">
                    <a href="{{ route('blog') }}" class="footer-brand-wrapper mb-0"><h2 class="text-white mb-0 text-md-left">{{ __('Блог') }}</h2></a>
                </div>
                <p class="col-md-6 mb-0 text-md-right">© 2022 Все права защищены</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
</body>

</html>
