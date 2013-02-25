<?php
/**
 * Header
 *
 * Displays all of the <head> section and everything up to and including <body>
 *
 * @package WordPress
 * @subpackage Launch_Effect
 */

?>
<!DOCTYPE HTML>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"> <!--<![endif]-->
<head profile="http://gmpg.org/xfn/11">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1.0, initial-scale=1.0">
	
	<?php if(ler('lefx_meta_disable') == false): ?>

		<!-- BEGIN Meta and Open Graph Tags -->
		
		<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>"/>
		<?php if (ler('lefx_description_fbadmins')) { ?>
		<meta property="fb:admins" content="<?php le('lefx_description_fbadmins'); ?>"/>
		<?php } ?>
		<?php if (ler('lefx_description_fbappid')) { ?>
		<meta property="fb:app_id" content="<?php le('lefx_description_fbappid'); ?>"/>
		<?php } ?>

		<?php if(is_single() || (is_page() && !is_page_template( 'launch.php' ))): ?>
		
			<?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?>
			<meta property="og:url" content="<?php the_permalink(); ?>"/>
			<meta name="description" content="<?php if(get_the_excerpt()) { echo strip_tags(get_the_excerpt()); } else if(ler('bkt_metadesc')) { echo str_replace(array("\r\n", "\r", "\t", "\n"), " ", ler('bkt_metadesc')); } else { bloginfo('description'); } ?>" />
			<meta property="og:description" content="<?php if(get_the_excerpt()) { echo strip_tags(get_the_excerpt()); } else if(ler('bkt_metadesc')) { echo str_replace(array("\r\n", "\r", "\t", "\n"), " ", ler('bkt_metadesc')); } else { bloginfo('description'); } ?>" />	
			<meta property="og:type" content="article" />
			<?php if(function_exists('wp_get_attachment_url') && wp_get_attachment_url(get_post_thumbnail_id($post->ID))):
			$ogImageSrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 500, 500 ), false, '' ); ?>
			<meta property="og:image" content="<?php echo $ogImageSrc[0]; ?>" />
			<?php elseif (getFirstPostImage()): ?>
			<meta property="og:image" content="<?php echo getFirstPostImage(); ?>" />
			<?php elseif (leimg('bkt_thumb', 'bkt_thumbdisable', 'plugin_options')): ?>
			<meta property="og:image" content="<?php echo leimg('bkt_thumb', 'bkt_thumbdisable', 'plugin_options'); ?>" />
			<?php endif; ?>
				
		<?php else: ?>
	
			<meta name="description" content="<?php if(ler('bkt_metadesc')) { echo str_replace(array("\r\n", "\r", "\t", "\n"), " ", ler('bkt_metadesc')); } else { bloginfo('description'); }  ?>" />
			<meta property="og:url" content="<?php echo home_url(); ?>/"/> 
			<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
			<meta property="og:description" content="<?php if(ler('bkt_metadesc')) { echo str_replace(array("\r\n", "\r", "\t", "\n"), " ", ler('bkt_metadesc')); } else { bloginfo('description'); }  ?>" />
			<meta property="og:type" content="website"/>
			<?php if(leimg('bkt_thumb', 'bkt_thumbdisable', 'plugin_options')) { ?>
			<meta property="og:image" content="<?php echo leimg('bkt_thumb', 'bkt_thumbdisable', 'plugin_options'); ?>"/>
			<?php } ?>
			
		<?php endif; ?>
		
		<!-- END Meta and Open Graph Tags -->
	
	<?php endif; ?>
	
	
	<!-- Favicon -->
	<?php if(leimg('bkt_favicon', 'bkt_favdisable', 'plugin_options')) { ?>
	<link rel="shortcut icon" href="<?php echo leimg('bkt_favicon', 'bkt_favdisable', 'plugin_options'); ?>" type="image/x-icon" />
	<?php } ?>
	
	<!-- WebFonts -->
	<?php 
	$lefx_webfonts_dups = array(ler('heading_font_goog'), ler('subheading_font_goog'), ler('label_font_goog'), ler('description_font_goog'), ler('lefx_pages_nav_font_goog'), ler('lefx_pages_textlogo_font_goog'), ler('lefx_pages_h2_font_goog'), ler('lefx_pages_h3_font_goog'), ler('lefx_pages_h4_font_goog'), ler('lefx_pages_bodytext_font_goog'), ler('lefx_pages_tab_font_goog'), ler('lefx_pages_learnmoretab_font_goog'));
	$lefx_webfonts_unique = array_filter(array_unique($lefx_webfonts_dups));
	$lefx_webfonts = implode("', '", str_replace(' ','+',$lefx_webfonts_unique));
	
	if($lefx_webfonts || ler('lefx_typekit') || ler('lefx_monotype')): ?>

	<script type="text/javascript">
		WebFontConfig = {
			<?php
			if($lefx_webfonts) { ?>google: { families: [ '<?php echo $lefx_webfonts; ?>' ] }<?php }
			if(ler('lefx_typekit')) { if($lefx_webfonts) { echo ', '; } ?>typekit: { id: '<?php le('lefx_typekit'); ?>' }<?php }
			if(ler('lefx_monotype')) { if(ler('lefx_typekit') || $lefx_webfonts) { echo ', '; } ?>monotype: { projectId: '<?php le('lefx_monotype'); ?>'}<?php } ?>
		};
	</script>

	<?php endif; ?>

	<?php wp_head(); ?>

	<!-- Mobile Stylesheets -->
	<?php if(ler('container_width') == 'large') { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/ss/responsive.css" media="only screen and (max-width: 768px)"/>
	<?php } else if(ler('container_width') == 'medium') { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/ss/responsive.css" media="only screen and (max-width: 590px)"/>
	<?php } else { ?> 
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/ss/responsive.css" media="only screen and (max-width: 480px)"/>
	<?php } ?>

	<!-- Google PlusOne Button -->
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
	      {"parsetags": "explicit"}
	</script>

	<!-- Start Google Analytics -->	
	<?php if(ler('bkt_google')) { ?>
	<script type="text/javascript"> 
		<?php echo ler('bkt_google'); ?>
	</script>
	<?php } ?>
	<!-- End Google Analytics -->	

	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<style>
	#background {
		filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php 
			echo leimg('supersize', 'supersize_disable', 'plugin_options'); 
		?>', sizingMethod='scale');
		
		-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php 
			echo leimg('supersize', 'supersize_disable', 'plugin_options'); 
		?>', sizingMethod='scale')";
	}
	
	</style>
	<![endif]-->
	
	<!-- Start Additional User-Defined Code -->
	<?php echo ler('lefx_addjshead'); ?>
	<!-- End Additional User-Defined Code -->

	<!-- Start Additional User-Defined CSS -->
	<?php if(ler('lefx_addcsshead')) { ?>
	<style type="text/css">
	<?php echo ler('lefx_addcsshead'); ?>
	</style>
	<?php } ?>
	<!-- End Additional User-Defined CSS -->
