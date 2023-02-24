<?php get_header(); ?>
<div class="template-home-page-container">
    <?php $hero_s = get_field('hero_section'); ?>
    <section class="hero-section">
        <?php if( $hero_s['title'] ): ?>
            <h1 class="fade-in-animation" data-animation-delay="0.3"><?= $hero_s['title'] ?></h1>
        <?php endif; ?>

        <?php if( $hero_s['slider'] ): ?>
            <div class="swiper swiper-hero">
                <div class="swiper-wrapper">
                    <?php foreach( $hero_s['slider'] as $slide ): ?>
                        <div class="swiper-slide">
                            <div class="image-holder">
                                <?= wp_get_attachment_image($slide['image']['id'],'full') ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if( $hero_s['banner_title'] ||  $hero_s['banner_description'] ): ?>
        <div class="banner-holder content-wrap">
            <a href="<?= $hero_s['banner_link'] ?>" class="banner">
                <p class="banner-title">
                    <?= $hero_s['banner_title'] ?>
                    <span class="swiper-btn dark mobile"><?php icon_arrow() ?></span>
                </p>

                <p><?= $hero_s['banner_description'] ?></p>

                <?php if( $hero_s['banner_link'] ): ?>
                    <span class="swiper-btn dark desktop"><?php icon_arrow() ?></span>
                <?php endif; ?>
            </a>
        </div>
        <?php endif; ?>
    </section>

    <?php $img_with_desc_s = get_field('image_with_description_section');
    if( $img_with_desc_s['image'] || $img_with_desc_s['small_title'] ||
        $img_with_desc_s['title'] || $img_with_desc_s['description'] ): ?>
    <section class="image-with-description-section">
        <div class="section-content content-wrap">
            <div class="left">
                <div class="image-holder">
                    <?= wp_get_attachment_image($img_with_desc_s['image']['id'], 'large') ?>
                </div>
            </div>
            <div class="right">
                <?php if( $img_with_desc_s['small_title'] ): ?>
                    <p class="small-title fade-in-animation"><?= $img_with_desc_s['small_title'] ?></p>
                <?php endif; ?>

                <?php if( $img_with_desc_s['title'] ): ?>
                    <h2 class="title fade-in-animation"><?= $img_with_desc_s['title'] ?></h2>
                <?php endif; ?>

                <?php if( $img_with_desc_s['description'] ): ?>
                    <p class="description fade-in-animation"><?= $img_with_desc_s['description'] ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php $cards_s = get_field('cards_section') ?>
    <section class="cards-section">
        <div class="section-content content-wrap">
            <div class="section-header">
                <h2 class="title fade-in-animation">
                    <?= $cards_s['title_before'].
                    '<span data-num="'.$cards_s['title_number'].'" id="count-up">'.$cards_s['title_number'].'</span>'.
                    $cards_s['title_after'] ?>
                </h2>
                <p class="description fade-in-animation"><?= $cards_s['small_title'] ?></p>
            </div>

            <div class="cards-title fade-in-animation"><?= $cards_s['cards_title'] ?></div>

            <?php get_template_part('template-parts/cards-2','', array(
                'cards' => $cards_s['cards'],
            )); ?>
        </div>
    </section>

    <?php $slider_with_desc_s = get_field('slider_with_description_section');
    if( $slider_with_desc_s['small_title'] || $slider_with_desc_s['title'] || $slider_with_desc_s['description'] || $slider_with_desc_s['button'] || $slider_with_desc_s['slider'] ): ?>
    <section class="slider-with-description-section">
        <div class="section-content content-wrap">
            <div class="left">
                <p class="small-title fade-in-animation"><?= $slider_with_desc_s['small_title'] ?></p>
                <h2 class="title fade-in-animation"><?= $slider_with_desc_s['title'] ?></h2>
                <p class="description fade-in-animation"><?= $slider_with_desc_s['description'] ?></p>
                <?php
                $link = $slider_with_desc_s['button'];
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a class="btn light" href="<?= $link_url ?>" target="<?= $link_target ?>">
                        <?= $link_title ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="right">
                <?php if( $slider_with_desc_s['slider'] ): ?>
                    <div class="swiper-images-pagination"></div>
                    <div class="swiper-holder">
                        <div class="swiper swiper-images">
                            <div class="swiper-wrapper">
                                <?php foreach( $slider_with_desc_s['slider'] as $slide ): ?>
                                    <div class="swiper-slide">
                                        <div class="image-holder">
                                            <?= wp_get_attachment_image($slide['image']['id'],'large') ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="swiper-images-button-prev swiper-btn prev"><?php icon_arrow() ?></div>
                        <div class="swiper-images-button-next swiper-btn"><?php icon_arrow() ?></div>
                    </div>

                    <div class="swiper-controls">
                        <div class="swiper swiper-images-description">
                            <div class="swiper-wrapper">
                                <?php foreach( $slider_with_desc_s['slider'] as $slide ): ?>
                                    <div class="swiper-slide">
                                        <p class="desc-title"><?= $slide['title'] ?></p>
                                        <p class="desc-text"><?= $slide['description'] ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="swiper-navigation-buttons">
                            <div class="swiper-images-button-prev swiper-btn prev"><?php icon_arrow() ?></div>
                            <div class="swiper-images-button-next swiper-btn"><?php icon_arrow() ?></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php $img_with_banner_s = get_field('image_with_banner_section');
    if( $img_with_banner_s['image'] || $img_with_banner_s['title'] || $img_with_banner_s['banner_title'] || $img_with_banner_s['banner_description'] || $img_with_banner_s['button'] ): ?>
    <section class="image-with-banner-section">
        <?= wp_get_attachment_image($img_with_banner_s['image']['id'],'full') ?>

        <div class="overlay"></div>
        <div class="section-content content-wrap">
            <?php if( $img_with_banner_s['title'] || $img_with_banner_s['button']): ?>
                <div class="title-holder">
                    <h2 class="fade-in-animation"><?= $img_with_banner_s['title'] ?></h2>

                    <?php
                    $link = $img_with_banner_s['button'];
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                        <a class="btn light" href="<?= $link_url ?>" target="<?= $link_target ?>">
                            <?= $link_title ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if( $img_with_banner_s['banner_title'] || $img_with_banner_s['banner_description'] ): ?>
                <div class="banner">
                    <h3 class="banner-title fade-in-animation"><?= $img_with_banner_s['banner_title'] ?></h3>
                    <p class="banner-text fade-in-animation"><?= $img_with_banner_s['banner_description'] ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php $img_with_desc_s_2 = get_field('image_with_description_section_2');
    if( $img_with_desc_s_2['image'] || $img_with_desc_s_2['small_title'] ||
        $img_with_desc_s_2['title'] || $img_with_desc_s_2['description'] || $img_with_desc_s_2['button'] ): ?>
        <section class="maps-with-description-section">
            <div class="section-content content-wrap">
                <div class="left">
                    <div class="image-holder">
                        <?= wp_get_attachment_image($img_with_desc_s_2['image']['id'], 'large') ?>
                    </div>
                </div>
                <div class="right">
                    <?php if( $img_with_desc_s_2['small_title'] ): ?>
                        <p class="small-title fade-in-animation"><?= $img_with_desc_s_2['small_title'] ?></p>
                    <?php endif; ?>

                    <?php if( $img_with_desc_s_2['title'] ): ?>
                        <h2 class="title fade-in-animation"><?= $img_with_desc_s_2['title'] ?></h2>
                    <?php endif; ?>

                    <?php if( $img_with_desc_s_2['description'] ): ?>
                        <p class="description fade-in-animation"><?= $img_with_desc_s_2['description'] ?></p>
                    <?php endif; ?>

                    <?php
                    $link = $img_with_desc_s_2['button'];
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                        <a class="btn" href="<?= $link_url ?>" target="<?= $link_target ?>">
                            <?= $link_title ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php $resources_s = get_field('resources_section');
    if( $resources_s ): ?>
    <section class="posts-section">
        <div class="section-content content-wrap">
            <div class="small-title fade-in-animation"><?= $resources_s['small_title'] ?></div>
            <div class="title fade-in-animation"><?= $resources_s['title'] ?></div>

            <?php
            $link = $resources_s['button'];
            if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <div class="button-holder">
                    <a class="btn light" href="<?= $link_url ?>" target="<?= $link_target ?>">
                        <?= $link_title ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php if( $resources_s['resources'] ): ?>
                <div class="swiper swiper-posts">
                    <div class="swiper-wrapper">
                        <?php foreach( $resources_s['resources'] as $post ): setup_postdata($post) ?>
                            <div class="swiper-slide">
                                <?php get_template_part('template-parts/resource'); ?>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                </div>

                <div class="swiper-navigation-buttons">
                    <div class="swiper-posts-button-prev swiper-btn prev"><?php icon_arrow() ?></div>
                    <div class="swiper-posts-button-next swiper-btn"><?php icon_arrow() ?></div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php $partners_s = get_field('partners_section');
    if( $partners_s['title'] || $partners_s['description'] || $partners_s['partners'] ): ?>
        <section class="partners-section">
            <div class="section-content content-wrap">
                <div class="section-header fade-in-animation">
                    <div class="info">
                        <?php if( $partners_s['title'] ): ?>
                            <h2><?= $partners_s['title'] ?></h2>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if( $partners_s['description'] ): ?>
                    <p class="fade-in-animation"><?= $partners_s['description'] ?></p>
                <?php endif; ?>

                <?php if( $partners_s['partners'] ): ?>
                    <div class="swiper swiper-partners">
                        <div class="swiper-wrapper">
                            <?php foreach( $partners_s['partners'] as $partner ): ?>
                                <div class="swiper-slide">
                                    <?= wp_get_attachment_image( $partner['logo']['id'],'large' ) ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="swiper-navigation-buttons">
                        <div class="swiper-partners-button-prev swiper-btn prev"><?php icon_arrow() ?></div>
                        <div class="swiper-partners-button-next swiper-btn"><?php icon_arrow() ?></div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php $tweets_s = get_field('tweets_section');
    $twitter_link = get_field('twitter', 'option');
    if( $tweets_s['twitter_feed_shortcode'] ): ?>
        <div class="tweets-section">
            <div class="section-content">
                <div class="tweets">
                    <?= do_shortcode($tweets_s['twitter_feed_shortcode']) ?>
                </div>

                <?php if( $tweets_s['small_title'] || $tweets_s['title'] ): ?>
                    <div class="content-wrap">
                        <?php if( $tweets_s['small_title'] ): ?>
                            <div class="small-title fade-in-animation"><?= $tweets_s['small_title'] ?></div>
                        <?php endif; ?>

                        <?php if( $tweets_s['title'] ): ?>
                            <div class="title fade-in-animation"><?= $tweets_s['title'] ?></div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="splide">
                    <div class="splide__track">
                        <ul class="splide__list"></ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>