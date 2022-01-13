@extends('layouts.master')
@section('title', 'Student-Dashbboard')
@section('content')
<div class="content-overlay"></div>
<div class="content-wrapper">
   <div class="row">
      <div class="col-12">
         <div class="content-header">Admission Form</div>
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
                     {!! Form::open(['route'=> array('admission_store'), 'id' => 'admission_form', 'enctype' => 'multipart/form-data']) !!}
                     @csrf
                     <!-- College -->
                     <div class="row">
                        <div class="col-md-6 col-12">
                           <label for="exampleInputUsername2" class="d-block">Select College :</label>
                           <select class="selectpicker" name="college_id[]" id="college_id" multiple data-live-search="true">
                              @foreach($college as $college)
                              <option class="dropdown-item" value="">{{ $college->name }}</option>
                              @endforeach
                           </select></br>
                           @error('college_id')
                           <span role="alert">
                              <strong style="color:red;">{{$message}}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <!-- course -->
                     <div class="row">
                        <div class="col-md-6 col-12">
                           <label for="course_id">Course</label>
                           <fieldset class="form-group">
                              <select class="custom-select course @error('course_id') is-invalid @enderror" id="course_id" name="course_id" value="{{ old('course_id') }}">
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
                        <div class="col-md-6 col-12">
                           <label for="merit_round_id">Round No</label>
                           <fieldset class="form-group">
                              <select class="custom-select course @error('merit_round_id') is-invalid @enderror" id="merit_round_id" name="merit_round_id" value="{{ old('merit_round_id') }}">
                                 <option class="dropdown-item" value="">Select One Round</option>
                              </select>
                              @error('merit_round_id')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </fieldset>
                        </div>
                     </div>

                     {{Form::submit('Submit', ['class'=>'btn gradient-pomegranate big-shadow addBtn','data-id' => $studentmark])}}
                     {!!Form::close()!!}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   @endsection
   @push('js')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
   <script>
      $(document).ready(function() {
         var id = $('.addBtn').attr("data-id");
         if (id == 0) {
            $('.addBtn').attr('disabled', true);
            toastr.error("Please First Add Subject Marks...");
            return false;
         }
         $('selectpicker').selectpicker();
      });

      $('#admission_form').validate({
         rules: {
            college_id: {
               required: true,
            },
            course_id: {
               required: true,
            },
            merit_round_id: {
               required: true,
            },
         },
         messages: {
            college_id: 'Please Select Colleges!',
            course_id: 'Please Select Course!',
            merit_round_id: 'Please Select Round!',
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
         var course_id = this.value;
         $.ajax({
            url: "{{ route('sel_round_no') }}",
            type: "POST",
            data: {
               course_id: course_id,
               _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(result) {
               console.log(result);
               // $('#merit_round_id').html('<option class="dropdown-item" value="">Select Sub Category</option>');
               $.each(result, function(key, value) {
                  console.log(value);
                  $("#merit_round_id").append('<option class="dropdown-item" value="' + value.id + '">' + value.round_no + '</option>');
               });
            }
         });
      })
   </script>
   @endpush