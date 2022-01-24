@extends('College.layouts.master')
@section('title', 'College-Dashbboard')
@section('content')
<div class="content-overlay"></div>
<div class="content-wrapper">
   <section class="users-edit">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">Edit Store</h4>
               </div>
               <div class="card-content">
                  <div class="card-body">
                     {!! Form::model($data,['route'=> array('college.college-course.update',$data->id),'id' => 'course_edit','files'=>'true']) !!}
                     @csrf
                     @method('put')
                     <div class="row">
                        <div class="col-md-6 col-12">
                           <label for="course_id">Country</label>
                           <fieldset class="form-group">
                              <select class="custom-select country @error('course_id') is-invalid @enderror" id="course_id" name="course_id" value="course_id">
                                 <option value="0">Select One Country</option>
                                 @foreach($course as $course)
                                 <option class="dropdown-item" value="{{ $course->id }}" {{ $course->id == $data->course_id ? 'selected' : '' }}>{{ $course->name }}</option>
                                 @endforeach
                              </select>
                              @error('course_id')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </fieldset>
                        </div>
                        <div class="col-12 col-md-6">
                           <div class="form-group">
                              <div class="controls">
                                 <label for="seat_no">{{ Form::label('seat_no', 'Seat No')}}</label>
                                 {{Form::number('seat_no',null,['class'=>'form-control'])}}
                                 @error('seat_no')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-12 col-md-6">
                           <div class="form-group">
                              <div class="controls">
                                 <label for="reserved_seat">{{ Form::label('reserved_seat', 'Reserved Seat')}}</label>
                                 {{Form::number('reserved_seat',null,['class'=>'form-control'])}}
                                 @error('reserved_seat')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-md-6">
                           <div class="form-group">
                              <div class="controls">
                                 <label for="merit_seat">{{ Form::label('merit_seat', 'Merit seat')}}</label>
                                 {{Form::number('merit_seat',null,['class'=>'form-control'])}}
                                 @error('merit_seat')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-3 mt-sm-2">
                        {{Form::submit('Save Changes', ['class'=>'btn btn-primary mb-2 mb-sm-0 mr-sm-2'])}}
                        {!!Form::close()!!}
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</div>
</div>
@endsection
@push('js')
<script>
   $(document).ready(function() {
      $('#course_edit').validate({
         rules: {
            course_id: {
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
            course_id: 'Please Select Course!',
            seat_no: 'Please Enter Total Seat!',
            reserved_seat: 'Please Enter Reserved Seat!',
            merit_seat: 'Please Enter Merit Seat!',
         },
      });
   })
</script>
@endpush