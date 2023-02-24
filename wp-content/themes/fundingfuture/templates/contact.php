<?php
/* Template Name: Contact */
get_header();
$email = get_field('email');
$location = get_field('location');
$form_title = get_field('form_title');
$form_desc = get_field('form_description');
$form_shortcode = get_field('form_shortcode');
?>
    <div class="template-contact-page-container">
        <section class="hero-section content-wrap">
            <h1><?php the_title() ?></h1>

            <div class="contact-info-boxes">
                <?php if( $email ): ?>
                    <div class="box-holder">
                        <div class="box">
                            <p class="box-title">Contact Info</p>

                            <p class="box-description">Email us at</p>

                            <p class="box-description"><a href=""><?= $email ?></a></p>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if( $location ): ?>
                    <div class="box-holder">
                        <div class="box">
                            <p class="box-title">Our Location</p>

                            <p class="box-description"><?= $location ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <?php if( $form_shortcode ): ?>
            <section class="form-section content-wrap">
                <div class="form-container">
                    <?php if( $form_title ): ?>
                        <h2 class="form-title"><?= $form_title ?></h2>
                    <?php endif; ?>

                    <?php if( $form_desc ): ?>
                        <p class="form-description"><?= $form_desc ?></p>
                    <?php endif; ?>

                    <div class="form-holder"><?= do_shortcode($form_shortcode) ?></div>
                </div>
            </section>
        <?php endif; ?>
    </div>
<?php get_footer(); ?>