jQuery(document).ready(function(){

// Menu
$( ".cross" ).hide();
$( ".menu" ).hide();
$( ".hamburger" ).click(function() {
$( ".menu" ).slideToggle( "slow", function() {
$( ".hamburger" ).hide();
$( ".cross" ).show();
});
});

$( ".cross" ).click(function() {
$( ".menu" ).slideToggle( "slow", function() {
$( ".cross" ).hide();
$( ".hamburger" ).show();
});
});

// Magazine Contents Show/Hide
$( ".issue-contents__title" ).click(function() {
$(this).next( ".issue-contents-group" ).slideToggle("medium");
$(this).find( "i" ).toggleClass("fa-angle-down fa-angle-up");
});

});

// Portrait Cards becone Landscape on smaller screens
$(window).on('load, resize', function mobileViewUpdate() {
    var viewportWidth = $(window).width();
    if (viewportWidth < 770) {
        $(".card-large-portrait").removeClass("portrait");
    };

    if (viewportWidth > 771) {
        $(".card-large-portrait").addClass("portrait");
    };
});
