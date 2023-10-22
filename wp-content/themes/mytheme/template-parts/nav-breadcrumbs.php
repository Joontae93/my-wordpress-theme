<?php
/**
 * Breadcrumbs
 *
 * @package KJRoelke
 * @since 2.0.2
 */

switch ( $args['archive'] ) {
	case 'post':
		$archive_url   = site_url( '/blog' );
		$archive_title = 'Blog';
		break;
	case 'work':
		$archive_url   = site_url( '/work' );
		$archive_title = 'My Work';
		break;
}
$archive_link = "<a href='{$archive_url}'>{$archive_title}</a>";
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class='py-4 mb-5'>
	<ol class="breadcrumb fw-bold">
		<li class="breadcrumb-item"><a href="<?php echo esc_url( site_url() ); ?>">Home</a></li>
		<li class="breadcrumb-item" aria-current="page"><?php echo $archive_link; ?></li>
		<li class="breadcrumb-item active" aria-current="page"><?php echo $post->post_title; ?></li>
	</ol>
</nav>