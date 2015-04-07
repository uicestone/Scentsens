<?php
/**
 * The Page Sidebar containing the widget area.
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */

$sidebars = mfn_opts_get( 'sidebars' );
if( get_post_type()=='post' && is_single() && mfn_opts_get('single-sidebar') ){
	// theme options - force layout for posts
	$sidebar = trim( mfn_opts_get('single-sidebar') );
} else {
	// post meta
	$sidebar = get_post_meta( mfn_ID(), 'mfn-post-sidebar', true);
	if( $sidebar !== false ) $sidebar = $sidebars[$sidebar];
}

if( $_GET && key_exists('mfn-s', $_GET) ) $sidebar = $_GET['mfn-s']; // demo
?>

<?php if( mfn_sidebar_classes() ): ?>
<div class="four columns">
	<div class="widget-area clearfix">
		<?php 
			if ( ! dynamic_sidebar( $sidebar ) ){ 
				mfn_nosidebar(); 
			}
		?>
	</div>
</div>
<?php endif; ?>