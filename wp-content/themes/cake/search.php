<?php
/**
 * The search template file.
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */

get_header();

$translate['by'] = mfn_opts_get('translate') ? mfn_opts_get('translate-by','By') : __('By','cake');
?>

<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- .sections_group -->
		<div class="sections_group" style="width:100% !important;">
		
			<div class="section">
				<div class="section_wrapper clearfix">
				
					<div class="column one column_blog">	
						<div class="blog_wrapper isotope_wrapper classic">
			
							<div class="posts_group">
								<?php
									while( have_posts() )
									{
										the_post();
										?>
										<div id="post-<?php the_ID(); ?>" <?php post_class(array('column','one','no-img')); ?>>
											<div class="post-desc-wrapper">
												
												<div class="post-desc">
												
													<div class="post-title">
														<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
													</div>
													
													<div class="post-excerpt">
														<?php the_excerpt(); ?>
													</div>

													<div class="post-meta">
														<?php
															if( mfn_opts_get( 'blog-meta' ) ){
																echo '<div class="author">'. $translate['by'] .' <a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .'">'. get_the_author_meta( 'display_name' ) .'</a></div>';
																echo '<div class="date">'. get_the_date() .'</div>';
															}
														?>
														<hr class="hr_narrow hr_left" />
													</div>
	
													<div class="post-footer">
														<?php if( $blog_readmore = mfn_opts_get( 'blog-readmore' ) ) echo '<a href="'. get_permalink() .'" class="post-more">'. __( $blog_readmore,'cake' ) .'</a>'; ?>
													</div>
						
												</div>
												
											</div>
										</div>
										<?php
									}
								?>
							</div>
					
							<?php	
								// pagination
								if(function_exists( 'mfn_pagination' )):
									echo mfn_pagination();
								else:
									?>
										<div class="nav-next"><?php next_posts_link(__('&larr; Older Entries', 'cake')) ?></div>
										<div class="nav-previous"><?php previous_posts_link(__('Newer Entries &rarr;', 'cake')) ?></div>
									<?php
								endif;
							?>
					
						</div>
					</div>
					
				</div>
			</div>
			
		</div>

	</div>
</div>

<?php get_footer(); ?>