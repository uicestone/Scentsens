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

/******************* Background ********************/
	
	<?php		
		$aBackground = array();
		$aBackground['color'] = 'background-color:'. mfn_opts_get( 'background-body', '#f7f8f8' );
		
		if( mfn_opts_get( 'img-page-bg' ) ){
			$aBackground[] 	= 'background-image:url('. mfn_opts_get( 'img-page-bg' ) .')';
			$background_attr 	= explode( ';', mfn_opts_get( 'position-page-bg' ) );
			$aBackground[] 	= 'background-repeat:'. $background_attr[0];
			$aBackground[] 	= 'background-position:'. $background_attr[1];
			$aBackground[] 	= 'background-attachment:'. $background_attr[2];
			$aBackground[] 	= '-webkit-background-size:'. $background_attr[3];
			$aBackground[] 	= 'background-size:'. $background_attr[3];
		}
			
		$background 		= implode('; ', $aBackground );
	?>
	
	html { 
		<?php echo $background; ?>;
	}

/********************** Fonts **********************/

 	body, button, input[type="submit"], input[type="reset"], input[type="button"],
	input[type="text"], input[type="password"], input[type="tel"], input[type="email"], textarea, select {
		font-family: <?php mfn_opts_show( 'font-content', 'Ubuntu' ) ?>, Arial, Tahoma, sans-serif;
		font-weight: normal;
	}
	
	#menu > ul > li > a, #header_action_button, #header_cart {
		font-family: <?php mfn_opts_show( 'font-menu', 'Ubuntu' ) ?>, Arial, Tahoma, sans-serif;
		font-weight: normal;
	}
	
	h1 {
		font-family: <?php mfn_opts_show( 'font-headings', 'Ubuntu' ) ?>, Arial, Tahoma, sans-serif;
		font-weight: 300;
	}
	
	h2 {
		font-family: <?php mfn_opts_show( 'font-headings', 'Ubuntu' ) ?>, Arial, Tahoma, sans-serif;
		font-weight: 300;
	}
	
	h3 {
		font-family: <?php mfn_opts_show( 'font-headings', 'Ubuntu' ) ?>, Arial, Tahoma, sans-serif;
		font-weight: 300;
	}
	
	h4 {
		font-family: <?php mfn_opts_show( 'font-headings', 'Ubuntu' ) ?>, Arial, Tahoma, sans-serif;
		font-weight: 300;
	}
	
	h5 {
		font-family: <?php mfn_opts_show( 'font-headings', 'Ubuntu' ) ?>, Arial, Tahoma, sans-serif;
		font-weight: 300;
	}
	
	h6 {
		font-family: <?php mfn_opts_show( 'font-headings', 'Ubuntu' ) ?>, Arial, Tahoma, sans-serif;
		font-weight: 300;
	}


/********************** Font sizes **********************/

/* Body */

	body {
		font-size: <?php mfn_opts_show( 'font-size-content', '14' ) ?>px;
		<?php $line_height = mfn_opts_get( 'font-size-content', '14' ) + 8; ?>
		line-height: <?php echo $line_height; ?>px;		
	}
	
	#menu > ul > li > a, #header_action_button, #header_cart {	
		font-size: <?php mfn_opts_show( 'font-size-menu', '16' ) ?>px;
	}
	
/* Headings */

	h1 { 
		font-size: <?php mfn_opts_show( 'font-size-h1', '36' ) ?>px;
		<?php $line_height = mfn_opts_get( 'font-size-h1', '36' ) + 0; ?>
		line-height: <?php echo $line_height; ?>px;
	}
	
	h2 { 
		font-size: <?php mfn_opts_show( 'font-size-h2', '48' ) ?>px;
		<?php $line_height = mfn_opts_get( 'font-size-h2', '48' ) + 0; ?>
		line-height: <?php echo $line_height; ?>px;
	}
	
	h3 {
		font-size: <?php mfn_opts_show( 'font-size-h3', '36' ) ?>px;
		<?php $line_height = mfn_opts_get( 'font-size-h3', '36' ) + 2; ?>
		line-height: <?php echo $line_height; ?>px;
	}
	
	h4 {
		font-size: <?php mfn_opts_show( 'font-size-h4', '26' ) ?>px;
		<?php $line_height = mfn_opts_get( 'font-size-h4', '26' ) + 4; ?>
		line-height: <?php echo $line_height; ?>px;
	}
	
	h5 {
		font-size: <?php mfn_opts_show( 'font-size-h5', '23' ) ?>px;
		<?php $line_height = mfn_opts_get( 'font-size-h5', '23' ) + 5; ?>
		line-height: <?php echo $line_height; ?>px;
	}
	
	h6 {
		font-size: <?php mfn_opts_show( 'font-size-h6', '18' ) ?>px;
		<?php $line_height = mfn_opts_get( 'font-size-h6', '18' ) + 7; ?>
		line-height: <?php echo $line_height; ?>px;
	}
