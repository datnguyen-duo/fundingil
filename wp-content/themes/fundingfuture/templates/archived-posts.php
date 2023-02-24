<?php
/* Template Name: Archived Posts */
get_header();
$show_archived = get_field('show_archived_resources');

$resources_args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'meta_key'      => 'archived',
    'meta_value'    => 1
);
$resources = new WP_Query($resources_args); ?>
<div class="template-archived-posts-page-container">
    <div class="content content-wrap">
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

        <section class="posts-wrap">
            <div class="posts-holder" id="resources-response">
                <?php print_posts($resources); ?>
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