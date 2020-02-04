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
  $(".color-filter").click(function(e) {
    e.preventDefault();

    var color = $(this).data('color');
    $("#color-input").val(color);
    $('#submit').trigger('submit');
  });
});
