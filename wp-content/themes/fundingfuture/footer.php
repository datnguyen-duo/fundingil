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
            <?php $social_links = get_field('social_links', 'option');
            if( $social_links ): 
            ?><p>Follow Us: </p><?php
                foreach( $social_links as $link ): ?>
                    <a href="<?= $link['link'] ?>" target="_blank">
                        <img src="<?= $link['icon']['url'] ?>" alt="social-icon">
                    </a>
            <?php endforeach; endif; ?>
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