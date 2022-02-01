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
                              <span role="alert">
                                 <strong style="color:red;">{{$message}}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="email">{{ Form::label('email','Email')}}</label>
                              {{Form::text('email','',['class'=>'form-control','placeholder'=>'Enter College Email'])}}
                              @error('email')
                              <span role="alert">
                                 <strong style="color:red;">{{$message}}</strong>
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
                              <span role="alert">
                                 <strong style="color:red;">{{$message}}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="address">{{ Form::label('address','address')}}</label>
                              {{Form::text('address','',['class'=>'form-control','placeholder'=>'Enter College address'])}}
                              @error('address')
                              <span role="alert">
                                 <strong style="color:red;">{{$message}}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="password">{{ Form::label('password','password')}}</label>
                              {{ Form::password('password',array('class' => 'form-control','placeholder'=>'Enter Password')); }}
                              @error('password')
                              <span role="alert">
                                 <strong style="color:red;">{{$message}}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="confirm_password">{{ Form::label('confirm_password','confirm password')}}</label>
                              {{ Form::password('confirm_password',array('class' => 'form-control','placeholder'=>'Enter Confirm Password')); }}
                              @error('confirm_password')
                              <span role="alert">
                                 <strong style="color:red;">{{$message}}</strong>
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
                              <span role="alert">
                                 <strong style="color:red;">{{$message}}</strong>
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
   <script src="{{asset('admins/js/university/college.js')}}"></script>
   <script>
   </script>
   @endpush