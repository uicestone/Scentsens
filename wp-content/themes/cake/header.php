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
<body <?php body_class(); ?>>
	
	<!-- #Wrapper -->
	<div id="Wrapper">
	
		<?php get_template_part( 'includes/header', 'action-bar' ); ?>
		
		<!-- #Header -->
		<header id="Header">
	
			<?php get_template_part( 'includes/header', 'top-area' ); ?>
			
			<?php 
				if( is_404() ){

					// Error 404 ------------------------------
					echo '<div id="Subheader">';
						echo '<div class="container">';
							echo '<div class="column one">';
								echo '<h1 class="title">'. __( 'Error 404', 'cake' ) .'</h1>';
							echo '</div>';
						echo '</div>';
					echo '</div>';

				} elseif( is_search() ){
					
					// Page title -------------------------
					echo '<div id="Subheader">';
						echo '<div class="container">';
							echo '<div class="column one">';
							
								global $wp_query;
								$total_results = $wp_query->found_posts;
								echo '<h1 class="title">'. $total_results .' results found for: '. get_search_query() .'</h1>';
														
								// Breadcrumbs
								if( mfn_opts_get('show-breadcrumbs') ){
									mfn_breadcrumbs();
								}
								
							echo '</div>';
						echo '</div>';
					echo '</div>';
					
				} else {

					if( ( $slider = mfn_get_slider_key() ) && function_exists( 'putRevSlider' ) ){
		
						// Revolution Slider ------------------
						echo '<div id="mfn-rev-slider">';
							putRevSlider( $slider );
						echo '</div>';
						
					} elseif( trim( wp_title( '', false ) ) ){
		
						// Subheader Featured Image -----------
						$subheader_style 	= '';
						$subheader_id		= get_the_ID();
							
						if ( get_post_type()=='post' && ! is_singular() ) {
							$subheader_id = get_option( 'page_for_posts' );
						}
							
						if( ( ( $subheader_id == get_option('page_for_posts') ) || ( get_post_type() == 'page' ) ) && has_post_thumbnail($subheader_id) ){
							$subheader_image = wp_get_attachment_image_src( get_post_thumbnail_id($subheader_id), 'full' );
							$subheader_style = 'style="background-image:url('. $subheader_image[0] .');"';
						}
						
						// Page title -------------------------
						echo '<div id="Subheader" '. $subheader_style .'>';
							echo '<div class="container">';
								echo '<div class="column one">';
									
									// Title
									if( get_post_type()=='page' || is_single() ){
										echo '<h1 class="title">'. $post->post_title .'</h1>';
									} else {
										echo '<h1 class="title">'. trim( wp_title( '', false ) ) .'</h1>';
									}
									
									// Breadcrumbs
									if( mfn_opts_get('show-breadcrumbs') ){
										mfn_breadcrumbs();
									}
									
								echo '</div>';
							echo '</div>';
						echo '</div>';
						
					}
					
				}
			?>
	
		</header>