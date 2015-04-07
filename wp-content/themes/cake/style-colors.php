<?php
/**
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */

header( 'Content-type: text/css;' );
	
$url = dirname( __FILE__ );
$strpos = strpos( $url, 'wp-content' );
$base = substr( $url, 0, $strpos );

require_once( $base .'wp-load.php' );
?>

/********************** Backgrounds **********************/

	.template-slider #Header {
		background-color: <?php mfn_opts_show( 'background-header-homepage', '#6ea81a' ) ?>;
	}

	#Header {
		background-color: <?php mfn_opts_show( 'background-header', '#eeeeee' ) ?>;
	}
	
	#Footer {
		background-color: <?php mfn_opts_show( 'background-footer', '#19191B' ) ?>;
	}
	
	#Footer .footer_copy {
		background: <?php mfn_opts_show( 'background-copy', '#0d0d0d' ) ?>;
	}	
	
	#back_to_top {
		background: <?php hex2rgba( mfn_opts_get( 'background-copy', '#0d0d0d' ), .5, true ) ?>;
	}	

/************************ Colors ************************/

/* Content font */
	body, .icon_box a .desc, .article_box a .desc_wrapper, .testimonials li .author a, .highlight.highlight_image {
		color: <?php mfn_opts_show( 'color-text', '#565656' ) ?>;
	}
	
/* Links color */
	a {
		color: <?php mfn_opts_show( 'color-a', '#76B51B' ) ?>;
	}
	
	a:hover {
		color: <?php mfn_opts_show( 'color-a-hover', '#486e14' ) ?>;
	}
	
/* Selections */
	*::-moz-selection {
		background-color: <?php mfn_opts_show( 'color-a', '#76B51B' ) ?>;
	}
	*::selection {
		background-color: <?php mfn_opts_show( 'color-a', '#76B51B' ) ?>;		
	}
	
/* Headings font */
	h1, h1 a, h1 a:hover { color: <?php mfn_opts_show( 'color-h1', '#545454' ) ?>; }
	h2, h2 a, h2 a:hover { color: <?php mfn_opts_show( 'color-h2', '#545454' ) ?>; }
	h3, h3 a, h3 a:hover { color: <?php mfn_opts_show( 'color-h3', '#446b0b' ) ?>; }
	h4, h4 a, h4 a:hover { color: <?php mfn_opts_show( 'color-h4', '#545454' ) ?>; }
	h5, h5 a, h5 a:hover { color: <?php mfn_opts_show( 'color-h5', '#545454' ) ?>; }
	h6, h6 a, h6 a:hover { color: <?php mfn_opts_show( 'color-h6', '#545454' ) ?>; }

/* Grey notes */
	.blockquote .author a, .post-meta, .post-meta a, .button-love a .label, .button-comments a .label, .post-meta-modern .date .month,
	.post-related .desc .date, .Recent_posts li .desc p, .Recent_comments li .date, .wp-caption .wp-caption-text, .tp_recent_tweets .twitter_time {
		color: <?php mfn_opts_show( 'color-note', '#a9a9a9' ) ?>;
	}
	
/* Strong */
	.team .desc .inside p.subtitle, .chart_box .chart .num, .timeline_items li h5 span {
		color: <?php mfn_opts_show( 'color-note-bold', '#486e14' ) ?>;
	}

/* Text hightlight & dropcap */
	.highlight:not(.highlight_image), .dropcap {
		background: <?php mfn_opts_show( 'background-highlight', '#76B51B' ) ?>;
		color: <?php mfn_opts_show( 'color-highlight', '#ffffff' ) ?>;
	}
	
/* Highlight section */
	.highlight-left:after,
	.highlight-right:after {
		background: <?php mfn_opts_show( 'background-highlight-section', '#6ea81a' ) ?>;
	}
	@media only screen and (max-width: 767px) {
		.highlight-left	.column:first-child,
		.highlight-right .column:last-child {
			background: <?php mfn_opts_show( 'background-highlight-section', '#6ea81a' ) ?>;
		}
	}
	
