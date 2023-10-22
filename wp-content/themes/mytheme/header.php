<?php
/** The Basic Header Tempalte
 *
 * @since 1.0
 * @package KJRoelke
 */

use KJR\Navwalker;

$logo_src = get_template_directory_uri() . '/public/kjr_logo_color.png';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> data-color-theme="light">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'position-relative' ); ?>>
	<?php wp_body_open(); ?>
	<header class="header">
		<nav id="nav-main" class="navbar navbar-expand-lg justify-content-between w-100">
			<a class="logo__container" href="<?php echo home_url(); ?>">
				<figure class="logo">
					<img src="<?php echo $logo_src; ?>" alt="kjr logo" class="logo__img" aria-label="KJ Roelke">
				</figure>
			</a>
			<div class="offcanvas offcanvas-end flex-grow-0" tabindex="-1" id="offcanvas-navbar">
				<div class="offcanvas-header">
					<span class="h5 offcanvas-title"><?php esc_html_e( 'Menu', 'kjr' ); ?></span>
					<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<?php
						wp_nav_menu(
							array(
								'menu'            => 'primary-menu',
								'menu_class'      => 'nav__container m-0 list-unstyled justify-content-evenly d-flex flex-column flex-lg-row',
								'container'       => 'div',
								'container_class' => 'nav offcanvas-body flex-wrap align-items-start justify-content-lg-between align-items-lg-center',
								'walker'          => new Navwalker(),
							)
						);
						?>
			</div>
			<button class="btn btn-primary d-lg-none ms-1 ms-md-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-navbar" aria-controls="offcanvas-navbar">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
					<path fill-rule="evenodd"
							d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
				</svg><span class="visually-hidden-focusable">Menu</span>
			</button>

		</nav><!-- .navbar -->


	</header>