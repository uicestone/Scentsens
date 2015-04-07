<?php
/**
 * Shortcodes.
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */


/* ---------------------------------------------------------------------------
 * Column One [one] [/one]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one' ) )
{
	function sc_one( $attr, $content = null )
	{
		$output  = '<div class="column one">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Column One Second [one_second] [/one_second]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_second' ) )
{
	function sc_one_second( $attr, $content = null )
	{
		$output  = '<div class="column one-second">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Column One Third [one_third] [/one_third]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_third' ) )
{
	function sc_one_third( $attr, $content = null )
	{
		$output  = '<div class="column one-third">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Column Two Third [two_third] [/two_third]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_two_third' ) )
{
	function sc_two_third( $attr, $content = null )
	{
		$output  = '<div class="column two-third">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Column One Fourth [one_fourth] [/one_fourth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_fourth' ) )
{
	function sc_one_fourth( $attr, $content = null )
	{
		$output  = '<div class="column one-fourth">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Column Two Fourth [two_fourth] [/two_fourth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_two_fourth' ) )
{
	function sc_two_fourth( $attr, $content = null )
	{
		$output  = '<div class="column two-fourth">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Column Three Fourth [three_fourth] [/three_fourth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_three_fourth' ) )
{
	function sc_three_fourth( $attr, $content = null )
	{
		$output  = '<div class="column three-fourth">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Code [code] [/code]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_code' ) )
{
	function sc_code( $attr, $content = null )
	{
		$output  = '<pre>';
			$output .= do_shortcode(htmlspecialchars($content));
		$output .= '</pre>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Article Box [article_box] [/article_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_article_box' ) )
{
	function sc_article_box( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'image' 	=> '',
			'title' 	=> '',
			'link' 		=> '',
			'target' 	=> '',
		), $attr));
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		$output = '<div class="article_box">';
			if( $link ) $output .= '<a class="has_hover" href="'. $link .'" '. $target .'>';
			
				if( $image ){
					$output .= '<div class="photo_mask">';
						$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $title .'" />';
						$output .= '<div class="mask"></div>';
						$output .= '<span class="button_image more"><i class="icon-link"></i></span>';
					$output .= '</div>';
				}
				
				$output .= '<div class="desc_wrapper">';
					$output .= '<h4 class="title">'. $title .'</h4>';
					$output .= '<hr>';
					$output .= '<div class="desc">'. do_shortcode( $content ) .'</div>';
				$output .= '</div>';
				
			if( $link ) $output .= '</a>';		
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Blog [blog]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_blog' ) )
{
	function sc_blog( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'count'			=> 2,
			'category'		=> '',
			'style'			=> 'modern',
			'pagination'	=> '',
		), $attr));

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );
		$args = array(
			'posts_per_page'		=> intval($count),
			'paged' 				=> $paged,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
		if( $category ) $args['category_name'] = $category;
		
		// isotope
		if( $style == 'masonry' ){
			$isotope = 'isotope';
		} else {
			$isotope = false;
		}

		$query_blog = new WP_Query( $args );

		$output = '<div class="blog_wrapper isotope_wrapper '. $style .'">';
		
			$output .= '<div class="posts_group '. $isotope .'">';				
					$output .= mfn_content_post($query_blog, $style);					
			$output .= '</div>';
			
			if( $pagination ) $output .= mfn_pagination($query_blog);

		$output .= '</div>'."\n";
		
		wp_reset_postdata();

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Contact Box [contact_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_contact_box' ) )
{
	function sc_contact_box( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title'			=> '',
			'address' 		=> '',
			'telephone'		=> '',
			'email' 		=> '',
			'www' 			=> '',
			'link_text' 	=> '',
			'link' 			=> '',
			'style' 		=> 'classic',
		), $attr));
		
		if( $style == 'modern' ) $style .= ' dark';

		$output = '<div class="contact_box contact_box_'. $style .'">';
			$output .= '<div class="contact_box_wrapper">';
				if( $title ) $output .= '<h3>'. $title .'</h3>';
				$output .= '<hr class="hr_narrow hr_left">';
				if( $address )$output .= '<div class="inside">'. $address .'</div>';
				$output .= '<div class="options">';
					if( $telephone ) $output .= '<a href="tel:'. $telephone .'" class="button button_icon"><i class="icon-phone"></i></a>';
					if( $email ) $output .= '<a href="mailto:'. $email .'" class="button button_icon"><i class="icon-mail-line"></i></a>';
					if( $www ) $output .= '<a target="_blank" href="http://'. $www .'" class="button button_icon"><i class="icon-globe"></i></a>';
					if( $link ) $output .= '<a href="'. $link .'" class="button">'. $link_text .'</a>';
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Divider [divider]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_divider' ) )
{
	function sc_divider( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'height' => '0',
			'line' => '',
		), $attr));
		
		$line = ( $line ) ? false : ' border:none; width:0; height:0;';		
		$output = '<hr style="margin: 0 auto '. intval($height) .'px;'. $line .'" />'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Pricing Item [pricing_item] [/pricing_item]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pricing_item' ) )
{
	function sc_pricing_item( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'image'			=> '',
			'title'			=> '',
			'currency' 		=> '',
			'price' 		=> '',
			'period' 		=> '',
			'link_title'	=> '',
			'link' 			=> '',
			'featured' 		=> '',
			'border' 		=> '',
		), $attr));
		
		// classes
		$classes = '';
		if( $featured ) $classes .= ' pricing-box-featured';
		if( $border ) 	$classes .= ' has-border';
	
		$output = '<div class="pricing-box '. $classes .'">';
		
			if( $featured ) $output .= '<div class="ribbon-wrapper"><span class="ribbon">'. $featured. '</span></div>';
		
			if( $image ){
				$output .= '<div class="plan-photo">';
					$output .= '<img src="'. $image .'" alt="'. $title .'" class="scale-with-grid" />';
				$output .= '</div>';
			}
			
			$output .= '<div class="plan-header">';
				$output .= '<h3>'. $title .'</h3>';
				$output .= '<div class="price">';
					$output .= '<sup class="currency">'. $currency .'</sup>';
					$output .= '<span>'. $price .'</span>';
					$output .= '<sup class="period">'. $period .'</sup>';
				$output .= '</div>';
			$output .= '</div>';
			
			$output .= '<div class="plan-inside">'. do_shortcode($content) .'</div>';
		
			if( $link ){
				$output .= '<div class="plan-footer">';
					$output .= '<a class="button button_filled" href="'. $link .'">'. $link_title .'</a>';
				$output .= '</div>';
			}
			
		$output .= '</div>'."\n";
			
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Chart [chart] [/chart]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_chart' ) )
{
	function sc_chart( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'percent' 		=> '',
			'label' 		=> '',
			'position' 		=> 'left',
			'title' 		=> '',
		), $attr));
		
		$output = '<div class="chart_box chart_position_'. $position .'">';
			$output .= '<div class="chart" data-percent="'. intval($percent) .'"><span class="num">'. $label .'</span></div>';
			$output .= '<div class="desc_wrapper">';
				$output .= '<h5>'. $title .'</h5>';
				$output .= '<hr class="hr_left">';
				$output .= '<div class="desc">'. do_shortcode($content) .'</div>';
			$output .= '</div>';
		$output .= '</div>'."\n";
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Counter [counter]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_counter' ) )
{
	function sc_counter( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'icon' 			=> '',
			'color' 		=> '',
			'image' 		=> '',
			'number' 		=> '',
			'title' 		=> '',
		), $attr));
		
		$output = '<div class="counter animate-math">';
		
			$output .= '<div class="icon_image">';
				if( $image ){
					$output .= '<img src="'. $image .'" alt="'. $title .'" />';
				} elseif( $icon ){
					$output .= '<i class="'. $icon .'" style="color:'. $color .';"></i>';
				}
			$output .= '</div>';
		
			if( $number ) $output .= '<div class="number" data-to="'. $number .'">0</div>';
			if( $title ) $output .= '<h6 class="title">'. $title .'</h6>';

		$output .= '</div>'."\n";
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Ico [ico]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_ico' ) )
{
	function sc_ico( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'type' => '',
		), $attr));
		
		$output = '<i class="'. $type .'"></i>';
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Image [image]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_image' ) )
{
	function sc_image( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'src'			=> '',
			'alt'			=> '',
			'caption'		=> '',
			'align'			=> '',
			'link'			=> '',
			'link_image'	=> '',
			'link_type'		=> '',
			'target'		=> '',
		), $attr));
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		// align
		if( $align ) $align = ' align'. $align;
		
		// hoover icon
		if( $link_type == 'zoom' || $link_image ){
			$class= 'prettyphoto';
			$target = false;
		} else {
			$class = false;
		}
		
		// link
		if( $link_image ) $link = $link_image;
		
		if( $link )
		{
			$output  = '<div class="scale-with-grid aligncenter wp-caption has-hover'. $align .'">';
				$output .= '<a href="'. $link .'" class="photo photo_mask '. $class .'" '. $target .'>';
					$output .= '<div class="mask"></div>';
					if( $link_type == 'zoom' || $link_image ){
						$output .= '<span class="button_image more"><i class="icon-eye"></i></span>';
					} else {
						$output .= '<span class="button_image more"><i class="icon-link"></i></span>';
					}	
					$output .= '<img class="scale-with-grid" src="'. $src .'" alt="'. $alt .'" />';
				$output .= '</a>';
				if( $caption ) $output .= '<p class="wp-caption-text">'. $caption .'</p>';
			$output .= '</div>'."\n";
		}
		else 
		{
			$output  = '<div class="scale-with-grid aligncenter wp-caption no-hover'. $align .'">';
				$output .= '<div class="photo">';
					$output .= '<img class="scale-with-grid" src="'. $src .'" alt="'. $alt .'" />';
				$output .= '</div>';
				if( $caption ) $output .= '<p class="wp-caption-text">'. $caption .'</p>';
			$output .= '</div>'."\n";
		}
	
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Button [button]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_button' ) )
{
	function sc_button( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' 	=> 'Read more',
			'icon' 		=> '',
			'link' 		=> '',
			'target' 	=> '',
			'color' 	=> '',
			'filled' 	=> '',
			'large' 	=> '',
			'class' 	=> '',
		), $attr));
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		// class
		if( $filled ) 	$class .= ' button_filled';
		if( $large ) 	$class .= ' button_large';
		
		$style = false;
		if( $color ){
			if( strpos($color, '#') === 0 ){
				$style = ' style="background-color:'. $color .' !important"';
			} else {
				$class .= ' button_'. $color;
			}
		}

		// icon
		if( $icon ){
			$title = '<i class="'. $icon .'"></i>';
			$class .= ' button_icon';
		}
		
		$output = '<a class="button '. $class .'" href="'. $link .'" '. $target . $style .'>'. $title .'</a>'."\n";
	
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Highlight [highlight] [/highlight]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_highlight' ) )
{
	function sc_highlight( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'background' 	=> '',
			'color' 		=> '',
			'line' 			=> '0',
		), $attr));
		
		// line
		if( $line ){
			$class = "highlight_image";
		} else {
			$class = false;
		}
		
		// style
		$style = '';
		if( $background ) $style .= 'background-color:'. $background .';';
		if( $color ) $style .= ' color:'. $color .';';
		if( $style ) $style = 'style="'. $style .'"';
							
		$output  = '<span class="highlight '. $class .'" '. $style .'>';
			$output .= do_shortcode($content);
		$output .= '</span>'."\n";
	
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Dropcap [dropcap] [/dropcap]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_dropcap' ) )
{
	function sc_dropcap( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'background' 	=> '',
			'color' 		=> '',
			'circle' 		=> '',
		), $attr));

		// circle
		if( $circle ){
			$class = ' dropcap_circle';
		} else {
			$class = false;
		}

		$style = '';
		if( $background ) $style .= 'background-color:'. $background .';';
		if( $color ) $style .= ' color:'. $color .';';
		if( $style ) $style = 'style="'. $style .'"';
			
		$output  = '<span class="dropcap'. $class .'" '. $style .'>';
			$output .= do_shortcode( $content );
		$output .= '</span>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Tooltip [tooltip] [/tooltip]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_tooltip' ) )
{
	function sc_tooltip( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'hint' 			=> '',
		), $attr));

		$output = '';
		if( $hint ){
			$output .= '<span class="tooltip" data-tooltip="'. $hint .'" ontouchstart="this.classList.toggle(\'hover\');">';
			$output .= do_shortcode( $content );
			$output .= '</span>'."\n";
		}

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Blockquote [blockquote] [/blockquote]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_blockquote' ) )
{
	function sc_blockquote( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'author'	=> '',
			'link'		=> '',
			'target'	=> '',
			'style'		=> '',
		), $attr));
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		$output = '<div class="blockquote blockquote_'. $style .'">';
			$output .= '<div class="blockquote_wrapper">';
				$output .= '<blockquote>'. do_shortcode( $content ) .'</blockquote>';
				$output .= '<div class="author">';
					if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';
						$output .= $author;
					if( $link ) $output .= '</a>';
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Clients [clients]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_clients' ) )
{
	function sc_clients( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'in_row' => 6,
		), $attr));
	
		if( ! intval( $in_row ) ) $in_row = 6;
	
		$args = array(
			'post_type' => 'client',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'ASC',
		);
	
		$clients_query = new WP_Query();
		$clients_query->query( $args );
	
		$output  = '<div class="clients">';
		if ($clients_query->have_posts())
		{
			$i = 1;
			$count = $clients_query->post_count;
			$width = round( (100 / $in_row), 3 );
			$full_rows = floor( ($count-1) / $in_row );
			$in_full_rows = $full_rows * $in_row;
	
			$output .= '<ul>';
			while ($clients_query->have_posts())
			{
				$class = '';
				if( ( $i % $in_row == 0 ) || $i == $count ) $class .= 'last_in_row';			// desktop - last in row
				if( $i > $in_full_rows ) $class .= ' last_row';									// desktop - last row
				if( $i == $count ) $class .= ' last_row_mobile';								// mobile - last item
				if( ( ($i+1) == $count ) && ( $count % 2 == 0 ) ) $class .= ' last_row_mobile';	// mobile - even number of rows
	
				$clients_query->the_post();
				$output .= '<li class="'. $class .'" style="width:'. $width .'%">';
					$output .= '<div class="client_wrapper">';
						$link = get_post_meta(get_the_ID(), 'mfn-post-link', true);
						if( $link ) $output .= '<a target="_blank" href="'. $link .'" title="'. the_title(false, false, false) .'">';
							$output .= get_the_post_thumbnail( null, 'clients-slider', array('class'=>'scale-with-grid') );
						if( $link ) $output .= '</a>';
					$output .= '</div>';
				$output .= '</li>';
	
				$i++;
			}
			$output .= '</ul>'."\n";
		}
		wp_reset_query();
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Fancy Heading [fancy_heading] [/fancy_heading]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'fancy_heading' ) )
{
	function sc_fancy_heading( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
			'icon' 	=> '',
			'image' => '',
			'style' => 'color',
			'class' => '',
		), $attr));
	
		// background
		$custom = '';
		if( $image ) $custom .= 'background-image:url('. $image .');';
	
		// class
		if( ! $icon ) $class .= ' no_icon';
	
		$output = '<div class="fancy_heading fancy_heading_'. $style.' '. $class .'" style="'. $custom .'">';
			if( $icon && $style=='big_icon' ) $output .= '<span class="icon"><i class="'. $icon .'"></i></span>';
			$output .= '<h3>'. $title .'</h3>';
			if( $icon && $style=='small_icon' ) $output .= '<span class="icon"><i class="'. $icon .'"></i></span>';
			if( $content ) $output .= '<div class="inside">'. do_shortcode( $content ) .'</div>';
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Icon Box [icon_box] [/icon_box]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_icon_box' ) )
{
	function sc_icon_box( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title'			=> '',
			'icon'			=> '',
			'icon_position'	=> 'top',
			'link'			=> '',
			'target'		=> '',
		), $attr));
	
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		$output = '<div class="icon_box icon_position_'. $icon_position .'">';
			if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';
			
				$output .= '<div class="icon_wrapper">';
					$output .= '<i class="'. $icon .'"></i>';
				$output .= '</div>';
				
				$output .= '<div class="desc_wrapper">';
					$output .= '<h4 class="title">'. $title .'</h4>';
					$output .= '<hr />';
					$output .= '<div class="desc">'. do_shortcode($content) .'</div>';
				$output .= '</div>';
								
				
			if( $link ) $output .= '</a>';
		$output .= '</div>';
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Our Team [our_team]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_our_team' ) )
{
	function sc_our_team( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'image' 	=> '',	
			'title' 	=> '',
			'subtitle'	=> '',
			'email' 	=> '',
			'phone' 	=> '',
			'facebook' 	=> '',
			'twitter'	=> '',
			'linkedin'	=> '',
			'style' 	=> 'modern',
		), $attr));
		
		$output = '<div class="team team_style_'. $style .'">';
		
			$output .= '<div class="photo">';
				$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $title .'" />';
			$output .= '</div>';
			
			$output .= '<div class="desc">';
				$output .= '<div class="inside">';
				
					if( $title ) $output .= '<h5>'. $title .'</h5>';
					if( $subtitle ) $output .= '<p class="subtitle">'. $subtitle .'</p>';
					
					if( $phone ) 	$output .= '<p class="phone"><i class="icon-phone"></i> <a href="tel:'. $phone .'">'. $phone .'</a></p>';
					
					if( $email || $phone || $facebook || $twitter || $linkedin ){
						$output .= '<div class="links">';
							if( $email ) 	$output .= '<a class="link" href="mailto:'. $email .'"><i class="icon-mail"></i></a>';
							if( $facebook ) $output .= '<a target="_blank" class="link" href="'. $facebook .'"><i class="icon-facebook"></i></a>';
							if( $twitter ) 	$output .= '<a target="_blank" class="link" href="'. $twitter .'"><i class="icon-twitter"></i></a>';
							if( $linkedin ) $output .= '<a target="_blank" class="link" href="'. $linkedin .'"><i class="icon-linkedin"></i></a>';
						$output .= '</div>';
					}
					
				$output .= '</div>';
			$output .= '</div>';

		$output .= '</div>'."\n";	
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Portfolio [portfolio]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_portfolio' ) )
{
	function sc_portfolio( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'count' 		=> '2',
			'category' 		=> '',
			'orderby' 		=> 'date',
			'order' 		=> 'DESC',
			'style'			=> 'one',
			'pagination'	=> '',
		), $attr));

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );
		$args = array(
			'post_type' 			=> 'portfolio',
			'posts_per_page' 		=> intval($count),
			'paged' 				=> $paged,
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'ignore_sticky_posts' 	=>1,
		);
		if( $category ) $args['portfolio-types'] = $category;
		
		$query_portfolio = new WP_Query( $args );
		
		$output = '<div class="portfolio_wrapper isotope_wrapper">';
		
			$output .= '<ul class="portfolio_group '. $style .'">';
				$output .= mfn_content_portfolio( $query_portfolio );
			$output .= '</ul>';
			
			if( $pagination ) $output .= mfn_pagination( $query_portfolio );
		
		$output .= '</div>'."\n";
		
		wp_reset_postdata();

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Portfolio Slider [portfolio_slider]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_portfolio_slider' ) )
{
	function sc_portfolio_slider( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'count' 		=> '5',
			'category' 		=> '',
			'orderby' 		=> 'date',
			'order' 		=> 'DESC',
		), $attr));

		$args = array(
			'post_type' 			=> 'portfolio',
			'posts_per_page' 		=> intval($count),
			'paged' 				=> -1,
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'ignore_sticky_posts' 	=>1,
		);
		if( $category ) $args['portfolio-types'] = $category;

		$query = new WP_Query();
		$query->query( $args );
		$post_count = $query->post_count;

		if ($query->have_posts())
		{
			$output  = '<div class="portfolio_slider">';
				$output .= '<ul class="portfolio_slider_ul">';
					while ($query->have_posts())
					{
						$query->the_post();
		
						$output .= '<li>';
							$output .= '<a class="photo-wrapper" href="'. get_permalink() .'">';
								$output .= get_the_post_thumbnail( null, 'portfolio-slider', array('class'=>'scale-with-grid' ) );
							$output .= '</a>';
							$output .= '<div class="hover-box">';
								$output .= '<h5>'. get_the_title() .'</h5>';
								$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );						
								$output .= '<a class="hover-button zoom prettyphoto" href="'. $large_image_url[0] .'"><i class="icon-search"></i></a>';
								$output .= '<a class="hover-button link" href="'. get_permalink() .'"><i class="icon-link"></i></a>';
							$output .= '</div>';
						$output .= '</li>';
					}
				$output .= '</ul>';
			$output .= '</div>'."\n";
		}
		wp_reset_query();

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Map [map]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_map' ) )
{
	function sc_map( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'lat' 		=> '',
			'lng' 		=> '',
			'height' 	=> 200,
			'zoom' 		=> 13,
			'uid' 		=> uniqid(),
		), $attr));
		
		wp_enqueue_script( 'google-maps', 'http://maps.google.com/maps/api/js?sensor=false', false, THEME_VERSION, true );
	
		$output = '<script>';
			//<![CDATA[
			$output .= 'function google_maps_'. $uid .'(){';
				$output .= 'var latlng = new google.maps.LatLng('. $lat .','. $lng .');';
				$output .= 'var myOptions = {';
					$output .= 'zoom				: '. intval($zoom) .',';
					$output .= 'center				: latlng,';
					$output .= 'zoomControl			: true,';
					$output .= 'mapTypeControl		: false,';
					$output .= 'streetViewControl	: false,';
					$output .= 'scrollwheel			: false,';       
					$output .= 'mapTypeId			: google.maps.MapTypeId.ROADMAP';
				$output .= '};';
		
				$output .= 'var map = new google.maps.Map(document.getElementById("google-map-area-'. $uid .'"), myOptions);';
// 				$output .= 'var image = "'. THEME_URI .'/images/pin_large.png";';
				$output .= 'var marker = new google.maps.Marker({';
					$output .= 'position			: latlng,';
					$output .= 'map					: map';
// 					$output .= 'icon				: image';
				$output .= '});';
			
			$output .= '}';
		
			$output .= 'jQuery(document).ready(function($){';
				$output .= 'google_maps_'. $uid .'();';
			$output .= '});';	
			//]]>
		$output .= '</script>'."\n";
	
		$output .= '<div class="google-map" id="google-map-area-'. $uid .'" style="width:100%; height:'. intval($height) .'px;">&nbsp;</div>'."\n";	
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Tabs [tabs]
 * --------------------------------------------------------------------------- */
