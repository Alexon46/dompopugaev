<?php
global $textDomain;

$postID = get_the_ID();

$postLink = get_the_permalink($postID);
$postTitle = get_the_title($postID);
$postDescription = wp_trim_words(get_the_excerpt($postID), 18, '...');

$postImage = get_the_post_thumbnail_url($postID, 'full') ?: '/wp-content/uploads/2025/01/no-image-available.png';
$postImageID = get_post_thumbnail_id($postID);
$postImageAlt = get_post_meta($postImageID, '_wp_attachment_image_alt', true);

$postAriaLabel = __('Читать подробнее статью', $textDomain) . ' \'' . sanitize_text_field($postTitle) . '\'';
?>

<div class="blog-item">
    <a href="<?= $postLink ?>" class="blog-item__image" aria-label="<?= $postAriaLabel ?>">
        <img src="<?= $postImage ?>" alt="<?= $postImageAlt ?>" />
    </a>
    <div class="blog-item__bottom">
        <a href="<?= $postLink ?>" class="blog-item__title h4">
            <?= $postTitle ?>
        </a>
        <div class="blog-item__description body-3 gray-text">
            <?= $postDescription ?>
        </div>
    </div>
</div>