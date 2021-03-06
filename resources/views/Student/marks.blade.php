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
                  <!-- @if(Session::has('message'))
                  <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                  @endif -->
                  @if (Session::has('error'))
                  <div class="alert alert-danger text-center">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                     <p>{{ Session::get('error') }}</p>
                  </div>
                  @endif
                  @if (Session::has('success'))
                  <div class="alert alert-success text-center">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                     <p>{{ Session::get('success') }}</p>
                  </div>
                  @endif
                  <!-- <h4 class="card-title">Store</h4> -->
               </div>
               <div class="card-content">
                  <div class="card-body">
                     {!! Form::open(['route'=> array('store_mark'), 'id' => 'admission_form', 'enctype' => 'multipart/form-data']) !!}
                     @csrf
                     @if(count($studentmarks)==0)
                     @foreach($subjects as $subject)
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="obtain_mark">{{ $subject->name}}</label>
                              <input type="number" name="obtain_mark[{{$subject->id}}]" class="form-control" id="obtain_mark" placeholder="Enter {{$subject->name}} Percentage" onKeyPress="if(this.value.length==3) return false;" min="0" max="100" required>
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
                     @foreach($studentmarks as $studentmark)
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="obtain_mark">{{ $studentmark->subject->name}}</label>
                              <input type="number" name="obtain_mark[{{$studentmark->subject->id}}]" class="form-control" id="obtain_mark" value="{{$studentmark->obtain_mark}}" placeholder="Enter {{$studentmark->name}} Percentage" onKeyPress="if(this.value.length==3) return false;" min="0" max="100" required>
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
   </script>
   @endpush