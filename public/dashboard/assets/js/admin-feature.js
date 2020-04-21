        $(document).ready(function() {
          console.log('hi');
            $(".dropify-clear").remove();
        });
        $('#myInputTextField').keyup(function() {
            oTable.search($(this).val()).draw();
        });

        $(document).on('click', '#removeFeature', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            swal(` ${'حذف ویژگی:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
                    dangerMode: true,
                    icon: "warning",
                    buttons: ["انصراف", "حذف"],
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: "post",
                            url: "/admin-panel/shop/categrory-managment/feature/delete",
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
                                window.location.reload()
                              }, 1000);
                        }
                        });
                    } else {
                        toastr.warning('لغو شد.', '', []);
                    }
                });
        });

        $(document).on('click', '#restoreFeature', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var name = $(this).data('name');
        swal(` ${'بازگردانی ویژگی:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
                dangerMode: true,
                icon: "warning",
                buttons: ["انصراف", "حذف"],
            })
            .then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "post",
                        url: "/admin-panel/shop/categrory-managment/feature/restore",
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
                            window.location.reload()
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
