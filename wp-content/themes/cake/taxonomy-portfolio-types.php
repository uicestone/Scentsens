<?php
/**
 * Taxanomy Portfolio Types
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
} elseif(  mfn_opts_get( 'portfolio-isotope' ) ) {
	$portfolio_classes .= ' isotope';
}

$portfolio_page_id = mfn_opts_get( 'portfolio-page' );

$translate['categories'] = mfn_opts_get('translate') ? mfn_opts_get('translate-categories','Categories') : __('Categories','cake');
$translate['all'] = mfn_opts_get('translate') ? mfn_opts_get('translate-all','All') : __('All','cake');
?>

<!-- #Filters -->
<div id="Filters">
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
						$menu_args = array(
							'taxonomy' 		=> 'portfolio-types',
							'orderby' 		=> 'name',
							'order' 		=> 'ASC',
							'show_count' 	=> 0,
							'hierarchical' 	=> 1,
							'hide_empty' 	=> 0,
							'title_li' 		=> '',
							'depth' 		=> 1,
							'walker' 		=> new New_Walker_Category()
						);			
						wp_list_categories( $menu_args ); 
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
								$args = array(
									'post_type' 			=> 'portfolio',
									'posts_per_page' 		=> mfn_opts_get( 'portfolio-posts', 6 ),
									'paged' 				=> $paged,
									'order' 				=> mfn_opts_get( 'portfolio-order', 'DESC' ),
									'orderby' 				=> mfn_opts_get( 'portfolio-orderby', 'date' ),
									'taxonomy' 				=> 'portfolio-types',
									'ignore_sticky_posts' 	=> 1,
								);
									
								global $query_string;
								parse_str( $query_string, $qstring_array );
								$query_args = array_merge( $args, $qstring_array );

								$portfolio_types_query = new WP_Query( $query_args );
				
							 	echo '<ul class="portfolio_group '.$portfolio_classes.'">';
							 		echo mfn_content_portfolio( $portfolio_types_query );
								echo '</ul>';
				
								echo mfn_pagination( $portfolio_types_query );
	
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