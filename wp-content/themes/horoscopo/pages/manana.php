<?php

/**
 * Horoscopo
 *
 * Horoscopo
 *
 * Template Name: Mañana
 *
 * @package Horoscopo
 * @author  Horoscopo
 * @license GPL-2.0+
 * @link    http://www.paradoja.com/
 */

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

add_action('genesis_before_content_sidebar_wrap', 'list_horoscopo');
function list_horoscopo(){
	$d = date('D',strtotime("+1 day"));
	$m = date('n',strtotime("+1 day"));
	$y = date('Y',strtotime("+1 day"));

	if ($m==1)  { $t = "enero"; }
	if ($m==2)  { $t = "febrero"; }
	if ($m==3)  { $t = "marzo"; }
	if ($m==4)  { $t = "abril"; }
	if ($m==5)  { $t = "mayo"; }	
	if ($m==6)  { $t = "junio"; }
	if ($m==7)  { $t = "julio"; }
	if ($m==8)  { $t = "agosto"; }
	if ($m==9)  { $t = "septiempre"; }
	if ($m==10) { $t = "octubre"; }
	if ($m==11) { $t = "noviembre"; }
	if ($m==12) { $t = "diciembre"; }

	if ($d=="Mon")  { $dw = "lunes"; }
	if ($d=="Tue")  { $dw = "martes"; }
	if ($d=="Wed")  { $dw = "miercoles"; }
	if ($d=="Thu")  { $dw = "jueves"; }
	if ($d=="Fri")  { $dw = "viernes"; }
	if ($d=="Sat")  { $dw = "dabado"; }
	if ($d=="Sun")  { $dw = "domingo"; }
	echo '<div class="before-home-content pagina-hoy">';
		echo '<div class="wrap">';
			echo '<h2>'.get_field('titulo').' ('.$dw.', '.date('d',strtotime("+1 day")).' de '.$t.' de '.$y.')</h2>';
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