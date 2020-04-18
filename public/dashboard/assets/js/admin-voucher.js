
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
    $(document).on('click', '#removeVoucher', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var name = $(this).data('name');
        swal(` ${'حذف کد:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
                dangerMode: true,
                icon: "warning",
                buttons: ["انصراف", "حذف"],

            })
            .then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "post",
                        url: "vouchers/delete",
                        data: {
                            id: id,
                            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                        },
                        success: function(data) {
                            var url = "/admin-panel/shop/vouchers";
                            location.href = url;
                        }
                    });
                } else {
                    toastr.warning('لغو شد.', '', []);
                }
            });
    });


    $(document).on('click', '#restoreVoucher', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var name = $(this).data('name');
    swal(` ${'بازگردانی کدتخفیف:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
            dangerMode: true,
            icon: "warning",
            buttons: ["انصراف", "حذف"],
        })
        .then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "post",
                    url: "vouchers/restore",
                    data: {
                        id: id,
                        "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                    },
                    success: function(data) {
                      var url = "/admin-panel/shop/vouchers";
                      location.href = url;
                  }
                });
            } else {
                toastr.warning('لغو شد.', '', []);
            }
        });
  });



    $(".change").click(function() {
        var id = $(this).data("id");
        $.ajax({
            url: "vouchers/change-status/" + id,
            type: 'POST',
            contentType: 'application/json',
            dataType: "JSON",
            data: {
                "id": id,
                "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
            }
        });
        $("i." + id).toggleClass("d-none");
        $("span." + id).toggleClass("d-none");
        $("i.show" + id).toggleClass("d-none");
        $("span.show" + id).toggleClass("d-none");
        toastr.success('وضعیت تغییر کرد.', '', []);
    });
    $(".voucher").click(function() {
        $(".users-voucher").removeClass("d-none");
        $(".voucher").addClass("d-none");
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
    $(window).on("load", function() {
        $('.show-tick').addClass("col-lg-10");
        $('.filter-option-inner-inner').addClass("d-flex");
        $('.bs-placeholder').removeClass("btn-light");
        $('.show-tick').addClass("p-1");
        $('.show-tick').addClass("border");
    });
    oTable = $('#datatable').DataTable(); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said

    $('#togBtn').on('change', function() {
      if($('#placeToggle').attr("placeholder") != "مثال  10000"){
        $('#placeToggle').attr("placeholder", "مثال  10000");
      }
      else{
        $('#placeToggle').attr("placeholder", "مثال  10 ( نیازی به علامت % نیست)");

      }
});
