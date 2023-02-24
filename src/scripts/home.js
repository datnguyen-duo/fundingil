import $ from "jquery/dist/jquery";
import {getUrlWithSerializedForm, locationPathName} from "./functions";
import { Swiper, Navigation, Pagination, Autoplay } from 'swiper';
Swiper.use([Navigation, Pagination, Autoplay]);

if( $('.blog-page-container').length ) {
    let swiperNews = new Swiper(".swiper-news", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: false,
        speed: 250,
        navigation: {
            nextEl: '.swiper-news-button-next',
            prevEl: '.swiper-news-button-prev',
        },
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


    const $isLoadMoreInput = $('#is-load-more-input');
    const $postsForm = $("#posts-filters-form");
    const $postsResponse = $("#posts-response");
    const $postsFilters = $postsForm.find('input[type=checkbox], input[type=radio]');
    const $postsLoadMoreBtn = $("#posts-load-more-btn");
    const $postsPageInput = $("#posts-page-input");

    function filterPosts(loadMore = false) {
        let serializedUrl = getUrlWithSerializedForm($postsForm);
        $postsResponse.addClass("loading");

        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            data: $postsForm.serialize(),
            type: "GET",
            beforeSend: function (xhr) {},
            success: function (data) {
                let objData = JSON.parse(data);

                if( !objData.next_page_posts ) {
                    hideLoadMoreBtn();
                } else {
                    showLoadMoreBtn();
                }

                if( loadMore ) {
                    document.getElementById("posts-response").innerHTML += objData.html;
                } else {
                    resetPageNumber();
                    $postsResponse.html(objData.html);
                }
            },
            complete: function (data) {
                $postsResponse.removeClass("loading");

                if( loadMore ) {
                    $('.newly-loaded-post').slideDown(200);
                }

                history.pushState(null, null, serializedUrl );
            },
        });
    }

    $postsForm.on('submit', function(e) {
        e.preventDefault();
        filterPosts();
    });

    $postsFilters.on('change', function() {
        resetPageNumber();
        $isLoadMoreInput.val("0");
        $postsForm.submit();
    });

    //On load more click
    $postsLoadMoreBtn.on('click', function(){
        let tmp = parseInt($postsPageInput.val());
        tmp++;
        $postsPageInput.val(tmp);
        $isLoadMoreInput.val("1");
        filterPosts(true);
    });

    function resetPageNumber() { $postsPageInput.val('1'); }

    function showLoadMoreBtn() { $postsLoadMoreBtn.removeClass('hidden'); }

    function hideLoadMoreBtn() { $postsLoadMoreBtn.addClass('hidden'); }
}