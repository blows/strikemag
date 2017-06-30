jQuery(document).ready(function(){

// Menu
// $( ".cross" ).hide();
// $( ".menu" ).hide();
// $( "#hamburger" ).click(function() {
//   $( ".menu" ).slideToggle( "medium", function() {
//   $( "#hamburger" ).hide();
//   $( ".cross" ).show();
//   });
// });
//
// $( ".cross" ).click(function() {
// $( ".menu" ).slideToggle( "medium", function() {
// $( ".cross" ).hide();
// $( "#hamburger" ).show();
// });
// });

// Magazine Contents Show/Hide
// $( ".issue-contents__title" ).click(function() {
// $(this).next( ".issue-contents-group" ).slideToggle("medium");
// $(this).find( "i" ).toggleClass("fa-angle-down fa-angle-up");
// });

var slider = new IdealImageSlider.Slider({
	selector: '#issue-slider',
	// height: 400, // Required but can be set by CSS
	interval: 99999999,
  effect: 'fade',
  transitionDuration: 0
});
slider.start();

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

// Hide Header on on scroll down
// var didScroll;
// var lastScrollTop = 0;
// var delta = 5;
// var navbarHeight = $('header').outerHeight();
//
// $(window).scroll(function(event){
//     didScroll = true;
// });
//
// setInterval(function() {
//     if (didScroll) {
//         hasScrolled();
//         didScroll = false;
//     }
// }, 250);
//
// function hasScrolled() {
//     var st = $(this).scrollTop();
//
//     // Make sure they scroll more than delta
//     if(Math.abs(lastScrollTop - st) <= delta)
//         return;
//
//     // If they scrolled down and are past the navbar, add class .nav-up.
//     // This is necessary so you never see what is "behind" the navbar.
//     if (st > lastScrollTop && st > navbarHeight){
//         // Scroll Down
//         $('header').removeClass('nav-down').addClass('nav-up');
//         $( ".cross" ).hide();
//         $( ".menu" ).hide();
//         $( ".hamburger" ).show();
//     } else {
//         // Scroll Up
//         if(st + $(window).height() < $(document).height()) {
//             $('header').removeClass('nav-up').addClass('nav-down');
//         }
//     }
//
//     lastScrollTop = st;
// } // End Hide Header on on scroll down
