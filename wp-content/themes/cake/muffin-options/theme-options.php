<?php
/**
 * Theme Options - fields and args
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */

require_once( dirname( __FILE__ ) . '/fonts.php' );
require_once( dirname( __FILE__ ) . '/options.php' );


/**
 * Options Page fields and args
 */
function mfn_opts_setup(){
	
	// Navigation elements
	$menu = array(	
	
		// General --------------------------------------------
		'general' => array(
			'title' => __('Getting started', 'mfn-opts'),
			'sections' => array( 'general', 'sidebars', 'blog', 'portfolio' ),
		),
		
		// Layout --------------------------------------------
		'elements' => array(
			'title' => __('Layout', 'mfn-opts'),
			'sections' => array( 'layout-general', 'layout-header', 'social', 'custom-css' ),
		),
		
		// Colors --------------------------------------------
		'colors' => array(
			'title' => __('Colors', 'mfn-opts'),
			'sections' => array( 'colors-general', 'colors-header', 'content', 'colors-footer', 'colors-blog', 'colors-accordion', 'headings', 'colors-shortcodes', 'colors-widgets' ),
		),
		
		// Fonts --------------------------------------------
		'font' => array(
			'title' => __('Fonts', 'mfn-opts'),
			'sections' => array( 'font-family', 'font-size' ),
		),
		
		// Translate --------------------------------------------
		'translate' => array(
			'title' => __('Translate', 'mfn-opts'),
			'sections' => array( 'translate-general', 'translate-blog', 'translate-404' ),
		),
		
	);

	$sections = array();

	// General ----------------------------------------------------------------------------------------
	
	// General -------------------------------------------
	$sections['general'] = array(
		'title' => __('General', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
				
			array(
				'id' => 'responsive',
				'type' => 'switch',
				'title' => __('Responsive', 'mfn-opts'), 
				'desc' => __('<b>Notice:</b> Responsive menu is working only with WordPress custom menu, please add one in Appearance > Menus and select it for Theme Locations section. <a href="http://en.support.wordpress.com/menus/" target="_blank">http://en.support.wordpress.com/menus/</a>', 'mfn-opts'), 
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'mfn-seo',
				'type' => 'switch',
				'title' => __('Use built-in SEO fields', 'mfn-opts'), 
				'desc' => __('Turn it OFF if you want to use external SEO plugin.', 'mfn-opts'), 
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'meta-description',
				'type' => 'text',
				'title' => __('Meta Description', 'mfn-opts'),
				'desc' => __('These setting may be overridden for single posts & pages.', 'mfn-opts'),
				'std' => get_bloginfo( 'description' ),
			),
			
			array(
				'id' => 'meta-keywords',
				'type' => 'text',
				'title' => __('Meta Keywords', 'mfn-opts'),
				'desc' => __('These setting may be overridden for single posts & pages.', 'mfn-opts'),
			),
			
			array(
				'id' => 'google-analytics',
				'type' => 'textarea',
				'title' => __('Google Analytics', 'mfn-opts'), 
				'sub_desc' => __('Paste your Google Analytics code here.', 'mfn-opts'),
			),
			
		),
	);
	
	// Sidebars --------------------------------------------
	$sections['sidebars'] = array(
		'title' => __('Sidebars', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
				
			array(
				'id' => 'sidebars',
				'type' => 'multi_text',
				'title' => __('Sidebars', 'mfn-opts'),
				'sub_desc' => __('Manage custom sidebars', 'mfn-opts'),
				'desc' => __('Sidebars can be used on pages, blog and portfolio', 'mfn-opts')
			),
				
			array(
				'id' => 'single-layout',
				'type' => 'radio_img',
				'title' => __('Single Post Layout', 'mfn-opts'),
				'sub_desc' => __('Use this option to force layout for all posts', 'mfn-opts'),
				'desc' => __('This option can <strong>not</strong> be overriden and it is usefull for people who already have many posts and want to standardize their appearance.', 'mfn-opts'),
				'options' => array(
					'' 				=> array('title' => 'Use Post Meta', 'img' => MFN_OPTIONS_URI.'img/question.png'),
					'no-sidebar' 	=> array('title' => 'Full width without sidebar', 'img' => MFN_OPTIONS_URI.'img/1col.png'),
					'left-sidebar'	=> array('title' => 'Left Sidebar', 'img' => MFN_OPTIONS_URI.'img/2cl.png'),
					'right-sidebar'	=> array('title' => 'Right Sidebar', 'img' => MFN_OPTIONS_URI.'img/2cr.png')
				),
			),
				
			array(
				'id' => 'single-sidebar',
				'type' => 'text',
				'title' => __('Single Post Sidebar', 'mfn-opts'),
				'sub_desc' => __('Use this option to force sidebar for all posts', 'mfn-opts'),
				'desc' => __('Paste the name of one of the sidebars that you added in the "Sidebars" section.', 'mfn-opts'),
				'class' => 'small-text',
			),
				
		),
	);
	
	// Blog --------------------------------------------
	$sections['blog'] = array(
		'title' => __('Blog', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
	
			array(
				'id' => 'blog-posts',
				'type' => 'text',
				'title' => __('Posts per page', 'mfn-opts'),
				'sub_desc' => __('Number of posts per page', 'mfn-opts'),
				'class' => 'small-text',
				'std' => '4',
			),
				
			array(
				'id' => 'blog-layout',
				'type' => 'radio_img',
				'title' => __('Layout', 'mfn-opts'),
				'sub_desc' => __('Layout for Blog Page', 'mfn-opts'),
				'options' => array(
					'classic'	=> array('title' => 'Classic',	'img' => MFN_OPTIONS_URI.'img/list.png'),
					'masonry'	=> array('title' => 'Masonry', 'img' => MFN_OPTIONS_URI.'img/masonry.png'),
					'modern'	=> array('title' => 'Modern',	'img' => MFN_OPTIONS_URI.'img/modern.png'),
				),
				'std' => 'classic'
			),

			array(
				'id' => 'blog-readmore',
				'type' => 'text',
				'title' => __('Read more', 'mfn-opts'),
				'sub_desc' => __('Read more link text', 'mfn-opts'),
				'desc' => __('Leave blank if you don`t want the link on blog page.', 'mfn-opts'),
				'std' => 'Read more',
			),
			
			array(
				'id' => 'blog-meta',
				'type' => 'switch',
				'title' => __('Show Post Meta', 'mfn-opts'),
				'sub_desc' => __('Show Categories, Comments Number, Date, etc.', 'mfn-opts'),
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'blog-author',
				'type' => 'switch',
				'title' => __('Show Author Box', 'mfn-opts'),
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'blog-related',
				'type' => 'switch',
				'title' => __('Show Related Posts', 'mfn-opts'),
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'pagination-show-all',
				'type' => 'switch',
				'title' => __('All pages in pagination', 'mfn-opts'),
				'desc' => __('Show all of the pages instead of a short list of the pages near the current page.', 'mfn-opts'),  
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'blog-page',
				'type' => 'pages_select',
				'title' => __('Blog Page', 'mfn-opts'),
				'sub_desc' => __('Assign page for blog', 'mfn-opts'),
				'desc' => __('Use this option if you set <strong>Front page displays: Your latest posts</strong> in Settings > Reading', 'mfn-opts'),
				'args' => array()
			),
				
		),
	);
	
	// Portfolio --------------------------------------------
	$sections['portfolio'] = array(
		'title' => __('Portfolio', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
	
			array(
				'id' => 'portfolio-posts',
				'type' => 'text',
				'title' => __('Posts per page', 'mfn-opts'),
				'sub_desc' => __('Number of portfolio posts per page.', 'mfn-opts'),
				'class' => 'small-text',
				'std' => '8',
			),
			
			array(
				'id' => 'portfolio-layout',
				'type' => 'radio_img',
				'title' => __('Layout', 'mfn-opts'), 
				'sub_desc' => __('Layout for portfolio items list.', 'mfn-opts'),
				'options' => array(
					'one'			=> array('title' => 'List', 'img' => MFN_OPTIONS_URI.'img/list.png'),
					'one-second'	=> array('title' => 'Two columns', 'img' => MFN_OPTIONS_URI.'img/one-second.png'),
					'one-third'		=> array('title' => 'Three columns', 'img' => MFN_OPTIONS_URI.'img/one-third.png'),
					'one-fourth'	=> array('title' => 'Four columns', 'img' => MFN_OPTIONS_URI.'img/one-fourth.png'),
				),
				'std' => 'one-fourth'																		
			),
			
			array(
				'id' => 'portfolio-page',
				'type' => 'pages_select',
				'title' => __('Portfolio Page', 'mfn-opts'), 
				'sub_desc' => __('Assign page for portfolio.', 'mfn-opts'),
				'args' => array()
			),
			
			array(
				'id' => 'portfolio-slug',
				'type' => 'text',
				'title' => __('Single item slug', 'mfn-opts'),
				'sub_desc' => __('Link to single item.', 'mfn-opts'),
				'desc' => __('<b>Important:</b> Do not use characters not allowed in links. <br /><br />Must be different from the Portfolio site title chosen above, eg. "portfolio-item". After change please go to "Settings > Permalinks" and click "Save changes" button.', 'mfn-opts'),
				'class' => 'small-text',
				'std' => 'portfolio-item',
			),
			
			array(
				'id' => 'portfolio-orderby',
				'type' => 'select',
				'title' => __('Order by', 'mfn-opts'), 
				'sub_desc' => __('Portfolio items order by column.', 'mfn-opts'),
				'options' => array('date'=>'Date', 'menu_order' => 'Menu order', 'title'=>'Title'),
				'std' => 'date'
			),
			
			array(
				'id' => 'portfolio-order',
				'type' => 'select',
				'title' => __('Order', 'mfn-opts'), 
				'sub_desc' => __('Portfolio items order.', 'mfn-opts'),
				'options' => array('ASC' => 'Ascending', 'DESC' => 'Descending'),
				'std' => 'DESC'
			),
			
			array(
				'id' => 'portfolio-isotope',
				'type' => 'switch',
				'title' => __('jQuery filtering', 'mfn-opts'),
				'desc' => __('When this option is enabled, portfolio looks great with all projects on single site, so please set "Posts per page" option to bigger number', 'mfn-opts'),  
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
				
		),
	);
	
	// Layout ----------------------------------------------------------------------------------------
	
	// General --------------------------------------------
	$sections['layout-general'] = array(
		'title' => __('General', 'mfn-opts'),
		'fields' => array(
				
			array(
				'id' => 'layout',
				'type' => 'radio_img',
				'title' => __('Layout', 'mfn-opts'),
				'sub_desc' => __('Layout type', 'mfn-opts'),
				'options' => array(
					'boxed' => array('title' => 'Boxed', 'img' => MFN_OPTIONS_URI.'img/boxed.png'),
					'full-width' => array('title' => 'Full width', 'img' => MFN_OPTIONS_URI.'img/1col.png'),
				),
				'std' => 'full-width'
			),
			
			array(
				'id' => 'img-page-bg',
				'type' => 'upload',
				'title' => __('Background Image', 'mfn-opts'),
				'desc' => __('This option can be used <strong>only</strong> with Layout: Boxed.', 'mfn-opts'),
			),
				
			array(
				'id' => 'position-page-bg',
				'type' => 'select',
				'title' => __('Background Image position', 'mfn-opts'),
				'desc' => __('This option can be used only with your custom image selected above.', 'mfn-opts'),
				'options' => array(
					'no-repeat;center top;;' => 'Center Top No-Repeat',
					'repeat;center top;;' => 'Center Top Repeat',
					'no-repeat;center;;' => 'Center No-Repeat',
					'repeat;center;;' => 'Center Repeat',
					'no-repeat;left top;;' => 'Left Top No-Repeat',
					'repeat;left top;;' => 'Left Top Repeat',
					'no-repeat;center top;fixed;' => 'Center No-Repeat Fixed',
					'no-repeat;center;fixed;cover' => 'Center No-Repeat Fixed Cover',
				),
				'std' => 'center top no-repeat',
			),
			
			array(
				'id'		=> 'header-layout-home',
				'type'		=> 'radio_img',
				'title'		=> __('Homepage Layout', 'mfn-opts'),
				'sub_desc'	=> __('Homepage and subpages with header slider', 'mfn-opts'),
				'options'	=> array(
					'header-white header-bg'	=> array('title' => '<strong>White</strong> header with <strong>dark text</strong>', 'img' => MFN_OPTIONS_URI.'img/header-white-bg.png'),
					'header-dark header-bg' 	=> array('title' => 'Dark header with white text', 'img' => MFN_OPTIONS_URI.'img/header-dark-bg.png'),
					'header-white header-alpha'	=> array('title' => 'Transparent header with dark text', 'img' => MFN_OPTIONS_URI.'img/header-white.png'),
					'header-dark header-alpha'	=> array('title' => 'Transparent header with white text', 'img' => MFN_OPTIONS_URI.'img/header-dark.png'),
				),
				'std'		=> 'header-white header-bg'
			),
				
			array(
				'id'		=> 'logo-img-home',
				'type'		=> 'upload',
				'title'		=> __('Homepage Logo', 'mfn-opts'),
			),
				
			array(
				'id'		=> 'retina-logo-img-home',
				'type'		=> 'upload',
				'title'		=> __('Homepage Retina Logo', 'mfn-opts'),
				'desc'		=> __('Homepage Retina Logo should be 2x larger than Homepage Logo (field is optional).', 'mfn-opts'),
			),
			
			array(
				'id'		=> 'header-layout',
				'type'		=> 'radio_img',
				'title'		=> __('Subpage Layout', 'mfn-opts'),
				'sub_desc'	=> __('Subpages without header slider', 'mfn-opts'),
				'options'	=> array(
					'header-white header-bg'	=> array('title' => '<strong>White</strong> header with <strong>dark text</strong>', 'img' => MFN_OPTIONS_URI.'img/header-white-bg.png'),
					'header-dark header-bg' 	=> array('title' => 'Dark header with white text', 'img' => MFN_OPTIONS_URI.'img/header-dark-bg.png'),
					'header-white header-alpha'	=> array('title' => 'Transparent header with dark text', 'img' => MFN_OPTIONS_URI.'img/header-white.png'),
					'header-dark header-alpha'	=> array('title' => 'Transparent header with white text', 'img' => MFN_OPTIONS_URI.'img/header-dark.png'),
				),
				'std'		=> 'header-white header-bg'
			),
			
			array(
				'id'		=> 'logo-img',
				'type'		=> 'upload',
				'title'		=> __('Subpage Logo', 'mfn-opts'),
			),
				
			array(
				'id'		=> 'retina-logo-img',
				'type'		=> 'upload',
				'title'		=> __('Subpage Retina Logo', 'mfn-opts'),
				'desc'		=> __('Retina Logo should be 2x larger than Logo (field is optional).', 'mfn-opts'),
			),

		),
	);
	
	// Header --------------------------------------------
	$sections['layout-header'] = array(
		'title' => __('Header & Footer', 'mfn-opts'),
		'fields' => array(
	
			array(
				'id'		=> 'favicon-img',
				'type'		=> 'upload',
				'title'		=> __('Custom Favicon', 'mfn-opts'),
				'sub_desc'	=> __('Site favicon', 'mfn-opts'),
				'desc'		=> __('Please use ICO format only.', 'mfn-opts')
			),
				
			array(
				'id' 		=> 'top-bar-phone',
				'type' 		=> 'text',
				'title' 	=> __('Action Bar Phone number', 'mfn-opts'),
				'class' 	=> 'small-text',
			),
				
			array(
				'id' 		=> 'top-bar-email',
				'type' 		=> 'text',
				'title' 	=> __('Action Bar E-mail', 'mfn-opts'),
				'class' 	=> 'small-text',
			),
				
			array(
				'id'		=> 'sticky-header',
				'type'		=> 'switch',
				'title'		=> __('Sticky Header', 'mfn-opts'),
				'options'	=> array('1' => 'On','0' => 'Off'),
				'std'		=> '1'
			),
				
			array(
				'id'		=> 'show-breadcrumbs',
				'type'		=> 'switch',
				'title'		=> __('Breadcrumbs', 'mfn-opts'),
				'options'	=> array('1' => 'On','0' => 'Off'),
				'std'		=> '0'
			),
				
			array(
				'id'		=> 'action-button-text',
				'type'		=> 'text',
				'title'		=> __('Action Button Text', 'mfn-opts'),
				'class'		=> 'small-text',
			),
				
			array(
				'id'		=> 'action-button-link',
				'type'		=> 'text',
				'title'		=> __('Action Button Link', 'mfn-opts'),
			),
			
			array(
				'id'		=> 'footer-copy',
				'type'		=> 'text',
				'title'		=> __('Footer Copyright Text', 'mfn-opts'),
				'desc'		=> __('Leave this field blank to show a default copyright.', 'mfn-opts'),
			),
	
		),
	);
	
	// Social Icons --------------------------------------------
	$sections['social'] = array(
		'title' => __('Social Icons', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
				
			array(
				'id' => 'social-facebook',
				'type' => 'text',
				'title' => __('Facebook', 'mfn-opts'),
				'sub_desc' => __('Type your Facebook link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-googleplus',
				'type' => 'text',
				'title' => __('Google +', 'mfn-opts'),
				'sub_desc' => __('Type your Google + link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-twitter',
				'type' => 'text',
				'title' => __('Twitter', 'mfn-opts'),
				'sub_desc' => __('Type your Twitter link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-vimeo',
				'type' => 'text',
				'title' => __('Vimeo', 'mfn-opts'),
				'sub_desc' => __('Type your Vimeo link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-youtube',
				'type' => 'text',
				'title' => __('YouTube', 'mfn-opts'),
				'sub_desc' => __('Type your YouTube link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-flickr',
				'type' => 'text',
				'title' => __('Flickr', 'mfn-opts'),
				'sub_desc' => __('Type your Flickr link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-linkedin',
				'type' => 'text',
				'title' => __('LinkedIn', 'mfn-opts'),
				'sub_desc' => __('Type your LinkedIn link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-pinterest',
				'type' => 'text',
				'title' => __('Pinterest', 'mfn-opts'),
				'sub_desc' => __('Type your Pinterest link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
			
			array(
				'id' => 'social-dribbble',
				'type' => 'text',
				'title' => __('Dribbble', 'mfn-opts'),
				'sub_desc' => __('Type your Dribbble link here', 'mfn-opts'),
				'desc' => __('Icon won`t show if you leave this field blank' , 'mfn-opts'),
			),
				
		),
	);
	
	// Custom CSS --------------------------------------------
	$sections['custom-css'] = array(
		'title' => __('Custom CSS', 'mfn-opts'),
		'fields' => array(

			array(
				'id' => 'custom-css',
				'type' => 'textarea',
				'title' => __('Custom CSS', 'mfn-opts'), 
				'sub_desc' => __('Paste your custom CSS code here.', 'mfn-opts'),
			),
				
		),
	);

	// Colors ----------------------------------------------------------------------------------------
	
	// General --------------------------------------------
	$sections['colors-general'] = array(
		'title' => __('General', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
							
			array(
				'id' => 'skin',
				'type' => 'select',
				'title' => __('Theme Skin', 'mfn-opts'), 
				'sub_desc' => __('Choose one of the predefined styles or set your own colors', 'mfn-opts'), 
				'desc' => __('<strong>Important:</strong> Color options can be used only with the <strong>Custom Skin</strong>', 'mfn-opts'), 
				'options' => array(
					'custom' 	=> 'Custom',
					'green'		=> 'Green',
					'blue'		=> 'Blue',
					'brown'		=> 'Brown',
					'pink'		=> 'Pink',
					'sea'		=> 'Sea',
				),
				'std' => 'custom',
			),
			
			array(
				'id' => 'background-body',
				'type' => 'color',
				'title' => __('Body background', 'mfn-opts'), 
				'std' => '#FAFAFA',
			),
			
		),
	);
	
	// Header --------------------------------------------
	$sections['colors-header'] = array(
		'title' => __('Header', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
					
			array(
				'id' => 'color-menu-a-active',
				'type' => 'color',
				'title' => __('Main Menu Active Link', 'mfn-opts'),
				'sub_desc' => __('Active, hover & border color', 'mfn-opts'),
				'desc' => __('For White Header only', 'mfn-opts'),
				'std' => '#6ea81a',
			),
					
			array(
				'id' => 'background-header-homepage',
				'type' => 'color',
				'title' => __('Homepage Header background', 'mfn-opts'),
				'sub_desc' => __('Homepage and subpages with header slider', 'mfn-opts'),
				'std' => '#6ea81a',
			),
				
			array(
				'id' => 'background-header',
				'type' => 'color',
				'title' => __('Subpage Header background', 'mfn-opts'),
				'sub_desc' => __('Subpages without header slider', 'mfn-opts'),
				'std' => '#eeeeee',
			),
			
			array(
				'id' => 'color-subheader-title',
				'type' => 'color',
				'title' => __('Page Title color', 'mfn-opts'),
				'std' => '#486e14',
			),
			
			array(
				'id' => 'color-subheader-breadcrumbs',
				'type' => 'color',
				'title' => __('Breadcrumbs color', 'mfn-opts'),
				'std' => '#A9A9A9',
			),
			
			array(
				'id' => 'color-subheader-button',
				'type' => 'color',
				'title' => __('Subheader Button', 'mfn-opts'),
				'sub_desc' => __('Color, border & hover background', 'mfn-opts'),
				'std' => '#545454',
			),
			
			array(
				'id' => 'background-subheader-button',
				'type' => 'color',
				'title' => __('Filter Hover background', 'mfn-opts'),
				'std' => '#76B51B',
			),
			
		),
	);
	
	// Content --------------------------------------------
	$sections['content'] = array(
		'title' => __('Content', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
	
			array(
				'id' => 'color-text',
				'type' => 'color',
				'title' => __('Text color', 'mfn-opts'), 
				'sub_desc' => __('Content text color', 'mfn-opts'),
				'std' => '#565656'
			),
			
			array(
				'id' => 'color-a',
				'type' => 'color',
				'title' => __('Link color', 'mfn-opts'), 
				'std' => '#76B51B'
			),
			
			array(
				'id' => 'color-a-hover',
				'type' => 'color',
				'title' => __('Link Hover color', 'mfn-opts'), 
				'std' => '#486e14'
			),
				
			array(
				'id' => 'color-note',
				'type' => 'color',
				'title' => __('Note color', 'mfn-opts'),
				'desc' => __('eg. Post Meta', 'mfn-opts'),
				'std' => '#a9a9a9',
			),
							
			array(
				'id' => 'color-note-bold',
				'type' => 'color',
				'title' => __('Bold Note color', 'mfn-opts'), 
				'desc' => __('eg. Chart Label', 'mfn-opts'),
				'std' => '#486e14',
			),
			
			array(
				'id' => 'background-highlight',
				'type' => 'color',
				'title' => __('Highlight & Dropcap background', 'mfn-opts'),
				'std' => '#76B51B'
			),
	
			array(
				'id' => 'color-highlight',
				'type' => 'color',
				'title' => __('Highlight & Dropcap text color', 'mfn-opts'),
				'std' => '#ffffff'
			),
			
			array(
				'id' => 'background-highlight-section',
				'type' => 'color',
				'title' => __('Highlight Section background', 'mfn-opts'),
				'std' => '#6ea81a'
			),
			
			array(
				'id' => 'color-button',
				'type' => 'color',
				'title' => __('Button Default', 'mfn-opts'), 
				'sub_desc' => __('Color, border & hover background', 'mfn-opts'), 
				'std' => '#545454',
			),
			
			array(
				'id' => 'background-button-filled',
				'type' => 'color',
				'title' => __('Button Filled background', 'mfn-opts'), 
				'std' => '#76B51B',
			),
			
			array(
				'id' => 'color-button-filled',
				'type' => 'color',
				'title' => __('Button Filled color', 'mfn-opts'),
				'std' => '#fff',
			),
			
			array(
				'id' => 'background-button-filled-hover',
				'type' => 'color',
				'title' => __('Button Filled Hover background', 'mfn-opts'), 
				'std' => '#486e14',
			),
			
		),
	);
	
	// Footer --------------------------------------------
	$sections['colors-footer'] = array(
		'title' => __('Footer', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
				
			array(
				'id' => 'background-footer',
				'type' => 'color',
				'title' => __('Footer background', 'mfn-opts'),
				'std' => '#19191B',
			),
	
			array(
				'id' => 'color-footer',
				'type' => 'color',
				'title' => __('Footer Text color', 'mfn-opts'),
				'std' => '#ababab',
			),
				
			array(
				'id' => 'color-footer-heading',
				'type' => 'color',
				'title' => __('Footer Heading color', 'mfn-opts'),
				'std' => '#ffffff',
			),
				
			array(
				'id' => 'color-footer-a',
				'type' => 'color',
				'title' => __('Footer Link color', 'mfn-opts'),
				'std' => '#ffffff',
			),
				
			array(
				'id' => 'color-footer-a-hover',
				'type' => 'color',
				'title' => __('Footer Link Hover color', 'mfn-opts'),
				'std' => '#d1d1d1',
			),
				
			array(
				'id' => 'color-footer-note',
				'type' => 'color',
				'title' => __('Footer Note color', 'mfn-opts'),
				'desc' => __('Eg. Post Meta', 'mfn-opts'),
				'std' => '#8c8c8c',
			),
			
			array(
				'id' => 'background-copy',
				'type' => 'color',
				'title' => __('Footer Bottom Bar background', 'mfn-opts'),
				'sub_desc' => __('Copyright Text & Social Icons background', 'mfn-opts'),
				'std' => '#0d0d0d',
			),
			
			array(
				'id' => 'color-footer-copy',
				'type' => 'color',
				'title' => __('Footer Copyright color', 'mfn-opts'),
				'std' => '#808080',
			),
			
			array(
				'id' => 'color-footer-social',
				'type' => 'color',
				'title' => __('Footer Social color', 'mfn-opts'),
				'std' => '#808080',
			),
			
			array(
				'id' => 'color-footer-social-hover',
				'type' => 'color',
				'title' => __('Footer Social Hover color', 'mfn-opts'),
				'std' => '#ffffff',
			),
				
		),
	);
	
	// Blog & Portfolio --------------------------------------------
	$sections['colors-blog'] = array(
		'title' => __('Blog & Portfolio', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
				
			array(
				'id' => 'color-blog-icon',
				'type' => 'color',
				'title' => __('Blog Icon color', 'mfn-opts'),
				'std' => '#76B51B',
			),
				
			array(
				'id' 		=> 'background-blog-quote',
				'type' 		=> 'color',
				'title' 	=> __('Blog Quote Format background', 'mfn-opts'),
				'desc' 		=> __('This is also Audio Player background.', 'mfn-opts'),
				'std' 		=> '#76B51B',
			),
				
			array(
				'id' => 'background-portfolio-image-icon',
				'type' => 'color',
				'title' => __('Portfolio Image Icon background', 'mfn-opts'),
				'std' => '#76B51B',
			),
				
			array(
				'id' => 'color-portfolio-image-icon',
				'type' => 'color',
				'title' => __('Portfolio Image Icon color', 'mfn-opts'),
				'std' => '#ffffff',
			),
				
			array(
				'id' => 'background-portfolio-image-icon-hover',
				'type' => 'color',
				'title' => __('Portfolio Image Icon Hover background', 'mfn-opts'),
				'std' => '#486e14',
			),
				
			array(
				'id' => 'background-pager-arrow',
				'type' => 'color',
				'title' => __('Pager Arrow background', 'mfn-opts'),
				'std' => '#76B51B',
			),
				
			array(
				'id' => 'background-pager-arrow-hover',
				'type' => 'color',
				'title' => __('Pager Arrow Hover background', 'mfn-opts'),
				'std' => '#486e14',
			),
				
		),
	);
	
	// Accordion --------------------------------------------
	$sections['colors-accordion'] = array(
		'title' => __('Accordion & Tabs', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(

			array(
				'id' => 'color-accordion-icon',
				'type' => 'color',
				'title' => __('Accordion Icon color', 'mfn-opts'),
				'std' => '#6ea81a'
			),
				
			array(
				'id' => 'color-tabs-title',
				'type' => 'color',
				'title' => __('Tab Title color', 'mfn-opts'),
				'std' => '#ffffff'
			),
				
			array(
				'id' => 'background-tabs-title',
				'type' => 'color',
				'title' => __('Tab Title background', 'mfn-opts'),
				'std' => '#434343'
			),
				
			array(
				'id' => 'color-tabs-title-active',
				'type' => 'color',
				'title' => __('Tab Title Active color', 'mfn-opts'),
				'sub_desc' => __('Big Icon Title color', 'mfn-opts'),
				'std' => '#545454'
			),
				
			array(
				'id' => 'background-tabs-title-active',
				'type' => 'color',
				'title' => __('Tab Title Active background', 'mfn-opts'),
				'sub_desc' => __('Tabs Content background', 'mfn-opts'),
				'std' => '#fafafa'
			),
			
			array(
				'id' => 'color-tabs-icon',
				'type' => 'color',
				'title' => __('Tab Big Icon color', 'mfn-opts'),
				'std' => '#6ea81a'
			),

		),
	);
	
	// Headings --------------------------------------------
	$sections['headings'] = array(
		'title' => __('Headings', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
	
			array(
				'id' => 'color-h1',
				'type' => 'color',
				'title' => __('Heading H1 color', 'mfn-opts'), 
				'std' => '#545454'
			),
			
			array(
				'id' => 'color-h2',
				'type' => 'color',
				'title' => __('Heading H2 color', 'mfn-opts'), 
				'std' => '#545454'
			),
			
			array(
				'id' => 'color-h3',
				'type' => 'color',
				'title' => __('Heading H3 color', 'mfn-opts'), 
				'std' => '#446b0b'
			),
			
			array(
				'id' => 'color-h4',
				'type' => 'color',
				'title' => __('Heading H4 color', 'mfn-opts'), 
				'std' => '#545454'
			),
			
			array(
				'id' => 'color-h5',
				'type' => 'color',
				'title' => __('Heading H5 color', 'mfn-opts'), 
				'std' => '#545454'
			),
			
			array(
				'id' => 'color-h6',
				'type' => 'color',
				'title' => __('Heading H6 color', 'mfn-opts'), 
				'std' => '#545454'
			),
				
		),
	);
	
	// Shortcodes --------------------------------------------
	$sections['colors-shortcodes'] = array(
		'title' => __('Shortcodes', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
				
			array(
				'id' => 'background-blockquote',
				'type' => 'color',
				'title' => __('Blockquote Modern background', 'mfn-opts'),
				'std' => '#6ea81a',
			),
				
			array(
				'id' => 'background-contact-box',
				'type' => 'color',
				'title' => __('Contact Box Modern background', 'mfn-opts'),
				'std' => '#6ea81a',
			),
				
			array(
				'id' => 'color-counter',
				'type' => 'color',
				'title' => __('Counter color', 'mfn-opts'),
				'std' => '#76B51B',
			),
				
			array(
				'id' => 'background-fancy-heading',
				'type' => 'color',
				'title' => __('Fancy Heading Solid background', 'mfn-opts'),
				'std' => '#E3E3E3',
			),
				
			array(
				'id' => 'color-icon-box',
				'type' => 'color',
				'title' => __('Icon Box color', 'mfn-opts'),
				'std' => '#76B51B',
			),
				
			array(
				'id' => 'background-image-mask',
				'type' => 'color',
				'title' => __('Image Mask background', 'mfn-opts'),
				'std' => '#76b51b',
			),
				
			array(
				'id' => 'color-image-mask-icon',
				'type' => 'color',
				'title' => __('Image Mask Icon color', 'mfn-opts'),
				'std' => '#6ea81a',
			),
			
			array(
				'id' => 'color-pricing-price',
				'type' => 'color',
				'title' => __('Pricing Box Price color', 'mfn-opts'),
				'std' => '#6ea81a',
			),
			
			array(
				'id' => 'background-pricing-ribbon',
				'type' => 'color',
				'title' => __('Pricing Box Ribbon background', 'mfn-opts'),
				'std' => '#f66847',
			),
			
			array(
				'id' => 'background-progress-bar-label',
				'type' => 'color',
				'title' => __('Progress Bar Label background', 'mfn-opts'),
				'std' => '#434343',
			),
			
			array(
				'id' => 'background-progress-bar',
				'type' => 'color',
				'title' => __('Progress Bar background', 'mfn-opts'),
				'std' => '#76B51B',
			),
			
			array(
				'id' => 'background-testimonials-pager-active',
				'type' => 'color',
				'title' => __('Testimonials Pager Active', 'mfn-opts'),
				'std' => '#76B51B',
			),
				
		),
	);
	
	// Widgets & Shop --------------------------------------------
	$sections['colors-widgets'] = array(
		'title' => __('Widgets & Shop', 'mfn-opts'),
		'icon' => MFN_OPTIONS_URI. 'img/icons/sub.png',
		'fields' => array(
				
			array(
				'id' => 'color-widget-title',
				'type' => 'color',
				'title' => __('Widget Title color', 'mfn-opts'),
				'std' => '#545454',
			),
				
			array(
				'id' => 'color-widget-menu-a',
				'type' => 'color',
				'title' => __('Widget Link color', 'mfn-opts'),
				'std' => '#545454',
			),
				
			array(
				'id' => 'background-woo-sale-label',
				'type' => 'color',
				'title' => __('WooCommerce Sale Label background', 'mfn-opts'),
				'std' => '#76B51B',
			),
				
			array(
				'id' => 'color-woo-price-color',
				'type' => 'color',
				'title' => __('WooCommerce Price color', 'mfn-opts'),
				'std' => '#76B51B',
			),
				
		),
	);

	// Font Family --------------------------------------------
	$sections['font-family'] = array(
		'title' => __('Font Family', 'mfn-opts'),
		'fields' => array(
			
			array(
				'id' => 'font-content',
				'type' => 'font_select',
				'title' => __('Content Font', 'mfn-opts'), 
				'sub_desc' => __('This font will be used for all theme texts except headings and menu.', 'mfn-opts'), 
				'std' => 'Ubuntu'
			),
			
			array(
				'id' => 'font-menu',
				'type' => 'font_select',
				'title' => __('Main Menu Font', 'mfn-opts'), 
				'sub_desc' => __('This font will be used for header menu.', 'mfn-opts'), 
				'std' => 'Ubuntu'
			),
			
			array(
				'id' => 'font-headings',
				'type' => 'font_select',
				'title' => __('Headings Font', 'mfn-opts'), 
				'sub_desc' => __('This font will be used for all headings.', 'mfn-opts'), 
				'std' => 'Ubuntu'
			),
			
			array(
				'id' => 'font-subset',
				'type' => 'text',
				'title' => __('Google Font Subset', 'mfn-opts'),				
				'sub_desc' => __('Specify which subsets should be downloaded. Multiple subsets should be separated with coma (,)', 'mfn-opts'),
				'desc' => __('Some of the fonts in the Google Font Directory support multiple scripts (like Latin and Cyrillic for example). In order to specify which subsets should be downloaded the subset parameter should be appended to the URL. For a complete list of available fonts and font subsets please see <a href="http://www.google.com/webfonts" target="_blank">Google Web Fonts</a>.', 'mfn-opts'),
				'class' => 'small-text'
			),
				
		),
	);
	
	// Content Font Size --------------------------------------------
	$sections['font-size'] = array(
		'title' => __('Font Size', 'mfn-opts'),
		'fields' => array(

			array(
				'id' => 'font-size-content',
				'type' => 'sliderbar',
				'title' => __('Content', 'mfn-opts'),
				'sub_desc' => __('This font size will be used for all theme texts.', 'mfn-opts'),
				'std' => '14',
			),
				
			array(
				'id' => 'font-size-menu',
				'type' => 'sliderbar',
				'title' => __('Main menu', 'mfn-opts'),
				'sub_desc' => __('This font size will be used for top level only.', 'mfn-opts'),
				'std' => '16',
			),
			
			array(
				'id' => 'font-size-h1',
				'type' => 'sliderbar',
				'title' => __('Heading H1', 'mfn-opts'),
				'sub_desc' => __('Subpages header title.', 'mfn-opts'),
				'std' => '36',
			),
			
			array(
				'id' => 'font-size-h2',
				'type' => 'sliderbar',
				'title' => __('Heading H2', 'mfn-opts'),
				'std' => '48',
			),
			
			array(
				'id' => 'font-size-h3',
				'type' => 'sliderbar',
				'title' => __('Heading H3', 'mfn-opts'),
				'std' => '36',
			),
			
			array(
				'id' => 'font-size-h4',
				'type' => 'sliderbar',
				'title' => __('Heading H4', 'mfn-opts'),
				'std' => '26',
			),
			
			array(
				'id' => 'font-size-h5',
				'type' => 'sliderbar',
				'title' => __('Heading H5', 'mfn-opts'),
				'std' => '23',
			),
			
			array(
				'id' => 'font-size-h6',
				'type' => 'sliderbar',
				'title' => __('Heading H6', 'mfn-opts'),
				'std' => '18',
			),
	
		),
	);
	
	// Translate / General --------------------------------------------
	$sections['translate-general'] = array(
		'title' => __('General', 'mfn-opts'),
		'fields' => array(
	
			array(
				'id' => 'translate',
				'type' => 'switch',
				'title' => __('Enable Translate', 'mfn-opts'), 
				'desc' => __('Turn it off if you want to use .mo .po files for more complex translation.', 'mfn-opts'),
				'options' => array('1' => 'On','0' => 'Off'),
				'std' => '1'
			),
			
			array(
				'id' => 'translate-search-placeholder',
				'type' => 'text',
				'title' => __('Search Placeholder', 'mfn-opts'),
				'desc' => __('Widget Search', 'mfn-opts'),
				'std' => 'Enter your search',
				'class' => 'small-text',
			),
			
			array(
				'id' => 'translate-home',
				'type' => 'text',
				'title' => __('Home', 'mfn-opts'),
				'desc' => __('Breadcrumbs', 'mfn-opts'),
				'std' => 'Home',
				'class' => 'small-text',
			),

		),
	);
	
	// Translate / Blog  --------------------------------------------
	$sections['translate-blog'] = array(
		'title' => __('Blog & Portfolio', 'mfn-opts'),
		'fields' => array(

			array(
				'id' => 'translate-by',
				'type' => 'text',
				'title' => __('By', 'mfn-opts'),
				'desc' => __('Blog', 'mfn-opts'),
				'std' => 'By',
				'class' => 'small-text',
			),
				
			array(
				'id' => 'translate-in',
				'type' => 'text',
				'title' => __('In', 'mfn-opts'),
				'desc' => __('Blog', 'mfn-opts'),
				'std' => 'In',
				'class' => 'small-text',
			),
				
			array(
				'id' => 'translate-categories',
				'type' => 'text',
				'title' => __('Categories', 'mfn-opts'),
				'desc' => __('Blog, Portfolio', 'mfn-opts'),
				'std' => 'Categories',
				'class' => 'small-text',
			),
				
			array(
				'id' => 'translate-tags',
				'type' => 'text',
				'title' => __('Tags', 'mfn-opts'),
				'desc' => __('Blog', 'mfn-opts'),
				'std' => 'Tags',
				'class' => 'small-text',
			),
				
			array(
				'id' => 'translate-all',
				'type' => 'text',
				'title' => __('All', 'mfn-opts'),
				'desc' => __('Blog, Portfolio', 'mfn-opts'),
				'std' => 'All',
				'class' => 'small-text',
			),

		),
	);
	
	// Translate Error 404 --------------------------------------------
	$sections['translate-404'] = array(
		'title' => __('Error 404', 'mfn-opts'),
		'fields' => array(
	
			array(
				'id' => 'translate-404-title',
				'type' => 'text',
				'title' => __('Title', 'mfn-opts'),
				'desc' => __('Ooops... Error 404', 'mfn-opts'),
				'std' => 'Ooops... Error 404',
			),
			
			array(
				'id' => 'translate-404-subtitle',
				'type' => 'text',
				'title' => __('Subtitle', 'mfn-opts'),
				'desc' => __('We are sorry, but the page you are looking for does not exist.', 'mfn-opts'),
				'std' => 'We are sorry, but the page you are looking for does not exist.',
			),
			
			array(
				'id' => 'translate-404-text',
				'type' => 'text',
				'title' => __('Text', 'mfn-opts'),
				'desc' => __('Please check entered address and try again or', 'mfn-opts'),
				'std' => 'Please check entered address and try again or ',
			),
			
			array(
				'id' => 'translate-404-btn',
				'type' => 'text',
				'title' => __('Button', 'mfn-opts'),
				'sub_desc' => __('Go To Homepage button', 'mfn-opts'),
				'std' => 'go to homepage',
				'class' => 'small-text',
			),
	
		),
	);
								
	global $MFN_Options;
	$MFN_Options = new MFN_Options( $menu, $sections );
}
//add_action('init', 'mfn_opts_setup', 0);
mfn_opts_setup();


/**
 * This is used to return option value from the options array
 */
function mfn_opts_get( $opt_name, $default = null ){
	global $MFN_Options;
	return $MFN_Options->get( $opt_name, $default );
}

/**
 * This is used to echo option value from the options array
 */
function mfn_opts_show( $opt_name, $default = null ){
	global $MFN_Options;
	$option = $MFN_Options->get( $opt_name, $default );
	if( ! is_array( $option ) ){
		echo $option;
	}	
}

?>