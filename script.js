$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        },
        navText: ["<span>&#8249;</span>", "<span>&#8250;</span>"],
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });
});
