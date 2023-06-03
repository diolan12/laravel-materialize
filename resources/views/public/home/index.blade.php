@extends('base.public')

@section('extra-css')
    <style>
        #bgVideo {
            z-index: -1;
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
        }

        /* Add some content at the bottom of the video/page */
        .content {
            position: fixed;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            width: 100%;
            padding: 20px;
        }

        /* Style the button used to pause/play the video */
        #myBtn {
            width: 200px;
            font-size: 18px;
            padding: 10px;
            border: none;
            background: #000;
            color: #fff;
            cursor: pointer;
        }

        #myBtn:hover {
            background: #ddd;
            color: black;
        }
    </style>
@endsection

@section('content')
    <!-- The video -->
    <video autoplay muted loop id="bgVideo">
        <source src="http://localhost:8000/assets/videos/bg.mp4" type="video/mp4">
    </video>
    <!-- Optional: some overlay text to describe the video -->
    <div class="content">
        <h1>{{ env('APP_NAME', 'Laravel') }}</h1>
        <?= \Diolan12\LoremIpsum::instance()->wrap()->sentences(4) ?>
        <!-- Use a button to pause/play the video with JavaScript -->
        <button id="myBtn" onclick="toggleVideo()">Pause</button>
    </div>
@endsection

@section('extra-js')
    <script>
        // Get the video
        var video = document.getElementById("bgVideo");

        // Get the button
        var btn = document.getElementById("myBtn");

        // Pause and play the video, and change the button text
        function toggleVideo() {
            if (video.paused) {
                video.play();
                btn.innerHTML = "Pause";
            } else {
                video.pause();
                btn.innerHTML = "Play";
            }
        }
    </script>
@endsection
