// if($('.selectPhysical').length){
// var id = $('.selectPhysical').find(":selected").val();
// var productid = $('.selectPhysical').data('productid');
// $.ajax({
//     type: "post",
//     url: window.location.origin +'/admin-panel/shop/product-list/getFeatures',
//     data: {
//         id: id,
//         productid: productid,
//         value: true,
//         "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
//     },
//     success: function(data) {
//       data['features'].forEach(mysw);
//       function mysw(item, index) {
//         var features = item;
//         $(".physicalFeatures").html("");
//         features.forEach(myFunction);
//           $(".physicalFeatures").removeClass('d-none');
//         function myFunction(item, index) {
//             var a = '<div class="form-group mb-0 col-12">' +
//                 '<div class="input-group mt-3">' +
//                 '<div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">'+item.name+':</span></div>' +
//                 '<input type="text" class="form-control inputfield" name="value['+item.id+']" value="salam">' +
//                 '</div>' +
//                 '</div>';
//
//             $(".physicalFeatures").append(a);
//         }
//
//     }
// }
// });
// }
//
// if($('.selectService').length){
// var id = $('.selectService').find(":selected").val();
// $.ajax({
//     type: "post",
//     url: window.location.origin +'/admin-panel/shop/product-list/getFeatures',
//     data: {
//         id: id,
//         value: true,
//         "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
//     },
//     success: function(data) {
//       data.forEach(mysw);
//       function mysw(item, index) {
//         var features = item;
//         $(".physicalFeatures").html("");
//         features.forEach(myFunction);
//           $(".physicalFeatures").removeClass('d-none');
//         function myFunction(item, index) {
//             var a = '<div class="form-group mb-0 col-12">' +
//                 '<div class="input-group mt-3">' +
//                 '<div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">'+item.name+':</span></div>' +
//                 '<input type="text" class="form-control inputfield" name="value['+item.id+']">' +
//                 '</div>' +
//                 '</div>';
//
//             $(".physicalFeatures").append(a);
//         }
//
//     }
//   }
// });
// }
// if($('.selectFile').length){
// var id = $('.selectFile').find(":selected").val();
// $.ajax({
//     type: "post",
//     url: window.location.origin +'/admin-panel/shop/product-list/getFeatures',
//     data: {
//         id: id,
//         value: true,
//         "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
//     },
//     success: function(data) {
//       data.forEach(mysw);
//       function mysw(item, index) {
//         var features = item;
//         $(".physicalFeatures").html("");
//         features.forEach(myFunction);
//           $(".physicalFeatures").removeClass('d-none');
//         function myFunction(item, index) {
//             var a = '<div class="form-group mb-0 col-12">' +
//                 '<div class="input-group mt-3">' +
//                 '<div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">'+item.name+':</span></div>' +
//                 '<input type="text" class="form-control inputfield" name="value['+item.id+']">' +
//                 '</div>' +
//                 '</div>';
//
//             $(".physicalFeatures").append(a);
//         }
//
//     }
//   }
// });
// }

$(document).on('change', '.selectPhysical', function(e) {
    e.preventDefault();
    var id = $(this).find(':selected').data('id');
    var name = $(this).data('name');
    $.ajax({
        type: "post",
        url: window.location.origin +'/admin-panel/shop/product-list/getFeatures',
        data: {
            id: id,
            name: name,
            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
        },
        success: function(data) {
          data.forEach(mysw);
          function mysw(item, index) {
            var features = item;
            $(".physicalFeatures").html("");
            features.forEach(myFunction);
              $(".physicalFeatures").removeClass('d-none');
            function myFunction(item, index) {
                var a = '<div class="form-group mb-0 col-12">' +
                    '<div class="input-group mt-3">' +
                    '<div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">'+item.name+':</span></div>' +
                    '<input type="text" class="form-control inputfield" name="value['+item.id+']">' +
                    '</div>' +
                    '</div>';

                $(".physicalFeatures").append(a);
            }

        }
      }
    });
});




$(document).on('change', '.selectService', function(e) {
    e.preventDefault();
    var id = $(this).find(':selected').data('id');
    var name = $(this).data('name');
    $.ajax({
        type: "post",
        url: window.location.origin +'/admin-panel/shop/product-list/getFeatures',
        data: {
            id: id,
            name: name,
            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
        },
        success: function(data) {

          data.forEach(mysw);
          function mysw(item, index) {
            var features = item;
             $(".serviceFeatures").html("");
            features.forEach(myFunction);
              $(".serviceFeatures").removeClass('d-none');
            function myFunction(item, index) {
                var a = '<div class="form-group mb-0 col-12">' +
                    '<div class="input-group mt-3">' +
                    '<div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">'+item.name+':</span></div>' +
                    '<input type="text" class="form-control inputfield" name="value['+item.id+']">' +
                    '</div>' +
                    '</div>';

                $(".serviceFeatures").append(a);
            }
}
        }
    });
});



$(document).on('change', '.selectFile', function(e) {
    e.preventDefault();
    var id = $(this).find(':selected').data('id');
    var name = $(this).data('name');
    $.ajax({
        type: "post",
        url: window.location.origin +'/admin-panel/shop/product-list/getFeatures',
        data: {
            id: id,
            name: name,
            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
        },
        success: function(data) {

          data.forEach(mysw);
          function mysw(item, index) {
            var features = item;
                $(".fileFeatures").html("");
            features.forEach(myFunction);
              $(".fileFeatures").removeClass('d-none');
            function myFunction(item, index) {
                var a = '<div class="form-group mb-0 col-12">' +
                    '<div class="input-group mt-3">' +
                    '<div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">'+item.name+':</span></div>' +
                    '<input type="text" class="form-control inputfield" name="value['+item.id+']">' +
                    '</div>' +
                    '</div>';

                $(".fileFeatures").append(a);
            }
}
        }
    });
});
