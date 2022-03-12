- how to push one file in git

Ishani Ranpariya
Work Report :: 19/01/2022
- user merit not match selected college show message wait will send mail college
- college
- show student if merit not match
- manage status (admission confirm, rejected)
- if admission confirm/rejected send mail

$studentmark = StudentMark::with('commonsetting')->where('user_id', Auth::guard('web')->user()->id)->get();
$merit = 0;
$com_total = 0;
foreach ($studentmark as $studentmarks) {
$total = ($studentmarks->obtain_mark * $studentmarks->commonsetting['marks'] ?? 0) / 100;
$merit = $merit + $total;
$com_total = $com_total + $studentmarks->commonsetting['marks'];
}
$f_merit = $merit / $com_total * 100;
dd($f_merit);

@if(count($studentmarks)==0)
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
@else
@dd(1)
@foreach($studentmarks as $studentmark)
<div class="row">
   <div class="col-md-6">
      <div class="form-group">
         <label for="obtain_mark">{{ $studentmark->subject_id}}</label>
         <input type="text" name="obtain_mark[{{$studentmark->id}}]" class="form-control" id="obtain_mark" value="{{$studentmark->obtain_mark}}" placeholder="Enter {{$studentmark->name}} Percentage" onKeyPress="if(this.value.length==3) return false;" min="0" max="100" required></br>
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

Ishani Ranpariya
MR :: 13/01/2022
- student
- student fill addmission form with validation
- student show their merit
- college
-confirm student admission

Ishani Ranpariya
Work Report :: 17/01/2022
- solve previous error
- show addmission data university side
- admission data insert using type casting
- solve error on display admission on college side
- display admission data on college side(working)

Ishani Ranpariya
Work Report :: 13/01/2022
- Student
- create admission form with validation
- count student merit and store merit
- edit student profile with validation
- change password with validation
- set validation student not insert mark then not filed admission form
Ishani Ranpariya
Work Report :: 12/01/2022
- University
merite round(edit,delete,status)
- college
merite round (show, add merit)
- student
- Working on add subject mark

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

Ishani Ranpariya
Work Report :: 11/01/2022
- university
- course
- subject list
- merit round (add,edit,delete)
- edit profile with validation
- college
- course (add,edit,delete)
- merit round


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
<!-- ============================= college navbar =========================== -->

<nav class="navbar navbar-expand-lg navbar-light header-navbar navbar-fixed">
   <div class="container-fluid navbar-wrapper">
      <div class="navbar-header d-flex">
         <div class="navbar-toggle menu-toggle d-xl-none d-block float-left align-items-center justify-content-center" data-toggle="collapse"><i class="ft-menu font-medium-3"></i></div>
         <ul class="navbar-nav">
            <li class="nav-item mr-2 d-none d-lg-block"><a class="nav-link apptogglefullscreen" id="navbar-fullscreen" href="javascript:;"><i class="ft-maximize font-medium-3"></i></a></li>
            <!-- <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="javascript:">
                    <i class="ft-search font-medium-3"></i></a>
                    <div class="search-input">
                        <div class="search-input-icon"><i class="ft-search font-medium-3"></i></div>
                        <input class="input" type="text" placeholder="Explore Apex..." tabindex="0"
                            data-search="template-search">
                        <div class="search-input-close"><i class="ft-x font-medium-3"></i></div>
                        <ul class="search-list"></ul>
                    </div>
                </li> -->
         </ul>
      </div>
      <div class="navbar-container">
         <div class="collapse navbar-collapse d-block" id="navbarSupportedContent">
            <ul class="navbar-nav">
               <div class="col-md-6 col-12">
                  <fieldset class="form-group">

                  </fieldset>
               </div>
               <li class="dropdown nav-item">
                  <a class="nav-link dropdown-toggle dropdown-notification p-0 mt-2 notifi" id="dropdownBasic1" href="javascript:;" data-toggle="dropdown">
                     <i class="ft-bell font-medium-3"></i>

                     <span class="notification badge badge-pill badge-danger">2</span>
                  </a>
                  <ul class="notification-dropdown dropdown-menu dropdown-menu-media dropdown-menu-right m-0 overflow-hidden">
                     <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex justify-content-between m-0 px-3 py-2 white bg-primary">
                           <div class="d-flex"><i class="ft-bell font-medium-3 d-flex align-items-center mr-2"></i><span class="noti-title">2 New Notification</span></div>
                           <!-- <span class="text-bold-400 cursor-pointer">Mark all as read</span> -->
                        </div>
                     </li>
                     <li class="scrollable-container"><a class="d-flex justify-content-between" href="javascript:void(0)">
                           <div class="media d-flex align-items-center">
                              <!-- <div class="media-left">
                                 <div class="mr-3"><img class="avatar" src="{{ asset('college-assets/app-assets/img/portrait/small/pic-8.png') }}" alt="avatar" height="45" width="45"></div>
                              </div> -->
                              <div class="media-body appends" id="appends">
                                 <!-- message -->
                              </div>
                           </div>
                        </a>

                     </li>
                     <li class="dropdown-menu-footer">
                        <div class="noti-footer text-center cursor-pointer primary border-top text-bold-400 py-1">
                           Read All Notifications</div>
                     </li>
                  </ul>
               </li>
               <li class="dropdown nav-item mr-1"><a class="nav-link dropdown-toggle user-dropdown d-flex align-items-end" id="dropdownBasic2" href="javascript:;" data-toggle="dropdown">
                     <div class="user d-md-flex d-none mr-2"><span class="text-right">{{Auth::guard('college')->user()->name}}</span><span class="text-right text-muted font-small-3">Available</span></div>
                     <img class="avatar" src="{{ asset('college-assets/app-assets/img/portrait/small/default.png') }}" alt="avatar" height="35" width="35">
                  </a>
                  <div class="dropdown-menu text-left dropdown-menu-right m-0 pb-0" aria-labelledby="dropdownBasic2"><a class="dropdown-item" href="app-chat.html">
                        <!-- <div class="d-flex align-items-center"><i -->
                        <!-- class="ft-message-square mr-2"></i><span>Chat</span></div> -->
                     </a>
                     <a class="dropdown-item" href="{{ route('college.show_edit_profile')}}">
                        <div class="d-flex align-items-center"><i class="ft-edit mr-2"></i><span>Edit
                              Profile</span></div>
                     </a>
                     <a class="dropdown-item" href="{{ route('college.show_change_password')}}">
                        <div class="d-flex align-items-center"><i class="ft-mail mr-2"></i><span>Change
                              Password</span></div>
                     </a>
                     <div class="dropdown-divider"></div><a class="dropdown-item" href="auth-login.html" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="d-flex align-items-center"><i class="ft-power mr-2"></i><span>Logout</span></div>
                     </a>
                  </div>
               </li>
               <form id="logout-form" action="{{ route('college.logout') }}" method="POST" class="d-none">
                  @csrf
               </form>
               <li class="nav-item d-none d-lg-block mr-2 mt-1"><a class="nav-link notification-sidebar-toggle" href="javascript:;"><i class="ft-align-right font-medium-3"></i></a></li>
            </ul>
         </div>
      </div>
   </div>
