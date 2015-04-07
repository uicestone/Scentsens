<?php
/**
 * The template for displaying the footer.
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */
?>

	<!-- #Footer -->		
	<footer id="Footer" class="clearfix">
		
		<?php if ( is_active_sidebar( 'footer-call-to-action' ) ): ?>
		<div class="footer_action">
			<div class="container">
				<div class="column one column_column">
					<?php dynamic_sidebar( 'footer-call-to-action' ); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
	
		<div class="widgets_wrapper">
			<div class="container">
				<?php
					$sidebars_count = 0;	
					for( $i = 1; $i <= 4; $i++ ){
						if ( is_active_sidebar( 'footer-area-'. $i ) ) $sidebars_count++;
					}
				
					$sidebar_class = '';
					if( $sidebars_count > 0 ){
						switch( $sidebars_count ){
							case 2: $sidebar_class = 'one-second'; break; 
							case 3: $sidebar_class = 'one-third'; break; 
							case 4: $sidebar_class = 'one-fourth'; break;
							default: $sidebar_class = 'one';
						}
					}
				?>
				
				<?php 
					for( $i = 1; $i <= 4; $i++ ){
						if ( is_active_sidebar( 'footer-area-'. $i ) ){
							echo '<div class="'. $sidebar_class .' column">';
								dynamic_sidebar( 'footer-area-'. $i );
							echo '</div>';
						}
					}
				?>
		
			</div>
		</div>
		
		<div class="footer_copy">
			<div class="container">
				<div class="column one">
					<a id="back_to_top" href="#"><i class="icon-up-open-big"></i></a>
					
					<!-- Copyrights -->
					<div class="copyright">
						<?php 
							if( mfn_opts_get('footer-copy') ){
								mfn_opts_show('footer-copy');
							} else {
								echo '&copy; '. date( 'Y' ) .' '. get_bloginfo( 'name' ) .'. All Rights Reserved. <a target="_blank" rel="nofollow" href="http://muffingroup.com">Muffin group</a>';
							}
						?>
					</div>
					
					<!-- Social -->
					<div class="social">
						<ul>
							<?php if( mfn_opts_get('social-facebook') ): ?><li class="facebook"><a target="_blank" href="<?php mfn_opts_show('social-facebook'); ?>" title="Facebook"><i class="icon-facebook"></i></a></li><?php endif; ?>
							<?php if( mfn_opts_get('social-googleplus') ): ?><li class="googleplus"><a target="_blank" href="<?php mfn_opts_show('social-googleplus'); ?>" title="Google+"><i class="icon-gplus"></i></a></li><?php endif; ?>
							<?php if( mfn_opts_get('social-twitter') ): ?><li class="twitter"><a target="_blank" href="<?php mfn_opts_show('social-twitter'); ?>" title="Twitter"><i class="icon-twitter"></i></a></li><?php endif; ?>
							<?php if( mfn_opts_get('social-vimeo') ): ?><li class="vimeo"><a target="_blank" href="<?php mfn_opts_show('social-vimeo'); ?>" title="Vimeo"><i class="icon-vimeo"></i></a></li><?php endif; ?>
							<?php if( mfn_opts_get('social-youtube') ): ?><li class="youtube"><a target="_blank" href="<?php mfn_opts_show('social-youtube'); ?>" title="YouTube"><i class="icon-play"></i></a></li><?php endif; ?>
							<?php if( mfn_opts_get('social-flickr') ): ?><li class="flickr"><a target="_blank" href="<?php mfn_opts_show('social-flickr'); ?>" title="Flickr"><i class="icon-flickr"></i></a></li><?php endif; ?>
							<?php if( mfn_opts_get('social-linkedin') ): ?><li class="linked_in"><a target="_blank" href="<?php mfn_opts_show('social-linkedin'); ?>" title="LinkedIn"><i class="icon-linkedin"></i></a></li><?php endif; ?>
							<?php if( mfn_opts_get('social-pinterest') ): ?><li class="pinterest"><a target="_blank" href="<?php mfn_opts_show('social-pinterest'); ?>" title="Pinterest"><i class="icon-pinterest"></i></a></li><?php endif; ?>
							<?php if( mfn_opts_get('social-dribbble') ): ?><li class="dribbble"><a target="_blank" href="<?php mfn_opts_show('social-dribbble'); ?>" title="Dribbble"><i class="icon-dribbble"></i></a></li><?php endif; ?>
						</ul>
					</div>
							
				</div>
			</div>
		</div>
		
	</footer>
	
</div>
	
<!-- wp_footer() -->
<?php wp_footer(); ?>

</body>
</html>