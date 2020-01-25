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
$(document).on('click', '#removerProduct', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var name = $(this).data('name');
    console.log(name)
    swal(` ${'حذف محصول:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
            dangerMode: true,
            icon: "warning",
            buttons: ["انصراف", "حذف"],
        })
        .then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "post",
                    url: document.location.origin + "/admin-panel/shop/product-list/delete",
                    data: {
                        id: id,
                        "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                    },
                    success: function(data) {
                        var url = document.location.origin + "/admin-panel/shop/product-list";
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
            url: "product-list/change-status/" + id,
            type: 'put',
            dataType: "JSON",
            data: {
                "id": id,
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
                        url: document.location.origin + "admin-panel/shop/product-list/image/delete",
                        data: {
                            id: id,
                            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                        },
                        success: function(data) {
                            $(".dropify-preview").addClass('d-none');
                        }
                    });
                } else {
                    toastr.warning('لغو شد.', '', []);
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

$(document).ready(function(){
 $('#datatable_filter').parent().remove();
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
