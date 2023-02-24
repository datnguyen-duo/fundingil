<?php
$categories = get_the_terms(get_the_ID(),'category');
?>
<div class="template-part-post">
    <a href="<?php the_permalink(); ?>" class="post-image-holder">
        <?= get_the_post_thumbnail(get_the_ID(),'large') ?>
    </a>

    <div class="post-info">
        <div class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></div>

        <div class="post-categories-holder">
            <div class="download-link-holder">
                <a href="<?php the_permalink(); ?>" class="btn-icon">
                    Read More
                    <span><?php icon_plus() ?></span>
                </a>
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