/* Button default */
	a.button, a.tp-button, button, input[type="submit"], input[type="reset"], input[type="button"] {
		border-color: <?php mfn_opts_show( 'color-button', '#545454' ) ?>;
		color: <?php mfn_opts_show( 'color-button', '#545454' ) ?>;
	}
	a:hover.button, a:hover.tp-button, button:hover, input[type="submit"]:hover, input[type="reset"]:hover, input[type="button"]:hover {
		background-color: <?php mfn_opts_show( 'color-button', '#545454' ) ?>;
	}

/* Button filled */	
	a.button.button_filled, a.tp-button.button_filled, button.button_filled, input[type="submit"].button_filled, input[type="reset"].button_filled, input[type="button"].button_filled {
		background-color: <?php mfn_opts_show( 'background-button-filled', '#76B51B' ) ?> !important;
		color: <?php mfn_opts_show( 'color-button-filled', '#ffffff' ) ?> !important;		
	}
	a:hover.button.button_filled, a:hover.tp-button.button_filled, button:hover.button_filled, input[type="submit"]:hover.button_filled, input[type="reset"]:hover.button_filled, input[type="button"]:hover.button_filled {
		background-color: <?php mfn_opts_show( 'background-button-filled-hover', '#486e14' ) ?> !important;
		color: <?php mfn_opts_show( 'color-button-filled', '#ffffff' ) ?> !important;
	}
	
/* Menu */
	#Header .menu > li.current-menu-item > a,
	#Header .menu > li.current_page_item > a,
	#Header .menu > li.current-menu-ancestor > a,
	#Header .menu > li.current_page_ancestor > a,
	#Header .menu > li > a:hover,
	#Header .menu > li.hover > a {
		color: <?php mfn_opts_show( 'color-menu-a-active', '#6ea81a' ) ?>;
	}
	#Header .menu > li ul li a:hover {
		color: <?php mfn_opts_show( 'color-menu-a-active', '#6ea81a' ) ?>;
	}
	
	#Header .menu > li > a:after, #Header .menu li ul li:hover > a span:after {
		background: <?php mfn_opts_show( 'color-menu-a-active', '#6ea81a' ) ?>;
	}
	
/* Subheader */
	#Subheader .title {
		color: <?php mfn_opts_show( 'color-subheader-title', '#486e14' ) ?>;
	}
	#Subheader ul.breadcrumbs li a,  #Subheader ul.breadcrumbs li span {
		color: <?php mfn_opts_show( 'color-subheader-breadcrumbs', '#A9A9A9' ) ?>;
	}
		
/* Subheader love / comments */
	.filters_buttons a.button {
		border-color: <?php mfn_opts_show( 'color-subheader-button', '#545454' ) ?>;
		color: <?php mfn_opts_show( 'color-subheader-button', '#545454' ) ?>;
	}
	.filters_buttons a:hover.button {
		background-color: <?php mfn_opts_show( 'color-subheader-button', '#545454' ) ?>;
	}
	.post-buttons-wrapper .button-love a i, .post-buttons-wrapper .button-love a span,
	.post-buttons-wrapper .button-comments a i, .post-buttons-wrapper .button-comments a span {
		color: <?php mfn_opts_show( 'color-subheader-button', '#545454' ) ?>;
	}
	
/* Filters */
	.filters_wrapper ul li a:hover {
		background: <?php mfn_opts_show( 'background-subheader-button', '#76B51B' ) ?>;
	}		
	
/* Blog */
	.button-love a i, .button-comments a i {
		color: <?php mfn_opts_show( 'color-blog-icon', '#76B51B' ) ?>;
	}

/* Format quote */
	.format-quote .post-desc, .post-related.format-quote .bq_wrapper {
		background: <?php mfn_opts_show( 'background-blog-quote', '#76B51B' ) ?>;
		border-color: <?php mfn_opts_show( 'background-blog-quote', '#76B51B' ) ?>;
	}
	
/* Audio */
.mejs-container .mejs-controls {
		background: <?php mfn_opts_show( 'background-blog-quote', '#76B51B' ) ?> !important;
	}

