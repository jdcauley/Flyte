<?php session_start();

/**
 * Launch Template
 *
 * Loads the launch.php include for the Launch page
 *
 * @package WordPress
 * @subpackage Launch_Effect
 * 
 */

// STORE REFERRED BY CODE
$_SESSION['referredBy'] = $referralindex;

include('header.php'); // using this instead of get_header so we can pass $referralindex variable 

// Template Name: Launch Module

// LOG VISITS AND CONVERSIONS
logVisits($referralindex, $stats_table);

if ( have_posts() ) : while ( have_posts() ) : the_post();

	// GET THE LAUNCH PAGE
	include('launch/launch.php'); 
	
endwhile; else: endif;

get_footer(); 

?>