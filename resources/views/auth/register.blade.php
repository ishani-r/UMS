<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Welcome Student Portal</title>

   <!-- Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

   <!-- Styles -->
   <style>
      body {
         background: url("https://png.pngtree.com/background/20210709/original/pngtree-school-season-student-start-school-supplies-discount-picture-image_954651.jpg");
         background-attachment: fixed;
         background-repeat: no-repeat;
         background-size: 100%;
         /* background-color: rgb(228, 229, 247); */
      }

      .social-login img {
         width: 24px;
      }

      a {
         text-decoration: none;
      }

      .card {
         font-family: sans-serif;
         width: 440px;
         margin-left: auto;
         margin-right: auto;
         margin-top: 3em;
         margin-bottom: 3em;
         border-radius: 10px;
         background-color: #ffff;
         padding: 1.8rem;
         box-shadow: 2px 5px 20px rgba(0, 0, 0, 0.1);
      }

      .title {
         text-align: center;
         font-weight: bold;
         margin: 0;
      }

      .subtitle {
         text-align: center;
         font-weight: bold;
      }

      .btn-text {
         margin: 0;
      }

      .social-login {
         display: flex;
         justify-content: center;
         gap: 5px;
      }

      .google-btn {
         background: #fff;
         border: solid 2px rgb(245 239 239);
         border-radius: 8px;
         font-weight: bold;
         display: flex;
         padding: 10px 10px;
         flex: auto;
         align-items: center;
         gap: 5px;
         justify-content: center;
      }

      .fb-btn {
         background: #fff;
         border: solid 2px rgb(69, 69, 185);
         border-radius: 8px;
         padding: 10px;
         display: flex;
         align-items: center;
      }

      .or {
         text-align: center;
         font-weight: bold;
         border-bottom: 2px solid rgb(245 239 239);
         line-height: 0.1em;
         margin: 25px 0;
      }

      .or span {
         background: #fff;
         padding: 0 10px;
      }

      .email-login {
         display: flex;
         flex-direction: column;
      }

      .email-login label {
         color: #2C3E50;
      }

      input[type="text"],
      input[type="password"] {
         padding: 10px 20px;
         margin-top: 8px;
         margin-bottom: 10px;
         border: 1px solid #ccc;
         border-radius: 8px;
         box-sizing: border-box;
      }

      .cta-btn {
         background-color: rgb(69, 69, 185);
         color: white;
         padding: 18px 20px;
         margin-top: 10px;
         margin-bottom: 20px;
         width: 100%;
         border-radius: 10px;
         border: none;
      }

      .forget-pass {
         text-align: center;
         display: block;
      }
      .error {
      color: red;
   }
   </style>

</head>

