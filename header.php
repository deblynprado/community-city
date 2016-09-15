<!DOCTYPE html>
<!--[if IE 7]>
<html class="no-js ie ie7 lt-ie9 lt-ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="no-js ie ie8 lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<?php
		// Add backwards compatibility for older versions,
		if ( ! function_exists( '_wp_render_title_tag' ) ) {
			function theme_slug_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
			}
			add_action( 'wp_head', 'theme_slug_render_title' );
		}
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header <?php if ( is_front_page() ) { ?> class="site-header" <?php } ?> role="banner">

		<div class="menu-wrapper fixed">
			<div class="container">
				<a href="<?php echo esc_url( home_url() ); ?>"><h1 class="site-title"><?php bloginfo('name'); ?></h1></a>
				<nav>
					<?php
						/**
						* Displays a navigation menu
						* @param array $args Arguments
						*/
						$menu_args = array(
							'theme_location' => 'header-menu',
							'menu' => 'header-menu',
							'container' => 'ul',
							'container_class' => 'menu-{menu-slug}-container',
							'container_id' => '',
							'menu_class' => 'menu',
							'menu_id' => '',
							'echo' => true,
							'fallback_cb' => 'wp_page_menu',
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
							'depth' => 0,
							'walker' => ''
						);

						wp_nav_menu( $menu_args ); ?>
				</nav>
				<?php
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif;
				?>
			</div>
		</div>
	</header>

	<main>
