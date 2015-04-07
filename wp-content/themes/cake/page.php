<?php
/**
 * The template for displaying all pages.
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */

get_header();
?>
	
<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- .sections_group -->
		<div class="sections_group">
			<?php 
				while ( have_posts() ){
					the_post();							// Post Loop	
					mfn_builder_print( get_the_ID() );	// Content Builder & WordPress Editor Content
				}
			?>
		</div>
		
		<!-- .four-columns - sidebar -->
		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>