<!-- #Action_bar -->
<?php 
	if( has_nav_menu( 'top-bar-menu' ) || mfn_opts_get( 'top-bar-phone' ) || mfn_opts_get( 'top-bar-email' )){
		echo '<div id="Action_bar">';
		
			// top bar menu
			mfn_wp_top_bar_menu();
			
			// contact info
			echo '<div class="contact_info">';
				if( mfn_opts_get('top-bar-phone') ) echo '<p class="phone"><i class="icon-phone"></i><a href="tel:'. mfn_opts_get('top-bar-phone') .'">'. mfn_opts_get('top-bar-phone') .'</a></p>';
				if( mfn_opts_get('top-bar-email') ) echo '<p class="mail"><i class="icon-mail-line"></i><a href="mailto:'. mfn_opts_get('top-bar-email') .'">'. mfn_opts_get('top-bar-email') .'</a></p>';				
			echo '</div>';
			
		echo '</div>';
	}
?>