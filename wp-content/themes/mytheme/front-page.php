<?php
/**
 *  The Front Page
 *
 * @package KJRoelke
 */

get_header(); ?>
<main class="container">
	<section class="hero">
		<div class="row greeting">
			<div class="col">
				<h1 class="headline">Hi there! My Name is K.J. Roelke</h1>
				<span>(It's pronounced <em>REL</em>-key)</span>
				<p class="subheadline">I'm a web developer, podcast host, sometimes-wrtiter and other stuff.</p>
			</div>
			<div class="col">
				<figure><img src="<?php echo get_template_directory_uri() . '/public/headshot v4.jpg'; ?>" alt="My face, bright and smiling in a t-shirt on a dark background"></figure>
			</div>
		</div>
		<div class="row">
			<?php // echo button( 'About Me', 'outline', 'about' ); ?>
			<?php // echo button( 'My Writing', 'fill', 'blog' ); ?>
		</div>
	</section>
</main>
<?php get_footer(); ?>