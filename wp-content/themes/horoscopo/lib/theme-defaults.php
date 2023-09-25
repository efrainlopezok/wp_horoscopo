<?php
/**
 * Genesis Sample.
 *
 * This file adds the default theme settings to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

add_filter( 'genesis_theme_settings_defaults', 'genesis_sample_theme_defaults' );
/**
* Updates theme settings on reset.
*
* @since 2.2.3
*/
function genesis_sample_theme_defaults( $defaults ) {

	$defaults['blog_cat_num']              = 6;
	$defaults['content_archive']           = 'full';
	$defaults['content_archive_limit']     = 0;
	$defaults['content_archive_thumbnail'] = 0;
	$defaults['posts_nav']                 = 'numeric';
	$defaults['site_layout']               = 'content-sidebar';

	return $defaults;

}

add_action( 'after_switch_theme', 'genesis_sample_theme_setting_defaults' );
/**
* Updates theme settings on activation.
*
* @since 2.2.3
*/
function genesis_sample_theme_setting_defaults() {

	if ( function_exists( 'genesis_update_settings' ) ) {

		genesis_update_settings( array(
			'blog_cat_num'              => 6,
			'content_archive'           => 'full',
			'content_archive_limit'     => 0,
			'content_archive_thumbnail' => 0,
			'posts_nav'                 => 'numeric',
			'site_layout'               => 'content-sidebar',
		) );

	}

	update_option( 'posts_per_page', 6 );

}

//* Force full-width-content layout setting
add_filter('genesis_pre_get_option_site_layout', '__genesis_return_full_width_content');

//* Remove the site title
//remove_action('genesis_entry_header', 'genesis_do_post_title');

//remove_action('genesis_site_title', 'genesis_seo_site_title');
remove_action('genesis_site_description', 'genesis_seo_site_description');
//remove_action('genesis_site_title', 'genesis_seo_site_title');
//* Remove copyright wordpress
function remove_footer_admin()
{
	echo '';
}

add_filter('admin_footer_text', 'remove_footer_admin');


// Title Header Horoscopo
function be_customize_site_title($title, $inside, $wrap) {
	$custom = '<p class="site-title"><a href="'.get_site_url().'">Horoscopo.com</a></p>';
	return $custom;
}
add_filter('genesis_seo_title','be_customize_site_title', 10, 3);

// Footer Horoscopo
remove_action( 'genesis_footer', 'genesis_do_footer' );

add_action( 'genesis_footer', 'horoscopo_custom_footer' );
function horoscopo_custom_footer() {
	echo '<p>'.get_field('footer_copyright', 'option').'</p>';
}