</nav>











<!DOCTYPE html>

<html class="loading" lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
   <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
   <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
   <meta name="author" content="PIXINVENT">
   <title>Register Page</title>
   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('student-assets/app-assets/img/ico/favicon.ico')}}">
   <link rel="shortcut icon" type="image/png" href="{{ asset('student-assets/app-assets/img/ico/favicon-32.png')}}">
   <meta name="apple-mobile-web-app-capable" content="yes">
   <meta name="apple-touch-fullscreen" content="yes">
   <meta name="apple-mobile-web-app-status-bar-style" content="default">
   <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
   <!-- BEGIN VENDOR CSS-->
   <!-- font icons-->
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/fonts/feather/style.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/fonts/simple-line-icons/style.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/vendors/css/perfect-scrollbar.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/vendors/css/prism.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/vendors/css/switchery.min.css')}}">
   <!-- END VENDOR CSS-->
   <!-- BEGIN APEX CSS-->
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/css/bootstrap.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/css/bootstrap-extended.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/css/colors.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/css/components.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/app-assets/css/themes/layout-dark.min.css')}}">
   <link rel="stylesheet" href="{{ asset('student-assets/app-assets/css/plugins/switchery.min.css')}}">
   <!-- END APEX CSS-->
   <!-- BEGIN Page Level CSS-->
   <link rel="stylesheet" href="{{ asset('student-assets/app-assets/css/pages/authentication.css')}}">
   <!-- END Page Level CSS-->
   <!-- BEGIN: Custom CSS-->
   <link rel="stylesheet" type="text/css" href="{{ asset('student-assets/assets/css/style.css')}}">
   <!-- END: Custom CSS-->
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 1-column auth-page navbar-sticky blank-page" data-menu="vertical-menu" data-col="1-column">
   <!-- ////////////////////////////////////////////////////////////////////////////-->
   <div class="wrapper">
      <div class="main-panel">
         <!-- BEGIN : Main Content-->
         <div class="main-content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
               <!--Registration Page Starts-->
               <section id="regestration" class="auth-height">
                  <div class="row full-height-vh m-0">
                     <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="card overflow-hidden">
                           <div class="card-content">
                              <div class="card-body auth-img">
                                 <div class="row m-0">
                                    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center text-center auth-img-bg py-2">
                                       <img src="{{ asset('student-assets/app-assets/img/gallery/register.png')}}" alt="" class="img-fluid" width="350" height="230">
                                    </div>
                                    <div class="col-lg-6 col-md-12 px-4 py-3">
                                       <h4 class="card-title mb-2">Student Create Account</h4>
                                       <p>Fill the below form to create a new account.</p>
                                       <form method="POST" action="{{ route('register') }}" id="register" enctype="multipart/form-data">
                                          @csrf
                                          <!-- name -->
                                          <input id="name" type="name" class="form-control @error('name') is-invalid @enderror mb-2" value="{{ old('name') }}" placeholder="name">
                                          @error('name')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <!-- email -->
                                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror mb-2" value="{{ old('email') }}" placeholder="Email">
                                          @error('email')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <!-- contact no -->
                                          <input id="contact_no" type="text" class="form-control @error('contact_no') is-invalid @enderror mb-2" value="{{ old('contact_no') }}" placeholder="contact_no">
                                          @error('contact_no')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <!-- gender -->
                                          <input type="radio" name="gender" value="M"> Male<br>
                                          <input type="radio" name="gender" value="F"> Female<br>
                                          @error('gender')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <!-- address -->
                                          <input id="address" type="text" class="form-control @error('address') is-invalid @enderror mb-2" value="{{ old('address') }}" placeholder="address">
                                          @error('address')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <!-- adhaar_card_no -->
                                          <input id="adhaar_card_no" type="text" class="form-control @error('adhaar_card_no') is-invalid @enderror mb-2" value="{{ old('adhaar_card_no') }}" placeholder="adhaar_card_no">
                                          @error('adhaar_card_no')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <!-- image -->
                                          <input id="image" type="file" class="form-control @error('image') is-invalid @enderror mb-2" value="{{ old('image') }}" placeholder="image">
                                          @error('image')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <!-- password -->
                                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror mb-2" value="{{ old('password') }}" placeholder="password">
                                          @error('password')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <!-- password-confirm -->
                                          <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror mb-2" value="{{ old('password-confirm') }}" placeholder="password-confirm">
                                          @error('password-confirm')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror

                                          <div class="d-flex justify-content-between flex-sm-row flex-column">
                                             <a href="auth-login.html" class="btn bg-light-primary mb-2 mb-sm-0">Back To Login</a>
                                             <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                             </button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <!--Registration Page Ends-->

            </div>
         </div>
         <!-- END : End Main Content-->
      </div>
   </div>
   <!-- ////////////////////////////////////////////////////////////////////////////-->

   <!-- BEGIN VENDOR JS-->
   <script src="{{ asset('student-assets/app-assets/vendors/js/vendors.min.js')}}"></script>
   <script src="{{ asset('student-assets/app-assets/vendors/js/switchery.min.js')}}"></script>
   <!-- BEGIN VENDOR JS-->
   <!-- BEGIN PAGE VENDOR JS-->
   <!-- END PAGE VENDOR JS-->
   <!-- BEGIN APEX JS-->
   <script src="{{ asset('student-assets/app-assets/js/core/app-menu.min.js')}}"></script>
   <script src="{{ asset('student-assets/app-assets/js/core/app.min.js')}}"></script>
   <script src="{{ asset('student-assets/app-assets/js/notification-sidebar.min.js')}}"></script>
   <script src="{{ asset('student-assets/app-assets/js/customizer.min.js')}}"></script>
   <script src="{{ asset('student-assets/app-assets/js/scroll-top.min.js')}}"></script>
   <!-- END APEX JS-->
   <!-- BEGIN PAGE LEVEL JS-->
   <!-- END PAGE LEVEL JS-->
   <!-- BEGIN: Custom CSS-->
   <script src="{{ asset('student-assets/assets/js/scripts.js')}}"></script>
   <!-- END: Custom CSS-->
</body>
<!-- END : Body-->

<!-- Mirrored from pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Dec 2021 20:12:48 GMT -->

</html>

