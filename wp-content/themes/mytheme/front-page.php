<?php

/**
 *  The Front Page
 * 
 */
enqueue_page_style('frontPage');
get_header() ?>
<main class="container">
    <section class="hero">
        <div class="row greeting">
            <div class="col">
                <h1 class="headline">Hi there! My Name is K.J. Roelke</h1>
                <span>(It's pronounced <em>REL</em>-key)</span>
                <span class="subheadline">I'm a web developer, podcast host, sometimes-wrtiter and other stuff.</span>
            </div>
            <div class="col">
                <figure><img src="<?php echo get_template_directory_uri() . '/public/headshot v4.jpg' ?>" alt="My face, bright and smiling in a t-shirt on a dark background"></figure>
            </div>
        </div>
        <div class="row">
            <?php echo button('About Me', 'outline', 'about'); ?>
            <?php echo button('My Writing', 'fill', 'blog'); ?>
        </div>
    </section>
</main>
<? get_footer() ?>