Ishani Ranpariya
Work Report 10/01/2022
- university
   - college crud
   - common setting
- College module
   - setup college panel
   - login using auth
- Student module
   - Register/login using auth



@if($common_setting === ' ')
<label for="marks">{{ Form::label('marks', $common_settings->subject->name)}}</label>
<input type="text" name="marks[{{$common_settings->id}}]" class="form-control" id="marks">
@else
@foreach($common_setting as $common_settings)
<label for="marks">{{ Form::label('marks', $common_settings->subject->name)}}</label>
<input type="text" name="marks[{{$common_settings->id}}]" class="form-control" id="marks" value="{{$common_settings->marks}}">
@endforeach
@endif
@if(isset($common_setting))
@foreach($common_setting as $common_settings)
<label for="marks">{{ Form::label('marks', $common_settings->subject->name)}}</label>
<input type="text" name="marks[{{$common_settings->id}}]" class="form-control" id="marks" value="{{$common_settings->marks}}">
<!-- {{Form::text('marks[$common_settings->id]',$common_settings->marks,['class'=>'form-control'])}} -->
@endforeach
@else
@foreach($common_setting as $common_settings)
<label for="marks">{{ Form::label('marks', $common_settings->subject->name)}}</label>
<input type="text" name="marks[{{$common_settings->id}}]" class="form-control" id="marks">
@endforeach
@endif

<!-- ====================== home page ========================== -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ======================================================== -->


@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{ __('Register') }}</div>

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
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

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
                        <input id="contact_no" type="contact_no" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no') }}" autocomplete="contact_no">
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
                        <!-- <input id="gender" type="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" autocomplete="gender"> -->
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                     <div class="col-md-6">
                        <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label for="adhaar_card_no" class="col-md-4 col-form-label text-md-end">{{ __('Adhaar Card No') }}</label>
                     <div class="col-md-6">
                        <input id="adhaar_card_no" type="adhaar_card_no" class="form-control @error('adhaar_card_no') is-invalid @enderror" name="adhaar_card_no" value="{{ old('adhaar_card_no') }}" autocomplete="adhaar_card_no">
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


<div class="row mb-3">
                     <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                     <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

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
                        <input id="contact_no" type="contact_no" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no') }}" autocomplete="contact_no">
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
                        <!-- <input id="gender" type="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" autocomplete="gender"> -->
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                     <div class="col-md-6">
                        <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label for="adhaar_card_no" class="col-md-4 col-form-label text-md-end">{{ __('Adhaar Card No') }}</label>
                     <div class="col-md-6">
                        <input id="adhaar_card_no" type="adhaar_card_no" class="form-control @error('adhaar_card_no') is-invalid @enderror" name="adhaar_card_no" value="{{ old('adhaar_card_no') }}" autocomplete="adhaar_card_no">
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


<div class="col-md-6">
                           <div class="form-group">
                              <label for="email">{{ Form::label('email','Email')}}</label>
                              {{Form::text('email','',['class'=>'form-control','placeholder'=>'Enter College Email'])}}
                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="contact_no">{{ Form::label('contact_no','contact no')}}</label>
                              {{Form::text('contact_no','',['class'=>'form-control','placeholder'=>'Enter College Contact No'])}}
                              @error('contact_no')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="address">{{ Form::label('address','address')}}</label>
                              {{Form::text('address','',['class'=>'form-control','placeholder'=>'Enter College address'])}}
                              @error('address')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="password">{{ Form::label('password','password')}}</label>
                              {{Form::text('password','',['class'=>'form-control','placeholder'=>'Enter Password'])}}
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="confirm_password">{{ Form::label('confirm_password','confirm password')}}</label>
                              {{Form::text('confirm_password','',['class'=>'form-control','placeholder'=>'Enter Confirm Password'])}}
                              @error('confirm_password')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="logo">{{ Form::label('logo','logo')}}</label>
                              {{Form::file('logo',['class'=>'form-control'])}}
                              @error('logo')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                     </div>

                     college task is  just enter percentage based on round  so eligible student get admission         
 ya right
no need subject_id in this table because college only enter marit

