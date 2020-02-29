    $('#input-tags').tagsInput();

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
    $(document).ready(function() {
        $('#input-tags_tag').val("");
        $(".dropify-clear").remove();
    });
    $(document).on('click', '#icon-delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var name = $(this).data('name');
        swal(` ${'حذف عکس محصول:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
                dangerMode: true,
                icon: "warning",
                buttons: ["انصراف", "حذف"],
            })
            .then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "post",
                        url:  "/admin-panel/shop/product-list/image/delete",
                        data: {
                            id: id,
                            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                        },
                        success: function(data) {
                          $('#icon-delete').next('div').children(".dropify-preview").addClass('d-none');
                        }
                    });
                } else {
                    toastr.warning('لغو شد.', '', []);
                }
            });
    });
    $(document).on('click', '#file-delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var name = $(this).data('name');
        swal(` ${'حذف فایل:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
                dangerMode: true,
                icon: "warning",
                buttons: ["انصراف", "حذف"],
            })
            .then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "post",
                        url: "/admin-panel/shop/product-list/file/delete",
                        data: {
                            id: id,
                            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                        },
                        success: function(data) {
                          $('#file-delete').next('div').children(".dropify-preview").addClass('d-none');
                        }
                    });
                } else {
                    toastr.warning('لغو شد.', '', []);
                }
            });
    });

                $(window).on("load", function() {
                    $('.show-tick').addClass("col-lg");
                    $('.filter-option-inner-inner').addClass("d-flex");
                    $('.bs-placeholder').removeClass("btn-light");
                    $('.show-tick').addClass("p-1");
                    $('.show-tick').addClass("border");
                });

                $("#tagsinput").tagsInput();

                $("#tagsinput_tag").on('paste', function(e) {
                    var element = this;
                    setTimeout(function() {
                        var text = $(element).val();
                        var target = $("#tagsinput");
                        var tags = (text).split(/[ ,]+/);
                        for (var i = 0, z = tags.length; i < z; i++) {
                            var tag = $.trim(tags[i]);
                            if (!target.tagExist(tag)) {
                                target.addTag(tag);
                            } else {
                                $("#tagsinput_tag").val('');
                            }

                        }
                    }, 0);
                });

$(window).ready(function(){
setInterval(function(){
  $('#cke_description').addClass("col-lg")
}, 100);
});
