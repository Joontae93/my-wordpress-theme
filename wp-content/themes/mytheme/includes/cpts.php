<?php

/** Custom Post Types */
function my_cpts() {
    register_post_type(
        'work',
        array(
            'labels' => array(
                'name' => __('Work'),
                'singular_name' => __('Work'),
                'all_items' => __('All Works', 'kjr'),
                'view_item' => __('View Work', 'kjr'),
                'add_new_item' => __('Add New Work', 'kjr'),
                'add_new' => __('Add New', 'kjr'),
                'edit_item' => __('Edit Work', 'kjr'),
                'update_item' => __('Update Work', 'kjr'),
                'search_items' => __('Search Work', 'kjr'),
                'not_found' => __('Work Not Found', 'kjr'),
                'not_found_in_trash' => __('Not found in Trash', 'kjr'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'work'),
            'menu_position' => 20,
            'menu_icon' => 'dashicons-laptop',
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'trackbacks', 'post-formats')
        )
    );
}
add_action('init', 'my_cpts');