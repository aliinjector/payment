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


   $(document).on('click', '#rejectRequest', function(e) {
       e.preventDefault();
       var id = $(this).data('id');
       var name = $(this).data('name');
       swal(` ${'رد کردن درخواست لینک دانلود جدید:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
               dangerMode: true,
               icon: "warning",
               buttons: ["انصراف", "حذف"],
           })
           .then(function(isConfirm) {
               if (isConfirm) {
                   $.ajax({
                       type: "post",
                       url:  "/admin-panel/shop/purchases-managment/download-link-request-status/delete",
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
                           var url = "/admin-panel/shop/purchases-managment/download-link-request-status";
                           location.href = url;
                         }, 1000);
                   }
                   });
               } else {
                   toastr.warning('لغو شد.', '', []);
               }
           });
   });

   $(document).on('click', '#restoreStatus', function(e) {
   e.preventDefault();
   var id = $(this).data('id');
   var name = $(this).data('name');
   swal(` ${'بازگردانی درخواست:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
           dangerMode: true,
           icon: "warning",
           buttons: ["انصراف", "حذف"],
       })
       .then(function(isConfirm) {
           if (isConfirm) {
               $.ajax({
                   type: "post",
                   url:  "/admin-panel/shop/purchases-managment/download-link-request-status/restore",
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
                           var url = "/admin-panel/shop/purchases-managment/download-link-request-status";
                           location.href = url;
                         }, 1000);
                   }
               });
           } else {
               toastr.warning('لغو شد.', '', []);
           }
       });
 });


   $(document).on('click', '#acceptRequest', function(e) {
       e.preventDefault();
       var id = $(this).data('id');
       var name = $(this).data('name');
       swal(` ${'تایید درخواست ارسال لینک دانلود جدید برای فایل :'} ${name} | ${'آیا اطمینان دارید؟'}`, {
         icon: "info",
         buttons: ["انصراف", "تایید"],
           })
           .then(function(isConfirm) {
               if (isConfirm) {
                   $.ajax({
                       type: "post",
                       url:  "/admin-panel/shop/purchases-managment/download-link-request-status/approved",
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
                           var url = "/admin-panel/shop/purchases-managment/download-link-request-status";
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
