<?php
/**
 * Template Name: Portfolio
 * Description: A Page Template that display portfolio items.
 *
 * @package Cake
 * @author Muffin Group
 */

get_header(); 
$portfolio_classes = '';

// layout
if( $_GET && key_exists('mfn-p', $_GET) ){
	$portfolio_classes .= $_GET['mfn-p']; // demo
} else {
	$portfolio_classes .= mfn_opts_get( 'portfolio-layout', 'one' );
}

// isotope
if( $_GET && key_exists('mfn-iso', $_GET) ){
	$portfolio_classes .= ' isotope'; // demo
	$iso = true;
} elseif(  mfn_opts_get( 'portfolio-isotope' ) ) {
	$portfolio_classes .= ' isotope';
	$iso = true;
} else {
	$iso = false;
}
			
$translate['categories'] = mfn_opts_get('translate') ? mfn_opts_get('translate-categories','Categories') : __('Categories','cake');
$translate['all'] = mfn_opts_get('translate') ? mfn_opts_get('translate-all','All') : __('All','cake');
?>

<!-- #Filters -->
<div id="Filters" <?php if( $iso ) echo 'class="isotope-filters"'; ?>>
	<div class="container">
		<div class="column one">
		
			<ul class="filters_buttons">
				<li class="categories"><a class="button open" href="#"><i class="icon-docs"></i> <?php echo $translate['categories']; ?></a></li>
				<?php 
					$portfolio_page_id = mfn_opts_get( 'portfolio-page' );
					echo '<li class="reset"><a class="button close" data-rel="*" href="'.get_page_link( $portfolio_page_id ).'"><i class="icon-cancel"></i> '. $translate['all'] .'</a></li>';
				?>
			</ul>
			
			<div class="filters_wrapper">
				<ul class="categories">
					<?php 
						if( $portfolio_categories = get_terms('portfolio-types') ){
							foreach( $portfolio_categories as $category ){
								echo '<li><a data-rel=".category-'. $category->slug .'" href="'. get_term_link($category) .'">'. $category->name .'</a></li>';
							}
						}
					?>
					<li class="close"><a href="#"><i class="icon-cancel"></i></a></li>
				</ul>
			</div>
			
		</div>
	</div>
</div>

<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- .sections_group -->
		<div class="sections_group">
		
			<div class="section">
				<div class="section_wrapper clearfix">
					
					<div class="column one column_portfolio">	
						<div class="portfolio_wrapper isotope_wrapper">
	
							<?php 
								$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );
								$portfolio_args = array( 
									'post_type' 			=> 'portfolio',
									'posts_per_page' 		=> mfn_opts_get( 'portfolio-posts', 6 ),
									'paged' 				=> $paged,
									'order' 				=> mfn_opts_get( 'portfolio-order', 'DESC' ),
								    'orderby' 				=> mfn_opts_get( 'portfolio-orderby', 'date' ),
									'ignore_sticky_posts' 	=> 1,
								);
				
								// demo
								if( $_GET && key_exists('mfn-p', $_GET) && ( $_GET['mfn-p'] == 'one-fourth' ) ) $portfolio_args['posts_per_page'] = 8;
								if( $_GET && key_exists('mfn-iso', $_GET) ) $portfolio_args['posts_per_page'] = 9;
								
								$portfolio_query = new WP_Query( $portfolio_args );
				
							 	echo '<ul class="portfolio_group '. $portfolio_classes .'">';
							 		echo mfn_content_portfolio( $portfolio_query );
								echo '</ul>';
				
								echo mfn_pagination( $portfolio_query );
	
							 	wp_reset_query(); 
							?>
							
						</div>
					</div>
					
				</div>
			</div>

		</div>
		
		<!-- .four-columns - sidebar -->
		<?php get_sidebar(); ?>
			
	</div>
</div>

<?php get_footer(); ?>