<body class="antialiased">
   <div class="card">
      <!-- <form"> -->
      <h2 class="title" style="color:#C70039"> Register In Student Panel</h2>
      <p class="subtitle">You have an account? <a href="{{ route('welcome') }}"> sign In</a></p>

      <!-- <p class="or"><span>or</span></p> -->
      <br>
      <form method="POST" action="{{ route('register') }}" id="register" enctype="multipart/form-data">
         @csrf
         <div class="email-login">
            <!-- Name -->
            <label for="name"> <b>Name</b></label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Enter Name" autofocus>
            @error('name')
            <span role="alert">
               <strong style="color:red;">{{$message}}</strong>
            </span>
            @enderror

            <!-- Email -->
            <label for="email"> <b>Email</b></label>
            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Enter email" autofocus>
            @error('email')
            <span role="alert">
               <strong style="color:red;">{{$message}}</strong>
            </span>
            @enderror

            <!-- Contact No -->
            <label for="contact_no"> <b>Contact No</b></label>
            <input id="contact_no" type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no') }}" autocomplete="contact_no" placeholder="Enter Contact No" autofocus>
            @error('contact_no')
            <span role="alert">
               <strong style="color:red;">{{$message}}</strong>
            </span>
            @enderror

            <!-- Gender -->
            <label for="contact_no"> <b>Gender</b></label>
            <div class="col-md-6">
               <input type="radio" name="gender" value="M">Male
               <input type="radio" name="gender" value="F">Female
            </div>
            @error('gender')
            <span role="alert">
               <strong style="color:red;">{{$message}}</strong>
            </span>
            @enderror
            <br>
            <!-- Address -->
            <label for="address"> <b>Address</b></label>
            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" placeholder="Enter Address" autofocus>
            @error('address')
            <span role="alert">
               <strong style="color:red;">{{$message}}</strong>
            </span>
            @enderror

            <!-- DOB -->
            <label for="dob"> <b>DOB</b></label>
            {{Form::date('dob','',['class'=>'txtDate'])}}
            @error('dob')
            <span role="alert">
               <strong style="color:red;">{{$message}}</strong>
            </span>
            @enderror

            <br>
            <!-- Adhaar Card No -->
            <label for="adhaar_card_no"> <b>Adhaar Card No</b></label>
            <input autocomplete='off' type='text' class="card-number @error('adhaar_card_no') is-invalid @enderror" maxlength="19" id="adhaar_card_no" name="adhaar_card_no" size='20' value="{{ old('adhaar_card_no') }}" placeholder="Enter Adhaar Card No">
            @error('adhaar_card_no')
            <span role="alert">
               <strong style="color:red;">{{$message}}</strong>
            </span>
            @enderror

            <!-- Image -->
            <label for="image"> <b>Profile</b></label>
            <input id="image" type="file" class="@error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">
            @error('image')
            <span role="alert">
               <strong style="color:red;">{{$message}}</strong>
            </span>
            @enderror
            <br>
            <!-- Password -->
            <label for="password"><b>Password</b></label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" autocomplete="current-password">
            @error('password')
            <span role="alert">
               <strong style="color:red;">{{$message}}</strong>
            </span>
            @enderror

            <!-- Password -->
            <label for="password-confirm"><b>Confirm Password</b></label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Enter Confirm Password">
         </div>
         <!-- <button type="submit" class="cta-btn">Log In</button> -->
         <button type="submit" class="cta-btn">
            {{ __('Register') }}
         </button>
         <!-- </form> -->
         <!-- <a class="forget-pass" href="#">Forgot password?</a> -->
      </form>
   </div>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script>
   $(function() {
      var dtToday = new Date();
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if (month < 10)
         month = '0' + month.toString();
      if (day < 10)
         day = '0' + day.toString();
      var maxDate = year + '-' + month + '-' + day;
      $('.txtDate').attr('max', maxDate);
   });
   $('input[name=adhaar_card_no]').keypress(function() {
      var rawNumbers = $(this).val().replace(/ /g, '');
      var cardLength = rawNumbers.length;
      if (cardLength !== 0 && cardLength <= 12 && cardLength % 4 == 0) {
         $(this).val($(this).val() + ' ');
      }
   });
   $('#register').validate({
      rules: {
         name: {
            required: true,
         },
         email: {
            required: true,
         },
         contact_no: {
            required: true,
            maxlength: 10,
            minlength: 10
         },
         gender: {
            required: true,
         },
         address: {
            required: true,
         },
         dob: {
            required: true,
         },
         adhaar_card_no: {
            required: true,
         },
         image: {
            required: true,
         },
         password: {
            required: true,
            minlength: 8
         },
         password_confirmation: {
            required: true,
            equalTo: "#password"
         },
      },
      errorElement: 'span',
      messages: {
         name: 'Please Enter Your Name.',
         email: 'Please Enter Your Email Address.',
         contact_no: {
            required: 'Please Enter Your Mobile Number.',
            maxlength: 'Please enter only 10 digits.',
            minlength: 'Please enter at least 10 digits.'
         },
         gender: 'Please Select Your Address.',
         address: 'Please Enter Your Address.',
         dob: 'Please Select Your Birth Date.',
         adhaar_card_no: 'Please Enter Your Adhaar Card Number.',
         image: 'Please Select Your Profile Image.',
         password: {
            required: 'Please Enter Your Password.',
            minlength: 'Please Enter at least 8 characters.'
         },
         password_confirmation: {
            required: 'Please Enter Confirmation.',
            equalTo: 'Please Enter Confirm Password Same as a Password.'
         }
      },
      highlight: function(element, errorClass, validClass) {
         $(element).addClass('is-invalid');
         $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
      },
      unhighlight: function(element, errorClass, validClass) {
         $(element).removeClass('is-invalid');
         $(element).parents(".error").removeClass(errorClass).addClass(validClass);
      },
   });
</script>