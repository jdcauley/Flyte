<?php
/**
 * Launch Template Include
 *
 * Contains the shell around the Launch form
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */
?>

	<div id="signup-page-wrapper"> 
		
		<div id="signup-page"> 
			
			<!-- LEARN MORE BUTTON (Premium) -->
			<?php 
			if(lefx_version() == 'premium') {
				if(ler('lefx_pages_enable') != false) { ?>
				<div id="learn-more-tab">
					<a href="<?php le('lefx_pages_learnmoretab_link'); ?>" id="learn-more"><?php le('lefx_pages_learnmoretab_text'); ?> &rsaquo;</a>	
				</div>	
			<?php } 
			}?>	
			
			<div class="clear"></div>
			
			<div id="signup" class="<?php le('container_width'); ?> <?php le('container_position'); ?> <?php if(get_option('lefx_cust_field1')) { echo 'hascf'; } else { echo 'nocf'; } ?>"> 
			
				<div id="signup-content-wrapper">
					
					<?php if(ler('lefx_editorcontent_placement') && ler('lefx_editorcontent_placement') ==  'At Top') : ?>
					<!-- LOOP CONTENT (AT TOP) -->
					<div id="signup-editor-content"><?php the_content(); ?><div class="clear"></div></div></div>
					<?php endif; ?>	

					<!-- LOGO -->
					<header class="no-margin">
						<?php 
							$logo_src = leimg('bkt_logo', 'bkt_logodisable', 'launchmodule_options'); 
						?><h1 class="<?php 
							if($logo_src) echo 'haslogo'; 
							else echo 'nologo'; 
							if(ler('heading_disable') == false) echo ' hastextheading'; 
							else echo ' notextheading'; 
						?>"><?php 
							if($logo_src) echo "<img src='$logo_src'>"; 
							echo "<span>" . ler('heading_content') . "</span>"; 
						?></h1>
					</header>
					
					<?php if(ler('lefx_editorcontent_placement') && ler('lefx_editorcontent_placement') ==  'After Logo') : ?>
					<!-- LOOP CONTENT (AFTER LOGO) -->
					<div id="signup-editor-content"><?php the_content(); ?><div class="clear"></div></div>
					<?php endif; ?>
					
					<!-- YOUTUBE / VIMEO EMBED -->
					<?php if(ler('video_embed')) { le('video_embed'); } ?>
					
					<?php if(ler('lefx_editorcontent_placement') && ler('lefx_editorcontent_placement') ==  'After Video') : ?>
					<!-- LOOP CONTENT (AFTER VIDEO) -->
					<div id="signup-editor-content"><?php the_content(); ?><div class="clear"></div></div>
					<?php endif; ?>
					
					<!-- PROGRESS INDICATORS (Premium) -->
					<?php if(lefx_version() == 'premium') { include(TEMPLATEPATH . '/premium/progress.php'); } ?>	
					
					<?php if(ler('lefx_editorcontent_placement') && ler('lefx_editorcontent_placement') ==  'After Progress Indicators') : ?>
					<!-- LOOP CONTENT (AFTER PROGRESS INDICATORS) -->
					<div id="signup-editor-content"><?php the_content(); ?><div class="clear"></div></div>
					<?php endif; ?>
					
					<div id="signup-body">
						<!-- H2 SUBHEADING / P DESCRIPTION (PRESIGNUP) -->
						<div id="presignup-content" class="signup-left">
							<?php if(ler('subheading_content')) { ?><h2><?php le('subheading_content'); ?></h2><?php } ?>
							
							<?php if(ler('lefx_editorcontent_placement') && ler('lefx_editorcontent_placement') ==  'After Subheading') : ?>
							<!-- LOOP CONTENT (AFTER SUBHEADING) -->
							<div id="signup-editor-content"><?php the_content(); ?><div class="clear"></div></div>
							<?php endif; ?>
					
							<?php if(ler('description_content')) { ?><p><?php le('description_content'); ?></p><?php } ?>
							
							<?php if(ler('lefx_editorcontent_placement') && ler('lefx_editorcontent_placement') ==  'After Body Text') : ?>
							<!-- LOOP CONTENT (AFTER BODY TEXT) -->
							<div id="signup-editor-content"><?php the_content(); ?><div class="clear"></div></div>
							<?php endif; ?>
						</div>
						
						<!-- H2 SUBHEADING / P DESCRIPTION (SUCCESS) -->
						<div id="success-content">
							<?php if(ler('subheading_content2')) { ?><h2><?php le('subheading_content2'); ?></h2><?php } ?>
							
							<?php if(ler('lefx_editorcontent_placement') && ler('lefx_editorcontent_placement') ==  'After Subheading') : ?>
							<!-- LOOP CONTENT (AFTER SUBHEADING) -->
							<div id="signup-editor-content"><?php the_content(); ?><div class="clear"></div></div>
							<?php endif; ?>
							
							<?php if(ler('description_content2')) { ?><p><?php le('description_content2'); ?></p><?php } ?>
							
							<?php if(ler('lefx_editorcontent_placement') && ler('lefx_editorcontent_placement') ==  'After Body Text') : ?>
							<!-- LOOP CONTENT (AFTER SUBHEADING) -->
							<div id="signup-editor-content"><?php the_content(); ?><div class="clear"></div></div>
							<?php endif; ?>
						</div>		
						
						<!-- FORM -->
						<?php include(TEMPLATEPATH . '/launch/launch-form.php'); ?>
						
						<?php if(ler('lefx_editorcontent_placement') && ler('lefx_editorcontent_placement') ==  'After Sign-Up Form') : ?>
						<!-- LOOP CONTENT (AFTER SIGN-UP FORM) -->
						<div id="signup-editor-content"><?php the_content(); ?><div class="clear"></div></div>
						<?php endif; ?>
					
					</div>			
													
					<!-- LINK TO BLOG/OTHER WEBSITES -->
						
					<?php include(TEMPLATEPATH . '/launch/launch-footer.php'); ?>
					
					<!-- LOOP CONTENT (AT BOTTOM) -->
					<?php if(ler('lefx_editorcontent_placement') && ler('lefx_editorcontent_placement') ==  'At Bottom') : ?>
					<div id="signup-editor-content"><?php the_content(); ?><div class="clear"></div></div>
					<?php endif; ?>
				
				</div> <!-- end #signup-content-wrapper -->
				
			</div> <!-- end #signup -->
	
		</div> <!-- end #signup-page -->
	
	</div> <!-- end #signup-page-wrapper -->