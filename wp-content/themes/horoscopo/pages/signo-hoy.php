<?php

/**
 * Horoscopo
 *
 * Horoscopo
 *
 * Template Name: Signo Hoy
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
	// Get the numeric representation of the current month
//$m = date('n');
//$d = date('D');

$ctime = current_time('y-m-d');
$unixTimestamp = strtotime($ctime);
$dayOfWeek = date("l", $unixTimestamp);
$m = current_time('n');
//echo $dayOfWeek;
//echo $m;
	if ($dayOfWeek == 'Sunday') { $dw = "domingo"; }
	if ($dayOfWeek == 'Monday') { $dw = "lunes"; }
	if ($dayOfWeek == 'Tuesday') { $dw = "martes"; }
	if ($dayOfWeek == 'Wednesday') { $dw = "miercoles"; }
	if ($dayOfWeek == 'Thursday') { $dw = "jueves"; }
	if ($dayOfWeek == 'Friday') { $dw = "viernes"; }
	if ($dayOfWeek == 'Saturday') { $dw = "sabado"; }

	/*if ($d=="Mon")  { $dw = "lunes"; }
	if ($d=="Tue")  { $dw = "martes"; }
	if ($d=="Wed")  { $dw = "miercoles"; }
	if ($d=="Thu")  { $dw = "jueves"; }
	if ($d=="Fri")  { $dw = "viernes"; }
	if ($d=="Sat")  { $dw = "dabado"; }
	if ($d=="Sun")  { $dw = "domingo"; }*/
	
		// Get a full textual representation of the month ( in norwegian )
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

		// Display the date
		$hoy=get_field('hoy');
		$fecha=$hoy['fecha'];
		$anuncio=$hoy['anuncio'];
		

		$parent_id = wp_get_post_parent_id(get_the_ID());

		$lunes=get_field('lunes', $parent_id);
		$martes=get_field('martes', $parent_id);
		$miercoles=get_field('miercoles', $parent_id);
		$jueves=get_field('jueves', $parent_id);
		$viernes=get_field('viernes', $parent_id);
		$sabado=get_field('sabado', $parent_id);
		$domingo=get_field('domingo', $parent_id);

		//$field = get_field_object($lunes);

	//echo $dw;

	echo '<div class="before-signo-content hoy">';
		echo '<div class="wrap">';
		if( has_post_thumbnail($post_array->ID) ) {
	        $image_arr = wp_get_attachment_image_src(get_post_thumbnail_id($post_array->ID), 'medium');
	        $image_url = $image_arr[0];
		}
			echo "<h2>Horóscopo ".get_the_title()."</h2><img class='img-t' src='".$image_url."'> <p> (".$dw.", ".date('d')." de ".$t." de ".date('Y').")";
			echo "<p>(".$fecha.")</p>";
			echo '<div class="row">';
				echo '<div class="col-md-4">';
					echo '<div class="banner-propaganda">';
						echo  '<div>'.get_field('anuncios_signos_hoy_manana_semanal', 'option').'</div>';
						//echo $field['label'];
					echo '</div>';
				echo '</div>';
				echo '<div class="col-md-8">';
					echo '<div class="box-hoy">';
					if( $dw=="lunes" ){
						echo $lunes ;
					}
					if( $dw=="martes" ){
						echo $martes ;
					}
					if( $dw=="miercoles" ){
						echo $miercoles ;
					}
					if( $dw=="jueves" ){
						echo $jueves ;
					}
					if( $dw=="viernes" ){
						echo $viernes ;
					}
					if( $dw=="sabado" ){
						echo $sabado ;
					}
					if( $dw=="domingo" ){
						echo $domingo ;
					}
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