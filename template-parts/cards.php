<?php
if( is_home() || is_singular('post') ) {
    $cards_section = get_field('cards_section', get_option('page_for_posts'));
} else{
    $cards_section = get_field('cards_section');
}

if( $cards_section['title'] || $cards_section['cards'] ): ?>
    <section class="template-part-cards">
        <div class="discover-section-content content-wrap">
            <?php if( $cards_section['title'] ): ?>
                <h2 class="fade-in-animation"><?= $cards_section['title'] ?></h2>
            <?php endif; ?>

            <?php if( $cards_section['cards'] ): ?>
            <div class="cards <?= ( sizeof($cards_section['cards']) == 1 ) ? ' one-card' : null ?>">
                <?php foreach ( $cards_section['cards'] as $card ): ?>
                <div class="card-holder">
                    <?php if( $card['url'] ): ?>
                    <a href="<?= $card['url'] ?>" class="card">
                        <?php else: ?>
                        <div class="card">
                            <?php endif; ?>

                            <?php if( $card['title'] ): ?>
                                <div class="card-header">
                                    <p class="bold"><?= $card['title'] ?></p>

                                    <?php if( $card['url'] ): ?>
                                        <span class="swiper-btn dark"><?php icon_arrow() ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <?php if( $card['description'] ): ?>
                                <div class="card-desc">
                                    <p><?= $card['description'] ?></p>
                                </div>
                            <?php endif; ?>

                            <?php if( $card['url'] ): ?>
                    </a>
                    <?php else: ?>
                </div>
            <?php endif; ?>
            </div>
        <?php endforeach; ?>
        </div>
        <?php endif; ?>
        </div>
    </section>
<?php endif; ?>