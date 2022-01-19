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
                           @elseif(!isset($colleges))
                           <h4>Merit result declate at {{$meritround->merit_result_declare_date}}</h4>
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
                                 @if(count($colleges)==0)
                                 <td style="color: red;">Sorry, You have not been selected in any of the collages. <b>Please wait will Your First Eligible College Send Mail.</b></td>
                                 @else
                                 @foreach($colleges as $college)

                                 <td>{{$college->name}} <input type="checkbox" class="asd" id="{{$college->id}}" value="{{$college->id}}" {{$college->id == ($admission_c->confirm_college_id ?? '') ? 'checked' : ''}}></td>
                                 @endforeach
                                 @endif
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

                           @if(count($colleges)==0)
                           @else
                           <h6>- Congratulations, You have shortlist on <b style="color: green;">upper college Please select one college And Press Confirm Button.</b></h6>
                           @endif
                           <h6>- If You Want To go for Next Round Press Next Button.</h6>
                           <h6>- Tf You do not want admission Press Reject Button.</h6>

                           @if(count($colleges)==0)
                           <!-- Empty -->
                           @else
                           @if(Session::get('xyz')==1)
                           <a type="button" id="confiem" data-id="1" class="btn btn-success round mr-1 mb-1 confirm">Confirm</a>
                           @elseif(Session::get('xyz')==4)
                           <a type="button" id="next" data-id="4" class="btn btn-info round mr-1 mb-1 confirm">Next</a>
                           @elseif(Session::get('xyz')==2)
                           <a type="button" id="rejected" data-id="2" class="btn btn-dark round mr-1 mb-1 confirm">Rejected</a>
                           @else
                           <a type="button" id="confiem" data-id="1" class="btn btn-success round mr-1 mb-1 confirm">Confirm</a>
                           <a type="button" id="next" data-id="4" class="btn btn-info round mr-1 mb-1 confirm">Next</a>
                           <a type="button" id="rejected" data-id="2" class="btn btn-dark round mr-1 mb-1 confirm">Rejected</a>
                           @endif
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
      var id = $(this).data('id');
      if(id == 1){
      if ($('.asd').is(":checked")) {
         var checked_college = $('.asd').val();
      } else {
         toastr.error("Please Select One College....");
         return false;
      }
   }

      swal({
            title: "Are you sure?",
            text: "You Want To Confirm Your Addmission!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
         })
         .then((willDelete) => {
            if (willDelete) {
               var number = $(this).attr('id', 'asd');
               $.ajax({
                  url: "{{route('admis_status')}}",
                  type: 'get',
                  data: {
                     id: id,
                     checked_college: checked_college,
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
                     location.reload();
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