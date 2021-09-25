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
                    location.reload();
                })
            }
        });        
    }
    // Survey Delete

</script>

