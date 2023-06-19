@extends('base.public')

@section('extra-css')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
            text-align: center;
            position: fixed;
            top: 40%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            width: 100%;
            padding: 20px;
        }
    </style>
@endsection

@section('content')
    <!-- The video -->
    <video autoplay muted loop id="bgVideo">
        <source src="http://localhost:8000/assets/videos/bg.mp4" type="video/mp4">
    </video>
    <!-- Optional: some overlay text to describe the video -->
    <div class="content" data-aos="fade-up">
        <h1>{{ env('APP_NAME', 'Laravel') }}</h1>
        <?= \Diolan12\LoremIpsum::instance()
                ->wrap()
                ->sentences(4) ?>
        <!-- Use a button to pause/play the video with JavaScript -->
        <button class="btn waves-light">Explore</button>
        <button class="btn secondary-color">Book Now</button>
    </div>
@endsection

@section('extra-js')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection
