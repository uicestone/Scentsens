<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */

// prev & next post -------------------
$post_prev = get_adjacent_post(false,'',true)  ? get_permalink(get_adjacent_post(false,'',true))  : false;
$post_next = get_adjacent_post(false,'',false) ? get_permalink(get_adjacent_post(false,'',false)) : false;
$blog_page_id = get_option('page_for_posts');

$translate['by'] = mfn_opts_get('translate') ? mfn_opts_get('translate-by','By') : __('By','cake');
$translate['in'] = mfn_opts_get('translate') ? mfn_opts_get('translate-in','In') : __('In','cake');
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="section section-post-header">
		<div class="section_wrapper clearfix">
			
			<div class="column one portfolio-meta">
				
				<div class="post-buttons-wrapper">
					<div class="button-comments"><a href="<?php echo get_comments_link() ?>"><span class="icons-wrapper"><i class="icon-comment-empty-fa"></i><i class="icon-comment-fa"></i></span><span class="label"><?php echo get_comments_number() ?></span></a></div>
					<div class="button-love"><?php echo mfn_love() ?></div>
				</div>
					
				<ul class="next-prev-nav">
					<?php if( $post_prev ): ?>
						<li class="prev"><a class="button button_icon" href="<?php echo $post_prev; ?>"><i class="icon-left-open"></i></a></li>
					<?php endif; ?>
					<?php if( $post_next ): ?>
						<li class="next"><a class="button button_icon" href="<?php echo $post_next ?>"><i class="icon-right-open"></i></a></li>
					<?php endif; ?>
					<?php if( $blog_page_id ): ?>
						<li class="list"><a class="button button_icon" href="<?php echo get_permalink( $blog_page_id ); ?>"><i class="icon-menu"></i></a></li>
					<?php endif; ?>
				</ul>
			</div>
		
			<div class="column one post-photo-wrapper">
				<div class="post-photo">
					<?php echo mfn_post_thumbnail( get_the_ID(), true ); ?>
				</div>
			</div>
			
		</div>
	</div>

	<div class="post-wrapper-content">
	
		<div class="section section-post-meta">
			<div class="section_wrapper clearfix">
				
				<div class="column one post-meta">
					<?php if( mfn_opts_get( 'blog-meta' ) ): ?>
						<div class="author"><?php echo $translate['by']; ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a></div>
						<div class="category"><?php echo $translate['in']; ?> <?php echo get_the_category_list(', '); ?></div>
						<div class="date"><?php echo get_the_date(); ?></div>
					<?php endif; ?>
					<hr class="hr_narrow hr_left" />
				</div>
				
			</div>
		</div>

		<?php
			// Content Builder & WordPress Editor Content
			mfn_builder_print( $post->ID );	
		?>

		<div class="section section-post-footer">
			<div class="section_wrapper clearfix">
			
				<div class="column one post-pager">
					<?php
						// List of pages
						wp_link_pages(array(
							'before'			=> '<div class="pager-single">',
							'after'				=> '</div>',
							'link_before'		=> '<span>',
							'link_after'		=> '</span>',
							'next_or_number'	=> 'number'
						));
					?>
				</div>
				
			</div>
		</div>
		
		<div class="section section-post-about">
			<div class="section_wrapper clearfix">
			
				<?php if( mfn_opts_get( 'blog-author' ) ): ?>
				<div class="column one author-box">
					<div class="author-box-wrapper">
						<div class="avatar-wrapper">
							<?php 
								global $user;
								echo get_avatar( get_the_author_meta('email'), '64', false, get_the_author_meta('display_name', $user['ID']) );
							?>
						</div>
						<div class="desc-wrapper">
							<h6><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a></h6>
							<div class="desc"><?php the_author_meta('description'); ?></div>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>	
		</div>
		
	</div>
			
	<div class="section section-post-related">
		<div class="section_wrapper clearfix">
			<div class="section-related-adjustment">
			
				<?php
					if( mfn_opts_get( 'blog-related' ) && $aCategories = wp_get_post_categories( get_the_ID() ) ){
	
						$args = array(
							'category__in'			=> $aCategories,
							'ignore_sticky_posts'	=> true,
							'no_found_rows'			=> true,
							'post__not_in'			=> array( get_the_ID() ),
							'posts_per_page'		=> 3,
							'post_status'			=> 'publish',
						);
	
						$query_related_posts = new WP_Query( $args );
						if( $query_related_posts->have_posts() ){
							while ( $query_related_posts->have_posts() ){
								$query_related_posts->the_post();
								
								echo '<div class="column one-third post-related '. implode(' ',get_post_class()).'">';	
									
									if( get_post_format() == 'quote'){
										echo '<div class="bq_wrapper">';
											echo '<blockquote>';
												echo '<a href="'. get_permalink() .'">';
													the_title();
												echo '</a>';
											echo '</blockquote>';
										echo '</div>';
									} elseif( has_post_thumbnail() ){
										echo '<a class="photo_mask" href="'. get_permalink() .'">';
											echo '<div class="mask"></div>';
											echo '<span class="button_image more"><i class="icon-link"></i></span>';
											echo get_the_post_thumbnail( get_the_ID(), 'portfolio-list', array('class'=>'scale-with-grid' ) );
										echo '</a>';
									}
								
									echo '<div class="desc">';
										echo '<span class="date"><i class="fa-clock-o"></i> '. get_the_date() .'</span>';
										if( get_post_format() != 'quote') echo '<h6><a href="'. get_permalink() .'">'. get_the_title() .'</a></h6>';
									echo '</div>';
									
								echo '</div>';
							}	
						}
						wp_reset_postdata();
					}	
				?>
			
			</div>
		</div>
	</div>
	
	<div class="section section-post-comments">
		<div class="section_wrapper clearfix">
		
			<div class="column one comments">
				<?php comments_template( '', true ); ?>
			</div>
			
		</div>
	</div>

</div>