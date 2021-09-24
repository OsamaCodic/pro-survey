<script>
    $(document).ready(function ()
    {
        // Survey Create/Update
        $('#surveyForm').on('submit', function (e) {
            e.preventDefault();
            $('.btn').attr('disabled', true);
            // $('#validation_errors_site_visit').html("Please wait...")
            $form = $(this);

            $.ajax({
                url : $(this).attr('action'),
                type: $(this).attr('method'),
                data: $form.serialize(),
            })
            .done(function(response) {
                location.href = response.redirect_url;
            })
            .fail(function(errors) {
                $('.btn').attr('disabled', false);
                console.log(errors);
                // $('#validation_errors_site_visit').html("<ul>");
                $('#validation_errors_site_visit').addClass('alert alert-danger');
                
                $.each(errors.responseJSON.errors, function (indexInArray, value) {
                    console.log(value); 
                    $("#validation_errors_site_visit").append("<li>"+value+"</li>")
                });

                $('#validation_errors_site_visit').append("</ul>");

            })
            .always(function() {
                $('.btn').attr('disabled', false);
            });
        });
        // Survey Create/Update
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