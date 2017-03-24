jQuery(document).ready(function(){

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
