<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        // Radio toggles will show base on SELECT
        var question_type = $('#question_type').val();   
        if(question_type == "TextArea")
        { 
            $("#question_length_section").fadeIn('slow')
            
        }
        else
        {
            $("#question_length_section").fadeOut('slow')
        }
    });

    $('#question_type').on('change', function(){
        // Radio toggles will show base on Dropdown Change
        if(this.value == "TextArea")
        { 
            $("#question_length_section").fadeIn('slow')
        }
        else
        {
            $("#question_length_section").fadeOut('slow')
        }
    });

    $('#short_length').click(function()
    {
        $("#textarea_hidden").slideDown()
        var len = $('#short_length').val();
        alert(len);
    });
    
    $('#medium_length').click(function()
    {
        $("#textarea_hidden").slideDown()
        var len = $('#medium_length').val();
        alert(len);
    });

    $('#long_length').click(function() 
    {
        $("#textarea_hidden").slideDown()
        var len = $('#long_length').val();
        alert(len);
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

