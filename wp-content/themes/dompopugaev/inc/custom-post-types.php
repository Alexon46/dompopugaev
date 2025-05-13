<?php
// Register custom taxonomies
//add_action('init', 'create_taxonomy');
function create_taxonomy() {
    // Register taxonomy "slides_location" for post type "Slides"
    $slides_location_taxonomy_args = [
        'labels' => [
            'name' => 'Расположение слайдов',
            'singular_name' => 'Расположение слайда',
            'add_new' => 'Добавить новое расположение',
            'add_new_item' => 'Добавить новое расположение',
            'edit_item' => 'Редактировать расположение',
            'new_item' => 'Новое расположение',
            'view_item' => 'Смотреть расположение',
            'search_items' => 'Найти расположение',
            'not_found' => 'Не найдено',
            'not_found_in_trash' => 'Не найдено в корзине',
            'parent_item_colon' => '',
            'menu_name' => 'Расположение слайдов',
        ],
        'description'           => '',
        'public'                => true,
        'publicly_queryable'    => false,
        'hierarchical'          => true,
        'rewrite'               => false,
        'show_admin_column'     => true,
        'show_in_rest'          => null,
        'rest_base'             => null,
    ];
    register_taxonomy('slides_location', ['slides'], $slides_location_taxonomy_args);
}

// Register custom post types
//add_action('init', 'register_custom_post_types');
function register_custom_post_types() {
    // Register post type "Slides"
    $slides_post_type_args = [
        'labels' => [
            'name' => 'Слайды',
            'singular_name' => 'Слайд',
            'add_new' => 'Добавить новый слайд',
            'add_new_item' => 'Добавить новый слайд',
            'edit_item' => 'Редактировать слайд',
            'new_item' => 'Новый слайд',
            'view_item' => 'Смотреть слайд',
            'search_items' => 'Найти слайд',
            'not_found' => 'Не найдено',
            'not_found_in_trash' => 'Не найдено в корзине',
            'parent_item_colon' => '',
            'menu_name' => 'Слайды',
        ],
        'public' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'exclude_from_search' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'rest_base' => null,
        'menu_icon' => 'dashicons-format-gallery',
        'hierarchical' => false,
        'supports' => ['title', 'thumbnail', 'author', 'revisions', 'page-attributes'],
        'rewrite' => false,
        'has_archive' => false,
        'query_var' => false,
    ];
    register_post_type('slides', $slides_post_type_args);
}

// Hide menu pages for editors
add_action('admin_menu', 'hide_menu_pages_for_editors', 1000);
function hide_menu_pages_for_editors() {
    if (!current_user_can('administrator')) {
        remove_menu_page('edit.php?post_type=elementor_library'); // Elementor Library
        remove_menu_page('wpcf7'); // Contact Form 7 menu page
    }
}
