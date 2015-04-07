<?php
/**
 * The template for displaying content in the template-portfolio.php template
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */

if( ! function_exists( 'mfn_content_portfolio' ) )
{
	function mfn_content_portfolio( $query = false ){
		global $wp_query;
		$output = '';
		
		if( ! $query ) $query = $wp_query;
		
		if ( $query->have_posts() ){
			while ( $query->have_posts() ){
				$query->the_post();
				
				$item_class = '';
				$categories = '';
				
				$terms = get_the_terms(get_the_ID(),'portfolio-types');
				if( is_array( $terms ) ){
					foreach( $terms as $term ){
						$item_class .= 'category-'. $term->slug . ' ';
						$categories .= '<a href="'. site_url() .'/portfolio-types/'. $term->slug .'">'. $term->name .'</a>, ';
					}
					$item_class = substr( $item_class , 0, -1 );
					$categories = substr( $categories , 0, -2 );
				}
				
				$output .= '<li class="portfolio-item '. $item_class .'">';
				
					$output .= '<div class="photo">';
						$output .= '<a class="photo-wrapper" href="'. get_permalink() .'">';
							$output .= get_the_post_thumbnail( get_the_ID(), 'portfolio-fs', array( 'class' => 'scale-with-grid' ) );
						$output .= '</a>';
						$output .= '<div class="hover-box">';
							$output .= '<h5>'. get_the_title() .'</h5>';
								$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
								$output .= '<a class="hover-button zoom prettyphoto" href="'. $large_image_url[0] .'"><i class="icon-search"></i></a>';
								$output .= '<a class="hover-button link" href="'. get_permalink() .'"><i class="icon-link"></i></a>';
						$output .= '</div>';
					$output .= '</div>';
					
					$output .= '<div class="desc">';
						
						if( $categories && get_post_meta(get_the_ID(), 'mfn-post-categories', true) ){
							$output .= '<div class="categories">';
								$output .= $categories;
							$output .= '</div>';
						}
						
						$output .= '<h3><a href="'. get_permalink() .'">'. get_the_title() .'</a></h3>';
						$output .= '<hr class="hr_left" />';
						
						$output .= '<div class="desc-wrapper">';
							$output .= get_the_excerpt();
						$output .= '</div>';
					$output .= '</div>';
					
				$output .= '</li>';
				
			}
		}
		
		return $output;
	}
}

?>