@extends('base.dashboard')
@section('extra-css')
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/materialize-stepper@3.1.0/dist/css/mstepper.min.css">
    <style>
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col s12 card-panel">
            <form method="POST" action="?">
                <ul class="stepper vertical">
                    <li class="step">
                        <div class="step-title waves-effect">E-mail</div>
                        <div class="step-content col">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" name="email" type="email" class="validate">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <!-- Your step content goes here (like inputs or so) -->
                            <div class="step-actions">
                                <!-- Here goes your actions buttons -->
                                <button class="waves-effect waves-dark btn next-step"
                                    data-feedback="checkEmail">Next</button>
                            </div>
                        </div>
                    </li>
                    <li class="step">
                        <div class="step-title waves-effect">Password</div>
                        <div class="step-content col">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" name="password" type="password" class="validate">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <!-- Your step content goes here (like inputs or so) -->
                            <div class="step-actions">
                                <!-- Here goes your actions buttons -->
                                <button class="waves-effect waves-dark btn next-step" data-feedback="login">Login</button>
                                <button class="waves-effect waves-dark btn-flat previous-step">Back</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </div>
@endsection
@section('extra-js')
    <!-- JS -->
    <script src="https://unpkg.com/materialize-stepper@3.1.0/dist/js/mstepper.min.js"></script>
    <script>
        function checkEmail(destroyFeedback, form) {
            $.ajax({
                type: 'POST',
                url: "{{ route('dashboard.stepper-email') }}",
                data: $(form).serialize(),
                success: function() {
                    destroyFeedback(true);
                },
                error: function(req) {
                    destroyFeedback(false);
                    M.toast({
                        text: req.responseJSON.message
                    })
                }
            })
        }

        function login(destroyFeedback, form) {
            setTimeout(() => {
                destroyFeedback(false);
                let data = $(form).serialize();
                console.log(data);
                toast('Logged In')
            }, 1000);
        }
        var stepper = document.querySelector('.stepper');
        var stepperInstace = new MStepper(stepper, {
            // options
            firstActive: 0 // this is the default
        })
    </script>
@endsection
