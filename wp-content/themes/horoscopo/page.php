<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package Genesis\Templates
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/genesis/
 */

// This file handles pages, but only exists for the sake of child theme forward compatibility.
/*remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_after_header', 'paradoja_page_container' );
function paradoja_page_container(){
	$post = get_post(get_the_ID());
	echo '<div class="sec-prof wrapper-paradoja"><div class="container"><div class="container-default-page"><h1>'.get_the_title().'</h1>'.apply_filters( 'the_content', $post->post_content ).'</div></div></div>';
}
*/
genesis();
