(function ($) {
    "use strict";

    /* Back to top
 * ------------------------------------------------------ */
    var backToTop = function () {
        $('.back-to-top').click(function () {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        });
    };


    /* Masonry Grid
 * ------------------------------------------------------ */
    var masonryLayout = function () {

        $('.grid').masonry({
            itemSelector: '.grid-item',
        });
    };

    /* Owl Carousel
 * ------------------------------------------------------ */
    var landingCarousel = function () {
        $('.land-carousel').owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: false,
        });
    };

    var testimonialCarousel = function () {
        $('.testimonial-carousel').owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
        });
    };

    var workCarousel = function () {
        $('.work-carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                768: {
                    stagePadding: 150,
                }
            }
        });
    };

    /* Navbar fixer
* ------------------------------------------------------ */
    var navbarFixer = function () {
        $(window).scroll(function () {
            if ($(document).scrollTop() >= 500) {
                $('.navbar').removeClass('navbar-dark');
                $('.navbar').addClass('bg-light navbar-light');
            }
            else {
                $('.navbar').addClass('navbar-dark');
                $('.navbar').removeClass('bg-light navbar-light');
            }
        });
    };


    /* Initialize
 * ------------------------------------------------------ */
    (function ssInit() {
        backToTop();
        masonryLayout();
        landingCarousel();
        testimonialCarousel();
        workCarousel();
        navbarFixer();
    })();
})(jQuery);