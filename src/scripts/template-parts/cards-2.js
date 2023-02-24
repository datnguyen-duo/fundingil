import $ from "jquery/dist/jquery";

const cards = $('.template-part-cards-2 .card');
cards.on('click', function () {
    let currentCard = $(this);

    if( currentCard.hasClass('active') ) {
        currentCard.removeClass('active');
        currentCard.find('.card-hidden-content').slideUp(200,function(){
            currentCard.parent().css('zIndex', '1');
        });
    } else {
        //for all
        $('.card.active .card-hidden-content').slideUp(100,function (){
            $('.card:not(.active)').parent().css('zIndex', '1');
        });

        cards.removeClass('active');

        //for current
        currentCard.addClass('active');
        currentCard.find('.card-hidden-content').slideDown(200);
        currentCard.parent().css('zIndex', '4');
    }
})