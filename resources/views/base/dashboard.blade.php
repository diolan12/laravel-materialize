@extends('base')
@section('extra-base-css')
    <style>
        .dropdown-content {

        }
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
        <!-- Dropdown Structure -->
        <ul id="dashboard" class="dropdown-content">
            <li><a href="#!">Rekap Laporan Patroli</a></li>
            <li><a href="#!">Performance Core</a></li>
            <li><a href="#!">Tiket Gangguan Backbone</a></li>
        </ul>
        <ul id="app" class="dropdown-content">
            <li><a href="#!">Resume Patroli</a></li>
            <li><a href="#!">Kawal Project P3</a></li>
            <li><a href="#!">Eskalasi</a></li>
            <li><a href="#!">Pengajuan Anggaran</a></li>
        </ul>
        <ul id="inventory" class="dropdown-content">
            <li><a href="#!">Ruas</a></li>
            <li><a href="#!">Ruas Pair</a></li>
            <li><a href="#!">Service</a></li>
            <li><a href="#!">Lokasi</a></li>
            <li><a href="#!">Cluster</a></li>
            <li><a href="#!">Alpro</a></li>
            <li class="{{ Route::is('inventory-team-index') ? 'active' : '' }}"><a href="{{ route('inventory-team-index') }}">Team</a></li>
            <li><a href="#!">Mapping Ruas dan Team</a></li>
        </ul>
        <ul id="visualisasi" class="dropdown-content">
            <li><a href="#!">Visualisasi Desktop</a></li>
            <li><a href="#!">Validasi Titik Sambung</a></li>
        </ul>
        <ul id="user" class="dropdown-content">
            <li><a href="#!"><i class="material-icons small left">account_circle</i>Profil</a></li>
            <li><a href="#!"><i class="material-icons small left">logout</i>Logout</a></li>
        </ul>
        <nav>
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <div class="nav-wrapper">
                <?php
                    $isInventory = Route::is('inventory-team-index'); //|| Route::is('else') || Route::is('else')
                    ?>
                <ul class="left hide-on-med-and-down">
                    <li><a href="sass.html">Absensi</a></li>
                    <li><a class="dropdown-trigger " href="#!" data-target="dashboard">Dashboard<i
                                class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="{{ Route::is('scan-index') ? 'active' : '' }}" href="sass.html">Scan QRCode</a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="app">App<i
                                class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-trigger {{ $isInventory ? 'active' : '' }}" href="#!" data-target="inventory">Inventory<i
                                class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="visualisasi">Visualisasi<i
                                class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="sass.html">Checklist Perangkat</a></li>
                </ul>
                <a class="brand-logo small dropdown-trigger right small" href="#!" data-target="user"><span>Admin</span><img
                        class="circle" src="https://materializeweb.com/images/yuna.jpg"></a>
            </div>
        </nav>
        <ul id="slide-out" class="sidenav">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="https://materializeweb.com/images/office.jpg">
                    </div>
                    <a href="#user"><img class="circle" src="https://materializeweb.com/images/yuna.jpg"></a>
                    <a href="#name"><span class="white-text name">John Doe</span></a>
                    <a href="#email"><span class="white-text email">jdoe@example.com</span></a>
                </div>
            </li>
            <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
            <li><a href="#!">Second Link</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a class="subheader">Subheader</a></li>
            <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
        </ul>

    </header>
    <main>
        <div>
            @yield('content')
        </div>
    </main>
    <footer class="page-footer">
        <div class="container hide">
            <div class="row">
                <div class="l6 s12">
                    <h5>Footer Content</h5>
                    <p>You can use rows and columns here to organize your footer content.</p>
                </div>
                <div class="l4 offset-l2 s12">
                    <h5>Links</h5>
                    <ul>
                        <li><a href="#!">Link 1</a></li>
                        <li><a href="#!">Link 2</a></li>
                        <li><a href="#!">Link 3</a></li>
                        <li><a href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2023 Copyright RNO TReg5
                <a class="right" href="#!">More Links</a>
            </div>
        </div>
    </footer>
@endsection
