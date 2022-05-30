<?php
/**
 * aimeesthemefieldmanager functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aimeesthemefieldmanager
 */

if ( ! function_exists( 'aimeesthemefieldmanager_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aimeesthemefieldmanager_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on aimeesthemefieldmanager, use a find and replace
		 * to change 'aimeesthemefieldmanager' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'aimeesthemefieldmanager', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary', 'aimeesthemefieldmanager' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'aimeesthemefieldmanager_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'aimeesthemefieldmanager_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aimeesthemefieldmanager_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'aimeesthemefieldmanager_content_width', 640 );
}
add_action( 'after_setup_theme', 'aimeesthemefieldmanager_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aimeesthemefieldmanager_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'aimeesthemefieldmanager' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'aimeesthemefieldmanager' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'aimeesthemefieldmanager_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aimeesthemefieldmanager_scripts() {
	$theme = wp_get_theme();

	// ADD YOU CUSTOM STYLES HERE ======
	wp_enqueue_style( 'Bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );

	//my styles
	wp_enqueue_style( 'aimeesthemefieldmanager-style', get_stylesheet_uri());

	wp_enqueue_style( 'aos', 'https://unpkg.com/aos@2.3.0/dist/aos.css');

	wp_enqueue_style('Font Awesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css' );

	wp_register_style('slick', get_template_directory_uri() . '/css/slick.css', array(), null, 'all' );
	wp_enqueue_style( 'slick' );


	// =============================================
	// == Add jQuery and other JS Scripts here ===
	// =============================================

	wp_enqueue_script('jquery');

	wp_enqueue_script( 'aimeesthemefieldmanager-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'aimeesthemefieldmanager-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), true );

	wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array(), '1.0.0', true );

	wp_enqueue_script( 'aimeesthemefieldmanager-script', get_template_directory_uri() . '/assets/js/script.js', array(), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aimeesthemefieldmanager_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



add_action( 'fm_post_page', function() {

	$fm_s2 = new Fieldmanager_Select( array(
        'name' => 'pagebackgroundstyle',
        'first_empty' => true,
        'options' => array(
            'red' => 'Red #e74c3c',
            'green' => 'Green #27ae60',
			'sea-green' => 'Sea Green #16a085',
            'blue' => 'Blue #2c3d87',
			'midnight-blue' => 'Midnight Blue #2c3e50',
			'black' => 'Black #06030c',
			'purple' => 'Purple #8a69d4',
			'light-purple' => 'Light Purple #c7a4ff',
			'dark-purple' => 'Dark Purple #20123f',
			'light-grey' => 'Light Grey #ecf0f1'
        ),
    ) );

	$fm_media = new Fieldmanager_Media( array(
        'name' => 'media-one',
    ) );
   

	$fm = new Fieldmanager_RichTextArea( array(
		'name' => 'content1',
		'label' => 'Content 1',
		'editor_settings' => array(
			'media_buttons' => false,
		),
	) );

	$fm_content2 = new Fieldmanager_RichTextArea( array(
		'name' => 'content2',
		'label' => 'Content 2',
		'editor_settings' => array(
			'media_buttons' => false,
		),
	) );

	$fm_content3 = new Fieldmanager_RichTextArea( array(
		'name' => 'content3',
		'label' => 'Content 3',
		'editor_settings' => array(
			'media_buttons' => false,
		),
	) );

	$fm_cb = new Fieldmanager_Checkbox( array(
		'name' => 'hidecontentatmobile',
		'label' => 'Hide Content at Mobile',
		'checked_value' => true,
		'unchecked_value' => false,
	) );

	$fm_s = new Fieldmanager_Select( array(
        'name' => 'backgroundstyle',
        'first_empty' => true,
        'options' => array(
            'red' => 'Red',
            'green' => 'Green',
            'blue' => 'Blue',
			'black' => 'Black',
			'purple' => 'Purple',
			'light-grey' => 'Light Grey'
        ),
    ) );

	$fm_s2->add_meta_box( 'Page Background Style', array( 'page' ) );
	$fm_media->add_meta_box( 'Media Field One', array( 'page' ) );
	$fm->add_meta_box( 'Content 1', array( 'page' ) );
	$fm_content2 ->add_meta_box( 'Content 2', array( 'page' ) );
	$fm_content3->add_meta_box( 'Content 3', array( 'page' ) );

	$fm_cb->add_meta_box( 'Hide Content at Mobile', array( 'page' ) );

    $fm_s->add_meta_box( 'Select Background Style', array( 'page' ), 'show_after_title', 'high' );
} );

