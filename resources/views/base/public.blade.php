@extends('base')
@section('main')
    <header>
        <nav>
            <div class="nav-wrapper">
                <a href="{{route('public.index')}}" class="brand-logo">{{ $head->title }}</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="{{ route('public.about') }}">About</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>
            </div>
        </nav>
        @yield('extra-header')
    </header>
    <main>
        @yield('content')
    </main>
@endsection
