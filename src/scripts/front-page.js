import $ from "jquery/dist/jquery";
import { Splide } from '@splidejs/splide';
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';
import { Swiper, Navigation, Pagination, EffectFade, Grid, Autoplay, Thumbs } from 'swiper';

Swiper.use([Navigation, Pagination, EffectFade, Grid, Autoplay, Thumbs]);

if( $('.template-home-page-container').length ) {
    let swiperHero = new Swiper(".swiper-hero", {
        loop: true,
        speed: 250,
        autoplay: {
            delay: 5000
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
    });

    let swiperImagesDescription = new Swiper(".swiper-images-description", {
        spaceBetween: 46,
        loop: true,
        speed: 250,
        autoHeight: true,
    });

    let swiperImages = new Swiper(".swiper-images", {
        spaceBetween: 46,
        loop: true,
        speed: 250,
        navigation: {
            nextEl: '.swiper-images-button-next',
            prevEl: '.swiper-images-button-prev',
        },
        pagination: {
            el: ".swiper-images-pagination",
        },
        thumbs: {
            swiper: swiperImagesDescription,
        },
    });

    let swiperPosts = new Swiper(".swiper-posts", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: false,
        speed: 250,
        navigation: {
            nextEl: '.swiper-posts-button-next',
            prevEl: '.swiper-posts-button-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 35,
            },
            1250: {
                slidesPerView: 3,
            }
        }
    });

    let swiperMaps = new Swiper(".swiper-maps", {
        slidesPerView: 4,
        centeredSlides: true,
        spaceBetween: 35,
        loop: true,
        speed: 250,
        navigation: {
            nextEl: '.swiper-maps-button-next',
            prevEl: '.swiper-maps-button-prev',
        },
    });

    let swiperPartners = new Swiper(".swiper-partners", {
        slidesPerView: 3,
        spaceBetween: 20,
        grid: {
            rows: 2,
            fill: "row"
        },
        speed: 250,
        navigation: {
            nextEl: '.swiper-partners-button-next',
            prevEl: '.swiper-partners-button-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 4,
                spaceBetween: 35,
                grid:{
                    rows: 1
                }
            },
            1024: {
                slidesPerView: 5,
                grid:{
                    rows: 1
                }
            },
            1250: {
                slidesPerView: 6,
                grid:{
                    rows: 1
                }
            },
        }
    });

    const tweets = $('.tweets-section .tweets .ctf-item'); // all tweets from plugin
    if( $('.splide').length && tweets.length ) {

        tweets.each(function(){
            // clone each plugin tweet and paste it into the splide__list
            $(this).clone().appendTo('.splide__list').wrap('<div class="splide__slide"></div>');
        })

        const splide = new Splide( '.splide', {
            type   : 'loop',
            drag   : false,
            focus  : 'center',
            perPage: 3.5,
            pagination: false,
            loop: true,
            arrows     : false,
            pauseOnFocus: false,
            pauseOnHover: false,
            autoScroll: {
                speed: 0.8,
            },
            breakpoints: {
                1024: {
                    perPage: 2.5,

                },
                767: {
                    perPage: 2,

                },
                640: {
                    perPage: 1.5,
                },
            },
        } ).mount( { AutoScroll } );
    }
}