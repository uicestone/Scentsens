<?php
/**
 * The main template file.
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */

get_header();

// layout
if( $_GET && key_exists('mfn-b', $_GET) ){
	$blog_layout = $_GET['mfn-b']; // demo
} else {
	$blog_layout = mfn_opts_get( 'blog-layout', 'classic' );
}

$translate['categories'] = mfn_opts_get('translate') ? mfn_opts_get('translate-categories','Categories') : __('Categories','cake');
$translate['tags'] = mfn_opts_get('translate') ? mfn_opts_get('translate-tags','Tags') : __('Tags','cake');
$translate['all'] = mfn_opts_get('translate') ? mfn_opts_get('translate-all','All') : __('All','cake');
?>

<?php if( ! is_singular() && get_post_type()=='post' && get_option( 'page_for_posts' ) ): ?>
	<!-- #Filters -->
	<div id="Filters" <?php if( $blog_layout=='masonry' ) echo 'class="isotope-filters"'; ?>>
		<div class="container">
			<div class="column one">
			
				<ul class="filters_buttons">
					<li class="categories"><a class="button open" href="#"><i class="icon-docs"></i> <?php echo $translate['categories']; ?></a></li>
					<li class="tags"><a class="button open" href="#"> <i class="icon-tag"></i> <?php echo $translate['tags']; ?></a></li>
					<li class="reset"><a class="button close" data-rel="*" href="<?php echo get_permalink(mfn_ID()); ?>"><i class="icon-cancel"></i> <?php echo $translate['all']; ?></a></li>
				</ul>
				
				<div class="filters_wrapper">
					<ul class="categories">
						<?php 
							if( $categories = get_categories() ){
								foreach( $categories as $category ){
									echo '<li><a data-rel=".category-'. $category->slug .'" href="'. get_term_link($category) .'">'. $category->name .'</a></li>';
								}
							}
						?>
						<li class="close"><a href="#"><i class="icon-cancel"></i></a></li>
					</ul>
					<ul class="tags">
						<?php 
							if( $tags = get_tags() ){
								foreach( $tags as $tag ){
									echo '<li><a data-rel=".tag-'. $tag->slug .'" href="'. get_tag_link($tag) .'">'. $tag->name .'</a></li>';
								}
							}
						?>
						<li class="close"><a href="#"><i class="icon-cancel"></i></a></li>
					</ul>
					
				</div>
				
			</div>
		</div>
	</div>
<?php endif; ?>


<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- .sections_group -->
		<div class="sections_group">
			
			<div class="section">
				<div class="section_wrapper clearfix">
				
					<div class="column one column_blog">	
						<div class="blog_wrapper isotope_wrapper <?php echo $blog_layout;?>">
						
							<div class="posts_group<?php if( $blog_layout=='masonry' ) echo ' isotope'; ?>">
								<?php echo mfn_content_post(); ?>
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
		
		<!-- .four-columns - sidebar -->
		<?php get_sidebar( 'blog' ); ?>

	</div>
</div>

<?php get_footer(); ?>