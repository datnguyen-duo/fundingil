<?php
$cards = @$args['cards'];
$adapt_size_cards = @$args['adapt_size_cards'];
if( is_array($cards) ): ?>
    <div class="template-part-cards-2 <?php if( $adapt_size_cards ): ?>cards-<?php echo sizeof($cards); endif;?>">
        <?php foreach ( $cards as $card ): ?>
            <div class="card-holder">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <?php if( $card['icon'] ): ?>
                                <img src="<?= $card['icon']['url'] ?>" alt="">
                            <?php endif; ?>
                            <?= $card['title'] ?>
                        </h4>
                        <div class="swiper-btn dark"><?php icon_arrow() ?></div>
                    </div>

                    <div class="card-hidden-content">
                        <p class="card-description"><?= $card['description'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>