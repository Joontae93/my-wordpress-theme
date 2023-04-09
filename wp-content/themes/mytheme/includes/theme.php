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