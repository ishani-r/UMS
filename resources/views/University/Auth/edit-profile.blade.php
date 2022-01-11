@extends('University.layouts.master')
@section('title', 'University-Dashbboard')
@section('content')
<div class="content-overlay"></div>
<div class="content-wrapper">
   <section class="users-edit">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">Show Profile</h4>
               </div>
               <div class="card-content">
                  <div class="card-body">
                     {!! Form::model($university,['route'=> array('university.update_profile',$university->id), 'enctype' => 'multipart/form-data', 'id' => 'admin_form']) !!}
                     @csrf
                     @method('put')
                     <div class="row">
                        <div class="col-12 col-md-6">
                           <div class="form-group">
                              <div class="controls">
                                 <label for="name">{{ Form::label('name', 'Name')}}</label>
                                 {{Form::text('name',null,['class'=>'form-control'])}}
                                 @error('name')
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
                                 <label for="email">{{ Form::label('email', 'Email')}}</label>
                                 {{Form::text('email',null,['class'=>'form-control'])}}
                                 @error('email')
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
                                 <label for="contact_no">{{ Form::label('contact_no', 'Contact No')}}</label>
                                 {{Form::text('contact_no',null,['class'=>'form-control'])}}
                                 @error('contact_no')
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
                                 <label for="address">{{ Form::label('address', 'Address')}}</label>
                                 {{Form::textarea('address',null,['class'=>'form-control','row'=>2])}}
                                 @error('address')
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
                        {{Form::reset('Cancel', ['class'=>'btn btn-secondary'])}}
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