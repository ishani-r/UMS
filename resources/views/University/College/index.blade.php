@extends('University.layouts.master')
@section('title', 'University-Dashbboard')
@section('content')
<div class="content-overlay"></div>
<div class="content-wrapper">
   <div class="row">
      <div class="col-12">
         <div class="content-header">College Table</div>
      </div>
      <div class="text-right">
         <div class="mb-2">
            <a href="{{ route('university.college.create')}}" class="btn gradient-pomegranate big-shadow">Add College</a>
         </div>
      </div>
   </div>
   <!-- Zero configuration table -->
   <section id="configuration">
      <div class="row">
         <div class="col-12 gradient-man-of-steel d-block rounded">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">College List</h4>
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
   // Status
   $(document).on('click', '.status', function() {
      swal({
            title: "Are you sure?",
            text: "You Want To Change The Status!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
         })
         .then((willDelete) => {
            if (willDelete) {
               var id = $(this).data('id');
               var number = $(this).attr('id', 'asd');
               $.ajax({
                  url: "{{route('university.college_status')}}",
                  type: 'get',
                  data: {
                     id: id,
                  },
                  dataType: "json",
                  success: function(data) {
                     $('#collegedatatable-table').DataTable().ajax.reload();
                  }
               })
               swal("Your Status Has Ben Change Succesfully", {
                  icon: "success",
               });
            } else {
               swal("Your Status is safe!");
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
               var url = '{{route("university.college.destroy", ":queryId")}}';
               url = url.replace(':queryId', delet);
               $.ajax({
                  url: url,
                  type: "DELETE",
                  data: {
                     id: delet,
                     _token: '{{ csrf_token() }}'
                  },
                  dataType: "json",
                  success: function(data) {
                     $('#collegedatatable-table').DataTable().ajax.reload();
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