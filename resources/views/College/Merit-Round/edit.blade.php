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
                  <h4 class="card-title">Edit Merit</h4>
               </div>
               <div class="card-content">
                  <div class="card-body">
                     {!! Form::model($merit,['route'=> array('college.meritround.update',$merit->id),'id' => 'course_edit','files'=>'true']) !!}
                     @csrf
                     @method('put')
                     <div class="row">
                        <div class="col-md-6 col-12">
                           <label for="course_id">Course</label>
                           <fieldset class="form-group">
                              <select class="custom-select course @error('course_id') is-invalid @enderror" id="course_id" name="course_id" disabled>
                                 <option value="0">Select One Course</option>
                                 @foreach($course as $course)
                                 <option class="dropdown-item" value="{{ $course->course_id }}" {{ $course->course_id == $merit->course_id ? 'selected' : '' }}>{{ $course->course->name }}</option>
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
                              <select class="custom-select round_no @error('round_no') is-invalid @enderror" id="round_no" name="round_no" value="{{ old('round_no') }}" disabled>
                                 <option value="0">Select Round</option>
                                 @foreach($round as $rounds)
                                 <option class="dropdown-item" value="{{ $rounds->round_no }}" {{ $rounds->id == $merit->merit_round_id ? 'selected' : '' }}>{{ $rounds->round_no }}</option>
                                 @endforeach
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
                        <div class="col-12 col-md-6">
                           <div class="form-group">
                              <div class="controls">
                                 <label for="merit">{{ Form::label('merit', 'Merit')}}</label>
                                 {{Form::number('merit',null,['class'=>'form-control'])}}
                                 @error('merit')
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
         course_id: 'Please Enter College Name!',
         seat_no: 'Please Enter Your Email Address!',
         reserved_seat: 'Please Enter College Contact Number!',
         merit_seat: 'Please Enter College Address!',
      },
   });

   $('.course').on('change', function() {
      var course = $(this).val();
      $.ajax({
         url: "{{ route('college.edit_sel_round') }}",
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