<?php
/**
 *  The Front Page
 *
 * @package KJRoelke
 */

get_header(); ?>
<main class="container py-5">
	<div class="row flex-row-reverse">
		<div class="col-lg-6 col justify-content-center d-flex">
			<figure>
				<img src="<?php echo get_template_directory_uri() . '/public/headshot v4.jpg'; ?>" alt="My face, bright and smiling in a t-shirt on a dark background">
			</figure>
		</div>
		<div class="col-lg-6 col">
			<h1 class="headline">Hi there! My Name is K.J. Roelke</h1>
			<span>(It's pronounced <em>REL</em>-key)</span>
			<p class="subheadline">I'm a web developer, podcast host, sometimes-wrtiter and other stuff.</p>
			<div class="row">
				<div class="col">
					<?php echo kjr_button( 'About Me', 'outline', 'about' ); ?>
					<?php echo kjr_button( 'My Writing', 'fill', 'blog' ); ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>