<?php

/**
 * Horoscopo
 *
 * Horoscopo
 *
 * Template Name: Signo
 *
 * @package Horoscopo
 * @author  Horoscopo
 * @license GPL-2.0+
 * @link    http://www.paradoja.com/
 */
//* Remove the post content (requires HTML5 theme support)

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

add_action('genesis_before_content_sidebar_wrap', 'signo_horoscopo');
function signo_horoscopo(){
	echo '<div class="before-signo-content">';
		echo '<div class="wrap">';
		if( has_post_thumbnail($post_array->ID) ) {
	        $image_arr = wp_get_attachment_image_src(get_post_thumbnail_id($post_array->ID), 'medium');
	        $image_url = $image_arr[0];
		}
			$seccion_superior = get_field('seccion_superior');
			$seccion_inferior = get_field('seccion_inferior');
			echo "<h2>Horóscopo ".get_the_title()."</h2><img src='".$image_url."' class='feature-signo'>";
			echo '<p>('.$seccion_superior['fecha_comienzo'].')</p>';
			echo '<div class="row">';
				echo '<div class="col-md-h col-md-4">';
				echo '<div class="banner-propaganda">';
					echo  '<div>'.get_field('horoscopo_side_1', 'option').'</div>';
					echo  '<div>'.get_field('horoscopo_side_2', 'option').'</div>';
				echo '</div>';
				echo '</div>';
				echo '<div class="col-md-h col-md-8">';
				echo '<table class="signo">
					<thead>
						<tr>
							<td>'.$seccion_superior['simboliza_titulo'].'</td>
							<td>'.apply_filters('the_content',$seccion_superior['simboliza']).'</td>
						</tr>
					</thead>
					<tbody>
					<tr>
					<td>'.$seccion_superior['elemento_titulo'].'</td>
					<td>'.$seccion_superior['elemento'].'</td>
					</tr>
					<tr>
						<td>'.$seccion_superior['cualidad_titulo'].'</td>
						<td>'.$seccion_superior['cualidad'].'</td>
					</tr>
					<tr>
						<td>'.$seccion_superior['simbolo_titulo'].'</td>
						<td>'.$seccion_superior['simbolo'].'</td>
					</tr>
					<tr>
						<td>'.$seccion_superior['constelacion_titulo'].'</td>
						<td>'.$seccion_superior['constelacion'].'</td>
					</tr>
					<tr>
						<td>'.$seccion_superior['planeta_titulo'].'</td>
						<td>'.$seccion_superior['planeta'].'</td>
					</tr>
					<tr>
						<td>'.$seccion_superior['caracter_titulo'].'</td>
						<td>'.$seccion_superior['caracter'].'</td>
					</tr>
					<tr>
						<td>'.$seccion_superior['orden_titulo'].'</td>
						<td>'.$seccion_superior['orden'].'</td>
					</tr>
					<tr>
						<td>'.$seccion_superior['color_titulo'].'</td>
						<td>'.$seccion_superior['color'].'</td>
					</tr>
					</tbody>
				</table>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
	?>
	<section class="anuncios">
		<div class="wrap">
			<div class="anuncios">
				<?php echo $seccion_inferior['contenido_1']; ?>
				<?php
				if (get_field('horoscopo_post_1', 'option')) {
					?>
					<div class="banner-propaganda" style="text-align:center;"><?php echo get_field('horoscopo_post_1', 'option'); ?></div>
					<?php
				}
				?>
				<?php echo $seccion_inferior['contenido_2']; ?>
				<?php
				if (get_field('horoscopo_post_2', 'option')) {
					?>
					<div class="banner-propaganda" style="text-align:center;"><?php echo get_field('horoscopo_post_2', 'option'); ?></div>
					<?php
				}
				?>
				<?php echo $seccion_inferior['contenido_3']; ?>
			</div>
		</div>
	</section>
	<?php
}

// second menu signos
add_action('genesis_before_footer', 'menu_signos_footer');
function menu_signos_footer(){
	$seccion_inferior = get_field('seccion_inferior');
	echo '<div class="nav-primary footer">';
		echo '<div class="wrap">';
			echo '
			<ul>
				<li><a href="'.$seccion_inferior['link_hoy'].'" title="">HORÓSCOPO '.get_the_title().' HOY</a></li>
				<li><a href="'.$seccion_inferior['link_manana'].'" title="">HORÓSCOPO '.get_the_title().' MAÑANA</a></li>
				<li><a href="'.$seccion_inferior['link_semanal'].'" title="">HORÓSCOPO '.get_the_title().' SEMANAL</a></li>
			</ul>';
		echo '</div>';
	echo '</div>';
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