global $tabs_array, $tabs_count;
if( ! function_exists( 'sc_tabs' ) )
{
	function sc_tabs( $attr, $content = null )
	{
		global $tabs_array, $tabs_count;
		
		extract(shortcode_atts(array(
			'uid'	=> 'tab-'. uniqid(),
			'tabs'	=> '',
			'type'	=> '',
		), $attr));	
		do_shortcode( $content );
		
		// content builder
		if( $tabs ){
			$tabs_array = $tabs;
		}
		
		if( is_array( $tabs_array ) )
		{
			$output  = '<div class="jq-tabs tabs_wrapper tabs_'. $type .'">';
			$output .= '<ul>';
			
			$i = 1;
			$output_tabs = '';
			foreach( $tabs_array as $tab )
			{
				$output .= '<li><a href="#'. $uid .'-'. $i .'">'. $tab['title'] .'</a></li>';
				$output_tabs .= '<div id="'. $uid .'-'. $i .'">'. do_shortcode( $tab['content'] ) .'</div>';
				$i++;
			}
			
			$output .= '</ul>';
			$output .= $output_tabs;
			$output .= '</div>';
			
			$tabs_array = '';
			$tabs_count = 0;
	
			return $output;
		}
	}
}


/* ---------------------------------------------------------------------------
 * _Tab [tab] _private
 * --------------------------------------------------------------------------- */
