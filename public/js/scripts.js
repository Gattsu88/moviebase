$(document).ready(function() {
    $('.flash_message').slideDown('slow');
    setTimeout(function() {
        $('.flash_message').slideUp('slow');
    }, 5000)
});

$(document).ready(function() {
    $('.slick-home').slick({
        infinite:true,
        slidesToShow:4,
        slidesToScroll:4,
        arrows:false
    })
});