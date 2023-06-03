@extends('base.auth')
@section('extra-css')
    <style>
        .captcha {
            position: relative;
        }
        .captcha img {
            width: 100%;
            height: 110px;
        }

        .reload {

            position: absolute;
            bottom: -13px;
            right: -13px;
        }
    </style>
@endsection
@section('content')
    <br><br><br>
    <div class="row">
        <div class="col s10 offset-s1 m6 offset-m3 l4 offset-l4 xl4 offset-xl4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Login</span>
                    <br>
                    <form class="">
                        <div class="row">
                            <div class="input-field outlined col s12">
                                <input id="text-nik" type="number" placeholder=" ">
                                <label for="text-nik">NIK</label>
                            </div>
                            <br>
                            <div class="input-field outlined col s12">
                                <input id="text-password" type="password" placeholder=" ">
                                <label for="text-password">Password</label>
                            </div>
                            <br>
                            <div class="row col s12">
                                <span class="captcha col s12">
                                    {!! captcha_img() !!}
                                    <a onclick="reCaptcha()" class="reload btn-floating waves-effect waves-light small">
                                        <i class="material-icons right">refresh</i>
                                    </a>
                                </span>
                            </div>
                            <br>
                            <div class="input-field outlined col s12">
                                <input id="text-captcha" type="text" placeholder=" ">
                                <label for="text-captcha">Captcha</label>
                            </div>
                    </form>
                </div>
                <br>
                <div class="card-footer">
                    <div class="row">
                        <button onclick="login()" class="btn waves-effect waves-light col s12">Login
                        </button>
                        <br>
                        <a href="/register" class="btn-flat waves-effect waves-light col s12 center-align">Buat akun
                            <i class="material-icons right">account_circle</i>
                        </a>
                        <br>
                        <a href="/forgot" class="btn-flat waves-effect waves-light col s12 center-align">Lupa password
                            <i class="material-icons right">lock</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-js')
    <script>
        function reCaptcha() {
            $.ajax({
                type: 'GET',
                url: "{{ route('auth.recaptcha') }}",
                success: function(data) {
                    $(".captcha").html(data.captcha);
                    $("#captcha").val("");
                }
            });
        }
        function login(){
            location.href = "{{ route('dashboard') }}";
        }
    </script>
@endsection
