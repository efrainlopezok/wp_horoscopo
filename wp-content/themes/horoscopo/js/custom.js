jQuery(document).ready(function(){
	//jQuery('#genesis-mobile-nav-primary').html('<div class="r-menu"><span></span><span></span><span></span></div>');
	var width_win = jQuery(window).width();
	if (width_win <= 860) {
		var  class_break = jQuery('.menu-menu-signos-container .menu .break').length;	
			if (class_break <= 0) {
				jQuery('.menu-menu-signos-container .menu .menu-item:nth-child(6)').after('<span class="break"></span>');	
			}
	}else{
		jQuery(".break").remove();	
	}
	jQuery( window ).resize(function() {
	 	var width_win = jQuery(window).width();
		if (width_win <= 860) {
			var  class_break = jQuery('.menu-menu-signos-container .menu .break').length;	
			if (class_break <= 0) {
				jQuery('.menu-menu-signos-container .menu .menu-item:nth-child(6)').after('<span class="break"></span>');	
			}
		}
		else{
			jQuery('.menu-menu-signos-container .menu .menu-item:nth-child(6)').after('<span class="break"></span>');
			jQuery(".break").remove();	
		}
	});
});
jQuery(window).on('load', function(){
	jQuery('#genesis-mobile-nav-primary').html('<div class="r-menu"><span></span><span></span><span></span></div>');
});