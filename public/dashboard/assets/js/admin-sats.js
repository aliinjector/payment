    $(window).resize(function() {
        if ($(window).width() < 1300) {
            $("body").addClass('enlarge-menu');

        } else {
            $("body").removeClass('enlarge-menu');

        }
    }).resize();
$(window).resize(function() {
    if ($(window).width() < 1070) {
      $(".icon-show").removeClass('d-none');

    } else {
        $(".icon-show").addClass('d-none');

    }
}).resize();
$(document).ready(function(){
  $('#datatable_filter').parent().remove();
});
$(document).ready(function(){
  $('input#myInputTextField').on("focus", function(){
    if ($(this).hasClass("searchActive")){
           $(this).removeClass("searchActive");
       }
       else{
      $('input#myInputTextField').addClass('searchActive');
      }
});
});
oTable = $('#datatable').DataTable(); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
