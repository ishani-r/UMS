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
   $(document).on('click', '.checkbox', function() {
      // alert(1);
      var id = $(this).data('id');
      // alert(id);
      $(":checkbox:checked").each(function(key) {
         id[key] = $(this).val();
      });
      $.ajax({
         url: "{{ route('college.confirm')}}",
         type: "POST",
         dataType: 'JSON',
         data: {
            'id': id,
            _token: '{{ csrf_token() }}'
         },
         success: function(res) {
            console.log(res.id);
            return false;
         }
      });
   });
   
   // Delete
   $(document).on('click', '.delete', function() {
      swal({
            title: "Are you sure?",
            text: "You Want To Delete This Record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
         })
         .then((willDelete) => {
            if (willDelete) {
               var delet = $(this).data('id');
               url = url.replace(':queryId', delet);
               var url = '{{route("college.delete", ":queryId")}}';
               $.ajax({
                  url: url,
                  type: "DELETE",
                  data: {
                     id: delet,
                     _token: '{{ csrf_token() }}'
                  },
                  dataType: "json",
                  success: function(data) {
                     $('#studentadmissiondatatable-table').DataTable().ajax.reload();
                  }
               });
               swal("Your Record has been deleted!", {
                  icon: "success",
               });
            } else {
               swal("Your Record is safe!");
            }
         });
   });
</script>
@endpush