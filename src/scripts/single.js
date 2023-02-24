import $ from "jquery/dist/jquery";
import { Swiper, Navigation } from 'swiper';
Swiper.use([Navigation]);

if( $('.single-posts-page-container').length ) {
    let swiperRelatedPosts = new Swiper(".swiper-related-posts", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: false,
        speed: 250,
        navigation: {
            nextEl: '.swiper-related-posts-button-next',
            prevEl: '.swiper-related-posts-button-prev',
        },
        // Be careful when editing slides per view and breakpoints values
        // It's combined with css. When there is not enough slides to fill the full width of slider then slides will be centered with css
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 25,
            },
            1250: {
                slidesPerView: 3,
                spaceBetween: 35,
            }
        }
    });
}