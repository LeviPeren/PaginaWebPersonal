$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        items: 1, // Mostrar un elemento a la vez
        autoplay: true, // Autoplay habilitado
        autoplayTimeout: 3000, // Tiempo de espera entre cambios
        autoplayHoverPause: true // Pausar en hover
    });
});
