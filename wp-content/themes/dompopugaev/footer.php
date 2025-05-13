<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dompopugaev
 */

global $textDomain;

?>

<footer id="footer" class="footer containe test">
    <div class="footer-wrapper">
        <div class="footer-top">
            <div class="footer-top-column column-identic">
                <div class="logo">
                    <?= get_custom_logo_html() ?>
                </div>

                <div class="all-rights text-secondary white">
                    <?= __('Название веб-сайта. Все права защищены', $textDomain) ?>
                </div>
            </div>
            <div class="footer-top-column column-pages">
                <div class="footer-column-title">
                    <?= __('Разделы', $textDomain) ?>
                </div>
                <?php
                wp_nav_menu(
                    array(
                        'menu'            => 'Footer - Pages',
                        'menu_class'        => 'menu-list',
                        'menu_id'          => 'menu-list',
                        'container'          => 'nav',
                        'container_class'      => 'menu-wrapper',
                        'add_link_class'      => 'btn simple white text-secondary',
                    )
                );
                ?>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-bottom-column column-guarantee">
                <?php
                wp_nav_menu(
                    array(
                        'menu'            => 'Footer - Guarantee',
                        'menu_class'        => 'menu-list',
                        'menu_id'          => 'menu-list',
                        'container'          => 'nav',
                        'container_class'      => 'menu-wrapper',
                        'add_link_class'      => 'btn simple white text-secondary',
                    )
                );
                ?>
            </div>
            <div class="footer-bottom-column column-info">
                <a href="#" class="btn simple white sitemap"><?= __('Ссылка №1', $textDomain) ?></a>
            </div>
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>