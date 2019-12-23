$(document).on('change', '#select', function(e) {
    e.preventDefault();
    var id = $(this).find(':selected').data('id')
    var name = $(this).data('name');
    $.ajax({
        type: "post",
        url: window.location.href + '/test',
        data: {
            id: id,
            name: name,
            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
        },
        success: function(data) {

            var features = data;
            $("#demo").html("");
            features.forEach(myFunction);
              $("#demo").removeClass('d-none');
            function myFunction(item, index) {
                var a = '<div class="form-group mb-0 col-12">' +
                    '<div class="input-group mt-3">' +
                    '<div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">'+item.name+':</span></div>' +
                    '<input type="text" class="form-control inputfield" name="name">' +
                    '</div>' +
                    '</div>';

                $("#demo").append(a);
            }

        }
    });
});
