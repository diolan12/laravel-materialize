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
                    <form id="form-login">
                        <div class="row">
                            <div class="input-field outlined col s12">
                                <input id="input-email" name="email" type="email" placeholder=" " class="validate">
                                <label for="input-email">Email</label>
                            </div>
                            <br>
                            <div class="input-field outlined col s12">
                                <i onclick="toggleVisibility(this)"
                                    class="material-icons suffix waves-effect">visibility_off</i>
                                <input id="input-password" name="password" type="password" placeholder=" " class="validate">
                                <label for="input-password">Password</label>
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
                                <input id="input-captcha" name="captcha" type="text" onkeyup="enterToLogin(event)"
                                    placeholder=" " class="validate">
                                <label for="input-captcha">Captcha</label>
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
        function enterToLogin(evt) {
            if (evt.key === 'Enter' || evt.keyCode === 13) {
                login()
            }
        }

        function toggleVisibility(el) {
            let password = $('#input-password')[0]
            let element = $(el)
            let status = element.text()
            if (status == 'visibility_off') {
                element.text('visibility')
                password.type = 'text'
                return
            }
            element.text('visibility_off')
            password.type = 'password'
        }

        function reCaptcha() {
            $.ajax({
                type: 'GET',
                url: "{{ route('auth.recaptcha') }}",
                success: function(data) {
                    $(".captcha").html(`${data.captcha}<a onclick="reCaptcha()" class="reload btn-floating waves-effect waves-light small">
                                        <i class="material-icons right">refresh</i>
                                    </a>`);
                    $("#captcha").val("");
                }
            });
        }

        function login() {
            $.ajax({
                type: 'POST',
                url: "{{ route('auth.login') }}",
                data: $('#form-login').serialize(),
                success: function() {
                    M.toast({
                        text: 'Success!'
                    })
                    location.reload()
                },
                error: function(req) {
                    loading(false)
                    if (typeof req.responseJSON.payload.captcha != 'undefined') {
                        M.toast({
                            text: 'Wrong Captcha'
                        })
                        return
                    }
                    M.toast({
                        text: 'Error!'
                    })
                    reCaptcha()
                }
            })
        }
    </script>
@endsection
