</main> <!--#page-content end-->

<footer id="site-footer">
    <div class="footer-content content-wrap">
        <div class="top-content">
            <div class="left">
                <a href="<?= site_url() ?>" class="logo-holder">
                    <img src="<?= get_template_directory_uri() . '/src/images/dark-logo.svg' ?>" alt="">
                </a>
                <?php $desc = get_field('site_description', 'option');
                if( $desc ): ?><p><?= $desc ?></p><?php endif; ?>
            </div>

            <div class="right">
                <?php if( has_nav_menu('menu-2') ): ?>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'menu-2',
                            'container' => false,
                        )
                    ); ?>
                <?php endif;?>
            </div>
        </div>
        <div class="bottom-content">
            <?php $twitter = get_field('twitter', 'option');
            if( $twitter ): ?>
                <a href="<?= $twitter ?>" target="_blank" class="twitter-cta">
                    Follow us on Twitter
                    <img src="<?= get_template_directory_uri() . '/src/images/twitter-footer.svg' ?>" alt="">
                </a>
            <?php endif; ?>

            <p>
                © <?= date("Y") ?> Funding Illinois’ Future. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>

</div> <!--#page end-->

<?php wp_footer(); ?>

</body>

</html>