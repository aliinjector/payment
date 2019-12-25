$(document).on('change', '.selectPhysical', function(e) {
    e.preventDefault();
    var id = $(this).find(':selected').data('id')
    var name = $(this).data('name');
    $.ajax({
        type: "post",
        url: window.location.href + '/getFeatures',
        data: {
            id: id,
            name: name,
            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
        },
        success: function(data) {

            var features = data;
            $(".physicalFeatures").html("");
            features.forEach(myFunction);
              $(".physicalFeatures").removeClass('d-none');
            function myFunction(item, index) {
                var a = '<div class="form-group mb-0 col-12">' +
                    '<div class="input-group mt-3">' +
                    '<div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">'+item.name+':</span></div>' +
                    '<input type="text" class="form-control inputfield" name="value['+item.id+']">' +
                    '<input type="hidden" class="form-control inputfield" name="feature[]" value="'+item.id+'">' +
                    '</div>' +
                    '</div>';

                $(".physicalFeatures").append(a);
            }

        }
    });
});




$(document).on('change', '.selectService', function(e) {
    e.preventDefault();
    var id = $(this).find(':selected').data('id')
    var name = $(this).data('name');
    $.ajax({
        type: "post",
        url: window.location.href + '/getFeatures',
        data: {
            id: id,
            name: name,
            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
        },
        success: function(data) {

            var features = data;
            $(".serviceFeatures").html("");
            features.forEach(myFunction);
              $(".serviceFeatures").removeClass('d-none');
            function myFunction(item, index) {
                var a = '<div class="form-group mb-0 col-12">' +
                    '<div class="input-group mt-3">' +
                    '<div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">'+item.name+':</span></div>' +
                    '<input type="text" class="form-control inputfield" name="'+item.id+'">' +
                    '</div>' +
                    '</div>';

                $(".serviceFeatures").append(a);
            }

        }
    });
});





$(document).on('change', '.selectFile', function(e) {
    e.preventDefault();
    var id = $(this).find(':selected').data('id')
    var name = $(this).data('name');
    $.ajax({
        type: "post",
        url: window.location.href + '/getFeatures',
        data: {
            id: id,
            name: name,
            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
        },
        success: function(data) {

            var features = data;
            $(".fileFeatures").html("");
            features.forEach(myFunction);
              $(".fileFeatures").removeClass('d-none');
            function myFunction(item, index) {
                var a = '<div class="form-group mb-0 col-12">' +
                    '<div class="input-group mt-3">' +
                    '<div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">'+item.name+':</span></div>' +
                    '<input type="text" class="form-control inputfield" name="'+item.id+'">' +
                    '</div>' +
                    '</div>';

                $(".fileFeatures").append(a);
            }

        }
    });
});
