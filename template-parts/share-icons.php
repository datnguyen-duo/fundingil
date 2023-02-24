<?php
global $post;
$icons_color = @$args['icons-color'];
if( !$icons_color) {
    $icons_color = '#fff';
}
$url = urlencode(get_permalink());
$title = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');

$facebook_url = 'https://www.facebook.com/sharer/sharer.php?u='.$url.'&title='.$title;
$twitter_url = 'https://twitter.com/intent/tweet?text='.$title.'&url='.$url;
$email_url = 'mailto:?subject='.$title.'&body='.$url;
$linkedin_url = 'https://www.linkedin.com/sharing/share-offsite/?url='.$url.'&title='.$title; ?>
<div class="template-part-share-icons">
    <p class="share-text">Share On</p>

    <div class="share-icons">
        <div class="share-icon twitter-share-icon">
            <a href="<?= $twitter_url ?>"  target="_blank"><?php twitter_icon($icons_color) ?></a>
        </div>
        <div class="share-icon linkedin-share-icon">
            <a href="<?= $linkedin_url ?>" target="_blank"><?php linkedin_icon($icons_color) ?></a>
        </div>
        <div class="share-icon email-share-icon">
            <a href="<?= $email_url ?>"    target="_blank"><?php email_icon($icons_color) ?></a>
        </div>
        <div class="share-icon facebook-share-icon">
            <a href="<?= $facebook_url ?>" target="_blank"><?php facebook_icon($icons_color) ?></a>
        </div>
    </div>
</div>