<div class="col-md-6 col-12">
   <label for="college_id">College</label>
   <fieldset class="form-group">
      <select class="custom-select course @error('college_id') is-invalid @enderror" id="college_id" name="college_id" value="college_id">
         <option value="0">Select College</option>
         @foreach($college as $college)
         <option class="dropdown-item" value="{{ $college->id }}">{{ $college->name }}</option>
         @endforeach
      </select>
      @error('college_id')
      <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
      </span>
      @enderror
   </fieldset>
</div>

<!-- multi delete -->
$(document).on('click','#deletes',function(){
var id = [];
$(":checkbox:checked").each(function(key){
id[key]=$(this).val();
});
if(id.length === 0){
alert("Please Selected atleast One Id");
}else if(confirm("Are you Sure You Want To Deleted this row....")){
$.ajax({
url: "singleFileServer.php",
type: "POST",
dataType :'JSON',
data: {
'id': id,
'action': 'delet'
},
success: function(res){
// console.log(res.id);return false;
if(res){
$.each(res.id, function(key,value){
// console.log(kay);
$('#studentdata').find('tr[id=' + value + ']').remove();
});
alert("successfully deleted");
// getdata();
}else{
alert("no deleted");
}
}
});
}
});

}else if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] =='delet'){

$id = $_POST['id'];
$str = implode($id,",");
foreach ($id as $value) {
$query = "SELECT * FROM `singleajex` WHERE id = $value";
$query_run = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($query_run);
$q = "DELETE FROM `singleajex` WHERE id = $value";
$result = mysqli_query($conn,$q);
if (file_exists(getcwd() . '.\images/' . $row['image']))
{
// $q = "DELETE FROM `singleajex` WHERE id = $value";
// $result = mysqli_query($conn,$q);
unlink('.\images/' . $row['image']);
}
$data['id'] = $_POST['id'];

}
echo json_encode($data);
exit();

$(document).on('click','#deletes',function(){
var id = [];
$(":checkbox:checked").each(function(key){
id[key]=$(this).val();
});
if(id.length === 0){
alert("Please Selected atleast One Id");
}else if(confirm("Are you Sure You Want To Deleted this row....")){
$.ajax({
url: "backupserverajax.php",
type: "POST",
data: {
'id': id,
'action': 'delet'
},
success: function(data){
if(data){
alert("successfully deleted");
getdata();
}else{
alert("no deleted");
}
}
});
}
});

}else if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] =='delet'){
$id = $_POST['id'];
$str = implode($id,",");
$q = "DELETE FROM `singleajex` WHERE id IN ($str)";
$query = mysqli_query($conn,$q);
if($query){
echo true;
}
else{
echo false;
}


// return $model->whereRaw
$data = $model->newQuery();
$data1 = collect($data);
// $college_ids = Addmission::get(['id'])->pluck('id')->toArray();
// dd($college_ids);
$data1->filter(function () use ($model) {

foreach ($model->get() as $key => $d) {
$selected_college = explode(',', $d->college_id);
return $selected_college[0] == Auth::user()->id;
}

});
// dd(collect($data));
return $data1;
// $college_ids = Addmission::get(['id'])->pluck('id')->toArray();

// $model->contains(function ($value, $key) {

// dd($value);
// // return $value > 5;
// $selected_college = explode(',', $order->college_id);
// return $selected_college[0] == Auth::user()->id;
// });
// dd(Auth::user()->id);
// // $admissions = Addmission::select('college_id','id')->get();
// foreach ($model as $admission) {
// $selected_college = explode(',', $admission->college_id);
// dd($selected_college[0]);
// // $adadmission = Addmission::whereIn('college_id', $selected_college[0])->get();
// if ($selected_college[0] == Auth::user()->id) {
// // dd(1);
// // $admission = Addmission::select('college_id')->get();

// }
// $data = Addmission::where($selected_college[0], Auth::user()->id)->get();
// }
// dd($admission);
// return $data;
// return $model->where('college_id',)->newQuery();



<table class="table">
   <tr>
      <th>Label</th>
      <th>Details</th>
   </tr>
   <tr>
      <td>Name</td>
      <td>{{$admission->user->name}}</td>
   </tr>
   <tr>
      <td>Merit</td>
      <td>{{$admission->merit}}</td>
   </tr>
   <tr>
      <td>Course</td>
      <td>{{$admission->course->name}}</td>
   </tr>
   <tr>
      <td>College</td>
      <td>{{$college->name}}</td>
   </tr>
   <tr>
      <td>Admission Date</td>
      <td>{{$admission->addmission_date}}</td>
   </tr>
   <tr>
      <td>Admission Code</td>
      <td>{{$admission->addmission_code}}</td>
   </tr>
</table>
<h6>- Your Merit Not Match You Selected first college. <b>If You want to Reserved Seat Press Confirm Button</b> .</h6>
<h6>- If You Want To go for Next Round Press Next Button.</h6>
<h6>- Tf You do not want admission Press Reject Button.</h6>

<a type="button" id="confiem" data-id="1-r" class="btn btn-success round mr-1 mb-1 confirm">Confirms</a>
<a type="button" id="next" data-id="4" class="btn btn-info round mr-1 mb-1 confirm">Next</a>
<!-- <a type="button" id="confiem" data-id="1" class="btn btn-success round mr-1 mb-1 confirm">Confirm</a>
                           <a type="button" id="next" data-id="4" class="btn btn-info round mr-1 mb-1 confirm">Next</a> -->
<a type="button" id="rejected" data-id="2" class="btn btn-dark round mr-1 mb-1 confirm">Rejected</a>

@elseif($admission->merit <= $college_merit->merit)

   @else



   // dd(2);
   // $college = College::where('id', $admission->college_id[0] ?? '')->first();
   // $college_merit = CollegeMerit::where('college_id', $admission->college_id[0])->first();
   // $meritround = MeritRound::where('status', '1')->first();
   // $date_now = date("Y-m-d");
   // if ($admission) {
   // $merit = $admission->merit;
   // return view('home', compact('merit', 'admission', 'meritround', 'date_now', 'college', 'college_merit'));
   // } else {
   // $merit = '0';
   // return view('home', compact('merit', 'admission', 'meritround', 'date_now', 'college', 'college_merit'));
   // }
   // return view('home');

   // dd($admission);
   // foreach ($admission['college_id'] as $result) {
   // $college_merit = CollegeMerit::where('college_id', $result)->select('merit')->first();
   // // dd($college_merit);
   // if ($admission) {
   // if ($admission->merit >= $college_merit->merit) {
   // // dd(1);
   // $merit = $admission->merit;
   // $college = College::where('id', $result)->first();
   // // dd($college);
   // return view('home', compact('merit', 'admission', 'meritround', 'date_now', 'college', 'college_merit'));
   // }
   // } else {
   // $merit = '0';
   // return view('home', compact('merit', 'admission', 'meritround', 'date_now', 'college', 'college_merit'));
   // }
   // }


   // foreach ($admission['college_id'] as $result) {
   // $college_merit = CollegeMerit::where('college_id', $result)->select('merit')->get();
   // if ($admission->merit >= $college_merit->merit) {
   // $college = College::where('id', $result)->get();
   // return view('home', compact('college', 'admission'));
   // }
   // }

   elseif ($admission->merit <= $college_merit->merit) {
      dd(1);
      $data->status = "1";
      AddmissionConfiram::updateOrCreate(
      [
      'addmission_id' => $id,
      ],
      [
      'confirm_college_id' => $admission->college_id[0],
      'confirm_merit' => $admission->merit,
      'confirm_round_id' => '1',
      'confirmation_type' => 'R',
      ]
      );
      }

      // select replace(replace(SUBSTRING_INDEX(college_id,',',1),'["',''),'"','') AS first_college_id FROM `addmissions` HAVING first_college_id = 18;
      // select replace(SUBSTRING_INDEX(college_id,',',1),'["','') AS FIRST_ELEMENT FROM `addmissions`;
      // select preg_replace('/(["|")/','',(SUBSTRING_INDEX(college_id,',',1))) AS FIRST_ELEMENT FROM `addmissions`;

      return $model->select(
      'replace(replace(SUBSTRING_INDEX(college_id,',',1),'["',''),'"','')' AS 'first_college_id'
      )
      ->newQuery();
      // foreach ($admissions as $admission) {
      // // dd($admission);
      // $a = $admission->college_id[0];
      // if ($a == Auth::user()->id) {
      // }
      // }









      <!-- ============================================================================================== -->
      @extends('layouts.master')
      @section('content')
      <div class="content-overlay"></div>
      <div class="content-wrapper">
         <!--Statistics cards Starts-->
         <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-12">
               <div class="card gradient-purple-love">
                  <div class="card-content">
                     <div class="card-body py-0">
                        <div class="media pb-1">
                           <div class="media-body white text-left">
                              <h3 class="font-large-1 white mb-0">{{$merit}}</h3>
                              <span>Total Merit</span>
                           </div>
                           <div class="media-right white text-right">
                              <i class="fa fa-shopping-basket font-large-1"></i>
                           </div>
                        </div>
                     </div>
                     <div id="" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                     </div>
                  </div>
               </div>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;
            @if($date_now >= $meritround->merit_result_declare_date)
            <div class="">
               <div class="card gradient-ibiza-sunset">
                  <div class="card-content">
                     <div class="card-body py-0">
                        <div class="media pb-1">
                           <div class="media-body white text-left">
                              <h3 class="font-large-1 white mb-0">Your Admission Detail</h3></br>
                              <span>
                                 @if($admission == NULL)
                                 <h4>No data, First add Your Mark and then fill admission form</h4>
                                 @else
                                 <table class="table">
                                    <tr>
                                       <th>Label</th>
                                       <th>Details</th>
                                    </tr>
                                    <tr>
                                       <td>Name</td>
                                       <td>{{$admission->user->name}}</td>
                                    </tr>
                                    <tr>
                                       <td>Merit</td>
                                       <td>{{$admission->merit}}</td>
                                    </tr>
                                    <tr>
                                       <td>Course</td>
                                       <td>{{$admission->course->name}}</td>
                                    </tr>

                                    <tr>
                                       <td>College</td>
                                       <td>{{$college->name}}</td>
                                    </tr>
                                    <tr>
                                       <td>Admission Date</td>
                                       <td>{{$admission->addmission_date}}</td>
                                    </tr>
                                    <tr>
                                       <td>Admission Code</td>
                                       <td>{{$admission->addmission_code}}</td>
                                    </tr>
                                 </table>
                                 @if($admission->merit <= $college_merit->merit)
                                    <h6>- Your Merit Not Match You Selected first college. <b>If You want to Reserved Seat Press Confirm Button</b> .</h6>
                                    @else
                                    <h6>- You have shortlisted on merit you are eligible for ({{$college->name}}) Please Press Confiem button.</h6>
                                    @endif
                                    <h6>- If You Want To go for Next Round Press Next Button.</h6>
                                    <h6>- Tf You do not want admission Press Reject Button.</h6>

                                    @if(Session::get('xyz')==1)
                                    <a type="button" id="confiem" data-id="1" class="btn btn-success round mr-1 mb-1 confirm">Confirm</a>
                                    @elseif(Session::get('xyz')==4)
                                    <a type="button" id="next" data-id="4" class="btn btn-info round mr-1 mb-1 confirm">Next</a>
                                    @else
                                    <a type="button" id="confiem" data-id="1" class="btn btn-success round mr-1 mb-1 confirm">Confirm</a>
                                    <a type="button" id="next" data-id="4" class="btn btn-info round mr-1 mb-1 confirm">Next</a>
                                    <a type="button" id="rejected" data-id="2" class="btn btn-dark round mr-1 mb-1 confirm">Rejected</a>
                                    @endif
                                    @endif
                              </span>
                           </div>
                           <div class="media-right white text-right">
                              <i class="fa fa-superpowers font-large-1"></i>
                           </div>
                        </div>
                     </div>
                     <div id="" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                     </div>

                  </div>
               </div>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;

            @endif

            <!-- <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                <div class="card gradient-mint">
                    <div class="card-content">
                        <div class="card-body py-0">
                            <div class="media pb-1">
                                <div class="media-body white text-left">
                                    <h3 class="font-large-1 white mb-0">3</h3>
                                    <span>Total Category</span>
                                </div>
                                <div class="media-right white text-right">
                                    <i class="ft-list font-large-1"></i>
                                </div>
                            </div>
                        </div>
                        <div id=""
                            class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                        </div>
                    </div>
                </div>
            </div> -->
         </div>
         <!--Statistics cards Ends-->
      </div>
      @endsection
      @push('js')
      <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
      <script>
         $(document).ready(function() {
            // var id = $(this).data('id');
         });

         $(document).on('click', '.confirm', function() {
            swal({
                  title: "Are you sure?",
                  text: "You Want To Confirm Your Addmission!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
               })
               .then((willDelete) => {
                  if (willDelete) {
                     var id = $(this).data('id');
                     alert(id);
                     var number = $(this).attr('id', 'asd');
                     $.ajax({
                        url: "{{route('admis_status')}}",
                        type: 'get',
                        data: {
                           id: id,
                        },
                        dataType: "json",
                        success: function(data) {
                           console.log(data);
                           if (data.status == 1) {
                              toastr.success("Congratulations Your Admission is Confirm....");
                           } else if (data.status == 2) {
                              toastr.error("Your Admission Is Rejected Successfully....");
                           } else {
                              location.href = "{{route('admission_form')}}";
                           }
                        }
                     })
                     // swal("Your Status Has Ben Change Succesfully", {
                     //     icon: "success",
                     // });
                  } else {
                     swal("Your Status is safe!");
                  }
               });
         });
      </script>
      @endpush
      <!-- ============================================================================================== -->

      @if(Session::get('xyz')==1)
      <button type="button" id="confiem" class="btn btn-success round mr-1 mb-1">Your Admission is Confirm Succesfully</button>
      <!-- <a type="button" id="confiem" data-id="1" class="btn btn-success round mr-1 mb-1 confirm" >Confirm</a> -->
      @elseif(Session::get('xyz')==4)
      <button type="button" id="next" data-id="4" class="btn btn-info round mr-1 mb-1 confirm">Next</button>
      @elseif(Session::get('xyz')==2)
      <button type="button" id="rejected" data-id="2" class="btn btn-dark round mr-1 mb-1">Your Admission is Rejected Succesfully</button>
      @else
      <button type="button" id="confiem" data-id="1" class="btn btn-success round mr-1 mb-1 confirm">Confirm</button>
      <button type="button" id="next" data-id="4" class="btn btn-info round mr-1 mb-1 confirm">Next</button>
      <button type="button" id="rejected" data-id="2" class="btn btn-dark round mr-1 mb-1 confirm">Rejected</button>
      @endif

      Hello sir,
      i have completed this project as per provided requirement

      University url
      http://192.168.0.25:8000/university/login
      email : admin@admin.com
      password : admin@123

      College url
      http://192.168.0.25:8000/college/login

      Student url
      http://192.168.0.25:8000

      Ishani Ranpariya
      Work Report :: 20/01/2022
      - solve previous error
      - manage status rejected (if student reject admission then student no continue admission project)
      - self testing project and solve error
      - complete project as per provided requirement

      Ranpariya Ishani
      MR :: 21/01/2022
      Today I am Working on below point
      - watch video how to host project on live serve
      - make account and

      Ranpariya Ishani
      Work Report :: 21/01/2022
      - watch video how to host project on live serve
      - create account in aws
      - install termius and run command and solve error

      Ranpariya Ishani
      Work Report :: 22/01/2022
      - create new instance
      - create new host in termius and install
      - nginx
      - mysql
      - php
      - phpmyadmin
      - composer

      University url
      http://65.0.102.75/university/login
      email : admin@admin.com
      password : admin@123

      College url
      http://65.0.102.75/college/login

      Student url
      http://65.0.102.75/

      Ranpariya Ishani
      Work Report :: 24/01/2022
      - clone project run migration and seeder
      - testing project and solve error
      - Project Upload on server with error free

      Ranpariya Ishani
      Work Report :: 25/01/2022
      - setup welcome page
      - change login and register page
      - self testing and solve error




      <!DOCTYPE html>
      <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

      <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">

         <title>Welcome Student Portal</title>

         <!-- Fonts -->
         <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

         <!-- Styles -->
         <!-- vertical-align:middle -->
         <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
            html {
               line-height: 1.15;
               -webkit-text-size-adjust: 100%
            }

            body {
               margin: 0
            }

            a {
               background-color: transparent
            }

            [hidden] {
               display: none
            }

            html {
               font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
               line-height: 1.5
            }

            *,
            :after,
            :before {
               box-sizing: border-box;
               border: 0 solid #e2e8f0
            }

            a {
               color: inherit;
               text-decoration: inherit
            }

            svg,
            video {
               display: block;
            }

            video {
               max-width: 100%;
               height: auto
            }

            .bg-white {
               --bg-opacity: 1;
               background-color: #fff;
               background-color: rgba(255, 255, 255, var(--bg-opacity))
            }

            .bg-gray-100 {
               --bg-opacity: 1;
               background-color: #f7fafc;
               background-color: rgba(247, 250, 252, var(--bg-opacity))
            }

            .border-gray-200 {
               --border-opacity: 1;
               border-color: #edf2f7;
               border-color: rgba(237, 242, 247, var(--border-opacity))
            }

            .border-t {
               border-top-width: 1px
            }

            .flex {
               display: flex
            }

            .grid {
               display: grid
            }

            .hidden {
               display: none
            }

            .items-center {
               align-items: center
            }

            .justify-center {
               justify-content: center
            }

            .font-semibold {
               font-weight: 600
            }

            .h-5 {
               height: 1.25rem
            }

            .h-8 {
               height: 2rem
            }

            .h-16 {
               height: 4rem
            }

            .text-sm {
               font-size: .875rem
            }

            .text-lg {
               font-size: 1.125rem
            }

            .leading-7 {
               line-height: 1.75rem
            }

            .mx-auto {
               margin-left: auto;
               margin-right: auto
            }

            .ml-1 {
               margin-left: .25rem
            }

            .mt-2 {
               margin-top: .5rem
            }

            .mr-2 {
               margin-right: .5rem
            }

            .ml-2 {
               margin-left: .5rem
            }

            .mt-4 {
               margin-top: 1rem
            }

            .ml-4 {
               margin-left: 1rem
            }

            .mt-8 {
               margin-top: 2rem
            }

            .ml-12 {
               margin-left: 3rem
            }

            .-mt-px {
               margin-top: -1px
            }

            .max-w-6xl {
               max-width: 72rem
            }

            .min-h-screen {
               min-height: 100vh
            }

            .overflow-hidden {
               overflow: hidden
            }

            .p-6 {
               padding: 1.5rem
            }

            .py-4 {
               padding-top: 1rem;
               padding-bottom: 1rem
            }

            .px-6 {
               padding-left: 1.5rem;
               padding-right: 1.5rem
            }

            .pt-8 {
               padding-top: 2rem
            }

            .fixed {
               position: fixed
            }

            .relative {
               position: relative
            }

            .top-0 {
               top: 0
            }

            .right-0 {
               right: 0
            }

            .shadow {
               box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
            }

            .text-center {
               text-align: center
            }

            .text-gray-200 {
               --text-opacity: 1;
               color: #edf2f7;
               color: rgba(237, 242, 247, var(--text-opacity))
            }

            .text-gray-300 {
               --text-opacity: 1;
               color: #e2e8f0;
               color: rgba(226, 232, 240, var(--text-opacity))
            }

            .text-gray-400 {
               --text-opacity: 1;
               color: #cbd5e0;
               color: rgba(203, 213, 224, var(--text-opacity))
            }

            .text-gray-500 {
               --text-opacity: 1;
               color: #a0aec0;
               color: rgba(160, 174, 192, var(--text-opacity))
            }

            .text-gray-600 {
               --text-opacity: 1;
               color: #718096;
               color: rgba(113, 128, 150, var(--text-opacity))
            }

            .text-gray-700 {
               --text-opacity: 1;
               color: #4a5568;
               color: rgba(74, 85, 104, var(--text-opacity))
            }

            .text-gray-900 {
               --text-opacity: 1;
               color: #1a202c;
               color: rgba(26, 32, 44, var(--text-opacity))
            }

            .underline {
               text-decoration: underline
            }

            .antialiased {
               -webkit-font-smoothing: antialiased;
               -moz-osx-font-smoothing: grayscale
            }

            .w-5 {
               width: 1.25rem
            }

            .w-8 {
               width: 2rem
            }

            .w-auto {
               width: auto
            }

            .grid-cols-1 {
               grid-template-columns: repeat(1, minmax(0, 1fr))
            }

            @media (min-width:640px) {
               .sm\:rounded-lg {
                  border-radius: .5rem
               }

               .sm\:block {
                  display: block
               }

               .sm\:items-center {
                  align-items: center
               }

               .sm\:justify-start {
                  justify-content: flex-start
               }

               .sm\:justify-between {
                  justify-content: space-between
               }

               .sm\:h-20 {
                  height: 5rem
               }

               .sm\:ml-0 {
                  margin-left: 0
               }

               .sm\:px-6 {
                  padding-left: 1.5rem;
                  padding-right: 1.5rem
               }

               .sm\:pt-0 {
                  padding-top: 0
               }

               .sm\:text-left {
                  text-align: left
               }

               .sm\:text-right {
                  text-align: right
               }
            }

            @media (min-width:768px) {
               .md\:border-t-0 {
                  border-top-width: 0
               }

               .md\:border-l {
                  border-left-width: 1px
               }

               .md\:grid-cols-2 {
                  grid-template-columns: repeat(2, minmax(0, 1fr))
               }
            }

            @media (min-width:1024px) {
               .lg\:px-8 {
                  padding-left: 2rem;
                  padding-right: 2rem
               }
            }

            @media (prefers-color-scheme:dark) {
               .dark\:bg-gray-800 {
                  --bg-opacity: 1;
                  background-color: #2d3748;
                  background-color: rgba(45, 55, 72, var(--bg-opacity))
               }

               .dark\:bg-gray-900 {
                  --bg-opacity: 1;
                  background-color: #1a202c;
                  background-color: rgba(26, 32, 44, var(--bg-opacity))
               }

               .dark\:border-gray-700 {
                  --border-opacity: 1;
                  border-color: #4a5568;
                  border-color: rgba(74, 85, 104, var(--border-opacity))
               }

               .dark\:text-white {
                  --text-opacity: 1;
                  color: #fff;
                  color: rgba(255, 255, 255, var(--text-opacity))
               }

               .dark\:text-gray-400 {
                  --text-opacity: 1;
                  color: #cbd5e0;
                  color: rgba(203, 213, 224, var(--text-opacity))
               }

               .dark\:text-gray-500 {
                  --tw-text-opacity: 1;
                  color: #6b7280;
                  color: rgba(107, 114, 128, var(--tw-text-opacity))
               }
            }
         </style>

         <style>
            body {
               font-family: 'Nunito', sans-serif;
            }
         </style>
      </head>

      <body class="antialiased">
         <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
               @auth
               <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
               @else
               <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

               @if (Route::has('register'))
               <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
               @endif
               @endauth
            </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
               <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                  <h1 style="color: red;">Welcome Student Portal</h1>
                  <!-- <svg viewBox="0 0 651 192" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto text-gray-700 sm:h-20">
                        <g clip-path="url(#clip0)" fill="#EF3B2D">
                            <path d="M248.032 44.676h-16.466v100.23h47.394v-14.748h-30.928V44.676zM337.091 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.431 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162-.001 2.863-.479 5.584-1.432 8.161zM463.954 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.432 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162 0 2.863-.479 5.584-1.432 8.161zM650.772 44.676h-15.606v100.23h15.606V44.676zM365.013 144.906h15.607V93.538h26.776V78.182h-42.383v66.724zM542.133 78.182l-19.616 51.096-19.616-51.096h-15.808l25.617 66.724h19.614l25.617-66.724h-15.808zM591.98 76.466c-19.112 0-34.239 15.706-34.239 35.079 0 21.416 14.641 35.079 36.239 35.079 12.088 0 19.806-4.622 29.234-14.688l-10.544-8.158c-.006.008-7.958 10.449-19.832 10.449-13.802 0-19.612-11.127-19.612-16.884h51.777c2.72-22.043-11.772-40.877-33.023-40.877zm-18.713 29.28c.12-1.284 1.917-16.884 18.589-16.884 16.671 0 18.697 15.598 18.813 16.884h-37.402zM184.068 43.892c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002-35.648-20.524a2.971 2.971 0 00-2.964 0l-35.647 20.522-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v38.979l-29.706 17.103V24.493a3 3 0 00-.103-.776c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002L40.098 1.396a2.971 2.971 0 00-2.964 0L1.487 21.919l-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v122.09c0 1.063.568 2.044 1.489 2.575l71.293 41.045c.156.089.324.143.49.202.078.028.15.074.23.095a2.98 2.98 0 001.524 0c.069-.018.132-.059.2-.083.176-.061.354-.119.519-.214l71.293-41.045a2.971 2.971 0 001.489-2.575v-38.979l34.158-19.666a2.971 2.971 0 001.489-2.575V44.666a3.075 3.075 0 00-.106-.774zM74.255 143.167l-29.648-16.779 31.136-17.926.001-.001 34.164-19.669 29.674 17.084-21.772 12.428-43.555 24.863zm68.329-76.259v33.841l-12.475-7.182-17.231-9.92V49.806l12.475 7.182 17.231 9.92zm2.97-39.335l29.693 17.095-29.693 17.095-29.693-17.095 29.693-17.095zM54.06 114.089l-12.475 7.182V46.733l17.231-9.92 12.475-7.182v74.537l-17.231 9.921zM38.614 7.398l29.693 17.095-29.693 17.095L8.921 24.493 38.614 7.398zM5.938 29.632l12.475 7.182 17.231 9.92v79.676l.001.005-.001.006c0 .114.032.221.045.333.017.146.021.294.059.434l.002.007c.032.117.094.222.14.334.051.124.088.255.156.371a.036.036 0 00.004.009c.061.105.149.191.222.288.081.105.149.22.244.314l.008.01c.084.083.19.142.284.215.106.083.202.178.32.247l.013.005.011.008 34.139 19.321v34.175L5.939 144.867V29.632h-.001zm136.646 115.235l-65.352 37.625V148.31l48.399-27.628 16.953-9.677v33.862zm35.646-61.22l-29.706 17.102V66.908l17.231-9.92 12.475-7.182v33.841z"/>
                        </g>
                    </svg> -->
               </div>
               <h2>Register Now</h2>

               <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                  <div class="grid grid-cols-1 md:grid-cols-2">
                     <div class="p-6">
                        <div class="flex items-center">
                           <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                              <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                           </svg>
                           <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                        </div>

                        <div class="ml-12">
                           <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                              Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                           </div>
                        </div>
                     </div>

                     <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                           <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                              <path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                              <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                           </svg>
                           <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>
                        </div>

                        <div class="ml-12">
                           <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                              Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                           </div>
                        </div>
                     </div>

                     <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                           <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                              <path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                           </svg>
                           <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>
                        </div>

                        <div class="ml-12">
                           <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                              Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                           </div>
                        </div>
                     </div>

                     <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                           <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                              <path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                           </svg>
                           <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>
                        </div>

                        <div class="ml-12">
                           <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                              Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                  <div class="text-center text-sm text-gray-500 sm:text-left">
                     <div class="flex items-center">
                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                           <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>

                        <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                           Shop
                        </a>

                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                           <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>

                        <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                           Sponsor
                        </a>
                     </div>
                  </div>

                  <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                     Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                  </div>
               </div>
            </div>
         </div>
      </body>

      </html>




      <!-- Register Page -->
      @extends('layouts.app')
      @section('content')
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-8">
               <div class="card">
                  <div class="card-header">
                     <h1>Student Register</h1>
                  </div>

                  <div class="card-body">
                     <form method="POST" action="{{ route('register') }}" id="register" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                           <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                           <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                           <div class="col-md-6">
                              <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="contact_no" class="col-md-4 col-form-label text-md-end">{{ __('Contact No') }}</label>
                           <div class="col-md-6">
                              <input id="contact_no" type="number" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no') }}" autocomplete="contact_no">
                              @error('contact_no')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                           <div class="col-md-6">
                              <input type="radio" name="gender" value="M"> Male<br>
                              <input type="radio" name="gender" value="F"> Female<br>
                           </div>
                           @error('gender')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="row mb-3">
                           <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                           <div class="col-md-6">
                              <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address">
                              @error('address')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="dob" class="col-md-4 col-form-label text-md-end">{{ __('dob') }}</label>
                           <div class="col-md-6">
                              {{Form::date('dob','',['class'=>'form-control txtDate'])}}
                              @error('dob')
                              <span role="alert">
                                 <strong style="color:red;">{{$message}}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="adhaar_card_no" class="col-md-4 col-form-label text-md-end">{{ __('Adhaar Card No') }}</label>
                           <div class="col-md-6">
                              <input autocomplete='off' type='text' class="form-control card-number @error('adhaar_card_no') is-invalid @enderror" maxlength="19" id="adhaar_card_no" name="adhaar_card_no" size='20' value="{{ old('adhaar_card_no') }}">

                              <!-- <input id="adhaar_card_no" type="adhaar_card_no" class="form-control @error('adhaar_card_no') is-invalid @enderror" name="adhaar_card_no" value="{{ old('adhaar_card_no') }}" autocomplete="adhaar_card_no"> -->
                              @error('adhaar_card_no')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Profile') }}</label>
                           <div class="col-md-6">
                              <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">
                              @error('image')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                           <div class="col-md-6">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>

                        <div class="row mb-3">
                           <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                           <div class="col-md-6">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                           </div>
                        </div>

                        <div class="row mb-0">
                           <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                 {{ __('Register') }}
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
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
            var maxDate = year + '-' + month + '-' + day;
            $('.txtDate').attr('max', maxDate);
         });
         $('input[name=adhaar_card_no]').keypress(function() {
            var rawNumbers = $(this).val().replace(/ /g, '');
            var cardLength = rawNumbers.length;
            if (cardLength !== 0 && cardLength <= 12 && cardLength % 4 == 0) {
               $(this).val($(this).val() + ' ');
            }
         });
         $('#register').validate({
            rules: {
               name: {
                  required: true,
               },
               email: {
                  required: true,
               },
               contact_no: {
                  required: true,
                  maxlength: 10,
                  minlength: 10
               },
               gender: {
                  required: true,
               },
               address: {
                  required: true,
               },
               dob: {
                  required: true,
               },
               adhaar_card_no: {
                  required: true,
               },
               image: {
                  required: true,
               },
               password: {
                  required: true,
                  minlength: 8
               },
               password_confirmation: {
                  required: true,
                  equalTo: "#password"
               },
            },
            errorElement: 'span',
            messages: {
               name: 'Please Enter Your Name.',
               email: 'Please Enter Your Email Address.',
               contact_no: {
                  required: 'Please Enter Your Mobile Number.',
                  maxlength: 'Please enter only 10 digits.',
                  minlength: 'Please enter at least 10 digits.'
               },
               gender: 'Please Select Your Address.',
               address: 'Please Enter Your Address.',
               dob: 'Please Select Your Birth Date.',
               adhaar_card_no: 'Please Enter Your Adhaar Card Number.',
               image: 'Please Select Your Profile Image.',
               password: {
                  required: 'Please Enter Your Password.',
                  minlength: 'Please Enter at least 8 characters.'
               },
               password_confirmation: {
                  required: 'Please Enter Confirmation.',
                  equalTo: 'Please Enter Confirm Password Same as a Password.'
               }
            },
            highlight: function(element, errorClass, validClass) {
               $(element).addClass('is-invalid');
               $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
            },
            unhighlight: function(element, errorClass, validClass) {
               $(element).removeClass('is-invalid');
               $(element).parents(".error").removeClass(errorClass).addClass(validClass);
            },
         });
      </script>
      @endpush

      $('#common_settings_edit').validate({
      // rules: {
      // marks: {
      // required: true,
      // },
      // },
      messages: {
      marks: 'Please Enter Marks!',
      },
      highlight: function(element, errorClass, validClass) {
      $(element).addClass("is-invalid").removeClass("is-valid");
      },
      unhighlight: function(element, errorClass, validClass) {
      $(element).addClass("is-valid").removeClass("is-invalid");
      },
      submitHandler: function(form) {
      form.submit();
      }
      });


      // public function login(Request $request)
      // {
      // $this->validateLogin($request);
      // $meritround = MeritRound::where('status', '1')->first();
      // $date_now = date("Y-m-d"); // this format is string comparable

      // if ($date_now >= $meritround->merit_result_declare_date) {
      // dd(1);
      // // $user = User::where('email', $request->email)->first();
      // // $admission = Addmission::where('user_id', $user->id)->first();
      // // $merit = $admission->merit;
      // // $first_sel_college = $admission->college_id[0];
      // // $college_merit = CollegeMerit::where('college_id', $first_sel_college)->first();
      // // if ($merit >= $college_merit->merit) {
      // // dd(1);
      // if (
      // method_exists($this, 'hasTooManyLoginAttempts') &&
      // $this->hasTooManyLoginAttempts($request)
      // ) {
      // $this->fireLockoutEvent($request);
      // return $this->sendLockoutResponse($request);
      // }

      // if ($this->attemptLogin($request)) {
      // if ($request->hasSession()) {
      // $request->session()->put('auth.password_confirmed_at', time());
      // }
      // return $this->sendLoginResponse($request);
      // }
      // $this->incrementLoginAttempts($request);
      // return $this->sendFailedLoginResponse($request);
      // // } else {
      // // dd(3);
      // // }
      // } else if ($date_now > $meritround->end_date) {
      // // dd(2);
      // return redirect()->back()->with('error', 'You Can not Login Beacuse Admission Date is Expired Please Wait will Merit Declaration Date....');
      // } else {
      // // dd(3);
      // if (
      // method_exists($this, 'hasTooManyLoginAttempts') &&
      // $this->hasTooManyLoginAttempts($request)
      // ) {
      // $this->fireLockoutEvent($request);
      // return $this->sendLockoutResponse($request);
      // }

      // if ($this->attemptLogin($request)) {
      // if ($request->hasSession()) {
      // $request->session()->put('auth.password_confirmed_at', time());
      // }
      // return $this->sendLoginResponse($request);
      // }
      // $this->incrementLoginAttempts($request);
      // }
      // }

      1. How many functions are available to store and update data in Laravel ?
      1. save()
      -> data store karse database ma
      $data->save();
      ex. insert()
      $data = new ModalName();
      $data->name = $request->name;
      $data->save();

      update()
      $data = ModalName::find($id);
      $data->name = $request->name;
      $data->save();

      2. create()
      -> data store karse database ma and database ni create_at column ma pan entry padse
      ex. ModalName::create([
      'column_name' -> $request->column_name
      ]);

      3. insert()
      -> multipal data insert karse database ma
      ex. $data = [
      [
      'name' => 'Vivekanand College',
      'email' => 'vvk@gmail.com',
      ],
      [
      'name' => 'Government Polytechnic For Girls',
      'email' => 'gpg@gmail.com',
      ],
      ];
      ModalName::insert($data);

      $insertData = [
      'column_name' -> $request->column_name
      ];
      $result = ModalName::insert($insertData);

      4. update()
      -> only data update karse database ma
      ex. $insertData = [
      'column_name' -> $request->column_name
      ];
      $result->update($insertData);

      5. updateOrCreate()
      -> aa function databse ma enter nay hoy to data insert karse and entry hase to data update karse
      ex. $data = ModalName::updateOrCreate(
      [
      'column_name' -> $request->column_name
      // add here you want condition
      // like where condition
      ],
      [
      'column_name' -> $request->column_name
      ]
      );

      2. difference between insert() and create()

      insert()
      - multipal data insert karse database ma
      - create_at and update_at ma null data padse
      - model ma fillable variable lakhvo jaruri nathi
      create()
      - only one record insert karse database ma
      - create_at and update_at ma entry padse
      - model ma fillable variable lakhvo jaruri che

      insert()

      $data = new ModalName();
      $data->name = $request->name;
      $data->save();

      update()
      $data = ModalName::find($id);
      $data->name = $request->name;
      $data->save();

      variable controller me se pass horaha he to
      {{$variable_name}}

      @php
      $data = 'data';
      @endphp

      {{$data}}

      Admin Panel
      ----------------------
      URL : http://65.0.102.75/university/login
      Username : admin@admin.com
      Password : admin@123

      Collage Panel
      -------------------
      URL : http://65.0.102.75/college/login
      Username : gpgs@gmail.com
      Password : password

      Student Panel
      ---------------
      URL : http://65.0.102.75/
      Username : ishani@gmail.com
      Password : 11111111

      // if(($stime['start_time'] <= $request->start_time && $request->end_time <= $etime['end_time'])|| ($stime['start_time']>= $request->start_time && $request->end_time >= $etime['end_time']))

            ** SmallCircle

            1. Clients and followers
            - customer_id
            - clerk
            - assigned_clerk
            - punch
            - points
            - CRM_synced
            ---- Loyalty transcation
            - clerk_id
            - customer_id
            - transcation date/time
            - punch
            - points_earned
            ----

            2. Business channel Wallet

            * channel customer transaction history
            - user
            - date/time
            - order_type
            - paid_via(image[bank logo])
            - paid_amount
            - transaction detail
            - data/time
            - payment_method
            - entry_method
            - verification method
            - type
            - ammount
            - receipt issued
            - transcation reference
            <!-- - description -->
            <!-- - receipts -->

            * channel
            - TOSFile

            * clienteling tool
            - form name
            - total_customers
            - total_scans
            - total_submitted
            - clerk_tools
            - public_event_qr_scan
            - create_date
            - end_date

            * SKU Collection
            (categorys)
            - title
            - image
            - description
            - no_of_items
            (subcategorys)
            - name
            - description

            * sales opration
            - client
            - lead type
            - lead_add_date
            - lead_expiry_date
            - lead value



