@extends('layouts.master')
@section('title', 'Student-Dashbboard')
@section('content')
<div class="content-overlay"></div>
<div class="content-wrapper">
   <div class="row">
      <div class="col-12">
         <div class="content-header">Subject Marks</div>
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
                     {{Form::submit('Add Marks', ['class'=>'btn gradient-pomegranate big-shadow add'])}}
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
         $('select').selectpicker();
      });
      $('#admission_form').validate({
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