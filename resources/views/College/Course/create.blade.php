@extends('College.layouts.master')
@section('title', 'College-Dashbboard')
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
                     {!! Form::open(['route'=> array('college.college-course.store'), 'id' => 'course_form', 'enctype' => 'multipart/form-data']) !!}
                     @csrf
                     <div class="row">
                        <div class="col-md-6 col-12">
                           <label for="course_id">Course</label>
                           <fieldset class="form-group">
                              <select class="custom-select course @error('course_id') is-invalid @enderror" id="course_id" name="course_id" value="course_id">
                                 <option value="0">Select One Course</option>
                                 @foreach($course as $course)
                                 <option class="dropdown-item" value="{{ $course->id }}">{{ $course->name }}</option>
                                 @endforeach
                              </select>
                              @error('course_id')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </fieldset>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="seat_no">{{ Form::label('seat_no','Total Seat')}}</label>
                              {{Form::number('seat_no','',['class'=>'form-control','placeholder'=>'Enter Total Seat'])}}
                              @error('seat_no')
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
                              <label for="reserved_seat">{{ Form::label('reserved_seat','Reserved Seat')}}</label>
                              {{Form::number('reserved_seat','',['class'=>'form-control','placeholder'=>'Enter Reserved Seat'])}}
                              @error('reserved_seat')
                              <span role="alert">
                                 <strong style="color:red;">{{$message}}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="merit_seat">{{ Form::label('merit_seat','Merit Seat')}}</label>
                              {{Form::number('merit_seat','',['class'=>'form-control','placeholder'=>'Enter Merit Seat'])}}
                              @error('merit_seat')
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
            seat_no: {
               required: true,
            },
            reserved_seat: {
               required: true,
            },
            merit_seat: {
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