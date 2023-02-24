<?php
/* Template Name: About */
get_header();

$hero_s = get_field('hero_section'); ?>
<div class="template-about-page-container">
    <section class="hero-section">
        <div class="content-wrap">
            <div class="section-content">
                <div class="left">
                    <div class="image-holder">
                        <?= wp_get_attachment_image($hero_s['image']['id'],'full') ?>
                    </div>
                </div>
                <div class="right">
                    <?php if( $hero_s['small_title'] ): ?>
                        <p class="small-title"><?= $hero_s['small_title'] ?></p>
                    <?php endif; ?>

                    <?php if( $hero_s['title'] ): ?>
                        <h1 class="title fade-in-animation"><?= $hero_s['title'] ?></h1>
                    <?php endif; ?>

                    <?php if( $hero_s['description'] ): ?>
                        <p class="description fade-in-animation"><?= $hero_s['description'] ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php $blocks = get_field('blocks_sections');
    if( $blocks ): ?>
    <section class="blocks-section">
        <div class="section-content">
            <?php foreach ( $blocks as $index => $block ): ?>
                <div class="block <?= $block['block_theme'] ?>">
                    <div class="content-wrap">
                        <div class="block-hero">
                            <?= wp_get_attachment_image($block['image']['id'],'large') ?>
                            <h2 class="block-title fade-in-animation"><?= $block['title'] ?></h2>
                        </div>

                        <div class="block-info">
                            <div class="block-info-title">
                                <h3><?= $block['title_2'] ?></h3>
                            </div>
                            <div class="block-info-description">
                                <button class="btn-icon read-more-btn">
                                    Read More
                                    <span><?php icon_arrow() ?></span>
                                </button>
                                <p><?= $block['description'] ?></p>
                            </div>
                        </div>

                        <?php
                        get_template_part('template-parts/cards-2','', array(
                                'cards' => $block['cards'],
                                'adapt_size_cards' => true
                        )); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php $slider_s = get_field('slider_section');
    if( $slider_s['slider'] ): ?>
    <div class="slide-section">
        <div class="section-content content-wrap">
            <div class="section-header">
                <?php if( $slider_s['title'] ): ?>
                    <h2 class="title fade-in-animation"><?= $slider_s['title'] ?></h2>
                <?php endif; ?>
            </div>

            <div class="slider-holder">
                <div class="left">
                    <?php if( $slider_s['slider'] ): ?>
                        <div class="swiper swiper-videos">
                            <div class="swiper-wrapper">
                                <?php foreach ( $slider_s['slider'] as $index => $slide ): ?>
                                    <div class="swiper-slide">
                                        <div class="image-holder">
                                            <?= wp_get_attachment_image($slide['image']['id'], 'full') ?>

                                            <?php if( $slide['yt_video'] ): ?>
                                                <button class="btn yellow open-slider-video-popup"
                                                        data-video-url="<?= $slide['yt_video'] ?>">
                                                    <?php icon_play() ?>
                                                    Play video
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="right">
                    <?php if( $slider_s['slider'] ): $accordions_counter = 0; $slider_counter = 0  ?>
                        <div class="swiper swiper-videos-accordions">
                            <div class="swiper-wrapper">
                                <?php foreach ( $slider_s['slider'] as $i => $slide ): $accordions_counter++; ?>

                                    <?php if( $accordions_counter == 1): ?>
                                        <div class="swiper-slide">
                                    <?php endif; ?>

                                        <div class="slider-accordion <?= ( $i == 0 ) ? ' active' : null ?>" data-slide="<?= $slider_counter ?>" data-index="<?= $i ?>">
                                            <div class="slider-accordion-header">
                                                <h3 class="slider-accordion-title"><?= $slide['title'] ?></h3>

                                                <?php if( $slide['description'] ): ?>
                                                    <div class="swiper-btn dark"><?php icon_arrow() ?></div>
                                                <?php endif; ?>
                                            </div>

                                            <?php if( $slide['description'] ): ?>
                                                <div class="slider-accordion-hidden-content" style="display: <?= ( $i == 0 ) ? ' block' : null ?>">
                                                    <p><?= $slide['description'] ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                    <?php if( $accordions_counter == 3 || $i+1 == sizeof($slider_s['slider']) ): $slider_counter++; ?>
                                        </div>
                                    <?php endif; if( $accordions_counter == 3 ) { $accordions_counter = 0; } ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="swiper-navigation-buttons">
                        <div class="swiper-videos-accordions-button-prev swiper-btn prev"><?php icon_arrow() ?></div>
                        <div class="swiper-videos-accordions-button-next swiper-btn"><?php icon_arrow() ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-video-popup">
            <div class="popup-content content-wrap">
                <div class="slider-video-popup-closing-area"></div>

                <div class="close-slider-video-popup-btn"><?php icon_times() ?></div>

                <div class="video-holder">
                    <div class="video">
                        <iframe id="slider-section-popup-video" width="560" height="315" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php $lists_s = get_field('lists_section') ?>
    <section class="lists-section">
        <div class="section-content content-wrap">
            <?php if( $lists_s['title'] ): ?>
                <h2 class="title fade-in-animation"><?= $lists_s['title'] ?></h2>
            <?php endif; ?>

            <?php if( $lists_s['description'] ): ?>
                <p class="description fade-in-animation"><?= $lists_s['description'] ?></p>
            <?php endif; ?>

            <?php if( $lists_s['lists_blocks'] ): ?>
                <div class="lists-blocks">
                    <?php foreach ( $lists_s['lists_blocks'] as $block_index => $list_block ): ?>
                        <div class="list-block list-block-<?= $block_index ?>">
                            <div class="list-block-header">
                                <h3 class="list-block-title">
                                    <img src="<?= $list_block['icon']['url'] ?>" alt="">
                                    <?= $list_block['title'] ?>
                                </h3>

                                <button class="btn-icon open-more-btn desktop" data-parent=".list-block-<?= $block_index ?>" data-target=".hidden-list-items-desktop-<?= $block_index ?>">
                                    View All
                                    <span><?php icon_arrow() ?></span>
                                </button>
                            </div>

                            <?php
                            $col_1_list = $list_block['list'];
                            $col_2_list = $list_block['list_2'];
                            $col_3_list = $list_block['list_3'];
                            $all_cols = [];
                            $columns = [
                                'col_1' => $col_1_list,
                                'col_2' => $col_2_list,
                                'col_3' => $col_3_list,
                            ];

                            foreach ( $columns as $column ) {
                                if( $column ) {
                                    $all_cols = array_merge($all_cols, $column);
                                }
                            }

                            if( $all_cols ): ?>
                                <div class="list-items-desktop">
                                    <?php foreach ( $columns as $col ): ?>
                                        <?php if( $col ): ?>
                                            <div class="col">
                                                <?php foreach ( $col as $index => $item ):
                                                    if( $index < 3 ): ?>
                                                        <div class="list-item"><p><?= $item['text'] ?></p></div>
                                                    <?php endif;
                                                endforeach; ?>

                                                <div class="hidden-items hidden-list-items-desktop-<?= $block_index ?>">
                                                    <?php foreach ( $col as $index => $item ):
                                                        if( $index >= 3 ): ?>
                                                            <div class="list-item"><p><?= $item['text'] ?></p></div>
                                                        <?php endif;
                                                    endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>

                                <div class="list-items-mobile">
                                    <div class="visible-items">
                                        <?php foreach ( $all_cols as $i => $item ): ?>
                                            <?php if( $i < 6 ): ?>
                                                <div class="list-item"><p><?= $item['text'] ?></p></div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="hidden-items hidden-list-items-mobile-<?= $block_index ?>">
                                        <?php foreach ( $all_cols as $index => $hidden_item ):
                                            if( $index >= 6 ): ?>
                                                <div class="list-item"><p><?= $hidden_item['text'] ?></p></div>
                                            <?php endif;
                                        endforeach; ?>
                                    </div>
                                </div>

                                <button class="btn-icon open-more-btn mobile" data-parent=".list-block-<?= $block_index ?>" data-target=".hidden-list-items-mobile-<?= $block_index ?>">
                                    View All
                                    <span><?php icon_arrow() ?></span>
                                </button>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php $img_with_desc_s = get_field('image_with_description_section');
    if( $img_with_desc_s['image'] || $img_with_desc_s['button'] ||
        $img_with_desc_s['title'] || $img_with_desc_s['description'] ): ?>
        <section class="image-with-description-section">
            <div class="section-content content-wrap">
                <div class="left">
                    <div class="image-holder">
                        <?= wp_get_attachment_image($img_with_desc_s['image']['id'], 'large') ?>
                    </div>
                </div>
                <div class="right">
                    <?php if( $img_with_desc_s['title'] ): ?>
                        <h2 class="title fade-in-animation"><?= $img_with_desc_s['title'] ?></h2>
                    <?php endif; ?>

                    <?php if( $img_with_desc_s['description'] ): ?>
                        <p class="description fade-in-animation"><?= $img_with_desc_s['description'] ?></p>
                    <?php endif; ?>

                    <?php
                    $link = $img_with_desc_s['button'];
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
</div>
<?php get_footer(); ?>