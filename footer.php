<?php
/**
 * Footer
 *
 * Contains the site credit and jQuery Supersized code.
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */
?>
	
	<div class="clear"></div>
	
	<!-- PRIVACY POLICY MODAL -->
	<div id="privacy-policy" class="jqmWindow">
		<a href="#" class="close">&times;</a>
		<h2><?php le('lefx_privacy_policy_heading'); ?></h2>
		<p><?php le('lefx_privacy_policy'); ?></p>
	</div>
	
	<!-- FOOTER BRANDING (Premium/Free) -->
	<?php if(lefx_version() == 'premium') { get_template_part('premium/brand'); } else { ?>
	
	<ul id="footer">
		<li>
			Powered by <a href="http://www.launcheffectapp.com" class="logo" target="_blank">Launch Effect</a> for WordPress by <a href="http://www.barrelny.com" target="_blank">Barrel</a>
		</li>
	</ul>
	
	<?php } ?>
	
	<!-- START ADDITIONAL USER-DEFINED CODE -->
	<?php echo ler('lefx_addjsfooter'); ?>
	<!-- END ADDITIONAL USER-DEFINED CODE -->

<?php wp_footer(); ?> 	
</body>
</html>