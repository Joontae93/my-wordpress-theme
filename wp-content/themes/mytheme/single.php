<?php

/**
 * The Post & Work Single Template
 * 
 */

if (get_post_type() != 'work') {
    wp_enqueue_script('postJS', get_stylesheet_directory_uri() . '/build/singles.js', array('kj-data'), '1.0', true);
}
get_header();

?>
<main class="single">
    <article id="post-<?php the_ID(); ?>" <?php post_class("the-post"); ?>>
        <figure class="the-post__featured-image">
            <? the_post_thumbnail() ?>
        </figure>
        <h1 class="headline the-post__headline">
            <? the_title() ?>
        </h1>
        <? the_content() ?>
    </article>
</main>
<? get_footer() ?>