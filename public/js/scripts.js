$(document).ready(function() {
    $('.flash_message').slideDown('slow');
    setTimeout(function() {
        $('.flash_message').slideUp('slow');
    }, 5000)
});