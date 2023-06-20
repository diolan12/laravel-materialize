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
            background-color: rgba(var(--primary-color-numeric), 0.4) !important;
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

        /* patch for collapsible nav */
        .sidenav.sidenav-fixed .collapsible-header {
            padding: 0 32px;
        }

        div.collapsible-body ul {
            list-style-type: none;
        }

        /* content */

        .row .col {
            margin: 6px;
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
                    <li>
                        <div class="switch">
                            <label>
                                Light
                                <input id="theme-switch" onchange="themeSwitch(this)" type="checkbox">
                                <span class="lever"></span>
                                Dark
                            </label>
                        </div>
                    </li>
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

            <li
                class="no-padding {{ Route::is('dashboard.tabulator') ? 'active' : '' }} {{ Route::is('dashboard.datatable-php') ? 'active' : '' }} {{ Route::is('dashboard.datatable-js') ? 'active' : '' }}">
                <ul class="collapsible collapsible-accordion" style="list-style-type: none;">
                    <li
                        class="{{ Route::is('dashboard.tabulator') ? 'active' : '' }} {{ Route::is('dashboard.datatable-php') ? 'active' : '' }} {{ Route::is('dashboard.datatable-js') ? 'active' : '' }}">
                        <a class="collapsible-header">Tables<i class="material-icons">table_chart</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li class="{{ Route::is('dashboard.tabulator') ? 'active' : '' }}"><a
                                        href="{{ route('dashboard.tabulator') }}">Tabulator.js</a></li>
                                <li class="{{ Route::is('dashboard.datatable-php') ? 'active' : '' }}"><a
                                        href="{{ route('dashboard.datatable-php') }}">DataTables PHP</a></li>
                                <li class="{{ Route::is('dashboard.datatable-js') ? 'active' : '' }}"><a
                                        href="{{ route('dashboard.datatable-js') }}">DataTables JS</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>

            <li class="{{ Route::is('dashboard.map') ? 'active' : '' }}"><a href="{{ route('dashboard.map') }}"><i
                        class="material-icons">map</i>Leaflet.js</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li class="{{ Route::is('dashboard.account') ? 'active' : '' }}"><a href="{{ route('dashboard.account') }}"><i
                        class="material-icons">person</i>Account</a></li>
            <li class="{{ (Route::is('dashboard.post') || Route::is('dashboard.post-at')) ? 'active' : '' }}"><a href="{{ route('dashboard.post') }}"><i
                        class="material-icons">article</i>Post</a></li>

            <li>
                <div class="divider"></div>
            </li>
            <li><a class="subheader">Links</a></li>
            <li><a class="waves-effect" href="https://materializeweb.com/" target="_blank"><i
                        class="material-icons right">open_in_new</i>Materialize CSS</a></li>
            <li><a class="waves-effect" href="https://www.chartjs.org/" target="_blank"><i
                        class="material-icons right">open_in_new</i>Chart.js</a></li>
            <li><a class="waves-effect" href="https://tabulator.info/" target="_blank"><i
                        class="material-icons right">open_in_new</i>Tabulator</a></li>
            <li><a class="waves-effect" href="https://datatables.net/" target="_blank"><i
                        class="material-icons right">open_in_new</i>DataTables</a></li>
            <li><a class="waves-effect" href="https://leafletjs.com/" target="_blank"><i
                        class="material-icons right">open_in_new</i>Leaflet.js</a></li>
            <li><a class="waves-effect" href="https://rishabhp.github.io/bideo.js/" target="_blank"><i
                        class="material-icons right">open_in_new</i>Bideo.js</a></li>
            <li><a class="waves-effect" href="https://michalsnik.github.io/aos/" target="_blank"><i
                        class="material-icons right">open_in_new</i>AOS</a></li>
            <li><a class="waves-effect" href="https://momentjs.com/" target="_blank"><i
                        class="material-icons right">open_in_new</i>Moment.js</a></li>
            <li><a class="waves-effect" href="http://parsleyjs.org/" target="_blank"><i
                        class="material-icons right">open_in_new</i>Parsley.js</a></li>
            <li><a class="waves-effect" href="https://sortablejs.github.io/Sortable/" target="_blank"><i
                        class="material-icons right">open_in_new</i>Sortable.js</a></li>
            <li><a class="waves-effect" href="https://kinark.github.io/Materialize-stepper/" target="_blank"><i
                        class="material-icons right">open_in_new</i>Materialize Stepper</a></li>
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
@section('extra-base-js')
    <script>
        (() => {
            let themeSwitch = document.getElementById('theme-switch');
            let theme = window.localStorage.getItem('theme', 'light')
            if (theme == 'dark') {
                themeSwitch.checked = true;
            } else {
                themeSwitch.checked = false;
            }
        })();

        function themeSwitch(ele) {
            console.log(ele.checked);
            if (ele.checked) {
                window.localStorage.setItem('theme', 'dark')
            } else {
                window.localStorage.setItem('theme', 'light')
            }
            location.reload()
        }
    </script>
@endsection
