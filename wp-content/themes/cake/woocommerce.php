<?php
/**
 * The template for displaying all pages.
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */

get_header('shop');
?>
	
<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- .sections_group -->
		<div class="sections_group">
			<div class="section">
				<div class="section_wrapper clearfix">
					<div class="items_group clearfix">
						<div class="column one woocommerce-content">
							<?php woocommerce_content(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- .four-columns - sidebar -->
		<div class="four columns">
			<div class="widget-area clearfix">
				<?php dynamic_sidebar( 'shop' ); ?>
			</div>
		</div>

	</div>
</div>

<?php get_footer(); ?>