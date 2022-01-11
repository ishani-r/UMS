@extends('College.layouts.master')
@section('title', 'College-Dashbboard')
@section('content')
<div class="content-overlay"></div>
<div class="content-wrapper">
   <section class="users-edit">
      <div class="row">
         <div class="col-12">

            <div class="row match-height">
               @foreach($meritround as $meritrounds)
               <!-- ========================== -->
               <div class="col-xl-6 col-md-6 col-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">{{$meritrounds->round_no}} Round</h4>
                     </div>
                     <div class="card-content">
                        <div class="card-body">
                           <fieldset>
                              <div class="row">
                                 <div class="col-md-6">
                                    <input type="text" value="{{ $meritrounds->id }}">
                                    <div class="form-group">
                                       <label for="course_id">{{ Form::label('course_id','Course Name')}}</label>
                                       {{Form::number('course_id',$meritrounds->course_id,['class'=>'form-control','placeholder'=>'Enter Total Seat'])}}
                                       @error('course_id')
                                       <span role="alert">
                                          <strong style="color:red;">{{$message}}</strong>
                                       </span>
                                       @enderror
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="start_date">{{ Form::label('start_date','Start Date')}}</label>
                                       {{Form::text('start_date',$meritrounds->start_date,['class'=>'form-control','placeholder'=>'Enter Total Seat'])}}
                                       @error('start_date')
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
                                       <label for="end_date">{{ Form::label('end_date','End Date')}}</label>
                                       {{Form::text('end_date',$meritrounds->end_date,['class'=>'form-control','placeholder'=>'Enter Total Seat'])}}
                                       @error('end_date')
                                       <span role="alert">
                                          <strong style="color:red;">{{$message}}</strong>
                                       </span>
                                       @enderror
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="merit_result_declare_date">{{ Form::label('merit_result_declare_date','Merit Result Declare Date')}}</label>
                                       {{Form::text('merit_result_declare_date',$meritrounds->merit_result_declare_date,['class'=>'form-control','placeholder'=>'Enter Total Seat'])}}
                                       @error('merit_result_declare_date')
                                       <span role="alert">
                                          <strong style="color:red;">{{$message}}</strong>
                                       </span>
                                       @enderror
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-3 mt-sm-2">
                                 {{Form::submit('Save Changes', ['class'=>'btn btn-primary mb-2 mb-sm-0 mr-sm-2'])}}
                                 {!!Form::close()!!}
                              </div>
                           </fieldset>
                        </div>
                     </div>
                  </div>
               </div>

               @endforeach
            </div>
            <!-- <div class="col-xl-4 col-md-6 col-12">
               <div class="card">
                  <div class="card-header">
                     <h4 class="card-title">Input group with Right Addon</h4>
                  </div>
                  <div class="card-content">
                     <div class="card-body">
                        <p>Add <code>.input-group-append .input-group-text</code> class <b>after</b> <code>&lt;input&gt;</code></p>
                        <fieldset>
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="Addon To Right" aria-describedby="basic-addon2">
                              <div class="input-group-append">
                                 <span class="input-group-text" id="basic-addon2">@example.com</span>
                              </div>
                           </div>
                        </fieldset>
                     </div>
                  </div>
               </div>
            </div> -->
            <!-- =================== -->
            <!-- <div class="card">
               <div class="card-header">
                  <h4 class="card-title">Edit Store</h4>
               </div>
               <div class="card-content">
                  <div class="card-body">
                  </div>
               </div>
            </div> -->
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
            course_id: 'Please Enter College Name!',
            seat_no: 'Please Enter Your Email Address!',
            reserved_seat: 'Please Enter College Contact Number!',
            merit_seat: 'Please Enter College Address!',
         },
      });
   })
</script>
@endpush