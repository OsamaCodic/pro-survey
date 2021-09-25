<script>
    
    // Survey Create/Update
    $("#surveyForm").validate({
        errorClass: "error fail-alert",
        validClass: "valid success-alert",

        rules: {
            title: {
                required: true,
                maxlength: 10,
            },
            display_order: {
                required: true,
                number: true,
            }
        },
        messages: {
            title: {
                required: "Please enter survey title",
            }
        },

        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(response){
                    location.href = response.redirect_url;
                }          
            });
        }

    });

    // Survey Delete	
    function delete_survey(id)
    {
        if (!confirm('Are you sure you want to delete this server?')) return false;
        var url = "{{ url('admin/survey') }}";
        var dltUrl = url+"/"+id;
        $.ajax({
            url: dltUrl,
            type: "DELETE",
            data:{
                _token:'{{ csrf_token() }}',
                id:'id'
            }           
        })
        .done(function(response) {
            window.location.href = response.redirect_url
        })
    }
    // Survey Delete
    
</script>