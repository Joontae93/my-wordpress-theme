<?php
/**
 * The Post & Work Single Template
 *
 * @package KJRoelke
 */

if ( get_post_type() !== 'work' ) {
	wp_enqueue_script( 'postJS' );
}
get_header();
?>
<main class="single container">
	<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'the-post', 'container' ) ); ?>>
		<?php get_template_part( 'template-parts/nav', 'breadcrumbs', array( 'archive' => $post->post_type ) ); ?>
		<?php if ( has_post_thumbnail() ) : ?>
		<figure class="the-post__featured-image w-100 h-100">
			<?php the_post_thumbnail(); ?>
		</figure>
		<?php endif; ?>
		<h1 class="headline the-post__headline">
			<?php the_title(); ?>
		</h1>
		<?php the_content(); ?>
	</article>
</main>
<?php
get_footer();