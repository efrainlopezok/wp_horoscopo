<?php
/**
 * Horoscopo
 *
 * This file adds functions to the Horoscopo Theme.
 *
 * @package Horoscopo
 * @author  Horoscopo
 * @license GPL-2.0+
 * @link    http://www.horoscopo.com/
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

//* Start plugins
// include_once(get_stylesheet_directory() . '/plugins/init.php');

// Setup Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
function genesis_sample_localization_setup(){
	load_child_theme_textdomain( 'genesis-sample', get_stylesheet_directory() . '/languages' );
}

// Add the helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Add Image upload and Color select to WordPress Theme Customizer.
require_once( get_stylesheet_directory() . '/lib/customize.php' );

// Include Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/output.php' );

// Shortcodes Horoscopo
require_once( get_stylesheet_directory() . '/lib/shortcodes.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Horoscopo' );
define( 'CHILD_THEME_URL', 'http://www.horoscopo.com/' );
define( 'CHILD_THEME_VERSION', '2.3.0' );

// Enqueue Scripts and Styles.
add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
function genesis_sample_enqueue_scripts_styles() {

	// wp_enqueue_style( 'genesis-sample-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );
	// wp_enqueue_style( 'dashicons' );
	//wp_enqueue_style('custom-css', get_stylesheet_directory_uri() . '/css/custom.css', array(), '20130609');
	wp_enqueue_script('jquery-custom', get_stylesheet_directory_uri() . "/js/custom.js", array('jquery'), CHILD_THEME_VERSION, true);
	
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'genesis-sample-responsive-menu', get_stylesheet_directory_uri() . "/js/responsive-menus{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_localize_script(
		'genesis-sample-responsive-menu',
		'genesis_responsive_menu',
		genesis_sample_responsive_menu_settings()
	);

}

// Define our responsive menu settings.
function genesis_sample_responsive_menu_settings() {

	$settings = array(
		'mainMenu'          => __( 'Menu', 'genesis-sample' ),
		'menuIconClass'     => 'dashicons-before dashicons-menu',
		'subMenu'           => __( 'Submenu', 'genesis-sample' ),
		'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'       => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header',
			),
			'others'  => array(),
		),
	);

	return $settings;

}

// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom header.
add_theme_support( 'custom-header', array(
	'width'           => 600,
	'height'          => 120,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

// Add support for custom background.
add_theme_support( 'custom-background' );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 0);

// Add Image Sizes.
add_image_size( 'featured-image', 720, 400, TRUE );

// Rename primary and secondary navigation menus.
add_theme_support( 'genesis-menus', array( 'primary' => __( 'After Header Menu', 'genesis-sample' ), 'secondary' => __( 'Footer Menu', 'genesis-sample' ) ) );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

// Reduce the secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}

// Modify size of the Gravatar in the author box.
add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
function genesis_sample_author_box_gravatar( $size ) {
	return 90;
}

// Modify size of the Gravatar in the entry comments.
add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}

show_admin_bar( false );

// second menu signos
add_action('genesis_after_header', 'menu_signos');
function menu_signos(){
	echo '<div class="signos-menu">';
		echo '<div class="wrap">';
			echo wp_nav_menu( array( 'menu' => 'menu-signos', 'echo' => false ) );
		echo '</div>';
	echo '</div>';
}

// Eliminar Acentos
function eliminar_simbolos($string){
 
    $string = trim($string);
 
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );
 
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );
 
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );
 
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );
 
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );
 
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );
 
    $string = str_replace(
        array("\\", "¨", "º", "-", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "<code>", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             ".", " "),
        ' ',
        $string
    );
return $string;
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Opciones del Tema',
		'menu_title'	=> 'Opciones del Tema',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}


remove_action('genesis_meta', 'genesis_load_favicon');
remove_action('wp_head', 'genesis_load_favicon');

function wpse_remove_edit_post_link( $link ) {
    return '';
}
add_filter('edit_post_link', 'wpse_remove_edit_post_link');


/**************************************/
function genesischild_swap_header( $title, $inside, $wrap ) {
	// Set what goes inside the wrapping tags.
	if (get_field('logo', 'option')) {
		$logo = '<img  src="' . get_field('logo', 'option') . '" />';
	}else{
		$logo = get_bloginfo( 'name' );
	}
	$inside = sprintf( '<a href="%s" title="%s">%s</a>', trailingslashit( home_url() ), esc_attr( get_bloginfo( 'name' ) ), $logo );
	$wrap = is_front_page() && 'title' === genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : 'p';
	$wrap = is_front_page() && ! genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : $wrap;
	$wrap = genesis_html5() && genesis_get_seo_option( 'semantic_headings' ) ? 'h1' : $wrap;
	$title = sprintf( '<%1$s %2$s>%3$s</%1$s>', $wrap, genesis_attr( 'site-title' ), $inside );
	return $title;
}
add_filter( 'genesis_seo_title','genesischild_swap_header', 10, 3 );