/* pager */
	.pager a.prev_page, .pager a.next_page {
	    background: <?php mfn_opts_show( 'background-pager-arrow', '#76B51B' ) ?>;
	}
	.pager a:hover.prev_page, .pager a:hover.next_page {
		background: <?php mfn_opts_show( 'background-pager-arrow-hover', '#486e14' ) ?>;
	}
	
/* Accordion / FAQ / Tabs */
	.accordion .question > h5 span.icon, .faq .question > h5 span.icon {
		color: <?php mfn_opts_show( 'color-accordion-icon', '#6ea81a' ) ?>;
	}
	 .accordion .question > h5 span.icon:after, .faq .question > h5 span.icon:after {
	 	border-color: <?php mfn_opts_show( 'color-accordion-icon', '#6ea81a' ) ?>;
	 }
	.accordion .active.question > h5 span.icon, .faq .active.question > h5 span.icon {
		background: <?php mfn_opts_show( 'color-accordion-icon', '#6ea81a' ) ?>;
	}
	
	.ui-tabs .ui-tabs-nav li a {
		color: <?php mfn_opts_show( 'color-tabs-title', '#fff' ) ?>;
		background: <?php mfn_opts_show( 'background-tabs-title', '#434343' ) ?>;
	}
	.ui-tabs .ui-tabs-nav li.ui-state-active a, .tabs_big_icon.ui-tabs .ui-tabs-nav li a {
		color: <?php mfn_opts_show( 'color-tabs-title-active', '#545454' ) ?>;
	}
	.ui-tabs .ui-tabs-panel, .ui-tabs .ui-tabs-nav li.ui-state-active a, .tabs_big_icon.ui-tabs .ui-tabs-nav li.ui-state-active a {
		background: <?php mfn_opts_show( 'background-tabs-title-active', '#fafafa' ) ?>;
	}

	.tabs_big_icon.ui-tabs .ui-tabs-nav li a i {
		color: <?php mfn_opts_show( 'color-tabs-icon', '#6ea81a' ) ?>;
	}
	
/* Photo mask */
	.photo_mask .mask {
		box-shadow: inset 0 0 0 170px <?php mfn_opts_show( 'background-image-mask', '#76b51b' ) ?>;
	}
	a.button_image, span.button_image {
		color: <?php mfn_opts_show( 'color-image-mask-icon', '#6ea81a' ) ?>;
	}
	
/* Counter */
	.counter .number {
		color: <?php mfn_opts_show( 'color-counter', '#76B51B' ) ?>;
	}

/* Icon box */
	.icon_box .icon_wrapper i {
		color: <?php mfn_opts_show( 'color-icon-box', '#76B51B' ) ?>;
	}
	.icon_box .icon_wrapper:before {
		box-shadow: inset 0 0 0 2px <?php mfn_opts_show( 'color-icon-box', '#76B51B' ) ?>;
	}
	.icon_box:hover .icon_wrapper:before {
		box-shadow: inset 0 0 0 70px <?php mfn_opts_show( 'color-icon-box', '#76B51B' ) ?>;
	}
	
/* Fancy heading */
	.fancy_heading_color {
		background: <?php mfn_opts_show( 'background-fancy-heading', '#E3E3E3' ) ?>;
	}

/* Portfolio + slider portfolio */
	.portfolio_slider_ul li .hover-box a.hover-button, .portfolio-item .photo .hover-box a.hover-button, .single-portfolio .section-portfolio-header .photo .hover-box a.hover-button {
		background: <?php mfn_opts_show( 'background-portfolio-image-icon', '#76B51B' ) ?>;
		color: <?php mfn_opts_show( 'color-portfolio-image-icon', '#ffffff' ) ?>;
	}
	.portfolio_slider_ul li .hover-box a:hover.hover-button, .portfolio-item .photo .hover-box a:hover.hover-button, .single-portfolio .section-portfolio-header .photo .hover-box a:hover.hover-button {
		background: <?php mfn_opts_show( 'background-portfolio-image-icon-hover', '#486e14' ) ?>;	
	}

/* Blockquote */
	.blockquote.blockquote_modern .blockquote_wrapper {
		background: <?php mfn_opts_show( 'background-blockquote', '#6ea81a' ) ?>;
		border-color: <?php mfn_opts_show( 'background-blockquote', '#6ea81a' ) ?>;
	}
	
