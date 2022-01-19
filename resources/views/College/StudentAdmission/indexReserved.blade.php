@extends('College.layouts.master')
@section('title', 'College-Dashbboard')
@section('content')
<div class="content-overlay"></div>
<div class="content-wrapper">
   <div class="row">
      <div class="col-12">
         <div class="content-header">Student Admission Table</div>
      </div>
      <div class="text-right">
         <div class="mb-2">
            <!-- <a href="#" class="btn gradient-pomegranate big-shadow">Add Merite</a> -->
         </div>
      </div>
   </div>
   <!-- Zero configuration table -->
   <section id="configuration">
      <div class="row">
         <div class="col-12 gradient-man-of-steel d-block rounded">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">Course List</h4>
               </div>
               <div class="card-content">
                  <div class="card-body">
                     <div class="table-responsive-sg">
                        {!! $dataTable->table()!!}
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--/ Zero configuration table -->
</div>
@endsection
@push('js')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
{!! $dataTable->scripts() !!}
<script>
   $(document).on('click', '.approve', function() {
      var id = $(this).data('id');
      var is_approve = $(this).attr('is_approve');
      var msg = "";
      // 0 - pending, 1 - approve, 2 - rejected
      // if (is_approve == 0) {
      //    msg = "Pending";
      // } else if (is_approve == 1) {
      //    msg = "Approve";
      // } else {
      //    msg = "Rejected";
      // }
      swal({
            title: "Are you sure?",
            text: "Are you sure want to Change Status!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
         })
         .then((willDelete) => {
            if (willDelete) {
               $.ajax({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: "{{route('college.reserved_status')}}",
                  type: 'post',
                  data: {
                     'is_approve': is_approve,
                     'id': id
                  },
                  success: function(res) {
                     console.log(res);
                     $('#reservedstudentdatatable-table').DataTable().ajax.reload();
                  }
               });
               swal("Status has been Change!", {
                  icon: "success",
               });
            } else {
               swal("Status is safe!");
            }
         });
   });

   // Delete
   $(document).on('click', '.delete', function() {
      swal({
            title: "Are you sure?",
            text: "You Want To Delete The College!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
         })
         .then((willDelete) => {
            if (willDelete) {
               var delet = $(this).data('id');
               var url = '{{route("college.delete", ":queryId")}}';
               url = url.replace(':queryId', delet);
               $.ajax({
                  url: url,
                  type: "post",
                  data: {
                     id: delet,
                     _token: '{{ csrf_token() }}'
                  },
                  dataType: "json",
                  success: function(data) {
                     $('#studentadmissiondatatable-table').DataTable().ajax.reload();
                  }
               });
               swal("Your Store has been deleted!", {
                  icon: "success",
               });
            } else {
               swal("Your College is safe!");
            }
         });
   });
</script>
@endpush