$tabs_count = 0;
if( ! function_exists( 'sc_tab' ) )
{
	function sc_tab( $attr, $content = null )
	{
		global $tabs_array, $tabs_count;
		
		extract(shortcode_atts(array(
			'title' => 'Tab title',
		), $attr));
		
		$tabs_array[] = array(
			'title' => $title,
			'content' => do_shortcode( $content )
		);	
		$tabs_count++;
	
		return true;
	}
}


/* ---------------------------------------------------------------------------
 * Accordion [accordion]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_accordion' ) )
{
	function sc_accordion( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' 	=> '',
			'tabs' 		=> '',
			'open1st' 	=> '',
		), $attr));
		
		// open 1st
		if( $open1st ){
			$class = 'open1st';
		} else {
			$class = false;
		}
		
		$output  = '';
		
		$output .= '<div class="accordion">';
			if( $title ) $output .= '<h4 class="title">'. $title .'</h4>';
			$output .= '<div class="mfn-acc accordion_wrapper '. $class .'">';
						
				if( is_array( $tabs ) ){
					// content builder
					foreach( $tabs as $tab ){
						$output .= '<div class="question">';
							$output .= '<h5><span class="icon"><i class="icon-right-open"></i></span>'. $tab['title'] .'</h5>';
							$output .= '<div class="answer">';
								$output .= do_shortcode($tab['content']);	
							$output .= '</div>';
						$output .= '</div>'."\n";
					}
				} else {
					// shortcode
					$output .= do_shortcode($content);	
				}
				
			$output .= '</div>';
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * FAQ [faq]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_faq' ) )
{
	function sc_faq( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' 	=> '',
			'tabs' 		=> '',
			'open1st' 	=> '',
		), $attr));
		
		// open 1st
		if( $open1st ){
			$class = 'open1st';
		} else {
			$class = false;
		}
		
		$output  = '';
		
		$output .= '<div class="faq">';
			if( $title ) $output .= '<h4 class="title">'. $title .'</h4>';
			$output .= '<div class="mfn-acc faq_wrapper '. $class .'">';
			
			if( is_array( $tabs ) ){
				// content builder
				foreach( $tabs as $tab ){
					$output .= '<div class="question">';
						$output .= '<h5><span class="icon">?</span>'. $tab['title'] .'</h5>';
						$output .= '<div class="answer">';
							$output .= do_shortcode($tab['content']);	
						$output .= '</div>';
					$output .= '</div>'."\n";
				}
			} else {
				// shortcode
				$output .= do_shortcode($content);	
			}
			
			$output .= '</div>';
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Progress Bars [progress_bars] [/progress_bars]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_progress_bars' ) )
{
	function sc_progress_bars( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
		), $attr));
	
	
		$output = '<div class="progress_bars">';
			if( $title ) $output .= '<h4 class="title">'. $title .'</h4>';
			$output .= '<ul class="bars_list">';
				$output .= do_shortcode( $content );
			$output .= '</ul>';
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * _Bar [bar]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_bar' ) )
{
	function sc_bar( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
			'value' => 0,
		), $attr));
	
		$value = intval( $value );
	
		$output  = '<li>';
			$output .= '<div class="bar_wrapper">';
				$output .= '<div class="bar">';
					$output .= '<span class="label">'. $value .'%</span>';
					$output .= '<span class="progress" style="width:'. $value .'%"></span>';
				$output .= '</div>';
			$output .= '</div>';
			$output .= '<h6>'. $title .'</h6>';
		$output .= '</li>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Progress Box [progress_box] [/progress_box]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_progress_box' ) )
{
	function sc_progress_box( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'value' => 0,
			'title' => '',
		), $attr));
		
		$value = intval( $value );
		
		$output = '<div class="progress_box">';
			$output .= '<div class="bar_wrapper">';
				$output .= '<div class="bar">';
					$output .= '<span style="height:'. $value .'%;" class="progress"></span>';
				$output .= '</div>';
				$output .= '<div class="label_wrapper">';
					$output .= '<span class="label">'. $value .'%</span>';
				$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="desc_wrapper">';
				$output .= '<h5>'. $title .'</h5>';
				$output .= '<hr class="hr_left" />';
				$output .= '<div class="desc">'. do_shortcode( $content ) .'</div>';
			$output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Timeline [timeline] [/timeline]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_timeline' ) )
{
	function sc_timeline( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'count' => '',
			'tabs' => '',
		), $attr));
		
		$output  = '<ul class="timeline_items">';
		
		if( is_array( $tabs ) ){
			// content builder
			foreach( $tabs as $tab ){
				$output .= '<li>';
					$output .= '<h5>'. $tab['title'] .'</h5>';
					if( $tab['content'] ){
						$output .= '<div class="desc">';
							$output .= do_shortcode($tab['content']);
						$output .= '</div>';
					}
				$output .= '</li>';
			}
		} else {
			// shortcode
			$output .= do_shortcode($content);
		}
		
		$output .= '</ul>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Testimonials [testimonials]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_testimonials' ) )
{
	function sc_testimonials( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'category' 	=> '',
			'orderby' 	=> 'menu_order',
			'order' 	=> 'ASC',
		), $attr));
		
		$args = array(
			'post_type' 			=> 'testimonial',
			'posts_per_page' 		=> -1,
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'ignore_sticky_posts' 	=>1,
		);
		if( $category ) $args['testimonial-types'] = $category;
		
		$query_tm = new WP_Query();
		$query_tm->query( $args );
		
		$output = '';
		if ($query_tm->have_posts())
		{
			$output .= '<div class="testimonials">';
				$output .= '<ul class="testimonials-slider">';
				
					while ($query_tm->have_posts())
					{
						$query_tm->the_post();
						$output .= '<li>';
							$output .= '<blockquote>'. get_the_content() .'</blockquote>';	
							$output .= '<div class="author">';
								if( $link = get_post_meta(get_the_ID(), 'mfn-post-link', true) ) $output .= '<a target="_blank" href="'. $link .'">';
									$output .= get_post_meta(get_the_ID(), 'mfn-post-author', true);
								if( $link ) $output .= '</a>';
							$output .= '</div>';
						$output .= '</li>';
					}
					wp_reset_query();
					
				$output .= '</ul>';
			$output .= '</div>'."\n";
		}
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Vimeo [video]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_video' ) )
{
	function sc_video( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'video' 	=> '',
			'width' 	=> '710',
			'height' 	=> '426',
		), $attr));
		
		$output  = '<div class="content_video">';
			if( is_numeric($video) ){
				// Vimeo
				$output .= '<iframe class="scale-with-grid" width="'. $width .'" height="'. $height .'" src="http://player.vimeo.com/video/'. $video .'" allowFullScreen></iframe>'."\n";
			} else {
				// YouTube
				$output .= '<iframe class="scale-with-grid" width="'. $width .'" height="'. $height .'" src="http://www.youtube.com/embed/'. $video .'?wmode=opaque" allowfullscreen></iframe>'."\n";
			}
		$output .= '</div>'."\n";
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Video Box [video_box] [/video_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_video_box' ) )
{
	function sc_video_box( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title'	=> '',
			'video_m4v'	=> '',
		), $attr));
		
		$output = '<div class="video_box">';
		
			$output .= '<div class="desc_wrapper">';
				$output .= '<h3>'. $title .'</h3>';
				$output .= '<a href="#" class="icon"><i class="icon-play"></i></a>';
				$output .= '<h6>'. do_shortcode($content) .'</h6>';
			$output .= '</div>';
			
			$output .= '<div class="player_wrapper">';
				if( $video_m4v ){
					$output .= mfn_jplayer_html( $video_m4v );
				}
			$output .= '</div>';
			
		$output .= '</div>'."\n";
		
		return $output;
	}
}


// column shortcodes -----------------------
add_shortcode( 'one', 'sc_one' );
add_shortcode( 'one_second', 'sc_one_second' );
add_shortcode( 'one_third', 'sc_one_third' );
add_shortcode( 'two_third', 'sc_two_third' );
add_shortcode( 'one_fourth', 'sc_one_fourth' );
add_shortcode( 'two_fourth', 'sc_two_fourth' );
add_shortcode( 'three_fourth', 'sc_three_fourth' );

// content shortcodes ----------------------
add_shortcode( 'blockquote', 'sc_blockquote' );
add_shortcode( 'button', 'sc_button' );
add_shortcode( 'code', 'sc_code' );
add_shortcode( 'dropcap', 'sc_dropcap' );
add_shortcode( 'divider', 'sc_divider' );
add_shortcode( 'highlight', 'sc_highlight' );
add_shortcode( 'ico', 'sc_ico' );
add_shortcode( 'image', 'sc_image' );
add_shortcode( 'tooltip', 'sc_tooltip' );
add_shortcode( 'video', 'sc_video' );

// builder shortcodes ----------------------
add_shortcode( 'article_box', 'sc_article_box' );
add_shortcode( 'blog', 'sc_blog' );
add_shortcode( 'chart', 'sc_chart' );
add_shortcode( 'clients', 'sc_clients' );
add_shortcode( 'contact_box', 'sc_contact_box' );
add_shortcode( 'counter', 'sc_counter' );
add_shortcode( 'fancy_heading', 'sc_fancy_heading' );
add_shortcode( 'icon_box', 'sc_icon_box' );
add_shortcode( 'map', 'sc_map' );
add_shortcode( 'our_team', 'sc_our_team' );
add_shortcode( 'portfolio', 'sc_portfolio' );
add_shortcode( 'pricing_item', 'sc_pricing_item' );
add_shortcode( 'progress_bars', 'sc_progress_bars' );
add_shortcode( 'progress_box', 'sc_progress_box' );
add_shortcode( 'testimonials', 'sc_testimonials' );
add_shortcode( 'video_box', 'sc_video_box' );

// private shortcodes ----------------------
add_shortcode( 'bar', 'sc_bar' );

?>