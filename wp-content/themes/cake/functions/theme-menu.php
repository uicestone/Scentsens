<?php
/**
 * Menu functions.
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */


/* ---------------------------------------------------------------------------
 * Registers a menu location to use with navigation menus.
 * --------------------------------------------------------------------------- */
register_nav_menu( 'main-menu',		__( 'Main Menu', 'mfn-opts' ) );
register_nav_menu( 'top-bar-menu',	__( 'Action Bar Menu', 'mfn-opts' ) );


/* ---------------------------------------------------------------------------
 * Main Menu
 * --------------------------------------------------------------------------- */
function mfn_wp_nav_menu( $location = 'main-menu' ) 
{
	$args = array( 
		'container' 		=> 'nav',
		'container_id'		=> 'menu', 
		'menu_class'		=> 'menu', 
		'fallback_cb'		=> 'mfn_wp_page_menu', 
		'theme_location'	=> $location,
		'depth' 			=> 3,
		'link_before'     	=> '<span>',
		'link_after'      	=> '</span>',
		'walker' 			=> new Walker_Nav_Menu_Mfn,
	);
	wp_nav_menu( $args ); 
}

function mfn_wp_page_menu() 
{
	$args = array(
		'title_li' => '0',
		'sort_column' => 'menu_order',
		'depth' => 3
	);

	echo '<nav id="menu">'."\n";
		echo '<ul class="menu">'."\n";
			wp_list_pages($args); 
		echo '</ul>'."\n";
	echo '</nav>'."\n";
}


/* ---------------------------------------------------------------------------
 * Top Bar menu
 * --------------------------------------------------------------------------- */
function mfn_wp_top_bar_menu()
{
	$args = array(
		'container' 		=> false,
		'fallback_cb'		=> false,
		'menu_class'		=> 'top-bar-menu',
		'theme_location' 	=> 'top-bar-menu',
		'depth'				=> 1,
	);
	wp_nav_menu( $args );
}

?>