<?php

/**
 * Theme Options CSS
 *
 * Contains user-defined style values for the Launch module.
 *
 * @package WordPress
 * @subpackage Launch_Effect
 * 
 */


/* Lets make this dynamic CSS cacheable!
================================================== */

// Bootstrap WordPress and theme functions
include_once('../../../../wp-load.php');
include_once('../functions/designer-functions.php');

// Set the header according to when the CSS was last updated
$max_age = 2419200; // 4 weeks
$now = gmdate('D, d M Y H:i:s', time()).' GMT';
$last_modified = get_theme_mod('lefx_dynamic_css_last_modified',$now);
$etag = md5($last_modified);

ob_start ("ob_gzhandler");
header("ETag: {$etag}");
header("Expires: " . gmdate('D, d M Y H:i:s', time()+$max_age) . ' GMT');
header("Cache-Control: max-age={$max_age}, public, must-revalidate");
header("Last-Modified: {$last_modified}");
header('Content-type: text/css');



/* Variables
================================================== */		
$textShadow = '0px 2px 1px #333';
$letterPress = '0px 1px 1px #' . lighter('container_background_color');
$dropShadow = '-webkit-box-shadow: 0px 0px 10px #111; -moz-box-shadow: 0px 0px 10px #111; box-shadow: 0px 0px 10px #111;';
$glow = '-webkit-box-shadow: 0px 0px 10px #FFF;	-moz-box-shadow: 0px 0px 10px #FFF; box-shadow: 0px 0px 10px #FFF;';
$noShadow = '-webkit-box-shadow: 0px 0px 0px #FFF; -moz-box-shadow: 0px 0px 0px #FFF; box-shadow: 0px 0px 0px #FFF;';
?>



/* Background Color/Image
================================================== */

	html,
	body {
		background: <?php echo '#'; le('page_background_color'); ?>;
	}
	
	<?php if(leimg('supersize', 'supersize_disable', 'plugin_options')) { ?> 
	#background {
		display:block;
		position:fixed;
		top:0;
		z-index:1;
		height:100%;
		width:100%; 
		background: <?php echo '#'; le('page_background_color'); ?> url(<?php echo leimg('supersize', 'supersize_disable', 'plugin_options'); ?>) no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	#background.slideshow {
		background-color: <?php echo '#'; le('page_background_color'); ?>;
		background-image: none;
		filter: none;
		-ms-filter: none;
	}
	#background div {
		background-position: 50% 0%;
		background-repeat: no-repeat;
		background-size: cover;
		height: 100%;
		left: 0;
		opacity: 0;
		position: absolute;
		top: 0;
		width: 100%;
	}
	
	#signup-bodytag #background {
		opacity:0;
	}
	<?php } ?>



