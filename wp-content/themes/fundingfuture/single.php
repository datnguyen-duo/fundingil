<?php get_header();
$categories = get_the_terms(get_the_ID(),'category');
$author = get_field('author');

if( !$author ) {
    $author = 'N/A';
}
?>
<div class="single-posts-page-container">
    <section class="hero-section">
        <div class="content-wrap">
            <div class="section-content">
                <div class="left">
                    <div class="image-holder">
                        <?= get_the_post_thumbnail(get_the_ID(), 'large') ?>
                    </div>
                </div>
                <div class="right">
                    <h1><?php the_title() ?></h1>
                </div>

                <div class="post-info">
                    <div class="info-box-holder">
                        <div class="info-box">
                            <p class="box-title">Category</p>
                            <p class="box-description">
                                <?php if( $categories ):
                                    foreach ( $categories as $cat ): ?>
                                        <span><?= $cat->name ?></span>
                                    <?php endforeach;
                                endif; ?>
                            </p>
                        </div>
                    </div>
                    <div class="info-box-holder">
                        <div class="info-box">
                            <p class="box-title">Written By</p>
                            <p class="box-description"><?= $author ?></p>
                        </div>
                    </div>
                    <div class="info-box-holder">
                        <div class="info-box">
                            <p class="box-title">Date</p>
                            <p class="box-description"><?= get_the_date() ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="editor-section">
        <div class="content-wrap">
            <div class="section-content">
                <div class="text-editor">
                    <?php the_content(); ?>
                </div>

                <?php get_template_part('template-parts/share-icons'); ?>
            </div>
        </div>
    </section>

    <?php
    $current_post_id = get_the_ID();
    $category = get_the_terms($current_post_id,'category');
    $category_slugs = [];

    $similar_news_args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'tax_query' => [],
        'post__not_in' => array($current_post_id)
    );

     if( $category ) {
         foreach ( $category as $term ) {
             $category_slugs[] = $term->slug;
         }

         $similar_news_args['tax_query'][] = [
             'taxonomy' => 'category',
             'field' => 'slug',
             'terms' => $category_slugs
         ];
     }
    $similar_news = new WP_Query($similar_news_args);

    // if there is no posts with categories then list any post except the current
    if( !$similar_news->have_posts() ) {
        $similar_news = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'tax_query' => [],
            'post__not_in' => array($current_post_id)
        ));
    }

    if( $similar_news->have_posts() ): ?>
        <section class="related-posts-section">
            <div class="section-content content-wrap">
                <h2>Related Newsworthy Posts</h2>

                <div class="swiper swiper-related-posts size-<?= $similar_news->found_posts ?>">
                    <div class="swiper-wrapper">
                        <?php while ( $similar_news->have_posts() ): $similar_news->the_post(); ?>
                            <div class="swiper-slide">
                                <?php get_template_part( 'template-parts/post' ); ?>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>

                <div class="swiper-navigation-buttons">
                    <div class="swiper-related-posts-button-prev swiper-btn prev"><?php icon_arrow() ?></div>
                    <div class="swiper-related-posts-button-next swiper-btn"><?php icon_arrow() ?></div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php get_template_part('template-parts/cards'); ?>
</div>
<?php get_footer(); ?>