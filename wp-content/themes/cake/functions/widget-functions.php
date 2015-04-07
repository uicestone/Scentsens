<?php
/**
 * Theme widgets and sidebars.
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */


/* ---------------------------------------------------------------------------
 * New widgets
 * --------------------------------------------------------------------------- */
function mfn_register_widget()
{
	register_widget('Mfn_Flickr_Widget');
	register_widget('Mfn_Menu_Widget');
	register_widget('Mfn_Recent_Comments_Widget');
	register_widget('Mfn_Recent_Posts_Widget');
	register_widget('Mfn_Tag_Cloud_Widget');
}
add_action('widgets_init','mfn_register_widget');


/* ---------------------------------------------------------------------------
 * Add custom sidebars
 * --------------------------------------------------------------------------- */
function mfn_register_sidebars() {

	// custom sidebars -------------------------------------------------------
	$sidebars = mfn_opts_get( 'sidebars' );
	if(is_array($sidebars))
	{
		foreach ($sidebars as $sidebar)
		{	
			register_sidebar( array (
				'name' 			=> $sidebar,
				'id' 			=> 'sidebar-'. str_replace("+", "-", urlencode(strtolower($sidebar))) ,
				'description'	=> __('Custom sidebar created in Theme Options.','cake'),
				'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</aside>',
				'before_title'	=> '<h3>',
				'after_title'	=> '</h3>',
			));
		}	
	}
	
	// footer areas ----------------------------------------------------------
	for ($i = 1; $i <= 4; $i++)
	{
		register_sidebar(array(
			'name' 			=> __('Footer area','mfn-opts') .' #'.$i,
			'id' 			=> 'footer-area-'.$i,
			'description'	=> __('Appears in the footer section of the site.','cake'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</aside>',
			'before_title' 	=> '<h4>',
			'after_title' 	=> '</h4>',
		));
	}
	
	// footer call to action -------------------------------------------------
	register_sidebar(array(
		'name'          => __('Footer Call to Action', 'mfn-opts'),
		'id'            => 'footer-call-to-action',
		'description'	=> __('Appears in the footer section of the site above standard footer sidebars.','cake'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2><hr class="hr_narrow">',
	));
	
	// shop sidebar ----------------------------------------------------------
	register_sidebar(array(
		'name'          => __('WooCommerce', 'mfn-opts'),
		'id'            => 'shop',
		'description'	=> __('Main sidebar for WooCommerce pages that appears on the right.','cake'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));

}
add_action( 'widgets_init', 'mfn_register_sidebars' );

?>