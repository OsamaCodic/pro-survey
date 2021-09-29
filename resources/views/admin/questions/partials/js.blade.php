<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        // Textarea will show base on SELECT
        var question_type = $('#question_type').val();   
        if(question_type == "TextArea")
        { 
            $("#textarea_hidden").slideDown()
        }
        else
        {
            $("#textarea_hidden").slideUp()
        }
    });

    $('#question_type').on('change', function(){
        // Textarea will show base on Dropdown Change
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
                    swal({
                        text: response.status,
                        timer: 5000,
                        icon:"success",
                        showConfirmButton: false,
                        type: "error"
                    })
                    setTimeout(function(){
                        location.href = response.redirect_url;
                    }, 1000); 
                }          
            });
        }
    });

    // Survey Delete	
        function delete_question(obj)
        {
            var url = "{{ url('admin/survey_questions') }}";
            var dltUrl = url+"/"+obj.id;

            swal({
                    title: "Do you want to delete this Question?",
                    text: obj.title,
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
                            title: "Question deleted!",
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
                    swal("Cancelled", "Your Question is safe :)", "error");
                }
            });        
        }
    // Survey Delete

</script>

