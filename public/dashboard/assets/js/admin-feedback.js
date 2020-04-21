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
    $('#myInputTextField').keyup(function() {
        oTable.search($(this).val()).draw();
    })
    $(document).on('click', '#removeCat', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal('آیا اطمینان دارید؟', {
                dangerMode: true,
                icon: "warning",
                buttons: ["انصراف", "حذف"],
            })
            .then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "post",
                        url: "/admin-panel/shop/managment/feedback/delete",
                        data: {
                            id: id,
                            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                        },

                        success: function(data) {
                      swal('عملیات با موفقیت انجام شد', {
                              icon: "success",
                              buttons: ['ادامه'],
                          })
                          setTimeout(function(){
                            var url =  "/admin-panel/shop/managment/feedback";
                            location.href = url;
                          }, 1000);
                    }
                    });
                } else {
                    toastr.warning('لغو شد.', '', []);
                }
            });
    });

    $(document).on('click', '#restoreFeedback', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal('آیا اطمینان دارید؟', {
            dangerMode: true,
            icon: "warning",
            buttons: ["انصراف", "حذف"],
        })
        .then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "post",
                    url: "/admin-panel/shop/managment/feedback/restore",
                    data: {
                        id: id,
                        "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                    },
                    success: function(data) {
                  swal('عملیات با موفقیت انجام شد', {
                          icon: "success",
                          buttons: ['ادامه'],
                      })
                      setTimeout(function(){
                        var url =  "/admin-panel/shop/managment/feedback";
                        location.href = url;
                      }, 1000);
                }
                });
            } else {
                toastr.warning('لغو شد.', '', []);
            }
        });
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
    oTable = $('#datatable').DataTable({
        "language": {
            "infoFiltered": "(فیلتر شده از مجموع _MAX_ رکورد)"
        }
    } );
