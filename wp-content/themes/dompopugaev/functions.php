<?php

/**
 * dompopugaev functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dompopugaev
 */

if (! defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

global $textDomain;
$textDomain = 'dompopugaev';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dompopugaev_setup()
{
    global $textDomain;
    /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on dompopugaev, use a find and replace
		* to change 'dompopugaev' to the name of your theme in all the template files.
		*/
    load_theme_textdomain($textDomain, get_template_directory() . '/languages');

    /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
    add_theme_support('title-tag');

    /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'primary' => esc_html__('Primary menu', $textDomain),
            'secondary' => esc_html__('Secondary menu', $textDomain),
        )
    );

    /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );

    add_theme_support('woocommerce');
    // add_theme_support('wc-product-gallery-lightbox');
    // add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'dompopugaev_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dompopugaev_content_width()
{
    $GLOBALS['content_width'] = apply_filters('dompopugaev_content_width', 640);
}
add_action('after_setup_theme', 'dompopugaev_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function dompopugaev_scripts()
{
    if (!is_user_logged_in()) {
        wp_deregister_style('dashicons');
    }

    wp_enqueue_style('swiper', get_stylesheet_directory_uri() . '/libs/swiper/swiper-bundle.min.css', array());
    wp_enqueue_script('swiper', get_stylesheet_directory_uri() . '/libs/swiper/swiper-bundle.min.js', array('jquery'), false, true);

    wp_enqueue_style('magnific-popup', get_stylesheet_directory_uri() . '/libs/magnific-popup/magnific-popup.min.css', array());
    wp_enqueue_script('magnific-popup', get_stylesheet_directory_uri() . '/libs/magnific-popup/magnific-popup.min.js', array('jquery'), false, true);

    wp_enqueue_script('jquery-input-mask', get_stylesheet_directory_uri() . '/libs/jquery-input-mask/jquery.inputmask.min.js', array('jquery'), false, true);
    wp_enqueue_script('domurl-script', get_template_directory_uri() . '/libs/domurl/domurl.js', array('jquery'), false, true);

    wp_enqueue_style('fonts', get_stylesheet_directory_uri() . '/fonts/fonts.css', array(), _S_VERSION);
    wp_enqueue_style('main', get_stylesheet_uri(), array(), _S_VERSION);

    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), false, true);
    wp_enqueue_script('pagination', get_stylesheet_directory_uri() . '/js/pagination.js', array('jquery', 'custom'), false, true);

    // For AJAX
    wp_localize_script('custom', 'myAjax', [
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax-nonce')
    ]);
    wp_localize_script('pagination', 'myAjax', [
        'url' => admin_url('admin-ajax.php')
    ]);
}
add_action('wp_enqueue_scripts', 'dompopugaev_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/*----------- Custom Code -----------*/

global $iconArrowRight, $iconArrowRightLongEnd,
    $iconArrowDown,
    $iconArrowLeft, $iconArrowLeftLongEnd,
    $iconPhone, $iconEmail, $iconCart, $iconLeaf, $iconArrowUpSmall, $iconClose, $iconMinus, $iconPlus;

$iconArrowRight = '
  <svg width="16" height="14" viewBox="0 0 16 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path d="M15.7357 7.63694C15.9036 7.47287 16 7.24317 16 7.00253C16 6.76189 15.9036 6.53583 15.7357 6.36811L9.45 0.242725C9.10714 -0.0927129 8.56429 -0.0781286 8.23929 0.271894C7.91429 0.621916 7.925 1.17612 8.26786 1.50791L13.0036 6.12747H0.857143C0.382143 6.12747 0 6.5176 0 7.00253C0 7.48745 0.382143 7.87758 0.857143 7.87758H13.0036L8.26429 12.4935C7.92143 12.8289 7.91072 13.3795 8.23571 13.7295C8.56071 14.0795 9.10357 14.0905 9.44643 13.7587L15.7321 7.6333L15.7357 7.63694Z" />
  </svg>
';

$iconArrowRightLongEnd = '
  <svg width="21" height="16" viewBox="0 0 21 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path d="M15.7357 8.88694C15.9036 8.72287 16 8.49317 16 8.25253C16 8.01189 15.9036 7.78583 15.7357 7.61811L9.45 1.49272C9.10714 1.15729 8.56429 1.17187 8.23929 1.52189C7.91429 1.87192 7.925 2.42612 8.26786 2.75791L13.0036 7.37747H0.857143C0.382143 7.37747 0 7.7676 0 8.25253C0 8.73745 0.382143 9.12758 0.857143 9.12758H13.0036L8.26429 13.7435C7.92143 14.0789 7.91072 14.6295 8.23571 14.9795C8.56071 15.3295 9.10357 15.3405 9.44643 15.0087L15.7321 8.8833L15.7357 8.88694Z" />
    <path d="M20 0.75V15.25" stroke="currentColor" />
  </svg>
';

$iconArrowDown = '
  <svg width="16" height="16" viewBox="0 0 448 512" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
  </svg>
';

$iconArrowLeft = '
  <svg width="16" height="14" viewBox="0 0 16 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path d="M0.264285 7.63694C0.0964279 7.47287 0 7.24317 0 7.00253C0 6.76189 0.0964279 6.53583 0.264285 6.36811L6.55 0.242725C6.89286 -0.0927129 7.43571 -0.0781286 7.76071 0.271894C8.08571 0.621916 8.075 1.17612 7.73214 1.50791L2.99643 6.12747H15.1429C15.6179 6.12747 16 6.5176 16 7.00253C16 7.48745 15.6179 7.87758 15.1429 7.87758H2.99643L7.73571 12.4935C8.07857 12.8289 8.08928 13.3795 7.76429 13.7295C7.43929 14.0795 6.89643 14.0905 6.55357 13.7587L0.267857 7.6333L0.264285 7.63694Z" />
  </svg>
';

$iconArrowLeftLongEnd = '
  <svg width="21" height="16" viewBox="0 0 21 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path d="M5.26429 8.88694C5.09643 8.72287 5 8.49317 5 8.25253C5 8.01189 5.09643 7.78583 5.26429 7.61811L11.55 1.49272C11.8929 1.15729 12.4357 1.17187 12.7607 1.52189C13.0857 1.87192 13.075 2.42612 12.7321 2.75791L7.99643 7.37747H20.1429C20.6179 7.37747 21 7.7676 21 8.25253C21 8.73745 20.6179 9.12758 20.1429 9.12758H7.99643L12.7357 13.7435C13.0786 14.0789 13.0893 14.6295 12.7643 14.9795C12.4393 15.3295 11.8964 15.3405 11.5536 15.0087L5.26786 8.8833L5.26429 8.88694Z" />
    <path d="M1 0.75V15.25" stroke="currentColor" />
  </svg>
';

$iconPhone = '
  <svg width="14" height="14" viewBox="0 0 14 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path d="M2.68986 5.78837C3.75986 7.89122 5.48375 9.60768 7.5866 10.6851L9.22132 9.05039C9.42194 8.84976 9.71917 8.78289 9.97924 8.87205C10.8115 9.14698 11.7106 9.2956 12.6319 9.2956C13.0406 9.2956 13.375 9.62997 13.375 10.0387V12.6319C13.375 13.0406 13.0406 13.375 12.6319 13.375C5.65465 13.375 0 7.72032 0 0.743025C0 0.334344 0.334375 -3.05176e-05 0.743056 -3.05176e-05H3.34375C3.75243 -3.05176e-05 4.08681 0.334344 4.08681 0.743025C4.08681 1.67184 4.23542 2.56351 4.51035 3.39573C4.59208 3.6558 4.53264 3.94559 4.32458 4.15365L2.68986 5.78837Z" />
  </svg>
';

$iconEmail = '
  <svg width="15" height="10" viewBox="0 0 15 10" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path d="M14.9019 0.942215L10.6402 5.15795L14.7967 9.27271C14.9225 9.05868 15 8.81335 15 8.5484V1.45156C15 1.27171 14.9626 1.10127 14.9019 0.942215ZM13.5326 -3.05176e-05H1.46739C1.22344 -3.05176e-05 0.996709 0.0647721 0.794092 0.169424L7.2 6.50631C7.38586 6.69017 7.70868 6.69017 7.89129 6.50631L14.2671 0.20226C14.0502 0.0769734 13.8014 -3.05176e-05 13.5326 -3.05176e-05ZM0.123076 0.873326C0.0447363 1.05075 0 1.24585 0 1.45156V8.5484C0 8.80915 0.0753809 9.05056 0.197549 9.26227L4.39893 5.10314L0.123076 0.873326Z" />
    <path d="M9.94547 5.84504L8.58568 7.1934C8.01451 7.75202 7.08908 7.76118 6.50851 7.1934L5.09329 5.79021L0.9375 9.89833C1.10229 9.96186 1.27998 9.99997 1.46722 9.99997H13.5324C13.7151 9.99997 13.8883 9.96276 14.0497 9.90213L9.94547 5.84504Z" />
  </svg>
';

$iconCart = '
  <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M10.8748 26.5833C11.5422 26.5833 12.0832 26.0424 12.0832 25.375C12.0832 24.7076 11.5422 24.1667 10.8748 24.1667C10.2075 24.1667 9.6665 24.7076 9.6665 25.375C9.6665 26.0424 10.2075 26.5833 10.8748 26.5833Z" stroke="currentColor" stroke-width="1.93333" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M24.1668 26.5833C24.8342 26.5833 25.3752 26.0424 25.3752 25.375C25.3752 24.7076 24.8342 24.1667 24.1668 24.1667C23.4994 24.1667 22.9585 24.7076 22.9585 25.375C22.9585 26.0424 23.4994 26.5833 24.1668 26.5833Z" stroke="currentColor" stroke-width="1.93333" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M7.25016 7.25L9.28016 17.3879C9.39066 17.9442 9.69332 18.4439 10.1351 18.7996C10.5769 19.1553 11.1298 19.3442 11.6968 19.3333H23.4418C24.0089 19.3442 24.5617 19.1553 25.0036 18.7996C25.4453 18.4439 25.748 17.9442 25.8585 17.3879L27.7918 7.25H7.25016Z" fill="currentColor"/>
    <path d="M1.2085 1.20833H6.04183L9.28016 17.3879M9.28016 17.3879C9.39066 17.9442 9.69332 18.4439 10.1351 18.7996C10.5769 19.1553 11.1298 19.3442 11.6968 19.3333H23.4418C24.0089 19.3442 24.5617 19.1553 25.0036 18.7996C25.4453 18.4439 25.748 17.9442 25.8585 17.3879L27.7918 7.25H7.25016L9.28016 17.3879Z" stroke="currentColor" stroke-width="1.93333" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>
';

$iconLeaf = '
  <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <mask id="mask0_178_2709" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="17" height="16">
      <rect width="17" height="16" fill="url(#pattern0_178_2709)"/>
    </mask>
    <g mask="url(#mask0_178_2709)">
      <rect width="17" height="16" fill="currentColor"/>
    </g>
    <defs>
      <pattern id="pattern0_178_2709" patternContentUnits="objectBoundingBox" width="1" height="1">
        <use xlink:href="#image0_178_2709" transform="matrix(0.00876872 0 0 0.00931677 -5.26935 -0.5)"/>
      </pattern>
      <image id="image0_178_2709" width="953" height="161" xlink:href="data:image/png;base64,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"/>
    </defs>
  </svg>
';

$iconArrowUpSmall = '
    <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11 5L6 1L0.999999 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
';

$iconClose = '
    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.25 1.25L14.75 14.75M1.25 14.75L14.75 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
';

$iconMinus = '
    <svg width="24" height="2" viewBox="0 0 24 2" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 1H23" stroke="currentColor" stroke-width="2" stroke-linecap="square"/>
    </svg>
';

$iconPlus = '
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 12H23" stroke="currentColor" stroke-width="2" stroke-linecap="square"/>
        <path d="M12 1V23" stroke="currentColor" stroke-width="2" stroke-linecap="square"/>
    </svg>
';

/* Global */
add_filter('wp_calculate_image_srcset', '__return_false');

function get_custom_logo_html()
{
    return '<a href="/" rel="home" aria-label="Go home page">' . file_get_contents_nossl(wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full')) . '</a>';
}

/* Get file content by skipping SSL */
function file_get_contents_nossl($filePath)
{
    $context = stream_context_create([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ]);

    return file_get_contents($filePath, false, $context);
}

/* Add svg support */
add_filter('upload_mimes', 'add_svg_mime_types');
function add_svg_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

/* Includes Custom Post Types */
require_once 'inc/custom-post-types.php';

/* Update post excerpt length */
add_filter('excerpt_length', 'update_excerpt_length', 10, 1);
function update_excerpt_length($length)
{
    return 50;
}

/* Update post excerpt more symbol */
add_filter('excerpt_more', 'update_excerpt_more', 10, 1);
function update_excerpt_more($more)
{
    return '...';
}

/* Menu */
add_filter('nav_menu_link_attributes', 'add_class_to_a', 1, 3);
function add_class_to_a($classes, $item, $args)
{
    if (isset($args->add_link_class)) {
        $classes['class'] = $args->add_link_class;
    }

    if ($item->classes[0]) {
        $classes['class'] .= ' ' . $item->classes[0];
    }

    return $classes;
}

/* Yoast Breadcrumbs */
add_filter('wpseo_breadcrumb_output_wrapper', 'modify_yoast_breadcrumb_wrapper');
function modify_yoast_breadcrumb_wrapper()
{
    return 'wrapper';
}

add_filter('wpseo_breadcrumb_output', 'modify_yoast_breadcrumb_output');
function modify_yoast_breadcrumb_output($html)
{
    $html = str_replace(['<wrapper>', '</wrapper>'], '', $html);
    $wrapper = '<div class="breadcrumbs">%s</div>';
    $html = sprintf($wrapper, $html);

    return $html;
}

add_filter('wpseo_breadcrumb_single_link', 'modify_yoast_breadcrumb_items', 10, 2);
function modify_yoast_breadcrumb_items($link_html, $link_data)
{
    $notLast = strpos($link_html, 'breadcrumb_last') === false;

    $singleLinkWrapper = '<span class="breadcrumbs-item' . ($notLast ? '' : ' breadcrumbs-item--last') . '">%s</span>';

    if ($notLast) {
        $singleLinkInner = sprintf('<a href="%s">%s</a>', $link_data['url'], $link_data['text']);
    } else {
        $singleLinkInner = sprintf('<span>%s</span>', $link_data['text']);
    }

    return sprintf($singleLinkWrapper, $singleLinkInner);
}

add_filter('wpseo_breadcrumb_separator', 'modify_yoast_breadcrumb_separator', 10, 1);
function modify_yoast_breadcrumb_separator($separator)
{
    if (empty($separator)) {
        $separator = file_get_contents(home_url('wp-content/uploads/2025/04/favicon.svg'));
    }
    return '<span class="breadcrumbs-separator">' . $separator . '</span>';
};

add_filter('wpseo_breadcrumb_links', 'modify_wpseo_breadcrumb_link');
function modify_wpseo_breadcrumb_link($links)
{
    if (is_singular('post')) {
        $breadcrumb[] = array(
            'url' => site_url('/blog/'),
            'text' => 'Blog',
        );
        array_splice($links, 1, -2, $breadcrumb);
    }

    return $links;
}
/* Yoast Breadcrumbs - END */


/* Shortcodes */

/** [shortcode_name] */
//add_shortcode('shortcode_name', 'call_shortcode_name');
function call_shortcode_name($attr, $content)
{
    $params = shortcode_atts(array(
        'category' => 'default'
    ), $attr);

    ob_start();
    get_template_part('template-parts/shortcode_name/shortcode_name', 'section', $params);
    $ret = ob_get_contents();
    ob_end_clean();
    return $ret;
}

/* [pagination-template] */
add_shortcode('pagination-template', 'call_pagination_template');
function call_pagination_template($attr)
{
    global $iconArrowRight, $iconArrowRightLongEnd, $iconArrowLeft, $iconArrowLeftLongEnd;

    $params = shortcode_atts(array(
        'maxnumpages' => 1,
        'paged' => 1,
        'base' => '?p_num=%#%',
        'format' => '?p_num=%#%'
    ), $attr);

    $total = intval($params['maxnumpages']);
    $current = intval($params['paged']);

    if ($total <= 1) {
        return '';
    }

    $base = $params['base'];
    $format = $params['format'];

    $result = '';
    $pagination = paginate_links(
        array(
            'base' => $base,
            'format' => $format,
            'total' => $total,
            'current' => $current,
            'show_all' => false,
            'type' => 'array',
            'end_size' => 1,
            'mid_size' => 1,
            'prev_next' => false,
            'add_args' => false,
            'add_fragment' => '',
        )
    );

    $pagination = array_map(function ($link) {
        if (strpos($link, 'class="page-numbers') !== false) {
            $link = str_replace('class="', 'class="body-3 ', $link);
        }

        return $link;
    }, $pagination);

    $firstPageURL = str_replace('%#%', 1, $base);
    $lastPageURL = str_replace('%#%', $total, $base);
    $startPaginationLink = '<a class="start page-icon' . ($current === 1 ? ' disabled' : '') . '" href="' . $firstPageURL . '" aria-label="Go to first page">' . $iconArrowLeftLongEnd . '</a>';
    $endPaginationLink = '<a class="end page-icon' . ($current === $total ? ' disabled' : '') . '" href="' . $lastPageURL . '" aria-label="Go to last page">' . $iconArrowRightLongEnd . '</a>';

    $prevPageURL = str_replace('%#%', max(1, $current - 1), $base);
    $nextPageURL = str_replace('%#%', min($total, $current + 1), $base);
    $prevPaginationLink = '<a class="prev page-icon' . ($current === 1 ? ' disabled' : '') . '" href="' . $prevPageURL . '" aria-label="Go to the previous page">' . $iconArrowLeft . '</a>';
    $nextPaginationLink = '<a class="next page-icon' . ($current === $total ? ' disabled' : '') . '" href="' . $nextPageURL . '" aria-label="Go to the next page">' . $iconArrowRight . '</a>';

    if (is_array($pagination)) {

        // Add "Start" and "Previous" links, even if they're disabled
        $result .= $startPaginationLink;
        $result .= $prevPaginationLink;

        foreach ($pagination as $link) {
            $result .= $link;
        }

        // Add "Next" and "End" links, even if they're disabled
        $result .= $nextPaginationLink;
        $result .= $endPaginationLink;
    }

    return $result;
}

/* [blog type="" category=""] */
add_shortcode('blog', 'call_blog');
function call_blog($attr)
{
    $params = shortcode_atts(array(
        'type' => 'default',
        'category' => '',
        'related' => false
    ), $attr);

    ob_start();

    switch ($params['type']) {
        case 'slider':
            get_template_part('template-parts/blog/blog-section', 'slider', $params);
            break;
        default:
            get_template_part('template-parts/blog/blog-section', 'default', $params);
            break;
    }

    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

add_action('wp_enqueue_scripts', 'dompopugaev_shortcodes_styles');
function dompopugaev_shortcodes_styles()
{
    $shortcodeNames = array(
        'pagination',
        'blog'
    );

    foreach ($shortcodeNames as $shortcodeName) {
        wp_enqueue_style($shortcodeName, get_stylesheet_directory_uri() . '/template-parts/' . $shortcodeName . '/' . $shortcodeName . '.css', array(), _S_VERSION);
    }
}

/* Shortcodes - END */


/* AJAX */
// add_action('wp_ajax_action_load_posts', 'ajax_load_posts');
// add_action('wp_ajax_nopriv_action_load_posts', 'ajax_load_posts');

function ajax_load_posts()
{
    $postType = isset($_POST['postType']) ? $_POST['postType'] : 'post';
    $postsPerPage = isset($_POST['postsPerPage']) ? $_POST['postsPerPage'] : get_option('posts_per_page');
    $paged = isset($_POST['p_num']) ? $_POST['p_num'] : 1;

    ob_start();
    get_template_part('template-parts/' . $postType . '/' . $postType, 'section-ajax', ['postType' => $postType, 'paged' => $paged, 'postsPerPage' => $postsPerPage]);
    $result = ob_get_contents();
    ob_end_clean();
    echo $result;

    wp_die();
}

/* AJAX - END */