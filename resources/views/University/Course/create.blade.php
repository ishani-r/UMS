@extends('University.layouts.master')
@section('title', 'University-Dashbboard')
@section('content')
<div class="content-overlay"></div>
<div class="content-wrapper">
   <div class="row">
      <div class="col-12">
         <div class="content-header">Add Course</div>
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
                     {!! Form::open(['route'=> array('university.course.store'), 'id' => 'course_form', 'enctype' => 'multipart/form-data']) !!}
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="name">{{ Form::label('name','Course Name')}}</label>
                              {{Form::text('name','',['class'=>'form-control','placeholder'=>'Enter course Name'])}}
                              @error('name')
                              <span role="alert">
                                 <strong style="color:red;">{{$message}}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     {{Form::submit('Add Course', ['class'=>'btn gradient-pomegranate big-shadow add'])}}
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
      $('#course_form').validate({
         rules: {
            name: {
               required: true,
            },
         },
         messages: {
            name: 'Please Enter Course Name!',
            seat_no: 'Please Enter Total Seat!',
            reserved_seat: 'Please Enter Reserved Seat!',
            merit_seat: 'Please Enter Merit Seat!',
         },
         highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
         },
         unhighlight: function(element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
         },
         // errorPlacement: function(error, element) {
         //    error.insertAfter(element.parent());
         // },
         submitHandler: function(form) {
            form.submit();
         }
      });
   </script>
   @endpush