There is 3 transaction states
   1. DB::beginTransaction(); -> will only begin a transaction, while for DB::transaction() you must pass a Closure function that will be executed inside a transaction.
   2. DB::commit(); -> query me koi error nahi hogi to data ko aage jane dega
   3. DB::rollBack(); -> query me koi error hogi to use database me entry nahi hogi or use rollback kar dega

      Ex. 
      DB::beginTransaction();
      try {
         DB::insert(...);
         DB::insert(...);
         DB::insert(...);

         DB::commit();
         // all good
      } catch (\Exception $e) {
         DB::rollback();
         // something went wrong
      }


      @Ishani56752148
      @Ishani56752148

      use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = [
        'id',
        'name',
        'guard_name'
    ];
    protected $guard='university';
}

- fixer transaction on show total_payable and Total_paid amount
- set currency in all amount 
- payment sccess and send notification click on pay amount button 
- send mail for email/password when create employee and genrate new password
- merge employee tab in access
- hide check button if job amount is paid
- add permission for fixer transaction

- contact-us page on set reCAPTCHA verification completed
- 





                                    <!-- <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                       <label class="col-md-4 control-label">Captcha</label>
                                       <div class="col-md-6">
                                          {!! NoCaptcha::renderJs() !!}
                                          {!! NoCaptcha::display() !!}
                                       </div>
                                       @if ($errors->has('g-recaptcha-response'))
                                       <span class="help-block">
                                          <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                       </span>
                                       @endif
                                    </div> -->