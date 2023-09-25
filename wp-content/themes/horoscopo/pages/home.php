<?php

/**
 * Horoscopo
 *
 * Horoscopo
 *
 * Template Name: Home
 *
 * @package Horoscopo
 * @author  Horoscopo
 * @license GPL-2.0+
 * @link    http://www.paradoja.com/
 */

add_action('genesis_before_content_sidebar_wrap', 'list_horoscopo');
function list_horoscopo(){
	echo '<div class="before-home-content">';
		echo '<div class="wrap">';
			echo '<h2>'.get_field('titulo').'</h2>';
			echo '<div class="banner-propaganda" style="text-align:center;">'.get_field('anuncio_superior_largo', 'option').'</div>';
			if( have_rows('signos') ):
			 	// loop through the rows of data
			 	echo '<div class="signos-container">';
			 		echo '<div class="row">';
				    while ( have_rows('signos') ) : the_row();
				        // display a sub field value
				        echo '<div class="col-lg-2 col-md-3 col-sm-4 col-hr-6">';
				        	echo '<div class="signo-dsc">';
				        		$class = get_sub_field('titulo_del_signo');
				        		echo '<div class="img"><a href="'.get_sub_field('link_del_signo')['url'].'" class="img-signo '.strtolower(eliminar_simbolos($class)).'"></a></div>';
				        		echo '<h3><a href="'.get_sub_field('link_del_signo')['url'].'">'.get_sub_field('titulo_del_signo').'</a></h3>';
				        		echo '<div class="section-signos">';
				        			$hoy = get_sub_field('link_hoy');
				        			$mn = get_sub_field('link_manana');
				        			$semana = get_sub_field('link_semanal');
				        			echo '<a href="'.$hoy['url'].'">'.$hoy['title'].'</a>';
				        			echo '<a href="'.$mn['url'].'">'.$mn['title'].'</a>';
				        			echo '<a href="'.$semana['url'].'">'.$semana['title'].'</a>';
				        		echo '</div>';
				        		echo '<div class="fecha-signo">'.get_sub_field('fechas').'</div>';
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