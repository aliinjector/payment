
    $(function() {
        $('#combostar').on('change', function() {
            $('#starcount').val($(this).val());
        });
        $('#combostar').combostars();
    });
    //this will execute on page load(to be more specific when document ready event occurs)
    if ($('.ty-compact-list').length > 3) {
        $('.ty-compact-list:gt(2)').hide();
        $('.show-more').show();
    }

    $('.show-more').on('click', function() {
        //toggle elements with class .ty-compact-list that their index is bigger than 2
        $('.ty-compact-list:gt(2)').toggle();
        //change text of show more element just for demonstration purposes to this demo
        $(this).text() !== 'بستن' ? $(this).text('بستن') : $(this).text('موارد بیشتر');
    });

    $(function() {
        var $gallery = $('.gallery a').simpleLightbox();
    });
