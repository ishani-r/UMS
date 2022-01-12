@extends('College.layouts.master')
@section('title', 'College-Dashbboard')
@section('content')
<div class="content-overlay"></div>
<div class="content-wrapper">
   <div class="row">
      <div class="col-12">
         <div class="content-header">Add Merit</div>
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
                     {!! Form::open(['route'=> array('college.meritround.store'), 'id' => 'merit_form', 'enctype' => 'multipart/form-data']) !!}
                     @csrf
                     <div class="row">
                        <div class="col-md-6 col-12">
                           <label for="course_id">Course</label>
                           <fieldset class="form-group">
                              <select class="custom-select course @error('course_id') is-invalid @enderror" id="course_id" name="course_id">
                                 <option value="">Select One Course</option>
                                 @foreach($course as $course)
                                 <option class="dropdown-item" value="{{ $course->course_id }}">{{ $course->course->name }}</option>
                                 @endforeach
                              </select>
                              @error('course_id')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </fieldset>
                        </div>
                        <div class="col-md-6 col-12">
                           <label for="round_no">Round</label>
                           <fieldset class="form-group">
                              <select class="custom-select round_no @error('round_no') is-invalid @enderror" id="round_no" name="round_no" value="{{ old('round_no') }}">
                                 <option value="">Select Round</option>
                              </select>
                              @error('round_no')
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
                              <label for="merit">{{ Form::label('merit','Merit')}}</label>
                              {{Form::number('merit','',['class'=>'form-control','placeholder'=>'Enter Reserved Seat'])}}
                              @error('merit')
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
      $('#merit_form').validate({
         rules: {
            course_id: {
               required: true,
            },
            round_no: {
               required: true,
            },
            merit: {
               required: true,
            },
         },
         messages: {
            course_id: 'Please Select Coure!',
            round_no: 'Please Select Round!',
            merit: 'Please Enter Merit!',
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

      $('.course').on('change', function() {
         var course = $(this).val();
         $.ajax({
            url: "{{ route('college.sel_round') }}",
            type: "POST",
            data: {
               course: course,
               _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(result) {
               console.log(result);
               $('#round_no').html('<option class="dropdown-item" value="">Select One Round No</option>');
               $.each(result, function(key, value) {
                  $("#round_no").append('<option class="dropdown-item" value="' + value.id + '">' + value.round_no + '</option>');
               });
            }
         });
      })
   </script>
   @endpush