<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <script src="https://kit.fontawesome.com/fec0b8725b.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@1&display=swap" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <title>Login</title>
</head>
<style>
    /*reset stylesheet*/
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .text-danger {
        color: red;
    }

    .error {
        color: red;
    }

    .invalid-feedback {
        color: red;
    }

    html {
        text-align: center;
        font-family: 'Roboto', sans-serif;
        color: #000000;
    }

    body {
        min-height: 100vh;
        width: 100%;
    }

    /*********containers*********/
    #god-container {
        background-color: #886227;
        display: flex;
        margin: 12%;
        padding: 0.3%;
        border-radius: 20%;
    }

    #super-container1 {
        background-color: #f2f2f2;
        flex: 1;
        padding-top: 9%;
        border-radius: 5% 0 0 5%;
    }

    #super-container2 {
        background-color: #E5E5E5;
        flex: 3;
        padding-top: 2%;
        border-radius: 0 5% 5% 0;
    }

    /*********titles & paragraphs*******/
    h1 {
        margin-bottom: 2%;
        font-size: 3em;
    }

    .title-h2 {
        padding: 5% 10%;
        font-family: 'Roboto', sans-serif;
        font-size: 3em;
    }

    .subtitle-p {
        padding: 3%;
        font-family: 'Montserrat', sans-serif;
    }

    p,
    label {
        font-family: 'Montserrat', sans-serif;
    }

    /*****buttons*****/

    .button1 {
        margin-top: 6%;
        margin-bottom: 30%;
        width: 40%;
        padding: 3%;
        border-radius: 800px;
        border: 0 solid transparent;
        background-color: #f1c47b;
    }

    .button1:hover,
    .button2:hover {
        background-color: #e79e28
    }

    .button2 {
        background-color: #f1c47b;
        margin-top: 0%;
        margin-bottom: 3%;
        width: 20%;
        padding: 1.5%;
        border-radius: 800px;
        border: 0 solid transparent;
    }

    /******form******/
    .input-div {
        display: block;
        margin: 1%;
    }

    .div-button1 a {
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        padding: 10px 12px;
        width: 100%;
        color: #000;
        max-width: 80%;
        display: inline-block;
    }

    .input-div>input {
        padding: 15px;
        border-radius: 50px;
        background-color: rgb(235, 235, 245);
        border: 0 solid transparent;
    }

    .do-you-subrscibe {
        margin-top: 3%;
        margin-bottom: 1%;
    }

    /*****icons*****/
    .buttons-login {
        margin-bottom: 2%;
    }

    .form-group {
        margin: 0 auto;
        margin-bottom: 20px;
        max-width: 400px;
    }

    .form-group .input-div>input {
        width: 100%
    }

    .fab {
        width: 10%;
        padding: 1%;
        color: rgb(180, 171, 158);
    }

    .fab:hover {
        color: rgb(102, 96, 88);
    }

    .is-invalid {
        border: red 3px solid !important;
    }

    .form-group .error {
        font-size: 13px;
        display: block;
        text-align: left;
        margin-top: 0;
    }
</style>

<body>

    <div id="god-container">
        <div id="super-container1">
            <h2 class="title-h2">Welcome Back! (University)</h2>
            <div class="container-p">
                <!-- <p class="subtitle-p"> To keep connected with us please login with your personal info.</p> -->
                <div class="div-button1">
                    <!-- <a href="#" type="submit" class="btn btn-danger btn-md button1">Sign Up</a> -->
                </div>
            </div>
        </div>

        <br>
        <div id="super-container2">
            <div class="title-container">
                @if (Session::has('error'))
                <div class="alert alert-danger text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                    <p style="color: red;">{{ Session::get('error') }}</p>
                </div>
                @endif
                <h1>Login account</h1>
            </div>

            <div class="buttons-login">
                <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="#"><i class="fab fa-google fa-2x"></i></a>
                <!-- <a href="#"><i class="fab fa-twitter-square fa-2x"></i></a> -->
            </div>
            <div class="container-p">
                <p class="request-data"> or us an e-mail for registration</p>
            </div>
            <div class="form">
                <form method="POST" action="{{ route('university.login') }}" id="login_form">
                    @csrf
                    <div class="form-group">
                        <div class="input-div">
                            <label></label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" placeholder="E-mail">
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-div">
                            <label></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Paswoord">
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-danger btn-md button2">
                        {{ __('Sign In') }}
                    </button>
                    <!-- <h4 class="text-center">Forgot password? <a href="{{ route('university.forgot_password_show')}}">Click here</a>.</h4> -->
                </form>

            </div>
        </div>
    </div>
</body>

</html>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
<script>
</script>