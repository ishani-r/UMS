@extends('University.layouts.master')
@section('title', 'University-Dashbboard')
@section('content')
<div class="content-overlay"></div>
<div class="content-wrapper">
   <div class="row">
      <div class="col-12">
         <div class="content-header">Add Subject Percentage</div>
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
                     {{ Form::open(array('route' => 'university.store_percentage', 'method' => 'post', 'id' => 'common_settings_edit', 'files' => true)) }}
                     @csrf
                     <div class="row">
                        <div class="col-12 col-md-6">
                           <div class="form-group">
                              <div class="controls">
                                 @if(($common_setting === ' ') == false)
                                 @foreach($common_setting as $common_settings)
                                 <label for="marks">{{ Form::label('marks', $common_settings->subject->name)}}</label>
                                 <input type="text" name="marks[{{$common_settings->id}}]" class="form-control" id="marks" value="{{$common_settings->marks}}">
                                 @endforeach
                                 @elseif((isset($common_setting)) == true)
                                 @foreach($subject as $subjects)
                                 <label for="marks">{{ Form::label('marks', $subjects->name)}}</label>
                                 <input type="text" name="marks[{{$subjects->id}}]" class="form-control" id="marks" placeholder="Enter Percentage"></br>
                                 @error('marks')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                                 @endforeach
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                     {{Form::submit('Save Changes', ['class'=>'btn btn-primary mb-2 mb-sm-0 mr-sm-2'])}}
                     {{Form::reset('Cancel', ['class'=>'btn btn-secondary'])}}
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
      $('#common_settings_edit').validate({
         rules: {
            'marks[]': {
               required: true,
            },
         },
      });
   </script>
   @endpush