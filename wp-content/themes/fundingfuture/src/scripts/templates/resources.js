import $ from "jquery/dist/jquery";
import {getUrlWithSerializedForm, locationPathName} from "../functions";

if( $('.template-resources-page-container').length ) {
    const $isLoadMoreInput = $('#is-load-more-input');
    const $resourcesLoadMoreBtn = $("#resources-load-more-btn");
    const $resourcesPageInput = $("#resources-page-input");
    const $resourcesForm = $("#resources-filters-form");
    const $resourcesResponse = $("#resources-response");
    const $resourcesFilters = $resourcesForm.find('input[type=checkbox], input[type=radio]');

    function filterResources(loadMore = false) {
        let serializedUrl = getUrlWithSerializedForm($resourcesForm);
        $resourcesResponse.addClass("loading");

        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            data: $resourcesForm.serialize(),
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
                    document.getElementById("resources-response").innerHTML += objData.html;
                } else {
                    resetPageNumber();
                    $resourcesResponse.html(objData.html);
                }
            },
            complete: function (data) {
                $resourcesResponse.removeClass("loading");

                if( loadMore ) {
                    $('.newly-loaded-post').slideDown(200);
                }

                history.pushState(null, null, serializedUrl );
            },
        });
    }

    $resourcesForm.on('submit', function(e) {
        e.preventDefault();
        filterResources();
    });

    $resourcesFilters.on('change', function() {
        resetPageNumber();
        $isLoadMoreInput.val("0");
        $resourcesForm.submit();
    });

    //On load more click
    $resourcesLoadMoreBtn.on('click', function(){
        let tmp = parseInt($resourcesPageInput.val());
        tmp++;
        $resourcesPageInput.val(tmp);
        $isLoadMoreInput.val("1");
        filterResources(true);
    });

    function resetPageNumber() { $resourcesPageInput.val('1'); }

    function showLoadMoreBtn() { $resourcesLoadMoreBtn.removeClass('hidden'); }

    function hideLoadMoreBtn() { $resourcesLoadMoreBtn.addClass('hidden'); }
}

