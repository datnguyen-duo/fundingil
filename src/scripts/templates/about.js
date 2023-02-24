import $ from "jquery/dist/jquery";
import { Swiper, Navigation } from 'swiper';
Swiper.use([Navigation]);

if( $('.template-about-page-container').length ) {
    // Blocks section


    $('.blocks-section .read-more-btn').on('click', function(){
        $(this).toggleClass('active').next().slideToggle();
    });
    // Blocks sections end


    // Slider section
    let swiperVideosAccordions = new Swiper( '.swiper-videos-accordions' , {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: false,
        speed: 250,
        threshold: 50,
        allowTouchMove: false,
        navigation: {
            prevEl: '.swiper-videos-accordions-button-prev',
            nextEl: '.swiper-videos-accordions-button-next'
        },
        on: {
            slideChangeTransitionEnd: function () {
                $('.swiper-videos-accordions .swiper-slide-active .slider-accordion').eq(0).trigger('click');
            },
        },
    });

    let swiperVideos = new Swiper( '.swiper-videos' , {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: false,
        speed: 250,
        threshold: 50,
        allowTouchMove: false,
    });

    $('.slider-accordion').on('click', function(){
        if( !$(this).hasClass('active') ) {
            $('.slider-accordion').removeClass('active');
            $('.slider-accordion .slider-accordion-hidden-content').slideUp();

            $(this).toggleClass('active');
            $(this).find('.slider-accordion-hidden-content').slideToggle();

            swiperVideos.slideTo($(this).data('index'));
        }
    });

    $('.slider-accordion p').on('click', function(e){
        e.stopPropagation();
    });

    const sliderVideoPopup = $('.slider-video-popup');
    $('.open-slider-video-popup').on('click', function(){
        openPopup($(this).data('video-url'));
    });

    $('.close-slider-video-popup-btn, .slider-video-popup-closing-area').on('click', function(){
        closePopup();
    });

    function closePopup() {
        sliderVideoPopup.fadeOut();
        $('html, body').removeClass('no-scroll');
        sliderVideoPopup.find('iframe').attr('src', '');
    }

    function openPopup(videoUrl = '') {
        if( videoUrl ) {
            console.log(videoUrl)
            sliderVideoPopup.fadeIn();
            $('html, body').addClass('no-scroll');
            sliderVideoPopup.find('iframe').attr('src', videoUrl);
        }
    }
    // Slider section end

    // List section
    $('.lists-section .open-more-btn').on('click', function (){
        let parent = $(this).data('parent');
        let target = $(this).data('target');
        $(this).toggleClass('active');
        $(parent).toggleClass('active');
        $(target).slideToggle();
    })
    // List section End
}