import $ from "jquery/dist/jquery";

const siteHeader = $('#site-header');
let scrollDirectionDown = true;

window.addEventListener('scroll', function() {
    if( this.oldScroll > this.scrollY ) {
        scrollDirectionDown = false;
    } else {
        scrollDirectionDown = true;
    }
    this.oldScroll = this.scrollY;

    if( window.scrollY > 200 ) {
        $(siteHeader).addClass('scrolled')
        $('.logo-dark').addClass('visible')
        $('.logo-white').removeClass('visible')
    } else{
        $(siteHeader).removeClass('scrolled')
        $('.logo-dark').removeClass('visible')
        $('.logo-white').addClass('visible')
    }

    if ( scrollDirectionDown ) {
        if( window.scrollY > 100 ) {
            siteHeader.css({'transform' : 'translateY(-100%)'})
        }
    } else {
        siteHeader.css({'transform' : 'translateY(0)'})
    }
});

$('.menu-opener').on('click', function(){
    $(this).toggleClass('active')
    $('body, html').toggleClass('no-scroll')

    if($(siteHeader).hasClass('scrolled')){
        $(siteHeader).removeClass('scrolled')
        $('.logo-dark').removeClass('visible')
        $('.logo-white').addClass('visible')
    }

    $('.mobile-nav').fadeToggle();
})