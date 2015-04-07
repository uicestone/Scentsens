<?php
/**
 * The template for displaying content in the single-portfolio.php template
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */

// prev & next post -------------------
$post_prev = get_adjacent_post(false,'',true)  ? get_permalink(get_adjacent_post(false,'',true))  : false;
$post_next = get_adjacent_post(false,'',false) ? get_permalink(get_adjacent_post(false,'',false)) : false;
$portfolio_page_id = mfn_opts_get( 'portfolio-page' );

// categories -------------------------
$categories 	= '';
$aCategories 	= '';

$terms = get_the_terms( get_the_ID(), 'portfolio-types' );
if( is_array( $terms ) ){
	foreach( $terms as $term ){
		$categories		.= '<a href="'. site_url() .'/portfolio-types/'. $term->slug .'">'. $term->name .'</a>, ';
		$aCategories[]	= $term->term_id;  
	}
	$categories = substr( $categories , 0, -2 );
}

$translate['categories'] = mfn_opts_get('translate') ? mfn_opts_get('translate-categories','Categories') : __('Categories','cake');
?>

<div id="portfolio-item-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="section section-portfolio-header">
		<div class="section_wrapper clearfix">
	
			<div class="column one portfolio-meta">
				<div class="categories">
					<span class="label"><?php echo $translate['categories']; ?>: </span><?php echo $categories; ?>
				</div>
				
				<ul class="next-prev-nav">
					<?php if( $post_prev ): ?>
						<li class="prev"><a class="button button_icon" href="<?php echo $post_prev; ?>"><i class="icon-left-open"></i></a></li>
					<?php endif; ?>
					<?php if( $post_next ): ?>
						<li class="next"><a class="button button_icon" href="<?php echo $post_next ?>"><i class="icon-right-open"></i></a></li>
					<?php endif; ?>
					<?php if( $portfolio_page_id ): ?>
						<li class="list"><a class="button button_icon" href="<?php echo get_page_link( $portfolio_page_id ); ?>"><i class="icon-menu"></i></a></li>
					<?php endif; ?>
				</ul>
			</div>
	
			<div class="column one photo">
				<?php 
					if( $portfolio_slider = get_post_meta( get_the_ID(), 'mfn-post-slider', true ) ){

						// Revolution Slider
						putRevSlider( $portfolio_slider );
						
					} elseif ( $video = get_post_meta( get_the_ID(), 'mfn-post-video', true ) ){

						// Video - Vimeo || YouTube
						if( is_numeric($video) ){
							echo '<iframe class="scale-with-grid" src="http://player.vimeo.com/video/'. $video .'" allowFullScreen></iframe>'."\n";
						} else {
							echo '<iframe class="scale-with-grid" src="http://www.youtube.com/embed/'. $video .'?wmode=opaque" allowfullscreen></iframe>'."\n";
						}
						
					} elseif( get_post_meta( get_the_ID(), 'mfn-post-video-mp4', true ) ){
	
						// Video - HTML5
						echo mfn_jplayer( get_the_ID(), 'blog' );
						
					} elseif ( has_post_thumbnail() ){

						// Image
						the_post_thumbnail( 'blog', array('class'=>'scale-with-grid' ));
						
					}
				?>
			</div>
			
		</div>
	</div>
	
	<?php
		// Content Builder & WordPress Editor Content
		mfn_builder_print( get_the_ID() );
	?>

	<div class="section section-portfolio-related">
		<div class="section_wrapper clearfix">
			
			<?php
				if( $aCategories ){
					$args = array(
						'post_type' 			=> 'portfolio',
						'tax_query' => array(
							array(
								'taxonomy'	=> 'portfolio-types',
								'terms'		=> $aCategories
							),
						),
						'post__not_in'			=> array( get_the_ID() ),
						'posts_per_page'		=> 3,
						'post_status'			=> 'publish',
						'no_found_rows'			=> true,
						'ignore_sticky_posts'	=> true,
					);

					$query_related_posts = new WP_Query( $args );
					while ( $query_related_posts->have_posts() ){
						$query_related_posts->the_post();
						
						echo '<div class="column one-third post-related '. implode(' ',get_post_class()).'">';	
							
							if( has_post_thumbnail() ){
								echo '<a class="photo_mask" href="'. get_permalink() .'">';
									echo '<div class="mask"></div>';
										echo '<span class="button_image more"><i class="icon-link"></i></span>';
									echo get_the_post_thumbnail( get_the_ID(), 'portfolio-list', array('class'=>'scale-with-grid' ) );
								echo '</a>';
							}
						
							echo '<div class="desc">';
								echo '<span class="date"><i class="fa-clock-o"></i> '. get_the_date() .'</span>';
								echo '<h6><a href="'. get_permalink() .'">'. get_the_title() .'</a></h6>';
							echo '</div>';
							
						echo '</div>';
					}	
					wp_reset_postdata();
				}	
			?>
			
		</div>
	</div>
	
</div>