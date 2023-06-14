$(document).ready(function () {
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

    owl.on("mousewheel", ".owl-stage", function (e) {
        if (e.deltaY > 0) {
            owl.trigger("next.owl");
        } else {
            owl.trigger("prev.owl");
        }
        e.preventDefault();
    });
});
