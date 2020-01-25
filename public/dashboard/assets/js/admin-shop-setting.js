    $('#AgencyDetails').on('change', function() {
        $('#result').html($(this).find('option:selected').data('type'));
    });

    $(document).ready(function() {
        $(".dropify-clear").remove();
    });

        $(window).on("load", function() {
            $('.show-tick').addClass("col-lg-12");
            $('.filter-option-inner-inner').addClass("d-flex");
            $('.bs-placeholder').removeClass("btn-light");
            $('.show-tick').addClass("p-1");
            $('.show-tick').addClass("border");
        });


        $(document).ready(function() {

          var last_valid_selection = null;

          $('#exampleFormControlSelect2').change(function(event) {

            if ($(this).val().length > 3) {

              $(this).options.length == 0;
            } else {
              last_valid_selection = $(this).val();
            }
          });
        });
        oTable = $('#datatable').DataTable(); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
