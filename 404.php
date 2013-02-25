<?php session_start();

/**
 * 404 Template (Premium)
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */
 
// STORE REFERRED BY CODE
$_SESSION['referredBy'] = $referralindex;

get_template_part('header'); // using this instead of get_header so we can pass $referralindex variable 

// LOG VISITS AND CONVERSIONS
logVisits($referralindex, $stats_table);

// GET PREMIUM THEME HEADER
get_template_part('/premium/theme-header'); 

?>

	<?php get_sidebar(); ?>
	
	<div id="main">
		<div class="lepost">
			<h1><?php le('lefx_pages_404_heading'); ?></h1>
			<p><?php le('lefx_pages_404_message'); ?></p>
		</div>
	</div>
	
	<?php get_template_part('/launch/launch-footer'); ?>
	
</div> <!-- end #wrapper -->

<?php 

get_footer(); 

?>