$(function () {
    /*$('.message, .close').delay(4000).fadeOut();*/
    $('.message, .close').delay(2000).animate({
        top: "-=50"},function() {
        $(this).remove();
    })
});

