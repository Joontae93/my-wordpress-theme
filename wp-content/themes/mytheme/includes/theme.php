<?php

/** Custom Filters */
add_filter('excerpt_length', function ($length) {
    return 30;
}, PHP_INT_MAX);

/** Custom Supports */
function myThemeSupports() {
    add_theme_support('post-formats', array('link', 'standard', 'video', 'audio'));
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary-menu'  => 'The Primary Nav',
        'footer-menu'   => 'The Footer Nav',
        'mobile-menu'   => 'Mobile-Device Menu'
    ));
}
add_action('after_setup_theme', 'myThemeSupports');

/** Styles 'n' Scripts */
function enqueue_styles() {
    $dir = get_stylesheet_directory();
    wp_enqueue_style('main', get_stylesheet_directory_uri() . '/dist/global.css', array(), filemtime(get_stylesheet_directory() . '/dist/global.css'));
    wp_enqueue_script('kj-data', get_stylesheet_directory_uri() . '/dist/global.js', array(), filemtime(get_stylesheet_directory() . '/dist/global.js'), true);
    wp_localize_script('kj-data', 'myData', array(
        'root_url' => get_site_url(),
        'day' => date('D'),
        'year' => date('Y')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_page_style(string $id, array $deps = array('main')) {

    $src = get_stylesheet_directory_uri() . "/dist/{$id}.css";
    wp_enqueue_style($id, $src, $deps, false);
}
function enqueue_page_script(string $id, array $deps = array()) {
    $src = get_stylesheet_directory_uri() . "/dist/{$id}.js";
    wp_enqueue_script($id, $src, $deps, false, true);
}
/**
 * @param object $deps expects 2 arrays ("styles" and "scripts") with appropriate dependencies. 
 */
function enqueue_page_assets(string $id, array $deps) {
    if (empty($deps['styles'])) {
        enqueue_page_style($id);
    } else enqueue_page_style($id, $deps['styles']);
    if (empty($deps['scripts'])) {
        enqueue_page_script($id);
    } else enqueue_page_script($id, $deps['scripts']);
}

/**
 * Returns the proper HTML Markup
 * @param  $cta {string} the button text
 * @param $style {string} the css class to add after `btn--`
 * @param $href {string} if $is_external, include the full url, else can use slug-only version
 * @param $is_external {boolean}  whether or not the link is external 
 * @return string the markup
 */
function button(
    string $cta,
    string $style,
    string $href,
    bool $is_external = false
): string {
    if ($is_external) {
        return "<a class='btn__$style' href='$href' rel='noreferrer noopener' target='_blank'><span class='btn__text'>$cta</span></a>";
    } else {
        return "<a class='btn__$style' href='/$href'><span class='btn__text'>$cta</span></a>";
    }
}
