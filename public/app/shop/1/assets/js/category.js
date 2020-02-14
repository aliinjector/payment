    $(document).ready(function() {
      $( ".ui-slider-handle" ).addClass( "p-2" );
        $('#available-filter-1').click(function() {
            setTimeout("$('#submit').submit()", 700);
        });
        $('#available-filter-2').click(function() {
            setTimeout("$('#submit').submit()", 700);
        });
        $('#available-filter-3').click(function() {
            setTimeout("$('#submit').submit()", 700);
        });
        $('#available-filter-4').click(function() {
            setTimeout("$('#submit').submit()", 700);
        });
        $('#available-order-1').click(function() {
            $('.available-order-1').attr('checked', true);
            setTimeout("$('#submit').submit()", 700);
        });
        $('#available-order-2').click(function() {
            $('.available-order-2').attr('checked', true);
            setTimeout("$('#submit').submit()", 700);
        });
        $('#available-order-3').click(function() {
            $('.available-order-3').attr('checked', true);
            setTimeout("$('#submit').submit()", 700);
        });
        $('#available-order-4').click(function() {
            $('.available-order-4').attr('checked', true);
            setTimeout("$('#submit').submit()", 700);
        });
        $('#available-price-min').click(function() {
            $('.available-price-min').attr('checked', true);
            setTimeout("$('#submit').submit()", 700);
        });
        $('#available-price-max').click(function() {
            $('.available-price-max').attr('checked', true);
            setTimeout("$('#submit').submit()", 700);
        });
        $('#mySlider').click(function() {
            $('.available-price-max').attr('checked', true);
            setTimeout("$('#submit').submit()", 700);
        });
    });

    $(function() {

        $('.list-group-item').on('click', function() {
            $('.glyphicon', this)
                .toggleClass('glyphicon-chevron-right')
                .toggleClass('glyphicon-chevron-down');
        });

    });
    $(document).ready(function() {
        $(".color-filtering").click(function(e) {
            e.preventDefault();

            var color = $(this).data('color');
            $("#color-input").val(color);
            $('#submit').trigger('submit');
        });
    });
