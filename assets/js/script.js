jQuery(document).ready(function(){

// Menu
$( "#menu-toggle" ).click(function() {
  $( "#menu-drop" ).toggle( "fast", function() {
  });
});

// Magazine Contents Show/Hide
// $( ".issue-contents__title" ).click(function() {
// $(this).next( ".issue-contents-group" ).slideToggle("medium");
// $(this).find( "i" ).toggleClass("fa-angle-down fa-angle-up");
// });

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
