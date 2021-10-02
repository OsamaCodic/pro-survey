<script>
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Survey Create/Update
        $("#surveyForm").validate({
            errorClass: "error fail-alert",
            validClass: "valid success-alert",

            rules: {
                title: {
                    required: true,
                    maxlength: 35,
                },
                display_order: {
                    required: true,
                    number: true,
                }
            },
            messages: {
                title: {
                    required: "Please enter survey title!",
                },
                display_order: {
                    required: "Please enter display order",
                }
            },

            submitHandler: function(form) {
                $.ajax({
                    url : $('#surveyForm').attr('action'),
                    type: $('#surveyForm').attr('method'),
                    data: $('#surveyForm').serialize(),
                    success: function(response){
                        location.href = response.redirect_url;
                    }          
                });
            }
        });
    // Survey Create/Update

    // Survey Delete	
        function delete_survey(obj)
        { 
            var url = "{{ url('admin/survey') }}";
            var dltUrl = url+"/"+obj.id;

            swal({
                    title: "Are you sure you want to delete " + obj.title +"?",
                    text: "If you delete this, it will be delete permanently!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: dltUrl,
                        type: "DELETE",
                        data:{
                            _token:'{{ csrf_token() }}',
                            id:'id'
                        }           
                    })
                    .done(function(response) {
                        swal({
                            title: "Survey deleted!",
                            text: "Record deleted permanently",
                            icon: "success",
                            timer: 5000,
                            buttons: false,
                            dangerMode: true,
                        })
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                    })
                }
                else {
                    swal("Cancelled", "Your survey is safe :)", "error");
                }
            });        
        }
    // Survey Delete

    // Selected surveys Delete
        function deleletCheckboxes()
        {
            if($('#delete_selected').is(":checked"))
            {
                $(".delete").fadeOut("fast");
                setTimeout(function(){ $(".form-check-input").fadeIn("slow"); }, 200);
                $("#del_rows_btn").fadeIn("slow");
                $("#checkbox_delete_Label").removeClass("text-secondary");
                $("#checkbox_delete_Label").addClass("text-danger");
            }  
            else
            {
                setTimeout(function(){ $(".delete").fadeIn("slow"); }, 200);
                $(".form-check-input").fadeOut("fast");
                $("#del_rows_btn").fadeOut("slow");
                $("#checkbox_delete_Label").removeClass("text-danger");
                $("#checkbox_delete_Label").addClass("text-secondary");
            }
        }

        $('#del_rows_btn').click( function(evt) {

            evt.preventDefault();
            var delete_rows_arr = [];

            $("#surveyTable input:checkbox:checked").each(function()
            {
                delete_rows_arr.push($(this).val());
            });

            swal({
                title: "Are you sure you want to delete selected surveys?",
                text: "If you delete this, it will be delete permanently!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{ url('admin/survey/delete_selected_rows') }}",
                        type:"POST",
                        data:{
                            delete_rows_arr:delete_rows_arr,
                        },        
                    })
                    .done(function(response) {
                        swal({
                            title: "Selected surveys deleted!",
                            text: "Records deleted permanently",
                            icon: "success",
                            timer: 5000,
                            buttons: false,
                            dangerMode: true,
                        })
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                    })
                }
                else {
                    swal("Cancelled", "Your surveys is safe :)", "error");
                }
            });
        });
    // Selected surveys Delete

</script>

