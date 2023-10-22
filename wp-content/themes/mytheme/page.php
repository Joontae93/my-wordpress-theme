<?php
/**
 * Standard Page
 *
 * @since 1.0
 * @package KJRoelke
 */

get_header();
?>
<article class="the-content py-5">
	<?php get_template_part( 'template-parts/page', $post->post_name ); ?>
</article>
<?php get_footer(); ?>