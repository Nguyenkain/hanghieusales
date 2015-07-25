$(document).ready(function(){

    $( "#menu-content" ).hide();


    $("#menu" ).click(function() {

        // Set the effect type
        var effect = 'slide';

        // Set the options for the effect type chosen
        var options = { direction: 'up' };

        // Set the duration (default: 400 milliseconds)
        var duration = 700;

        $( "#menu-content" ).toggle(effect, options, duration);

        //$( "#menu-content" ).toggle( "ease" );
    });

    var logo = document.getElementById("logo").offsetHeight;
    var item = document.getElementById("item").offsetHeight;
    if(logo >= item){
        max = logo;
    }else{
        max = item;
    }

    document.getElementById("logo").style.height = max + "px";
    document.getElementById("item").style.height = max + "px";
    document.getElementById("menu-area").style.height = max + "px";

    var swiper = new Swiper('.slides', {
        autoplay: 5000,
        pagination: '.swiper-pagination',
        autoplayDisableOnInteraction: false
    });

    var swiper2 = new Swiper('.slides-2', {
        autoplay: 5000,
        slidesPerView : 3,
        spaceBetween : 20,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        loop : true,
        autoplayDisableOnInteraction: false
    });

    var sliderRecent = new Swiper('.recent-list-slide', {
        slidesPerView: 'auto',
        nextButton: '.nav-control.nav-next',
        prevButton: '.nav-control.nav-prev',
        freeMode: true
    });

});
