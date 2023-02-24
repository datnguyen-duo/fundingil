<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-primary'); ?>>
<?php wp_body_open();
$button_1 = get_field('button', 'option');
$button_2 = get_field('button_2', 'option');
$is_default_page = is_page() && !is_page_template() && !is_front_page() && !is_home();
$is_page_without_hero_image = is_page_template(array('templates/resources.php', 'templates/about.php', 'templates/contact.php', )) || is_home() || is_singular('post') || $is_default_page;
?>

<div id="page">
    <header id="site-header" class="<?= ( !$is_page_without_hero_image ) ? ' page-has-full-width-hero-image' : null ?>">
        <div class="header-content">
            <a href="<?= site_url() ?>" class="logo-holder">
                <img class="logo-dark" src="<?= get_template_directory_uri() . '/src/images/dark-logo.svg' ?>" alt="">
                <img class="logo-white" src="<?= get_template_directory_uri() . '/src/images/white-logo.svg' ?>" alt="">
            </a>

            <nav>
                 <?php if( has_nav_menu('menu-1') ): ?>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'container' => false,
                        )
                    ); ?>
                <?php endif;?>
            </nav>

            <?php if( $button_2 || $button_1 ): ?>
                <div class="buttons">
                    <?php
                    $link = $button_2;
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>

                        <div class="button-holder button-2-holder">
                            <a class="btn light" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                                <?= esc_html( $link_title ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php
                    $link = $button_1;
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                        <div class="button-holder button-1-holder">
                            <a class="btn light" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                                <?= esc_html( $link_title ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="menu-opener">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </header>

    <div class="mobile-nav">
        <div class="mobile-nav-content">
            <div class="navigation">
                <?php if( has_nav_menu('menu-3') ): ?>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'menu-3',
                            'container' => false,
                        )
                    ); ?>
                <?php endif;?>

                <?php if( $button_2 || $button_1 ): ?>
                    <ul class="buttons">
                        <?php
                        $link = $button_1;
                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self'; ?>

                            <li class="button-holder">
                                <a href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                                    <?= esc_html( $link_title ); ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php
                        $link = $button_2;
                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self'; ?>

                            <li class="button-holder">
                                <a href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                                    <?= esc_html( $link_title ); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <?php $twitter = get_field('twitter', 'option');
            if( $twitter ): ?>
            <div class="titter-cta-holder">
                <a href="<?= $twitter ?>" target="_blank" class="twitter-cta">
                    Follow us on Twitter
                    <img src="<?= get_template_directory_uri() . '/src/images/twitter-header.svg' ?>" alt="">
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <main id="page-content">