$studentmark = StudentMark::with('commonsetting')->where('user_id', Auth::guard('web')->user()->id)->get();
      $merit = 0;
      $com_total = 0;
      foreach ($studentmark as $studentmarks) {
         $total = ($studentmarks->obtain_mark * $studentmarks->commonsetting['marks'] ?? 0) / 100;
         $merit = $merit + $total;
         $com_total = $com_total + $studentmarks->commonsetting['marks'];
      }
      $f_merit = $merit / $com_total * 100;
      dd($f_merit);

@if(count($studentmarks)==0)
                     @foreach($subjects as $subject)
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="obtain_mark">{{ $subject->name}}</label>
                              <input type="text" name="obtain_mark[{{$subject->id}}]" class="form-control" id="obtain_mark" placeholder="Enter {{$subject->name}} Percentage" onKeyPress="if(this.value.length==3) return false;" min="0" max="100" required></br>
                              <!-- {{Form::text('obtain_mark[$subject->id]','',['class'=>'form-control','placeholder'=>'Enter ' . $subject->name . ' Marks'])}} -->
                              @error('obtain_mark')
                              <span role="alert">
                                 <strong style="color:red;">{{$message}}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     @endforeach
                     @else
                     @dd(1)
                     @foreach($studentmarks as $studentmark)
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="obtain_mark">{{ $studentmark->subject_id}}</label>
                              <input type="text" name="obtain_mark[{{$studentmark->id}}]" class="form-control" id="obtain_mark" value="{{$studentmark->obtain_mark}}" placeholder="Enter {{$studentmark->name}} Percentage" onKeyPress="if(this.value.length==3) return false;" min="0" max="100" required></br>
                              @error('obtain_mark')
                              <span role="alert">
                                 <strong style="color:red;">{{$message}}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     @endforeach
                     @endif

Ishani Ranpariya
MR :: 13/01/2022
- student
   - student fill addmission form with validation
   - student show their merit
- college 
   -confirm student admission 

Ishani Ranpariya
Work Report :: 13/01/2022
- Student
  - create admission form with validation
  - count student merit and store merit 
  - edit student profile with validation
  - change password with validation
  - set validation student not insert mark then not filed admission form
Ishani Ranpariya
Work Report :: 12/01/2022
- University
merite round(edit,delete,status)
- college
merite round (show, add merit)
- student
- Working on add subject mark

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

Ishani Ranpariya
Work Report :: 11/01/2022
- university
- course
- subject list
- merit round (add,edit,delete)
- edit profile with validation
- college
- course (add,edit,delete)
- merit round


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











<!DOCTYPE html>

