<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ $head->title }}{{ $head->subtitle ? ' - ' . $head->subtitle : '' }}</title>

    @include('theme')

    <style>
        body {
            color: var(--font-color-main);
            line-height: 1.6;
            font-size: 16px;
            -webkit-font-smoothing: antialiased;
            background-color: var(--background-color);
        }

        /* Sticky footer */
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
    </style>

    @include('base.component.css')
    @yield('extra-base-css')
    @yield('extra-css')
    <script>
        const theme = localStorage.getItem('theme');
        if (theme) document.documentElement.setAttribute('theme', theme);
    </script>
</head>

<body>
    @yield('main')
    @yield('fab')
    @include('base.component.js')
    @yield('extra-base-js')
    <script>
        M.AutoInit();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('extra-js')
</body>

</html>
