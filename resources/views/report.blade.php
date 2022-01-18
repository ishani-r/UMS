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
-  solve previous error
-  show addmission data university side
-  admission data insert using type casting
-  solve error on display admission on college side
-  display admission data on college side(working)

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
							// 	console.log(kay);
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

        //     dd($value);
        //     // return $value > 5;
        //     $selected_college = explode(',', $order->college_id);
        //     return $selected_college[0] == Auth::user()->id;
        // });
        // dd(Auth::user()->id);
        // // $admissions = Addmission::select('college_id','id')->get();
        // foreach ($model as $admission) {
        //     $selected_college = explode(',', $admission->college_id);
        //     dd($selected_college[0]);
        //     // $adadmission = Addmission::whereIn('college_id', $selected_college[0])->get();
        //     if ($selected_college[0] == Auth::user()->id) {
        //         // dd(1);
        //         // $admission = Addmission::select('college_id')->get();
    
        //     }
        //     $data = Addmission::where($selected_college[0], Auth::user()->id)->get();
        // }
        // dd($admission);
        // return $data;
        // return $model->where('college_id',)->newQuery();