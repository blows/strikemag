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

$(".rslides").responsiveSlides({
  auto: false,             // Boolean: Animate automatically, true or false
  speed: 500,            // Integer: Speed of the transition, in milliseconds
  timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
  pager: false,           // Boolean: Show pager, true or false
  nav: true,             // Boolean: Show navigation, true or false
  random: false,          // Boolean: Randomize the order of the slides, true or false
  pause: false,           // Boolean: Pause on hover, true or false
  pauseControls: true,    // Boolean: Pause when hovering controls, true or false
  prevText: "Previous",   // String: Text for the "previous" button
  nextText: "Next",       // String: Text for the "next" button
  maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
  navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
  manualControls: "",     // Selector: Declare custom pager navigation
  namespace: "rslides",   // String: Change the default namespace used
  before: function(){},   // Function: Before callback
  after: function(){}     // Function: After callback
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