/* Contact box */
	.contact_box_modern .contact_box_wrapper {
		background: <?php mfn_opts_show( 'background-contact-box', '#6ea81a' ) ?>;
		border-color: <?php mfn_opts_show( 'background-contact-box', '#6ea81a' ) ?>;
	}
	
/* Progress bars */
	.progress_bars .bars_list li .bar .label, .progress_box .bar_wrapper .label_wrapper .label {
		background: <?php mfn_opts_show( 'background-progress-bar-label', '#434343' ) ?>;
	} 
	.progress_bars .bars_list li .bar .progress, .progress_box .bar_wrapper .bar .progress {
		background: <?php mfn_opts_show( 'background-progress-bar', '#76B51B' ) ?>;
	}

/* Pricing boxes */
	.pricing-box .plan-header .price sup.currency, .pricing-box .plan-header .price > span {
		color: <?php mfn_opts_show( 'color-pricing-price', '#6ea81a' ) ?>;
	}
	.pricing-box .ribbon { 
		background: <?php mfn_opts_show( 'background-pricing-ribbon', '#f66847' ) ?>; 
	}	
	
/* Owl-pagination - testimonials*/
	.owl-pagination .owl-page.active span {
		background: <?php mfn_opts_show( 'background-testimonials-pager-active', '#76B51B' ) ?> !important;
	}	
	
/********* Shop **********/

	.woocommerce span.onsale {
		background: <?php mfn_opts_show( 'background-woo-sale-label', '#76B51B' ) ?> !important;
	}
	.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,
	.woocommerce div.product span.price,
	.woocommerce-page div.product span.price,
	.woocommerce #content div.product span.price,
	.woocommerce-page #content div.product span.price,
	.woocommerce div.product p.price,
	.woocommerce-page div.product p.price,
	.woocommerce #content div.product p.price,
	.woocommerce-page #content div.product p.price { 
		color: <?php mfn_opts_show( 'color-woo-price-color', '#76B51B' ) ?> !important;
	}		
	
/******* Widgets ********/

	.widget > h3, .widget > h4 {
		color: <?php mfn_opts_show( 'color-widget-title', '#545454' ) ?>;
	}

/* Menus */
	 .widget_categories ul li a, .widget_archive ul li a, .widget_mfn_menu ul li a, .widget_mfn_menu ul li.current_page_item a {
	 	color: <?php mfn_opts_show( 'color-widget-menu-a', '#545454' ) ?>;
	 }

/********************** Footer **********************/

#Footer {
	color: <?php mfn_opts_show( 'color-footer', '#ababab' ) ?>;
}

#Footer h1, #Footer h1 a, #Footer h1 a:hover,
#Footer h2, #Footer h2 a, #Footer h2 a:hover,
#Footer h3, #Footer h3 a, #Footer h3 a:hover,
#Footer h4, #Footer h4 a, #Footer h4 a:hover,
#Footer h5, #Footer h5 a, #Footer h5 a:hover,
#Footer h6, #Footer h6 a, #Footer h6 a:hover {
	color: <?php mfn_opts_show( 'color-footer-heading', '#ffffff' ) ?>;
}

#Footer a {
	color: <?php mfn_opts_show( 'color-footer-a', '#ffffff' ) ?>;
}

#Footer a:hover {
	color: <?php mfn_opts_show( 'color-footer-a-hover', '#d1d1d1' ) ?>;
}

/* grey */
#Footer .Recent_posts li .desc p, #Footer .tp_recent_tweets .twitter_time {
	color: <?php mfn_opts_show( 'color-footer-note', '#8c8c8c' ) ?>;
}

#Footer .footer_copy, #Footer .footer_copy a {
	color: <?php mfn_opts_show( 'color-footer-copy', '#808080' ) ?>;
}
#Footer .social li a {
	color: <?php mfn_opts_show( 'color-footer-social', '#808080' ) ?>;
}
#Footer .social li a:hover {
	color: <?php mfn_opts_show( 'color-footer-social-hover', '#ffffff' ) ?>;
}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	