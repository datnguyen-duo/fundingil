<?php
function posts_filters() {
    $is_load_more = @$_GET['is-load-more'];
    $category = @$_GET['category'];
    $page = @$_GET['my-page'];
    $per_page = 6;

    $query = postsQuery( $per_page, $category, $page );
    $next_query = postsQuery( $per_page, $category, $page + 1 );

    ob_start();
    print_posts($query, array( 'newly_loaded' => ($is_load_more) ));
    $html = ob_get_clean();

    $response = array(
        'html' => $html,
        'next_page_posts' => $next_query->found_posts,
        'load' => $is_load_more,
    );

    echo json_encode($response);
    die;
}
add_action('wp_ajax_posts_filters', 'posts_filters');
add_action('wp_ajax_nopriv_posts_filters', 'posts_filters');

function postsQuery($per_page, $category, $page ) {
    $resources_args = array(
        'post_type' => 'post',
        'post_status' => array( 'publish' ),
        'posts_per_page' => $per_page,
        'paged' => $page,
        'meta_key' => 'archived',
        'meta_value' => 0,
        'tax_query' => [
            'relation' => 'OR'
        ],
    );

    if( $category ) {
        $resources_args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $category
        );
    }

    return new WP_Query( $resources_args );
}

function print_posts( $query, $args = array('newly_loaded' => false) ) {
    $newly_loaded_class = ( $args['newly_loaded'] ) ? 'newly-loaded-post' : null;

    if( $query->have_posts() ):
        while( $query->have_posts() ): $query->the_post(); ?>
            <div class="post-holder <?= $newly_loaded_class ?>">
                <?php get_template_part('template-parts/post'); ?>
            </div>
        <?php endwhile; wp_reset_postdata();
    else: ?>
        <div class="no-results">
            <h2>No posts to show</h2>
        </div>
    <?php endif;
}