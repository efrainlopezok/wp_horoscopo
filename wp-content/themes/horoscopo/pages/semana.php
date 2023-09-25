<?php

/**
 * Horoscopo
 *
 * Horoscopo
 *
 * Template Name: Semanal
 *
 * @package Horoscopo
 * @author  Horoscopo
 * @license GPL-2.0+
 * @link    http://www.paradoja.com/
 */

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

add_action('genesis_before_content_sidebar_wrap', 'list_horoscopo');
function list_horoscopo(){
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
	echo '<div class="before-home-content pagina-hoy">';
		echo '<div class="wrap">';
			echo '<h2>'.get_field('titulo').' (del lunes '.date("d",strtotime("".$dw ." day")).' al domingo '.date("d", strtotime("".$dd." day")).' de  '.$t2.' de '.date("Y", strtotime("+6 day")).')</h2>';
			echo '<div class="banner-propaganda" style="text-align:center;">'.get_field('anuncio_superior_largo', 'option').'</div>';
			if( have_rows('signos') ):
			 	// loop through the rows of data
			 	echo '<div class="signos-container">';
			 		echo '<div class="row">';
				    while ( have_rows('signos') ) : the_row();
				        // display a sub field value
				        echo '<div class="col-xs-12 col-sm-6 col-md-4 col-hr-6">';
				        	echo '<div class="signo-dsc">';
				        		$class = get_sub_field('titulo_del_signo');
				        		echo '<div class="img"><a href="'.get_sub_field('link_del_signo')['url'].'" class="img-signo '.strtolower(eliminar_simbolos($class)).'"></a></div>';
				        		echo '<div class="fecha-signo">';
				        		echo '<h3><a href="'.get_sub_field('link_del_signo')['url'].'">'.get_sub_field('titulo_del_signo').'</a></h3>';
				        		echo '<span>'.get_sub_field('fechas').'</span>';
				        		echo '<div class="section-signos">';
				        			$hoy = get_sub_field('link_hoy');
				        		echo '<a href="'.$hoy['url'].'">'.$hoy['title'].'</a>';
				        		echo '</div>';
				        		echo '</div>';
				        	echo '</div>';
				        echo '</div>';
				    endwhile;
			    	echo '</div>';
			    echo '</div>';
			endif;
			echo '<div class="banner-propaganda" style="text-align:center;">'.get_field('anuncio_inferior_largo', 'option').'</div>';
		echo '</div>';
	echo '</div>';
}

genesis();