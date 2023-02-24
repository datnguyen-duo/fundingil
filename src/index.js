import $ from "jquery/dist/jquery";

// Other
import "/src/style/main.scss"

import "./scripts/functions";
import "./scripts/animations";

// Modules
import "./scripts/modules/header";
import "./scripts/modules/footer";

// Templates
import "./scripts/templates/resources";
import "./scripts/templates/about";
import "./scripts/templates/dashboard";

// Template parts
import "./scripts/template-parts/cards-2";

// Pages
import "./scripts/front-page";
import "./scripts/home";
import "./scripts/single";

// Filter dropdown on resources and blog page
$('.dropdown-filter-header').on('click', function(e){
    $(this).parent().toggleClass("active")
    $(this).next().slideToggle(200);
})

// $(document).click(function(e) {
//     if (!$(e.target).is('.dropdown-filter *')) {
//         $('.dropdown-filter-list').slideUp('fast');
//         $('.dropdown-filter').removeClass('active');
//     }
// });
// Filter dropdown on resources and blog page END