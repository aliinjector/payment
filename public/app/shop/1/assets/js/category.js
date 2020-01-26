    $(document).ready(function() {
        $('#available-filter-1').click(function() {
            setInterval("$('#submit').submit()", 700);
        });
        $('#available-filter-2').click(function() {
            setInterval("$('#submit').submit()", 700);
        });
        $('#available-filter-3').click(function() {
            setInterval("$('#submit').submit()", 700);
        });
        $('#available-filter-4').click(function() {
            setInterval("$('#submit').submit()", 700);
        });
        $('#available-order-1').click(function() {
            $('.available-order-1').attr('checked', true);
            setInterval("$('#submit').submit()", 700);
        });
        $('#available-order-2').click(function() {
            $('.available-order-2').attr('checked', true);
            setInterval("$('#submit').submit()", 700);
        });
        $('#available-order-3').click(function() {
            $('.available-order-3').attr('checked', true);
            setInterval("$('#submit').submit()", 700);
        });
        $('#available-order-4').click(function() {
            $('.available-order-4').attr('checked', true);
            setInterval("$('#submit').submit()", 700);
        });
        $('#available-price-min').click(function() {
            $('.available-price-min').attr('checked', true);
            setInterval("$('#submit').submit()", 700);
        });
        $('#mySlider').click(function() {
            $('.available-price-max').attr('checked', true);
            setInterval("$('#submit').submit()", 700);
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


    if ($("#color-selection").length == 0){
    if ($("li.color-select").hasClass("active")) {
      var colorId = $("li.color-select > a").data('color');
      $("button.btn-add-to-cart").append('<input type="hidden" id="color-selection" name="color" value="'+colorId+'">');
    }
    }
    //when the Add Field button is clicked
    $('.options-color').on('click', function() {
      var colorId = $(this).data('color');
    //Append a new row of code to the "#items" div
    if ($("#color-selection").length > 0){
      $("#color-selection").remove();
    }
      $("button.btn-add-to-cart").append('<input type="hidden" id="color-selection" name="color" value="'+colorId+'">');
    });
