@extends('base.public')

@section('extra-css')
    <style>
        :root {
            --headerOpacity: 1;
            --headerScale: 1;
        }

        @mixin coverer {
            width: 100vw;
            height: 100vh;
            position: absolute;
            top: 0;
            left: 0;
        }

        .video-header {
            position: absolute;
            text-align: center;
            width: 100vw;
            height: 100vh;

            &,
            video,
            .viewport-header {
                @@include coverer;
            }

            video {
                background: brown;
                object-fit: cover;
            }

            .viewport-header {
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 1;
                opacity: var(--headerOpacity);
                transform: scale(var(--headerScale));
            }
        }

        html,
        body {
            height: 100vh;
            overflow-x: hidden;
        }

        html {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 150%;
            line-height: 1.4;
        }

        body {
            margin: 0;
        }



        h1 {
            font-family: 'Syncopate', sans-serif;
            color: white;
            text-transform: uppercase;
            letter-spacing: 3vw;
            line-height: 1.2;
            font-size: 3vw;
            text-align: center;

            span {
                display: block;
                font-size: 10vw;
                letter-spacing: -1.3vw;
            }
        }

        main {
            background: white;
            position: relative;
            padding: 1rem;
            margin-top: 100vh;

            &::before {
                content: "";
                @@include coverer;
                top: -100vh;
            }

            p {
                max-width: 600px;
                margin: 1rem auto;
            }
        }
    </style>
@endsection

@section('extra-header')
    <video src="http://localhost:8000/assets/videos/bg.mp4" autoplay loop playsinline muted></video>
    <div class="viewport-header">
        <h1>
            Explore
            <span>Montana</span>
        </h1>
    </div>
@endsection

@section('content')
    [[[https://codepen.io/chriscoyier/pen/VbqzER]]]
    <div id="circle"></div>
@endsection

@section('extra-js')
    <script>
        var viewportHeader = document.querySelector(".viewport-header");

        document.body.addEventListener("scroll", function(event) {
            var opacity = (document.body.offsetHeight - document.body.scrollTop) / document.body.offsetHeight;
            var scale = (document.body.offsetHeight - document.body.scrollTop) / document.body.offsetHeight;
            document.documentElement.style.setProperty('--headerOpacity', opacity);
            document.documentElement.style.setProperty('--headerScale', scale);
        });
    </script>
@endsection
