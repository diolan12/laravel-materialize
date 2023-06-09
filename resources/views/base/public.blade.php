@extends('base')
@section('main')
    <header>
        <nav>
            <div class="nav-wrapper">
                <a href="{{ route('public.home') }}" class="brand-logo">{{ $head->title }}</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="{{ route('public.about') }}">About</a></li>
                    <li><a href="!#">Post</a></li>
                    <li><a href="!#">Travel</a></li>
                    <li><a href="<?= route('auth.index') ?>">{{ auth()->check() ? 'Dashboard' : 'Login' }}</a></li>
                </ul>
            </div>
        </nav>
        @yield('extra-header')
    </header>
    <main>
        @yield('content')
    </main>
@endsection