</head>

<body <?php body_class((lefx_version() != 'premium')?"lite":""); ?>>

	<div id="fb-root"></div>
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({<?php if (ler('lefx_description_fbappid')) { ?>appId: '<?php le('lefx_description_fbappid'); ?>',<?php } ?> 
	             status: true, 
	             cookie: true,
	 	     	 xfbml: true,
	 	     	 channelUrl: '<?php echo get_template_directory_uri(); ?>/inc/facebookchannel.php'
	 	     	 });
	  };
	  (function() {
	    var e = document.createElement('script'); e.async = true;
	    e.src = document.location.protocol +
	      '//connect.facebook.net/en_US/all.js';
	    document.getElementById('fb-root').appendChild(e);
	  }());
	</script>
	
	<div id="background" class="<?php 
		if (get_option('lefx_bg_image2')&&get_option('lefx_enable_slideshow')) 
			echo "slideshow"; 
	?>"><?php
	$output = leimg('supersize', 'supersize_disable', 'plugin_options');
	if ( get_option('lefx_enable_slideshow') && $output ) : 
		$output = "<div style='background-image: url($output);'></div>"; 
		$speed = get_option('lefx_slide_fx_speed');
		$duration = get_option('lefx_slide_speed');
		for ( $i=2;$i<6;$i++) {
			$img = get_option('lefx_bg_image'.$i);
		
			if ($img) $output .= "<div style='background-image: url($img);'></div>"; 
		} 
		echo $output; ?>
		<script type="text/javascript">
		$(document).ready(function (){
			$bg = $('#background');
			if ( $bg.children('div').length ) {
				$bg.addClass('slideshow');
				// do fadeshow
				var ss_args = {
					curr: 0,
					speed: parseFloat(<?php echo !empty($speed)&&is_numeric($speed)?$speed:2.5; ?>)*1000,
					duration: parseFloat(<?php echo !empty($duration)&&is_numeric($duration)?$duration:5; ?>)*1000
				}
				if (!$.support.leadingWhitespace) {
					$bg.children('div').each( function (){
						style = $(this).css('background-image');
						src = style.replace(/^url\(["']?/, '').replace(/["']?\)$/, '');
						$(this).css({
							'filter': "progid:DXImageTransform.Microsoft.AlphaImageLoader(src="+src+",sizingMethod='scale') alpha(opacity=0)",
							'-ms-filter': "progid:DXImageTransform.Microsoft.AlphaImageLoader(src="+src+",sizingMethod='scale') alpha(opacity=0)"
						});
					});
				}
				$bg.children('div').eq(0).delay(500).animate({opacity:1}, ss_args.speed);
				setInterval( function (){
					prev = ss_args.curr;
					next = ss_args.curr+1;
					if (ss_args.curr === false) {
						prev = $bg.children('div').length-1;
						next = 0;
						ss_args.curr=-1;
					}
					$bg.children('div').eq(prev).animate({opacity: 0},ss_args.speed);
					$bg.children('div').eq(next).animate({opacity: 1},ss_args.speed);
					ss_args.curr += 1;
					if (ss_args.curr == $bg.children('div').length-1){
						ss_args.curr=false;
					}
				}, ss_args.duration);
			} else {
				$bg.delay(500).animate({opacity:1});
			}
		});
		</script>
	<?php endif; ?></div>