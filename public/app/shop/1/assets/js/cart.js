$(document).on('click', '#removeProduct', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var cart = $(this).data('cart');
    var color = $(this).data('color');
    var cartProductId = $(this).data('cartp');
    swal("آیا اطمینان دارید؟", {
            dangerMode: true,
            buttons: ["انصراف", "حذف"],

        })
        .then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "post",
                    url: "user-cart/remove",
                    data: {
                        id: id,
                        cart: cart,
                        color: color,
                        cartProductId: cartProductId,
                        "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                    },
                    success: function(data) {
                        location.reload();

                    }
                });
            } else {
                swal("متوقف شد", "عملیات شما متوقف شد :)", "error");
            }
        });
});
