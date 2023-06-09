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

        /* general progress */
        .progress.general {
            margin: 0 !important;
        }

        a.brand-logo {
            margin-left: 16px;
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
    <div id="progress-general" class="progress general">
        <div class="indeterminate"></div>
    </div>
    @yield('main')
    @yield('fab')
    @include('base.component.js')
    @yield('extra-base-js')
    <script>
        let progressGeneral = document.getElementById('progress-general')

        function loading(isLoading) {
            if (progressGeneral.classList.contains('hide')) {
                progressGeneral.classList.remove('hide')
                return
            }
            progressGeneral.classList.add('hide')
        }

        function toast(text){
            M.toast({text: text, classes: 'rounded'});
        }

        M.AutoInit();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajaxSettings.beforeSend = ()=>{loading(true)}
        $.ajaxSettings.complete = ()=>{loading(false)}
        $(document).ready(function() {
            loading(false)
        });
    </script>
    @yield('extra-js')
</body>

</html>
