<?php

/**
 * Horoscopo
 *
 * Horoscopo
 *
 * Template Name: Signo Semanal
 *
 * @package Horoscopo
 * @author  Horoscopo
 * @license GPL-2.0+
 * @link    http://www.paradoja.com/
 */
//* Remove the post content (requires HTML5 theme support)

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action('genesis_before_content_sidebar_wrap', 'signo_horoscopo');
function signo_horoscopo(){
	$pstid = get_the_ID();
	
	$m =	date("n");
	$d =	date("D");
	$m2 =	date("n", strtotime("+6 day"));
	$d2 =	date("D", strtotime("+6 day"));
	if ($d=="Mon")  { $dw = "+0";$dd="+6" ;	$m2 =	date("n", strtotime("+6 day"));				}
	if ($d=="Tue")  { $dw = "-1";$dd="+5"; $m2 =	date("n", strtotime("+5 day"));					}
	if ($d=="Wed")  { $dw = "-2"; $dd="+4";	$m2 =	date("n", strtotime("+4 day"));				}
	if ($d=="Thu")  { $dw = "-3"; $dd="+3";	$m2 =	date("n", strtotime("+3 day"));				}
	if ($d=="Fri")  { $dw = "-4"; $dd="+2";	$m2 =	date("n", strtotime("+2 day"));				}
	if ($d=="Sat")  { $dw = "-5";$dd="+1"; $m2 =	date("n", strtotime("+1 day"));					}
	if ($d=="Sun")  { $dw = "-6"; $dd="+0";$m2 =	date("n");					}
	// Get a full textual representation of the month ( in norwegian )
	/*************************** */
	if ($m2==1)  { $t2 = "enero"; }
	if ($m2==2)  { $t2 = "febrero"; }
	if ($m2==3)  { $t2 = "marzo"; }
	if ($m2==4)  { $t2 = "abril"; }
	if ($m2==5)  { $t2 = "mayo"; }
	if ($m2==6)  { $t2 = "junio"; }
	if ($m2==7)  { $t2 = "julio"; }
	if ($m2==8)  { $t2 = "agosto"; }
	if ($m2==9)  { $t2 = "septiempre"; }
	if ($m2==10) { $t2 = "octubre"; }
	if ($m2==11) { $t2 = "noviembre"; }
	if ($m2==12) { $t2 = "diciembre"; }
	echo '<div class="before-signo-content hoy">';
		echo '<div class="wrap">';
		$semanal = get_field('semanal');
		// print_r($semanal);
		if( has_post_thumbnail($post_array->ID) ) {
	        $image_arr = wp_get_attachment_image_src(get_post_thumbnail_id($post_array->ID), 'medium');
	        $image_url = $image_arr[0];
		}
			echo "<h2>Horóscopo ".get_the_title()."</h2><img src='".$image_url."' class='img-t'>
			<p>(del lunes ".date("d",strtotime("".$dw ." day"))." al domingo ".date("d", strtotime("".$dd." day"))." de ".$t2." de ".date("Y", strtotime("+6 day")).")</p>";
			echo "<p>(".$semanal['fecha'].")</p>";
			echo '<div class="row">';
				echo '<div class="col-md-4">';
					echo '<div class="banner-propaganda">';
						echo  '<div>'.get_field('anuncios_signos_hoy_manana_semanal', 'option').'</div>';
					echo '</div>';
				echo '</div>';
				echo '<div class="col-md-8">';
					echo '<div class="box-hoy">';
						echo $semanal['semanal'];
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}

// second menu signos
add_action('genesis_before_footer', 'menu_signos_footer');
function menu_signos_footer(){

	echo '<div class="com-horos">';
		echo '<div class="wrap">';
			echo '<div class="row ">';
				echo '<div class="col-md-4">';
					echo '<a class="face-c" target="_blank" href="https://www.facebook.com/sharer.php?u='.get_permalink().'"><span>Compartir en </span>Facebook</a>';
				echo '</div>';
				echo '<div class="col-md-4">';
					echo '<a class="whatsapp-c" target="_blank" href="https://api.whatsapp.com/send?text=Horóscopo%20'.get_the_title().'%20Hoy%0A%0A'.get_permalink().'"><span>Compartir en </span>WhatsApp</a>';
				echo '</div>';
				echo '<div class="col-md-4">';
					echo '<a class="twitter-c" target="_blank" href="https://twitter.com/share?url='.get_permalink().'&text='.get_the_title().'"><span>Compartir en </span>Twitter</a>';
				echo '</div>';		
			echo '</div>';
		echo '</div>';
	echo '</div>';
}

genesis();