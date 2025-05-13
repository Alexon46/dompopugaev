<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dompopugaev
 */

global $textDomain;

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <div id="page" class="site">
        <header id="header">
            <div class="header-wrapper">
                <div class="logo">
                    <?= get_custom_logo_html() ?>
                </div>
                <div class="header-main">
                    <div class="header-top">

                    </div>
                    <div class="header-bottom">
                        <div class="menu">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location'      => 'primary',
                                    'menu'            => 'Menu Main',
                                    'menu_class'        => 'menu-list',
                                    'menu_id'          => 'menu-list',
                                    'container'          => 'nav',
                                    'container_class'      => 'menu-wrapper',
                                    'add_link_class'      => 'btn simple',
                                )
                            );
                            ?>
                        </div>
                        <div class="burger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>