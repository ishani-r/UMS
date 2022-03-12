
   // Index
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
                  url: url_status,
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
               var url = url_destroy;
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

   // create college
   $('#college_form').validate({
      rules: {
         name: {
            required: true,
         },
         email: {
            required: true,
         },
         contact_no: {
            required: true,
         },
         address: {
            required: true,
         },
         logo: {
            required: true,
         },
         password: {
            required: true,
            minlength: 8
         },
         confirm_password: {
            required: true,
            equalTo: "#password"
         },
      },
      messages: {
         name: 'Please Enter College Name!',
         email: 'Please Enter Your Email Address!',
         contact_no: 'Please Enter College Contact Number!',
         address: 'Please Enter College Address!',
         logo: 'Please Select Logo!!',
         password: {
            required: 'Please Enter Your Password.',
            minlength: 'Please Enter at least 8 characters.'
         },
         confirm_password: {
            required: 'Please Enter Confirmation.',
            equalTo: 'Please Enter Confirm Password Same as a Password.'
         }
      },
      // highlight: function(element, errorClass, validClass) {
      //    $(element).addClass("is-invalid").removeClass("is-valid");
      // },
      // unhighlight: function(element, errorClass, validClass) {
      //    $(element).addClass("is-valid").removeClass("is-invalid");
      // },
      // errorPlacement: function(error, element) {
      //    error.insertAfter(element.parent());
      // },
      submitHandler: function(form) {
         form.submit();
      }
   });

   // Edit College
   $('#college_edit').validate({
      rules: {
         name: {
            required: true,
         },
         email: {
            required: true,
         },
         contact_no: {
            required: true,
         },
         address: {
            required: true,
         },
      },
      messages: {
         name: 'Please Enter College Name!',
         email: 'Please Enter Your Email Address!',
         contact_no: 'Please Enter College Contact Number!',
         address: 'Please Enter College Address!',
      },
   });