<html class="loading" lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
   <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
   <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
   <meta name="author" content="PIXINVENT">
   <title>Register Page</title>
   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('student-assets/app-assets/img/ico/favicon.ico')}}">
   <link rel="shortcut icon" type="image/png" href="{{ asset('student-assets/app-assets/img/ico/favicon-32.png')}}">
   <meta name="apple-mobile-web-app-capable" content="yes">
   <meta name="apple-touch-fullscreen" content="yes">
   <meta name="apple-mobile-web-app-status-bar-style" content="default">
   <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
   <!-- BEGIN VENDOR CSS-->
   <!-- font icons-->
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/fonts/feather/style.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/fonts/simple-line-icons/style.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/vendors/css/perfect-scrollbar.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/vendors/css/prism.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/vendors/css/switchery.min.css')}}">
   <!-- END VENDOR CSS-->
   <!-- BEGIN APEX CSS-->
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/css/bootstrap.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/css/bootstrap-extended.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/css/colors.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/css/components.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/css/themes/layout-dark.min.css')}}">
   <link rel="stylesheet" href="{{ asset('student-assets/app-assets/css/plugins/switchery.min.css')}}">
   <!-- END APEX CSS-->
   <!-- BEGIN Page Level CSS-->
   <link rel="stylesheet" href="{{ asset('student-assets/app-assets/css/pages/authentication.css')}}">
   <!-- END Page Level CSS-->
   <!-- BEGIN: Custom CSS-->
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/assets/css/style.css')}}">
   <!-- END: Custom CSS-->
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 1-column auth-page navbar-sticky blank-page" data-menu="vertical-menu" data-col="1-column">
   <!-- ////////////////////////////////////////////////////////////////////////////-->
   <div class="wrapper">
      <div class="main-panel">
         <!-- BEGIN : Main Content-->
         <div class="main-content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
               <!--Registration Page Starts-->
               <section id="regestration" class="auth-height">
                  <div class="row full-height-vh m-0">
                     <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="card overflow-hidden">
                           <div class="card-content">
                              <div class="card-body auth-img">
                                 <div class="row m-0">
                                    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center text-center auth-img-bg py-2">
                                       <img src="{{ asset('student-assets/app-assets/img/gallery/register.png')}}" alt="" class="img-fluid" width="350" height="230">
                                    </div>
                                    <div class="col-lg-6 col-md-12 px-4 py-3">
                                       <h4 class="card-title mb-2">Student Create Account</h4>
                                       <p>Fill the below form to create a new account.</p>
                                       <form method="POST" action="{{ route('register') }}" id="register" enctype="multipart/form-data">
                                          @csrf
                                          <!-- name -->
                                          <input id="name" type="name" class="form-control @error('name') is-invalid @enderror mb-2" value="{{ old('name') }}" placeholder="name">
                                          @error('name')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <!-- email -->
                                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror mb-2" value="{{ old('email') }}" placeholder="Email">
                                          @error('email')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <!-- contact no -->
                                          <input id="contact_no" type="text" class="form-control @error('contact_no') is-invalid @enderror mb-2" value="{{ old('contact_no') }}" placeholder="contact_no">
                                          @error('contact_no')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <!-- gender -->
                                          <input type="radio" name="gender" value="M"> Male<br>
                                          <input type="radio" name="gender" value="F"> Female<br>
                                          @error('gender')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <!-- address -->
                                          <input id="address" type="text" class="form-control @error('address') is-invalid @enderror mb-2" value="{{ old('address') }}" placeholder="address">
                                          @error('address')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <!-- adhaar_card_no -->
                                          <input id="adhaar_card_no" type="text" class="form-control @error('adhaar_card_no') is-invalid @enderror mb-2" value="{{ old('adhaar_card_no') }}" placeholder="adhaar_card_no">
                                          @error('adhaar_card_no')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <!-- image -->
                                          <input id="image" type="file" class="form-control @error('image') is-invalid @enderror mb-2" value="{{ old('image') }}" placeholder="image">
                                          @error('image')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <!-- password -->
                                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror mb-2" value="{{ old('password') }}" placeholder="password">
                                          @error('password')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <!-- password-confirm -->
                                          <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror mb-2" value="{{ old('password-confirm') }}" placeholder="password-confirm">
                                          @error('password-confirm')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror

                                          <div class="d-flex justify-content-between flex-sm-row flex-column">
                                             <a href="auth-login.html" class="btn bg-light-primary mb-2 mb-sm-0">Back To Login</a>
                                             <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                             </button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <!--Registration Page Ends-->

            </div>
         </div>
         <!-- END : End Main Content-->
      </div>
   </div>
   <!-- ////////////////////////////////////////////////////////////////////////////-->

   <!-- BEGIN VENDOR JS-->
   <script src="{{ asset('student-assets/app-assets/vendors/js/vendors.min.js')}}"></script>
   <script src="{{ asset('student-assets/app-assets/vendors/js/switchery.min.js')}}"></script>
   <!-- BEGIN VENDOR JS-->
   <!-- BEGIN PAGE VENDOR JS-->
   <!-- END PAGE VENDOR JS-->
   <!-- BEGIN APEX JS-->
   <script src="{{ asset('student-assets/app-assets/js/core/app-menu.min.js')}}"></script>
   <script src="{{ asset('student-assets/app-assets/js/core/app.min.js')}}"></script>
   <script src="{{ asset('student-assets/app-assets/js/notification-sidebar.min.js')}}"></script>
   <script src="{{ asset('student-assets/app-assets/js/customizer.min.js')}}"></script>
   <script src="{{ asset('student-assets/app-assets/js/scroll-top.min.js')}}"></script>
   <!-- END APEX JS-->
   <!-- BEGIN PAGE LEVEL JS-->
   <!-- END PAGE LEVEL JS-->
   <!-- BEGIN: Custom CSS-->
   <script src="{{ asset('student-assets/assets/js/scripts.js')}}"></script>
   <!-- END: Custom CSS-->
</body>
<!-- END : Body-->

<!-- Mirrored from pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Dec 2021 20:12:48 GMT -->

</html>

<div class="col-md-6 col-12">
   <label for="college_id">College</label>
   <fieldset class="form-group">
      <select class="custom-select course @error('college_id') is-invalid @enderror" id="college_id" name="college_id" value="college_id">
         <option value="0">Select College</option>
         @foreach($college as $college)
         <option class="dropdown-item" value="{{ $college->id }}">{{ $college->name }}</option>
         @endforeach
      </select>
      @error('college_id')
      <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
      </span>
      @enderror
   </fieldset>
</div>