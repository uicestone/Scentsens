<?php
/**
 * The template for displaying content in the index.php template
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */

if( ! function_exists( 'mfn_content_post' ) )
{
	function mfn_content_post( $query = false, $layout = false ){
		global $wp_query;
		$output = '';
		
		$translate['by'] = mfn_opts_get('translate') ? mfn_opts_get('translate-by','By') : __('By','cake');
		$translate['in'] = mfn_opts_get('translate') ? mfn_opts_get('translate-in','In') : __('In','cake');
	
		if( ! $query ) $query = $wp_query;
	
		if ( $query->have_posts() ){
			while ( $query->have_posts() ){
				$query->the_post();
				
				$post_class =  array('post-item','isotope-item','clearfix');
				if( ! mfn_post_thumbnail( get_the_ID() ) ) $post_class[] = 'no-img';
				$post_class = implode(' ', get_post_class( $post_class ));
				
				$output .= '<div class="'. $post_class .'">';
					
					$output .= '<div class="post-meta-modern">';
				
					$output .= '<div class="date">';
						$output .= '<span class="day">'. get_the_date("j") .'</span>';
							$output .= '<span class="month">'. get_the_date("F") .'</span>';
							$output .= '<span class="year">'. get_the_date("Y") .'</span>';
						$output .= '</div>';
				
						$output .= '<div class="button-comments"><a href="'. get_comments_link() .'"><span class="icons-wrapper"><i class="icon-comment-empty-fa"></i><i class="icon-comment-fa"></i></span><span class="label">'. get_comments_number() .'</span></a></div>';
						$output .= '<div class="button-love">'. mfn_love() .'</div>';
								
					$output .= '</div>';
					
					$output .= '<div class="post-photo-wrapper">';
						$output .= '<div class="post-photo">';
							$output .= mfn_post_thumbnail( get_the_ID(), false, $layout );							
						$output .= '</div>';
					$output .= '</div>';
				
					$output .= '<div class="post-desc-wrapper">';
						$output .= '<div class="post-desc">';
						
							$output .= '<div class="post-title">';				
								if( get_post_format() == 'quote' ){
									$output .= '<blockquote><a href="'. get_permalink() .'">'. get_the_title() .'</a></blockquote>';
								} else {
									$output .= '<h4><a href="'. get_permalink() .'">'. get_the_title() .'</a></h4>';
								}
							$output .= '</div>';
							
							$output .= '<div class="post-meta">';
								if( mfn_opts_get( 'blog-meta' ) ){
									$output .= '<div class="author">'. $translate['by'] .' <a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .'">'. get_the_author_meta( 'display_name' ) .'</a></div>';
									$output .= '<div class="category">'. $translate['in'] .' '. get_the_category_list(', ') .'</div>';
									$output .= '<div class="date">'. get_the_date() .'</div>';
								}
								$output .= '<hr class="hr_narrow hr_left" />';
							$output .= '</div>';
							
							$output .= '<div class="post-excerpt">'. do_shortcode( get_the_excerpt() ) .'</div>';
							
							$output .= '<div class="post-footer">';
				
								if( $blog_readmore = mfn_opts_get( 'blog-readmore' ) ) $output .= '<a href="'. get_permalink() .'" class="post-more">'. __( $blog_readmore,'cake' ) .'</a>';
						
								$output .= '<div class="button-comments"><a href="'. get_comments_link() .'"><span class="icons-wrapper"><i class="icon-comment-empty-fa"></i><i class="icon-comment-fa"></i></span><span class="label">'. get_comments_number() .'</span></a></div>';
								$output .= '<div class="button-love">'. mfn_love() .'</div>';
								
							$output .= '</div>';
							
						$output .= '</div>';
					$output .= '</div>';
				
				$output .= '</div>';
				
			}
		}
		
		return $output;
	}
}

?>