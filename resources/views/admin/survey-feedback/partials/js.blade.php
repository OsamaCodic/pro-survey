<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $("#answerForm").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type : "post",
                url :  "{{ url('admin/question_answers') }}",
                data: $("#answerForm").serialize(),
                success : function(response)
                {                            
                    swal({
                        text: "Thank-you for your feedback!",
                        timer: 2000,
                        icon:"success",
                        showConfirmButton: false,
                        type: "error"
                    })              
                    $("#answerForm").fadeOut("slow");
                    setTimeout(function(){
                        $("#thank-you").fadeIn("slow");            
                    }, 2000);         
                }
            });
        });
    });
</script>