import $ from "jquery/dist/jquery";
import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
import {CountUp} from "countup.js";
gsap.registerPlugin(ScrollTrigger);

/**
 * Global fade in animation for elements
 **/
export function fadeInAnimation() {
    // Get all fadeIn elements
    const fadeInAnimatedEl = $('.fade-in-animation:not(.element-is-animated)');
    if( fadeInAnimatedEl.length ) {
        // Foreach fadeIn create timeline animation
        fadeInAnimatedEl.each(function(){
            let current = $(this);
            let delay = $(this).data("animation-delay") ? $(this).data("animation-delay") : 0.2;
            let tl = gsap.timeline({defaults: {duration: 0.75}});
            tl.to($(this), {delay: delay, opacity: 1});

            ScrollTrigger.create({
                animation: tl,
                trigger: $(this),
                markers: false,
                start: "top 75%",
                onEnter: function() {
                    //set class for animated element
                    current.addClass('element-is-animated')
                }
            });
        })
    }
}
fadeInAnimation();
/**
 * Global fade in animation for elements END
 **/


/**
 * Count up animation for homepage
 **/
let $countUp = $('#count-up');
if( $countUp.length ) {
    let num = parseInt($countUp.data('num'));

    ScrollTrigger.create({
        trigger: '#count-up',
        markers: false,
        start: "top 75%",
        onEnter: function() {
            if( !$countUp.hasClass('element-is-animated') ) {
                let counter = new CountUp('count-up', num);
                counter.start();
                $countUp.addClass('element-is-animated')
            }
        }
    });
}
/**
 * Count up animation for homepage END
 **/
