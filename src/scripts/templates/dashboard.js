import $ from "jquery/dist/jquery";
import { Swiper, Navigation } from 'swiper';
Swiper.use([Navigation]);

if( $('.template-dashboard-page-container').length ) {
    let swiperHeroCards =  new Swiper( '.swiper-hero-cards' , {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: false,
        speed: 250,
        autoHeight: true,
        navigation: {
            prevEl: '.swiper-hero-cards-button-prev',
            nextEl: '.swiper-hero-cards-button-next'
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
                autoHeight: false,
            },
            1024: {
                slidesPerView: 3,
                autoHeight: false,
            },
            1250: {
                slidesPerView: 4,
                autoHeight: false,
            }
        },
    });
}