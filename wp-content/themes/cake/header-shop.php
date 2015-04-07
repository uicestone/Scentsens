<?php
/**
 * The Header for our theme.
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->

<!-- head -->
<head>

<!-- meta -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php if( mfn_opts_get('responsive') ) echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">'; ?>

<title><?php
if( mfn_title() ){
	echo mfn_title();
} else {
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'cake' ), max( $paged, $page ) );
}
?></title>

<?php do_action('wp_seo'); ?>

<link rel="shortcut icon" href="<?php mfn_opts_show('favicon-img',THEME_URI .'/images/favicon.ico'); ?>" type="image/x-icon" />	

<!-- wp_head() -->
<?php wp_head();?>
</head>

<!-- body -->
<body <?php body_class( 'with_aside aside_right' ); ?>>
	
	<!-- #Wrapper -->
	<div id="Wrapper">
	
		<?php get_template_part( 'includes/header', 'action-bar' ); ?>
	
		<!-- #Header -->
		<header id="Header">
	
			<?php get_template_part( 'includes/header', 'top-area' ); ?>
			
			<?php 
				echo '<div id="Subheader">';
					echo '<div class="container">';
						echo '<div class="column one">';
						
							// Title
							echo '<h1 class="title">';
								woocommerce_page_title();
							echo '</h1>';
							add_filter( 'woocommerce_show_page_title', create_function( false, 'return false;' ) );
							
							// Breadcrumbs
							if( mfn_opts_get('show-breadcrumbs') ){
								$home = mfn_opts_get('translate') ? mfn_opts_get('translate-home','Home') : __('Home','cake');
								$woo_crumbs_args = apply_filters( 'woocommerce_breadcrumb_defaults', array(
									'delimiter'   => '<li><span><i class="icon-right-open"></i></span></li>',
									'wrap_before' => '<ul class="breadcrumbs woocommerce-breadcrumb">',
									'wrap_after'  => '</ul>',
									'before'      => '<li>',
									'after'       => '</li>',
									'home'        => $home,
								) );
								woocommerce_breadcrumb( $woo_crumbs_args );
							}
	
						echo '</div>';
					echo '</div>';
				echo '</div>';
			?>
	
		</header>