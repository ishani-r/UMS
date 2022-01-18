@extends('layouts.master')
@section('content')
<div class="content-overlay"></div>
<div class="content-wrapper">
   <!--Statistics cards Starts-->
   @if (Session::has('error'))
   <div class="alert alert-danger text-center">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      <p>{{ Session::get('error') }}</p>
   </div>
   @endif
   <div class="row">
      <div class="col-xl-3 col-lg-6 col-md-6 col-12">
         <div class="card gradient-purple-love">
            <div class="card-content">
               <div class="card-body py-0">
                  <div class="media pb-1">
                     <div class="media-body white text-left">
                        <h3 class="font-large-1 white mb-0">{{$admission->merit ?? '0'}}</h3>
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
                                 @foreach($colleges as $college)
                                 <td>{{$college->name}} <input type="checkbox" id="{{$college->id}}"></td>
                                 @endforeach
                              </tr><br>
                              <tr>
                                 <td>Admission Date</td>
                                 <td>{{$admission->addmission_date}}</td>
                              </tr>
                              <tr>
                                 <td>Admission Code</td>
                                 <td>{{$admission->addmission_code}}</td>
                              </tr>
                           </table>

                           <h6>- You have shortlisted on merit you are eligible for ({{$college->name}}) Please Press Confiem button.</h6>
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
      $(document).on('click', 'input[type="checkbox"]', function() {
         $('input[type="checkbox"]').not(this).prop('checked', false);
      });
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