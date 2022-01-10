@extends('University.layouts.master')
@section('title', 'University-Dashbboard')
@section('content')
<div class="content-overlay"></div>
<div class="content-wrapper">
   <div class="row">
      <div class="col-12">
         <div class="content-header">Add College</div>
      </div>
   </div>
   <!-- Basic Inputs start -->
   <section id="basic-input">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <!-- <h4 class="card-title">Store</h4> -->
               </div>
               <div class="card-content">
                  <div class="card-body">
                     {!! Form::open(['route'=> array('university.college.store'), 'id' => 'college_form', 'enctype' => 'multipart/form-data']) !!}
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="name">{{ Form::label('name','name')}}</label>
                              {{Form::text('name','',['class'=>'form-control','placeholder'=>'Enter College Name'])}}
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
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
                     {{Form::submit('Add College', ['class'=>'btn gradient-pomegranate big-shadow add'])}}
                     {!!Form::close()!!}
                  </div>
               </div>
            </div>
         </div>
      </div>

   </section>
   @endsection
   @push('js')
   <script>
      $('#college_form').validate({
         rules: {
            name: {
               required: true,
            },
            email: {
               required: true,
            },
            contact_no: {
               required: true,
            },
            address: {
               required: true,
            },
            logo: {
               required: true,
            },
            password: {
               required: true,
               minlength: 8
            },
            confirm_password: {
               required: true,
               equalTo: "#password"
            },
         },
         messages: {
            name: 'Please Enter College Name!',
            email: 'Please Enter Your Email Address!',
            contact_no: 'Please Enter College Contact Number!',
            address: 'Please Enter College Address!',
            logo: 'Please Select Logo!!',
            password: {
               required: 'Please Enter Your Password.',
               minlength: 'Please Enter at least 8 characters.'
            },
            confirm_password: {
               required: 'Please Enter Confirmation.',
               equalTo: 'Please Enter Confirm Password Same as a Password.'
            }
         },
         // highlight: function(element, errorClass, validClass) {
         //    $(element).addClass("is-invalid").removeClass("is-valid");
         // },
         // unhighlight: function(element, errorClass, validClass) {
         //    $(element).addClass("is-valid").removeClass("is-invalid");
         // },
         // errorPlacement: function(error, element) {
         //    error.insertAfter(element.parent());
         // },
         submitHandler: function(form) {
            register(form);
         }
      });
   </script>
   @endpush