<?php
/* Template Name: Resources */
get_header();
$show_archived = get_field('show_archived_resources');
$filtered_category = @$_GET['category'];

$resources_args = array(
    'post_type' => 'resources',
    'posts_per_page' => 6,
    'meta_key'      => 'archived',
    'meta_value'    => ( $show_archived ) ? '1' : '0'
);

if( $filtered_category ) {
    $resources_args['tax_query'][] = array(
        'taxonomy' => 'resource-category',
        'field' => 'slug',
        'terms' => $filtered_category
    );
}

$resources = new WP_Query($resources_args);

$categories = get_terms(array('taxonomy' => 'resource-category','hide_empty' => false)); ?>
<div class="template-resources-page-container">
    <div class="blog-content content-wrap">
        <?php $hero_s = get_field('hero_section') ?>
        <section class="hero-section">
            <?php if( $hero_s['title'] ): ?>
                <h1 class="fade-in-animation"><?= $hero_s['title'] ?></h1>
            <?php endif; ?>

            <?php if( $hero_s['banner_title'] || $hero_s['banner_description'] ): ?>
                <div class="box-wrap">
                    <div class="box-content">
                        <?php if( $hero_s['banner_title'] ): ?>
                            <h2 class="fade-in-animation"><?= $hero_s['banner_title'] ?></h2>
                        <?php endif; ?>

                        <?php if( $hero_s['banner_description'] ): ?>
                            <p class="fade-in-animation"><?= $hero_s['banner_description'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </section>

        <?php if( $categories && !$show_archived ): ?>
            <section class="filters-section">
                <form id="resources-filters-form">
                    <input type="hidden" name="action" value="resources_filters">
                    <input type="hidden" name="archived" value="<?= ( $show_archived ) ? '1' : '0' ?>">
                    <input type="hidden" id="resources-page-input" name="my-page" value="1">
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
            </section>
        <?php endif; ?>

        <section class="posts-wrap">
            <div class="posts-holder" id="resources-response">
                <?php print_resources($resources); ?>
            </div>
            <div class="load-more-holder">
                <button id="resources-load-more-btn" class="btn light" <?= ( $resources->found_posts <= 6 ) ? ' hidden' : null; ?>>
                    Load More
                </button>
            </div>
        </section>

        <?php
        $link = get_field('link');
        if( $link ):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self'; ?>

            <section class="banner-holder">
                <a class="banner" href="<?= $link_url ?>" target="<?= $link_target ?>">
                    <?= $link_title ?>
                    <span class="swiper-btn dark"><?php icon_arrow() ?></span>
                </a>
            </section>
        <?php endif; ?>
    </div>

    <?php get_template_part('template-parts/cards'); ?>
</div>
<?php get_footer(); ?>