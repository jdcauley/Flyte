<?php
/**
 * Launch Form
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */
?>
					<!-- STORE STUFF FOR JS USE -->
					
					<input type="hidden" id="blogURL" value="<?php echo home_url(); ?>" />
					<input type="hidden" id="twitterMessage" value="<?php if(get_option('lefx_twitter_message') !== '') { le('lefx_twitter_message'); } else { le('heading_content'); } ?>" />
					<input type="hidden" id="templateURL" value="<?php echo get_template_directory_uri(); ?>" />
					
					<!-- FORM (PRE-SIGNUP) -->
					<form id="form" action="" class="signup-right">
						<fieldset>
							<input type="hidden" name="code" id="code" value="<?php codeCheck(); ?>" />
							
							<ul id="form-layout">
								<li class="first">
									<?php if(ler('label_content')) { ?>
									<label for="email">
										<?php le('label_content'); ?> 
										<?php if(ler('lefx_req_indicator')) { echo '<span> *</span>';} ?>
										<?php if(get_option('lefx_reuser_enable') == true) { ?>
										<a href="#" id="reusertip">
											<?php if(ler('lefx_reuser_label')) { le('lefx_reuser_label'); } else { echo 'Returning User?'; } ?>
											<div id="reuserbubble">
												<?php if(ler('lefx_reuser_bubble')) { le('lefx_reuser_bubble'); } else { echo 'Simply enter your email address and submit the form to view your stats.'; } ?>
												<div class="reuserbubble-arrow-border"></div>
												<div class="reuserbubble-arrow"></div>
											</div>
										</a>
										<?php } ?>	
									</label>
									<?php } ?>
									
									<!-- START IF NO CUSTOM FIELDS //////////////////////////////////////////////////////////////////// -->
									<?php if(!get_option('lefx_cust_field1')) { ?>
										
								    <div id="email-layout">
								        <span id="emailinput">
								            <input type="email" id="email" name="email" />
								        </span>
										<!-- SUBMIT BUTTON -->
										<span id="submit-button-border">
											<span id="submit-button-spinner"></span>
											<input type="submit" name="submit" value="<?php if(ler('label_submitbutton')) { le('label_submitbutton'); } else { echo 'GO'; } ?>" id="submit-button" />
										</span>		
								    </div>
											
									<?php } ?>
									<!-- //////////////////////////////////////////////////////////////////// END IF NO CUSTOM FIELDS -->
									
									
									<!-- START IF CUSTOM FIELDS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
									<?php if(get_option('lefx_cust_field1')) { ?>
									<input type="email" id="email" name="email" />
									<?php } ?>
									<!-- END IF CUSTOM FIELDS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
									
									
									<!-- ERROR MESSAGING -->
									<div class="clear"></div>
									<div id="error"></div>
								</li>
								
								
								<!-- INCLUDE CUSTOM FIELDS (Premium) -->
								<?php if(lefx_version() == 'premium') { include(TEMPLATEPATH . '/premium/custom-fields.php'); } ?>				

								
								<!-- START IF CUSTOM FIELDS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->	
								<?php if(get_option('lefx_cust_field1')) { ?>									
								<li class="hascf-submit-button">					
									<!-- SUBMIT BUTTON -->
									<span id="submit-button-border">
										<span id="submit-button-spinner"></span>
										<input type="submit" name="submit" value="<?php if(ler('label_submitbutton')) { le('label_submitbutton'); } else { echo 'GO'; } ?>" id="submit-button" />
									</span>
								</li>
								<?php } ?>
								<!-- END IF CUSTOM FIELDS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
								
								<div class="clear"></div>
								
								<li>
									<!-- PRIVACY POLICY LINK -->
									<?php if(get_option('lefx_enable_privacy_policy') == true) { ?>
									<span class="privacy-policy">
										<?php le('lefx_privacy_policy_label');?> <a href="#" id="modal-privacy" class="modal-trigger"><?php le('lefx_privacy_policy_heading'); ?></a>
									</span>	
									<?php } ?>	
								</li>
								
								<div class="clear"></div>
								
							</ul>
							
							<div class="clear"></div>
							
						</fieldset>
					</form>
					
					<!-- FORM (POST-SIGNUP) -->
					<form id="success" action="">
						<fieldset>		

							<!-- RETURNING USER -->
							<div id="returninguser">
								<h2><?php le('returning_subheading'); ?></h2>
								
								<?php if(is_page_template( 'launch.php' ) && ler('lefx_editorcontent_placement') && ler('lefx_editorcontent_placement') ==  'After Subheading') : ?>
								<!-- LOOP CONTENT (AFTER SUBHEADING) -->
								<div id="signup-editor-content"><?php the_content(); ?><div class="clear"></div></div>
								<?php endif; ?>
							
								<p>
									<?php le('returning_text'); ?> <span class="user"> </span>.<br />
						
									<span <?php if(get_option('disable_unique_link') == 'true') { echo ' class="disable"'; } ?>>
										<span class="clicks"> </span> <?php le('returning_clicks'); ?><br />
									</span>
								
									<span <?php if(get_option('disable_unique_link') == 'true') { echo ' class="disable"'; } ?>>
										<span class="conversions"> </span> <?php le('returning_signups'); ?>
									</span>
									<br /><br />
								</p>	
									
								<?php if(is_page_template( 'launch.php' ) && ler('lefx_editorcontent_placement') && ler('lefx_editorcontent_placement') ==  'After Body Text') : ?>
								<!-- LOOP CONTENT (AFTER SUBHEADING) -->
								<div id="signup-editor-content"><?php the_content(); ?><div class="clear"></div></div>
								<?php endif; ?>
											
							</div>
							
							<!-- SOCIAL MEDIA BUTTONS -->
							<div class="signup-left<?php if(get_option('disable_social_media') == 'true') { echo ' disable'; } ?>">
								<?php include('launch-social.php'); ?>
							</div>	
							
							<!-- RETURNING USER REFERRAL URL -->
							<div id="returninguserurl">
								<div class="signup-right<?php if(get_option('disable_unique_link') == 'true') { echo ' disable'; } ?>">
									<?php if(ler('label_success_content')) { ?><label><?php le('label_success_content'); ?></label><?php } ?>
									<input type="text" id="returningcode" value="" onclick="SelectAll('returningcode');"/>
								</div>
							</div>				
							
							<!-- NEW USER -->
							<div id="newuser">
								<div class="signup-right<?php if(get_option('disable_unique_link') == 'true') { echo ' disable'; } ?>">
									<?php if(ler('label_success_content')) { ?>
									<label for="email"><?php le('label_success_content'); ?></label>
									<?php } ?>
									<input type="text" id="successcode" value="" onclick="SelectAll('successcode');"/>	
								</div>
								
								<div class="clear"></div>
								<div id="pass_thru_error"></div>
							</div>
						
						</fieldset>
					</form>