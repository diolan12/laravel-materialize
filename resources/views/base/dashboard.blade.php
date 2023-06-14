@extends('base')
@section('extra-base-css')
    <style>
        /* sidenav */
        header,
        main,
        footer {
            padding-left: 300px;
        }

        @media only screen and (max-width : 992px) {

            header,
            main,
            footer {
                padding-left: 0;
            }
        }

        /* sidenav active */
        .sidenav li.active {
            background-color: var(--focus-color) !important;
        }

        /* navbar droppable */
        .dropdown-content {}

        .dropdown-content li>a {
            color: var(--primary-color) !important;
        }

        .sidenav {
            padding-left: 0 !important;
        }

        .brand-logo img {
            height: 32px;
        }
    </style>
@endsection
@section('main')
    <header>
        <nav>
            <div class="nav-wrapper">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <a href="{{ route('dashboard') }}" class="brand-logo">{{ env('APP_NAME', 'Laravel') }}</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="{{ route('public.home') }}">Public</a></li>
                    <li><a href="{{ route('auth.me') }}">Profile</a></li>
                    <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                </ul>
            </div>
        </nav>
        <ul id="slide-out" class="sidenav sidenav-fixed">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="/assets/images/office.jpg">
                    </div>
                    <a href="#user"><img class="circle" src="/assets/images/yuna.jpg"></a>
                    <a href="#name"><span class="white-text name">John Doe</span></a>
                    <a href="#email"><span class="white-text email">jdoe@example.com</span></a>
                </div>
            </li>
            <li><a class="subheader">Libraries</a></li>

            <li class="{{ Route::is('dashboard.stats') || Route::is('dashboard') ? 'active' : '' }}"><a
                    href="{{ route('dashboard.stats') }}"><i class="material-icons">insights</i>Chart.js</a></li>
            <li class="{{ Route::is('dashboard.table') ? 'active' : '' }}"><a href="{{ route('dashboard.table') }}"><i
                        class="material-icons">table_chart</i>Tabulator.js</a></li>
            <li class="{{ Route::is('dashboard.map') ? 'active' : '' }}"><a href="{{ route('dashboard.map') }}"><i
                        class="material-icons">map</i>Leaflet.js</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a class="subheader">Components</a></li>
            <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
        </ul>
    </header>
    <main>
        <div>
            @yield('content')
        </div>
    </main>
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                © {{ \Carbon\Carbon::now()->year }} Copyright {{ $app->name }}
                <a class="right" href="{{ route('public.home') }}">Home</a>
            </div>
        </div>
    </footer>
@endsection
