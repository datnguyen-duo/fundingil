<?php
/* Template Name: Dashboard */
get_header();

$hero_s = get_field('hero_section'); ?>
<div class="template-dashboard-page-container">
    <section class="hero-section">
        <?= wp_get_attachment_image($hero_s['image']['id'],'full') ?>
        <div class="overlay"></div>
        <div class="section-content content-wrap">
            <?php if( $hero_s['title'] ): ?>
                <h1 class="fade-in-animation"><?= $hero_s['title'] ?></h1>
            <?php endif; ?>

            <?php if( $hero_s['cards'] ): ?>
                <div class="cards">
                    <div class="swiper swiper-hero-cards">
                        <div class="swiper-wrapper">
                            <?php foreach( $hero_s['cards'] as $card ): ?>
                                <div class="swiper-slide">
                                    <div class="card"><p><?= $card['description'] ?></p></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="swiper-navigation-buttons">
                        <div class="swiper-hero-cards-button-prev swiper-btn prev"><?php icon_arrow() ?></div>
                        <div class="swiper-hero-cards-button-next swiper-btn"><?php icon_arrow() ?></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php $dashboard_s = get_field('dashboard_section');
    if( $dashboard_s['title'] || $dashboard_s['description'] || $dashboard_s['iframe'] ): ?>
        <section class="dashboard-section">
            <div class="section-content content-wrap">
                <div class="section-header">
                    <div class="title-holder">
                        <?php if( $dashboard_s['title'] ): ?>
                            <h2 class="fade-in-animation"><?= $dashboard_s['title'] ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="description-holder">
                        <?php if( $dashboard_s['description'] ): ?>
                            <p class="fade-in-animation"><?= $dashboard_s['description'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if( $dashboard_s['iframe_html'] ): ?>
                    <div class="dashboard-holder">
                        <?= $dashboard_s['iframe_html'] ?>
                    </div>
                <?php endif; ?>

                <?php if( $dashboard_s['iframe_description'] ): ?>
                    <p class="iframe-description"><?= $dashboard_s['iframe_description'] ?></p>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

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
