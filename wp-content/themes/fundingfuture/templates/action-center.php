<?php
/* Template Name: Action Center */
get_header();

$hero_s = get_field('hero_section'); ?>
<div class="template-action-center-page-container">
    <section class="image-with-banner-section">
        <?= wp_get_attachment_image($hero_s['image']['id'],'full') ?>
        <div class="overlay"></div>
        <div class="section-content content-wrap">
            <?php if( $hero_s['title'] ): ?>
                <h1 class="fade-in-animation"><?= $hero_s['title'] ?></h1>
            <?php endif; ?>

            <?php if( $hero_s['banner_title'] || $hero_s['banner_description'] ): ?>
                <div class="banner">
                    <h3 class="banner-title fade-in-animation"><?= $hero_s['banner_title'] ?></h3>
                    <p class="banner-text fade-in-animation"><?= $hero_s['banner_description'] ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php $iframe_s = get_field('iframe_section');
    if( $iframe_s['title'] || $iframe_s['iframe'] ): ?>
    <section class="action-iframe-section">
        <div class="action-iframe-content content-wrap">
            <?php if( $iframe_s['title'] ): ?>
                <h2 class="fade-in-animation"><?= $iframe_s['title'] ?></h2>
            <?php endif; ?>

            <?php if( $iframe_s['iframe'] ): ?>
                <div class="iframe-holder"><?= $iframe_s['iframe'] ?></div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php $contact_s = get_field('contact_form_section');
    if( $contact_s['title'] || $contact_s['contact_iframe'] ): ?>
    <section class="join-form-section">
        <div class="join-form-section-content content-wrap">
            <div class="left">
                <?php if( $contact_s['title'] ): ?>
                    <h2 class="fade-in-animation"><?= $contact_s['title'] ?></h2>
                <?php endif; ?>
            </div>
            <div class="right">
                <?php if( $contact_s['contact_iframe'] ): ?>
                    <div class="right-content">
                        <?= $contact_s['contact_iframe'] ?>
                        <!--  --><?//= do_shortcode('[contact-form-7 id="11" title="Contact form 1"]'); ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
    <?php endif; ?>
</div>
<?php get_footer(); ?>