/* Container
================================================== */

	#signup {	
		<?php if(leimg('background','background_disable', 'launchmodule_options')) { ?>
		background-image:url('<?php echo leimg('background','background_disable', 'launchmodule_options'); ?>'); 
		background-color:transparent;
		<?php } else { ?><?php if(ler('container_background_color')) { ?>
		background-color: <?php echo '#' . ler('container_background_color'); ?>; <?php } ?><?php } ?>
		
		border-width:<?php echo ler('container_border_width'); ?>;
		border-color:<?php echo '#'; le('container_border_color'); ?>;
		border-style:solid;
		<?php if(get_option('container_effects') == 'dropshadow') { echo $dropShadow; } elseif(get_option('container_effects') == 'glow') { echo $glow; } else { echo $noShadow; } ?>
	}
	
	#signup-page header h1 {
		text-align: <?php echo ler('lefx_logo_alignment'); ?>;
	}
			
	#signup-page header h1 {
		font-family:<?php legogl('heading_font_goog', 'heading_font'); ?>;
		font-weight:<?php lewt('heading_style'); ?>;
		font-style:<?php lestyle('heading_style'); ?>;
		color:<?php echo '#'; le('heading_color'); ?>;
		text-shadow: <?php if(get_option('heading_effects') == 'letterpress') { echo $letterPress; } elseif(get_option('heading_effects') == 'shadow') {echo $textShadow;} else {echo 'none'; } ?>;
		font-size:<?php echo ler('heading_size') . 'em'; ?>;
	}
	
	#signup-page header h1 span {
		display: block;
		text-align: <?php echo ler('heading_alignment'); ?>;
	}
	
	#signup a,
	#privacy-policy a {
		color:<?php echo '#'; le('description_link_color'); ?> !important;
	}
	
	#signup h2,
	#privacy-policy h2 {
		font-family:<?php legogl('subheading_font_goog', 'subheading_font'); ?>;
		font-size:<?php echo ler('subheading_size') . 'em'; ?>;
		font-weight:<?php lewt('subheading_style'); ?>;
		font-style:<?php lestyle('subheading_style'); ?>;
		color:<?php echo '#'; le('subheading_color'); ?>;
		text-shadow: <?php if(get_option('subheading_effects') == 'letterpress') { echo $letterPress; } elseif(get_option('subheading_effects') == 'shadow') {echo $textShadow;} else {echo 'none'; } ?>;
	}
	
	#signup h2.social-heading, 
	#signup label {
		font-family:<?php legogl('label_font_goog', 'label_font'); ?>;
		font-size:<?php echo ler('label_size') . 'em'; ?>;
		font-weight:<?php lewt('label_style') ?>;
		font-style:<?php lestyle('label_style') ?>;
		color:<?php echo '#'; le('label_color'); ?>;
		text-shadow: <?php if(get_option('label_effects') == 'letterpress') { echo $letterPress; } elseif(get_option('label_effects') == 'shadow') {echo $textShadow;} else {echo 'none'; } ?>;
	}
	
	#signup p,
	#privacy-policy p {
		font-size:<?php echo ler('description_size') . 'em'; ?> !important;
		font-family:<?php legogl('description_font_goog', 'description_font'); ?>;
		font-weight:<?php echo ler('description_weight'); ?>;
		color:<?php echo '#'; le('description_color'); ?>;
	}
	
	#presignup-content ul,
	#success-content ul {
		font-size:<?php echo ler('description_size') . 'em'; ?> !important;
		font-family:<?php legogl('description_font_goog', 'description_font'); ?>;
		font-weight:<?php echo ler('description_weight'); ?>;
		color:<?php echo '#'; le('description_color'); ?>;
		margin-left: 20px;
	}

	#presignup-content li,
	#success-content li {
		font-size: 1em;
		line-height:<?php echo ler('description_size') . 'em'; ?> !important;
		list-style: disc;
	}



/* Privacy Policy Modal
================================================== */

	span.privacy-policy {
		color:<?php echo '#'; le('description_color'); ?>;
	}
	
	#privacy-policy {
		background-color: <?php if(!ler('lefx_privacy_policy_bgcolor')) { echo 'white'; } else { echo '#' . ler('lefx_privacy_policy_bgcolor'); } ?>;
	}
	
	#privacy-policy h2 {
		color:<?php echo '#'; le('subheading_color'); ?>  !important;
	}
	
	#privacy-policy p {
		color:<?php echo '#'; le('description_color'); ?> !important;
	}
	
	#privacy-policy a.close:hover {
		color:<?php echo '#' . darker('description_link_color'); ?> !important;
	}
			


/* Form
================================================== */
											
	#signup input#submit-button,
	#signup #submit-button-spinner {
		background-color:<?php echo '#'; le('label_color'); ?>;
	}
	
	#signup span#submit-button-border {
		border-color:<?php echo '#' . darker('label_color'); ?>;
		background:<?php echo '#' . darker('label_color'); ?>;
	}
	
	#signup input#submit-button:hover {
		background-color:<?php echo '#' . darker('label_color'); ?>;
	}



/* Media Queries
================================================== */

	<?php 
	
	if(ler('container_width') == 'large') {
	
		echo '@media screen and (max-width: 768px) {';
	
	} else if(ler('container_width') == 'medium') { 
		
		echo '@media screen and (max-width: 590px) {';
		
	} else {
		
		echo '@media screen and (max-width: 420px) {';
	
	}
	
	?>
		html,
		body { 
			<?php if(ler('container_background_color')) { ?>
			background-color:<?php echo '#' . ler('container_background_color'); ?>;
			<?php } else { ?>
			background-color:<?php echo '#' . ler('page_background_color'); ?>;
			<?php } ?>
		}
		
		<?php if(ler('heading_size') > 5) { ?>
		#signup-page header {
			font-size: 0.7em;
		}
		<?php } ?>
	
	
	}