<?php

/** The Basic Header Tempalte 
 * @since 1.0
 * @author K.J. Roelke
 */
$main_menu = wp_nav_menu(array(
    'menu'              => 'primary-menu',
    'menu_class'        => 'nav__container',
    'container'         => 'nav',
    'container_class'   => 'nav',
    'echo'              => false
));
$logo_src = get_template_directory_uri() . "/public/kjr_logo_color.png";
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KJ Roelke</title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <? wp_head(); ?>
</head>

<body <? body_class(); ?>>
    <header>
        <a class="logo__container" href="<? echo home_url(); ?>">
            <figure class="logo">
                <img src="<? echo $logo_src ?>" alt="kjr logo" class="logo__img">
                <h1 style="display:none;">K.J. Roelke</h1>
            </figure>
        </a>
        <?php echo $main_menu; ?>
    </header>