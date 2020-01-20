$(window).ready(function(){
setInterval(function(){
  $('#tt-product-listing').addClass("tt-col-three")
}, 10);

});
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
});
$(document).ready(function() {
  $("#mySlider").slider({
    range: true,
    min: 1000,
    max: 100000000,
    values: [1000, 100000000],
    slide: function(event, ui) {
      if (isNaN(ui.values[0]) == true || isNaN(ui.values[1]) == true) {
        $("#available-price-1").val(" از " + 1000 + " تومان " + " - " + " تا " + 100000000 + " تومان ");
        $("#available-price-min").val(1000);
        $("#available-price-max").val(100000000);
      } else {
        $("#available-price-1").val(" از " + ui.values[0] + " تومان " + " - " + " تا " + ui.values[1] + " تومان ");
        $("#available-price-min").val(ui.values[0]);
        $("#available-price-max").val(ui.values[1]);
      }
    }
  });
  if (isNaN($("#mySlider").slider("values", 0)) == true || isNaN($("#mySlider").slider("values", 1)) == true) {
    $("#available-price-1").val(" از " + 1000 + " تومان " + " - " + " تا " + 100000000 + " تومان ");
  } else {
    $("#available-price-1").val(" از " + $("#mySlider").slider("values", 0) + " تومان " +
      " - " + " تا " + $("#mySlider").slider("values", 1) + " تومان ");
  }

});
$('select').on('change', function() {
  setInterval("$('#submit').submit()", 800);
});
$('#available-price-min').click(function() {
  $('.available-price-min').attr('checked', true);
  setInterval("$('#submit').submit()", 800);
});
$('#mySlider').click(function() {
  $('.available-price-max').attr('checked', true);
  setInterval("$('#submit').submit()", 800);
});
if ($('.ty-compact-list').length > 5) {
  $('.ty-compact-list:gt(2)').hide();
  $('.show-more').show();
}

$('.show-more').on('click', function() {
  //toggle elements with class .ty-compact-list that their index is bigger than 2
  $('.ty-compact-list:gt(2)').toggle();
  //change text of show more element just for demonstration purposes to this demo
  $(this).text() !== 'بستن' ? $(this).text('بستن') : $(this).text(' بیشتر');
});

$(document).ready(function() {
  $(".options-color").click(function(e) {
    e.preventDefault();

    var color = $(this).data('color');
    $("#color-input").val(color);
    $('#submit').trigger('submit');
  });
});
