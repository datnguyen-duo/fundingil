<?php get_header();
$filtered_category = @$_GET['category'];

$title = get_field('title', get_option('page_for_posts'));
$featured_posts = get_field('featured_posts', get_option('page_for_posts'));

$posts_args = array(
    'posts_per_page' => 6,
    'meta_key'      => 'archived',
    'meta_value'    => 0
);

if( $filtered_category ) {
    $posts_args['tax_query'][] = array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $filtered_category
    );
}

$posts = new WP_Query($posts_args);

$categories = get_terms(array('taxonomy' => 'category','hide_empty' => false));
?>
    <div class="blog-page-container">
        <section class="hero-section">
            <div class="content-wrap">
                <h1 class="fade-in-animation"><?= $title ?></h1>
                <?php if( $featured_posts ): ?>
                <h2>Featured Posts</h2>
                <div class="featured-posts">
                    <div class="left">
                        <?php foreach ( $featured_posts as $index => $post): setup_postdata($post); ?>
                            <?php if( $index == 0 ): $post_categories = get_the_terms(get_the_ID(),'category'); ?>
                                <div class="post">
                                    <?= get_the_post_thumbnail(get_the_ID(), 'large') ?>
                                    <div class="post-info">
                                        <div class="post-categories">
                                            <div class="pill"><?= get_the_date() ?></div>

                                            <?php if( $post_categories ): ?>
                                                <?php foreach ( $post_categories as $cat ): ?>
                                                    <div class="pill"><?= $cat->name ?></div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>

                                        <a href="<?php the_permalink() ?>" class="title">
                                            <h3><?php the_title() ?></h3>

                                            <div class="btn-icon">
                                                Read More
                                                <span><?php icon_plus() ?></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>

                    <div class="right">
                        <?php foreach ( $featured_posts as $index => $post): setup_postdata($post) ?>
                            <?php if( $index > 0 ): $post_categories = get_the_terms(get_the_ID(),'category'); ?>
                                <a href="<?php the_permalink() ?>" class="post">
                                    <div class="post-info">
                                        <div class="post-categories">
                                            <div class="pill"><?= get_the_date() ?></div>

                                            <?php if( $post_categories ): ?>
                                                <?php foreach ( $post_categories as $cat ): ?>
                                                    <div class="pill"><?= $cat->name ?></div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                        <h3><?php the_title() ?></h3>
                                        <div class="btn-icon">
                                            Read More
                                            <span><?php icon_plus() ?></span>
                                        </div>
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>


        <?php
        $cat = get_field('posts_category', get_option('page_for_posts'));
        $media_press_news = new WP_Query(array(
            'posts_per_page' => 3,
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => $cat
                )
            )
        ));

        if( $media_press_news->have_posts() ): ?>
            <section class="current-news-posts-section">
                <div class="content-wrap">
                    <div class="section-header">
                        <h2>Current News</h2>
                    </div>

                    <div class="swiper swiper-news">
                        <div class="swiper-wrapper">
                            <?php while( $media_press_news->have_posts() ): $media_press_news->the_post(); ?>
                                <div class="swiper-slide">
                                    <?php get_template_part('template-parts/post'); ?>
                                </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>

                    <div class="swiper-navigation-buttons">
                        <div class="swiper-news-button-prev swiper-btn prev"><?php icon_arrow() ?></div>
                        <div class="swiper-news-button-next swiper-btn"><?php icon_arrow() ?></div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <section class="news-section">
            <div class="content-wrap">
                <div class="section-header">
                    <h2>Newsworthy Posts</h2>

                    <?php if( $categories ): ?>
                        <form id="posts-filters-form">
                            <input type="hidden" id="posts-page-input" name="my-page" value="1">
                            <input type="hidden" name="action" value="posts_filters">
                            <input type="hidden" name="is-load-more" value="0" id="is-load-more-input">

                            <div class="dropdown-filter">
                                <div class="dropdown-filter-header">
                                    <p>Filter By <span>Category</span></p>
                                    <span class="swiper-btn dark"><?php icon_arrow() ?></span>
                                </div>

                                <div class="dropdown-filter-list">
                                    <div class="dropdown-filter-list-content">
                                        <?php foreach ( $categories as $cat ): ?>
                                            <div class="single-checkbox">
                                                <input type="checkbox" id="cat-<?= $cat->slug ?>" value="<?= $cat->slug ?>" name="category[]" <?php if($filtered_category):foreach($filtered_category as$filtered_item):if($filtered_item==$cat->slug):echo' checked';endif;endforeach;endif; ?>>
                                                <label for="cat-<?= $cat->slug ?>">
                                                    <span><?= $cat->name ?></span>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>

                <div class="posts" id="posts-response"><?php print_posts($posts); ?></div>

                <div class="load-more-holder">
                    <button id="posts-load-more-btn" class="btn <?= ( $posts->found_posts <= 6 ) ? ' hidden' : null; ?>">Load More</button>
                </div>

                <?php
                $link = get_field('link', get_option('page_for_posts'));
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>

                    <div class="banner-holder">
                        <a class="banner" href="<?= $link_url ?>" target="<?= $link_target ?>">
                            <?= $link_title ?>
                            <span class="swiper-btn"><?php icon_arrow() ?></span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <?php get_template_part('template-parts/cards'); ?>
    </div>
<?php get_footer(); ?>