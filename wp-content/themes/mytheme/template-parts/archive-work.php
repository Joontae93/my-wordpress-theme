<?php
/**
 * Archive-Work Template
 *
 * @package KJRoelke
 */

get_header() ?>
<main>
	<h1 class="title">
		My Work
	</h1>
	<?php if ( have_posts() ) : ?>
	<ul class="post-card__container" role="list">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
		<!-- IF featured post / ELSE -->
		<li class="post-card">
			<a href="<?php the_permalink(); ?>" class="post__link post-card__link">
				<article class="post">
					<h2 class="post__title post-card__title">
						<?php the_title(); ?>
					</h2>
					<p class="post__excerpt post-card__excerpt">
						<?php echo get_the_excerpt(); ?>
					</p>
				</article>
			</a>
		</li>
		<?php endwhile; ?>
	</ul>
	<?php else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
</main>
<?php get_footer(); ?>