<?php
function resources_filters() {
    $category = @$_GET['category'];
    $show_archived = @$_GET['archived'];
    $page = @$_GET['my-page'];
    $per_page = 6;
    $is_load_more = @$_GET['is-load-more'];

    $query = resourcesQuery( $per_page, $show_archived, $category, $page );
    $next_query = resourcesQuery( $per_page, $show_archived, $category, $page + 1 );

    ob_start();
    print_resources($query, array( 'newly_loaded' => ($is_load_more) ));
    $html = ob_get_clean();

    $response = array(
        'html' => $html,
        'next_page_posts' => $next_query->found_posts,
        'load' => $is_load_more,
    );

    echo json_encode($response);
    die;
}
add_action('wp_ajax_resources_filters', 'resources_filters');
add_action('wp_ajax_nopriv_resources_filters', 'resources_filters');

function resourcesQuery($per_page, $show_archived = 0, $category, $page  ) {
    $resources_args = array(
        'post_type' => 'resources',
        'post_status' => array( 'publish' ),
        'posts_per_page' => $per_page,
        'meta_key'      => 'archived',
        'meta_value'    => ( $show_archived ) ? '1' : '0',
        'paged' => $page,
        'tax_query' => [
            'relation' => 'OR'
        ],
    );

    if( $category ) {
        $resources_args['tax_query'][] = array(
            'taxonomy' => 'resource-category',
            'field' => 'slug',
            'terms' => $category
        );
    }

    return new WP_Query( $resources_args );
}

function print_resources( $query, $args = array('newly_loaded' => false) ) {
    $newly_loaded_class = ( $args['newly_loaded'] ) ? 'newly-loaded-post' : null;

    if( $query->have_posts() ):
        while( $query->have_posts() ): $query->the_post(); ?>
            <div class="single-post <?= $newly_loaded_class ?>">
                <?php get_template_part('template-parts/resource'); ?>
            </div>
        <?php endwhile; wp_reset_postdata();
    else: ?>
        <div class="no-results">
            <h2>No resources to show</h2>
        </div>
    <?php endif;
}