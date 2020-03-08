$(".change").click(function() {
    var id = $(this).data("id");
    var shop = $(this).data("shop");
    $.ajax({
        url: "application/change-status/" + id,
        type: 'put',
        dataType: "JSON",
        data: {
            "id": id,
            "shop": shop,
            "_method": 'put',
            "_token": $('#csrf-token')[0].content,
        }

    });
    $("i." + id).toggleClass("d-none");
    $("span." + id).toggleClass("d-none");
    $("i.show" + id).toggleClass("d-none");
    $("span.show" + id).toggleClass("d-none");
    toastr.success('انجام شد.', '', [])
});





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
$( document ).ready(function() {
  $( ".dropify-clear" ).remove();
  });


    $(document).ready(function(){
      $('#datatable_filter').parent().remove();
      $('#datatable_wrapper').children(':first').find('.col-sm-12').removeClass('col-sm-12 col-md-6');

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
