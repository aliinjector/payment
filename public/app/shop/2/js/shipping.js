var oldPrice = $("td.total-payable-price").text().replace(/,/g, '');
$('.shipping').on('change', function(e) {
    e.preventDefault();
    var shop = $(this).data('shop');
    var type = $(this).data('shipping');
    $.ajax({
        type: "post",
        url: 'getShippingPrice/calculate',
        data: {
            shop: shop,
            type: type,
            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
        },
        success: function(data) {
          var newAdditionalPrice = data;
           var sum = parseFloat(oldPrice) + parseFloat(newAdditionalPrice)
           var finalPrice = sum.toLocaleString()
           if ($("#price-span").hasClass("price")) {
             $('#price-span').removeClass('price');
             setTimeout(function(){
               $('#price-span').addClass('price');
             }, 100);
           }
           else{
             $('#price-span').addClass('price');
           }

           $("span#price-span").text(finalPrice);

        }
    });
});
