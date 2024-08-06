<?php
/**
 * Enqueue scripts and styles.
 */
function macan_scripts()
{
//    wp_enqueue_style('Peyda', get_template_directory_uri() . '/public/fonts/Peyda/fontface.css', array());
    wp_enqueue_style('neue', get_template_directory_uri() . '/public/fonts/neue-frutiger/fontface.css', array());
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/public/css/style.css', array());
    wp_enqueue_script('main-js', get_template_directory_uri() . '/public/js/app.js', null, true);
    }
add_action( 'wp_enqueue_scripts', 'macan_scripts' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function macan_setup() {
	register_nav_menu( 'headerMenuLocation', 'منوی اصلی' );
	register_nav_menu( 'footerLocationOne', 'منوی اول فوتر' );
	register_nav_menu( 'footerLocationTwo', 'منوی دوم فوتر' );
	register_nav_menu( 'footerLocationThree', 'منوی سوم فوتر' );
	register_nav_menu( 'footerLocationFour', 'منوی چهارم فوتر' );
}

add_action( 'after_setup_theme', 'macan_setup' );

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'تنظیمات پوسته',
		'menu_title' => 'تنظیمات پوسته',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );
}

function add_link_class($atts, $item, $args) {
    if (isset($args->link_class)) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_link_class', 10, 3);
