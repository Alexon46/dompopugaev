<?php

$argsQuery = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 12,
    'order' => 'DESC'
);

if ($args['related']) {
    $argsQuery['post__not_in'] = array(get_the_ID());
}

$postsQuery = new WP_Query($argsQuery);

if ($postsQuery->have_posts()) : ?>

    <div class="blog slider swiper">
        <div class="swiper-wrapper">
            <?php while ($postsQuery->have_posts()) : $postsQuery->the_post(); ?>
                <div class="swiper-slide">
                    <?php get_template_part('template-parts/blog/blog-section', 'item'); ?>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>

<?php
endif;
?>