
<form id="site_visit_form" action="{{ $site_visit_form_action }}" method="{{ $site_visit_form_method }}"
    class="mt_form" enctype="multipart/form-data">

    @csrf

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Name of Applicant</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="" name="" value="{{ @$development_application->full_name }}"
                readonly placeholder="">
        </div>
    </div>

    <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>

    <div id="validation_errors_site_visit"></div>

</form>


<script>
    $(document).ready(function() {
        $('#surveyForm').on('submit', function(e) {
            e.preventDefault();
            $('.btn').attr('disabled', true);
            // $('#validation_errors_site_visit').html("Please wait...")
            $form = $(this);

            $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $form.serialize(),
                })
                .done(function() {
                    alert("form submit sucessfully!")
                })
                .fail(function(errors) {
                    $('.btn').attr('disabled', false);
                    console.log(errors);
                    // $('#validation_errors_site_visit').html("<ul>");
                    $('#validation_errors_site_visit').addClass('alert alert-danger');

                    $.each(errors.responseJSON.errors, function(indexInArray, value) {
                        console.log(value);
                        $("#validation_errors_site_visit").append("<li>" + value + "</li>")
                    });

                    $('#validation_errors_site_visit').append("</ul>");

                })
                .always(function() {
                    $('.btn').attr('disabled', false);
                });
        });
    });
</script>
