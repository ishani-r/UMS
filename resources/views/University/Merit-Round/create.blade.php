@extends('University.layouts.master')
@section('title', 'University-Dashbboard')
@section('content')
<div class="content-overlay"></div>
<div class="content-wrapper">
   <div class="row">
      <div class="col-12">
         <div class="content-header">Add Merit Round</div>
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
                     {!! Form::open(['route'=> array('university.meritround.store'), 'id' => 'merit_form', 'enctype' => 'multipart/form-data']) !!}
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="round_no">{{ Form::label('round_no','Round No')}}</label>
                              {{Form::number('round_no','',['class'=>'form-control','placeholder'=>'Enter Round No'])}}
                              @error('round_no')
                              <span role="alert">
                                 <strong style="color:red;">{{$message}}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6 col-12">
                           <label for="course_id">Course</label>
                           <fieldset class="form-group">
                              <select class="custom-select course @error('course_id') is-invalid @enderror" id="course_id" name="course_id" value="course_id">
                                 <option value="">Select One Course</option>
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
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="start_date">{{ Form::label('start_date','Start Date')}}</label>
                              {{Form::date('start_date','',['class'=>'form-control txtDate'])}}
                              @error('start_date')
                              <span role="alert">
                                 <strong style="color:red;">{{$message}}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="end_date">{{ Form::label('end_date','End Date')}}</label>
                              {{Form::date('end_date','',['class'=>'form-control txtDate'])}}
                              @error('end_date')
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
                              <label for="merit_result_declare_date">{{ Form::label('merit_result_declare_date','Merit Result Declare Date')}}</label>
                              {{Form::date('merit_result_declare_date','',['class'=>'form-control txtDate'])}}
                              @error('merit_result_declare_date')
                              <span role="alert">
                                 <strong style="color:red;">{{$message}}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     {{Form::submit('Add', ['class'=>'btn gradient-pomegranate big-shadow add'])}}
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
      $(function() {
         var dtToday = new Date();

         var month = dtToday.getMonth() + 1;
         var day = dtToday.getDate();
         var year = dtToday.getFullYear();
         if (month < 10)
            month = '0' + month.toString();
         if (day < 10)
            day = '0' + day.toString();

         var minDate = year + '-' + month + '-' + day;

         $('.txtDate').attr('min', minDate);
      });

      $('#merit_form').validate({
         rules: {
            round_no: {
               required: true,
            },
            course_id: {
               required: true,
            },
            start_date: {
               required: true,
            },
            end_date: {
               required: true,
            },
            merit_result_declare_date: {
               required: true,
            },
         },
         messages: {
            round_no: 'Please Enter Round Number!',
            course_id: 'Please Select Course!',
            start_date: 'Please Select Start Date!',
            end_date: 'Please Select End Date!',
            merit_result_declare_date: 'Please Select Merit Declare Date!',
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