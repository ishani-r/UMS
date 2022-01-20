@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header"><h1>Student Register</h1></div>

            <div class="card-body">
               <form method="POST" action="{{ route('register') }}" id="register" enctype="multipart/form-data">
                  @csrf

                  <div class="row mb-3">
                     <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                     <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                     <div class="col-md-6">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label for="contact_no" class="col-md-4 col-form-label text-md-end">{{ __('Contact No') }}</label>
                     <div class="col-md-6">
                        <input id="contact_no" type="number" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no') }}" autocomplete="contact_no">
                        @error('contact_no')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                     <div class="col-md-6">
                        <input type="radio" name="gender" value="M"> Male<br>
                        <input type="radio" name="gender" value="F"> Female<br>
                     </div>
                     @error('gender')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>

                  <div class="row mb-3">
                     <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                     <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label for="dob" class="col-md-4 col-form-label text-md-end">{{ __('dob') }}</label>
                     <div class="col-md-6">
                        {{Form::date('dob','',['class'=>'form-control txtDate'])}}
                        @error('dob')
                        <span role="alert">
                           <strong style="color:red;">{{$message}}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label for="adhaar_card_no" class="col-md-4 col-form-label text-md-end">{{ __('Adhaar Card No') }}</label>
                     <div class="col-md-6">
                        <input autocomplete='off' type='text' class="form-control card-number @error('adhaar_card_no') is-invalid @enderror" maxlength="19" id="adhaar_card_no" name="adhaar_card_no" size='20' value="{{ old('adhaar_card_no') }}">

                        <!-- <input id="adhaar_card_no" type="adhaar_card_no" class="form-control @error('adhaar_card_no') is-invalid @enderror" name="adhaar_card_no" value="{{ old('adhaar_card_no') }}" autocomplete="adhaar_card_no"> -->
                        @error('adhaar_card_no')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Profile') }}</label>
                     <div class="col-md-6">
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                     <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                     <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                     </div>
                  </div>

                  <div class="row mb-0">
                     <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                           {{ __('Register') }}
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@push('js')
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
@endpush