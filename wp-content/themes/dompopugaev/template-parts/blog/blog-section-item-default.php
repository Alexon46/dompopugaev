<?php
global $textDomain;

$postID = get_the_ID();

$postLink = get_the_permalink($postID);
$postTitle = get_the_title($postID);
$postDescription = wp_trim_words(get_the_excerpt($postID), 36, '...');

$postImage = get_the_post_thumbnail_url($postID, 'full') ?: '/wp-content/uploads/2025/01/no-image-available.png';
$postImageID = get_post_thumbnail_id($postID);
$postImageAlt = get_post_meta($postImageID, '_wp_attachment_image_alt', true);

$postDateDay = get_the_date('j', $postID);
$postDateMonthAndYear = str_replace(' ', '<br>', get_the_date('F Y'));

$postAriaLabel = __('Czytaj więcej artykuł', $textDomain) . ' \'' . sanitize_text_field($postTitle) . '\'';
?>

<div class="blog-item">
    <div class="blog-item__content">
        <a href="<?= $postLink ?>" class="blog-item__title h4 white">
            <?= $postTitle ?>
        </a>
        <div class="blog-item__description body-3 gray-text">
            <?= $postDescription ?>
        </div>
        <div class="blog-item__bottom">
            <div class="blog-item__date">
                <div class="day h1 h1-outfit green"><?= $postDateDay ?></div>
                <div class="month-year caption gray-text"><?= $postDateMonthAndYear ?></div>
            </div>
            <a href="<?= $postLink ?>" class="blog-item__link btn btn-wide" aria-label="<?= $postAriaLabel ?>">
                <?= __('Więcej szczegółów', $textDomain) ?>
            </a>
        </div>
    </div>
    <a href="<?= $postLink ?>" class="blog-item__image" aria-label="<?= $postAriaLabel ?>">
        <img src="<?= $postImage ?>" alt="<?= $postImageAlt ?>" />
    </a>
</div>