<script>
    
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    $('#question_type').on('change', function(){    
        if(this.value == "TextArea")
        { 
            $("#textarea_hidden").slideDown()
        }
        else
        {
            $("#textarea_hidden").slideUp()
        }
    });

    // Survey Create/Update
    $("#questionsForm").validate({
        errorClass: "error fail-alert",
        validClass: "valid success-alert",

        rules: {
            question_type: {
                required: true,
            },
            text_area: {
                required: true,
                maxlength: 50,
            },
            display_order: {
                required: true,
                number: true,
            }
        },
        messages: {
            question_type: {
                required: "Please select any question type!",
            },
            text_area: {
                required: "Give your question!",
            },
            display_order: {
                required: "Please enter display order!",
            }
        },

        submitHandler: function(form) {
            $.ajax({
                url : $('#questionsForm').attr('action'),
                type: $('#questionsForm').attr('method'),
                data: $('#questionsForm').serialize(),
                success: function(response){
                    location.href = response.redirect_url;
                }          
            });
        }
    });

    // Survey Delete	
    // function delete_survey(obj)
    // { 
    //     var url = "{{ url('admin/survey') }}";
    //     var dltUrl = url+"/"+obj.id;

    //     swal({
    //             title: "Are you sure you want to delete " + obj.title +"?",
    //             text: "If you delete this, it will be delete permanently!",
    //             icon: "warning",
    //             buttons: true,
    //             dangerMode: true,
    //         })
    //         .then((willDelete) => {
    //         if (willDelete) {
    //             $.ajax({
    //                 url: dltUrl,
    //                 type: "DELETE",
    //                 data:{
    //                     _token:'{{ csrf_token() }}',
    //                     id:'id'
    //                 }           
    //             })
    //             .done(function(response) {
    //                 location.reload();
    //             })
    //         }
    //     });        
    // }
    // Survey Delete

</script>

