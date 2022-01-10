Ishani Ranpariya
Work Report 10/01/2022
- university
   - college crud
   - common setting
- College module
   - setup college panel
   - login using auth
- Student module
   - Register/login using auth



@if($common_setting === ' ')
<label for="marks">{{ Form::label('marks', $common_settings->subject->name)}}</label>
<input type="text" name="marks[{{$common_settings->id}}]" class="form-control" id="marks">
@else
@foreach($common_setting as $common_settings)
<label for="marks">{{ Form::label('marks', $common_settings->subject->name)}}</label>
<input type="text" name="marks[{{$common_settings->id}}]" class="form-control" id="marks" value="{{$common_settings->marks}}">
@endforeach
@endif
@if(isset($common_setting))
@foreach($common_setting as $common_settings)
<label for="marks">{{ Form::label('marks', $common_settings->subject->name)}}</label>
<input type="text" name="marks[{{$common_settings->id}}]" class="form-control" id="marks" value="{{$common_settings->marks}}">
<!-- {{Form::text('marks[$common_settings->id]',$common_settings->marks,['class'=>'form-control'])}} -->
@endforeach
@else
@foreach($common_setting as $common_settings)
<label for="marks">{{ Form::label('marks', $common_settings->subject->name)}}</label>
<input type="text" name="marks[{{$common_settings->id}}]" class="form-control" id="marks">
@endforeach
@endif

<!-- ====================== home page ========================== -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ======================================================== -->