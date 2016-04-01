<?php
/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * City Widgets.
 */

if ( ! function_exists( 'city_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since  1.0
	 *
	 * @return void
	 */
	function city_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'commcitytheme', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu', 'commcitytheme' )
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 360, 225, true );

		/**
		 * Add feed link.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support Custom Header.
		 */
		require get_template_directory() . '/inc/custom-header.php';

		/**
		 * Support Custom Background.
		 */
		$defaults = array(
			'default-color' => '343434',
			'default-image' => get_template_directory_uri() . '/assets/images/news-background.png',
		);

		add_theme_support( 'custom-background', $defaults );

		/**
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'assets/css/editor-style.css', 'genericons/genericons.css' ) );
	}
}

add_action( 'after_setup_theme', 'city_setup_features' );

/**
 * Register widget areas.
 *
 * @since  1.0
 *
 * @return void
 */
function city_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Sidebar', 'commcitytheme' ),
			'id' => 'sidebar',
			'description' => __( 'Site Main Sidebar', 'commcitytheme' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name' => __( 'Footer 1', 'commcitytheme' ),
			'id' => 'footer-1',
			'description' => __( 'Footer first column', 'commcitytheme' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name' => __( 'Footer 2', 'commcitytheme' ),
			'id' => 'footer-2',
			'description' => __( 'Footer second column', 'commcitytheme' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name' => __( 'Footer 3', 'commcitytheme' ),
			'id' => 'footer-3',
			'description' => __( 'Footer third column', 'commcitytheme' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'city_widgets_init' );

/**
 * Load site scripts.
 *
 * @since  1.0
 *
 * @return void
 */
function city_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Google Fonts
	wp_enqueue_style( 'gfonts', 'http://fonts.googleapis.com/css?family=Ubuntu:400,700' );

	// City Styles
	wp_enqueue_style( 'city-style', $template_url . '/assets/css/style.css', array(), null, 'all' );

	// Bootstrap styles
	wp_enqueue_style( 'boostrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css', array(), null, 'all' );


	// jQuery
	wp_enqueue_script( 'jquery' );

	// Bootstrap scripts
	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js', array( 'jquery' ), null, true );

	// General scripts
	wp_enqueue_script( 'city-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), null, true );

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'odin-style', get_stylesheet_uri(), array(), null, 'all' );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'city_enqueue_scripts', 1 );

/**
 * Limit the number of posts
 *
 * @since  1.0
 *
 * @return void
 */
function city_limit_posts_per_page( $query ) {
    if ( is_home() && $query->is_main_query() ) {
        // Display only 3 post for the original blog archive
        $query->set( 'posts_per_page', 3 );
        $query->set( 'ignore_sticky_posts', 1 );
        return;
    }
}
add_action( 'pre_get_posts', 'city_limit_posts_per_page', 1 );
