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
                        <h4 class="card-title">Edit Merit Round</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            {!! Form::model($merit,['route'=> array('university.meritround.update',$merit->id),'id' => 'merit_edit','files'=>'true']) !!}
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="round_no">{{ Form::label('round_no', 'Round No')}}</label>
                                            {{Form::text('round_no',null,['class'=>'form-control'])}}
                                            @error('round_no')
                                            <span role="alert">
                                                <strong style="color:red;">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="course_id">Course</label>
                                    <fieldset class="form-group">
                                        <select class="custom-select course @error('course_id') is-invalid @enderror" id="course_id" name="course_id" value="course_id">
                                            <option value="">Select One Course</option>
                                            @foreach($course as $course)
                                            <option class="dropdown-item" value="{{ $course->id }}" {{$course->id == $merit->course_id ? 'selected' : ''}}>{{ $course->name }}</option>
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
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="start_date">{{ Form::label('start_date', 'Start Date')}}</label>
                                            {{Form::date('start_date',null,['class'=>'form-control txtDate'])}}
                                            @error('start_date')
                                            <span role="alert">
                                                <strong style="color:red;">{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="end_date">{{ Form::label('end_date', 'End Date')}}</label>
                                            {{Form::date('end_date',null,['class'=>'form-control txtDate'])}}
                                            @error('end_date')
                                            <span role="alert">
                                                <strong style="color:red;">{{$message}}</strong>
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
                                            <label for="merit_result_declare_date">{{ Form::label('merit_result_declare_date', 'Merit Result Declare Date')}}</label>
                                            {{Form::date('merit_result_declare_date',null,['class'=>'form-control txtDate'])}}
                                            @error('merit_result_declare_date')
                                            <span role="alert">
                                                <strong style="color:red;">{{$message}}</strong>
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
    </section>
</div>
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
    $(document).ready(function() {
        $('#merit_edit').validate({
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
        });
    })
</script>
@endpush