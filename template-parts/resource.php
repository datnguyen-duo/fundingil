<?php
$file = get_field('file');
$desc = get_field('description');
$categories = get_the_terms(get_the_ID(),'resource-category');
?>
<div class="template-part-resource">
    <div class="image-holder"><?php the_post_thumbnail('large'); ?></div>

    <div class="post-info">
        <div class="post-info-header">
            <div class="post-title"><?php the_title() ?></div>

            <?php if( $desc ): ?>
                <p class="post-description"><?= $desc ?></p>
            <?php endif; ?>
        </div>

        <div class="post-categories-holder">
            <div class="download-link-holder">
                <?php if( $file ): ?>
                    <a class="btn-icon" href="<?= $file['url'] ?>" download>
                        Download
                        <span><?php icon_arrow() ?></span>
                    </a>

                    <a class="swiper-btn dark" href="<?= $file['url'] ?>" download>
                        <span><?php icon_arrow() ?></span>
                    </a>
                <?php endif; ?>
            </div>

            <div class="post-categories">
                <div class="pill transparent"><?= get_the_date() ?></div>
                <?php if( $categories ): ?>
                    <?php foreach ( $categories as $cat ): ?>
                        <div class="pill transparent"><?= $cat->name ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>