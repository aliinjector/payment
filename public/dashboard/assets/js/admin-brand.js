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
   $(document).on('click', '#removeBrand', function(e) {
       e.preventDefault();
       var id = $(this).data('id');
       var name = $(this).data('name');
       swal(` ${'حذف دسته بندی:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
               dangerMode: true,
               icon: "warning",
               buttons: ["انصراف", "حذف"],
           })
           .then(function(isConfirm) {
               if (isConfirm) {
                   $.ajax({
                       type: "post",
                       url: "/admin-panel/shop/brand/delete",
                       data: {
                           id: id,
                           "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                       },
                       success: function(data) {
                           var url = "/admin-panel/shop/brand";
                           location.href = url;
                       }
                   });
               } else {
                   toastr.warning('لغو شد.', '', []);
               }
           });
   });

   $(document).on('click', '#restoreBrand', function(e) {
   e.preventDefault();
   var id = $(this).data('id');
   var name = $(this).data('name');
   swal(` ${'بازگردانی برند:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
           dangerMode: true,
           icon: "warning",
           buttons: ["انصراف", "حذف"],
       })
       .then(function(isConfirm) {
           if (isConfirm) {
               $.ajax({
                   type: "post",
                   url: "/admin-panel/shop/brand/restore",
                   data: {
                       id: id,
                       "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                   },
                   success: function(data) {
                     var url = "/admin-panel/shop/brand";
                     location.href = url;
                       }
               });
           } else {
               toastr.warning('لغو شد.', '', []);
           }
       });
 });


    $(document).on('click', '#icon-delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var name = $(this).data('name');
        swal(` ${'حذف عکس  برند:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
                dangerMode: true,
                icon: "warning",
                buttons: ["انصراف", "حذف"],
            })
            .then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "post",
                        url: "/admin-panel/shop/brand/icon/delete",
                        data: {
                            id: id,
                            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                        },
                        success: function(data) {
                        $( ".dropify-preview" ).addClass('d-none');
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
    oTable = $('#datatable').DataTable(); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
