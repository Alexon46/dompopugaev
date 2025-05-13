<?php

$postType = $args['postType'];
$postsPerPage = $args['postsPerPage'];
$paged = $args['paged'];

$argsQuery = array(
    'post_type' => $postType,
    'post_status' => 'publish',
    'posts_per_page' => $postsPerPage,
    'paged' => $paged,
    'order' => 'DESC',
);

$postsQuery = new WP_Query($argsQuery);

if ($postsQuery->have_posts()) :
    $maxNumPages = $postsQuery->max_num_pages;
    $paginationShortcode = '[pagination-template maxNumPages=' . $maxNumPages . ' paged=' . $paged . ']';
?>

    <div class="blog-content">
        <div class="blog-items">
            <?php
            while ($postsQuery->have_posts()) {
                $postsQuery->the_post();
                get_template_part('template-parts/blog/blog-section', 'item-default');
            }

            wp_reset_postdata();
            ?>
        </div>
    </div>
    <?php if ($maxNumPages) : ?>
        <div class="blog-pagination pagination pagination-ajax" data-post-type="<?= $postType ?>">
            <?= do_shortcode($paginationShortcode) ?>
        </div>
    <?php endif; ?>

<?php
endif;
?>