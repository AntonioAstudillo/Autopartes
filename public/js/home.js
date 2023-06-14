$(document).ready(function () {
    /**
     * Bloque de codigo para el carousel dentro de la vista home
     */
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        animateOut: "fadeOut",
        stagePadding: 50,
        responsiveClass: true,
        dots: false,
        nav: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            600: {
                items: 3,
                nav: false,
            },
            1000: {
                items: 3,
                nav: true,
                loop: false,
            },
        },
    });

    /**
     * Fin de bloque de codigo de carousel
     */
});
