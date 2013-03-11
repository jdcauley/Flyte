<div class="wrap container" role="document">
    <div class="content row">
      <div class="main <?php echo roots_main_class(); ?>" role="main">
        <div class="container-narrow">
            <div class="row">
                <div class="jumbotron">
                    <div class="launch">
                        <a href="<?php echo home_url(); ?>/"><img class="cs-logo" alt="<?php bloginfo('name'); ?>" src="<?php bloginfo('template_directory'); ?>/assets/img/cs.png"></a>
                        <?php query_posts(''); ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                        <form class="form-inline" action="http://cauley.us4.list-manage1.com/subscribe/post?u=720979f7ce2c2544872e3ae75&amp;id=e74d844e61" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" onsubmit="hide" novalidate >
                            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email">
	                        <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary">
                        </form>
                        <p class="small"><a data-toggle="collapse" data-target="#demo">Terms & Conditions</a></p>
                            <div id="demo" class="collapse"><p>Each person gets on entry, by submitting your email address you are entering to win 2 free tickets to Converge South 2013 .  No Purchase Necessary etc and so forth.</p></div>
                        <div class="social">
                            <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://convergesouth.com" data-text="Want to go to ConvergeSouth 2013" data-related="convergesouth" data-hashtags="cs2013">Tweet</a>
                            <a href="https://twitter.com/convergesouth" class="twitter-follow-button" data-show-count="false" data-show-screen-name="True">Follow @convergesouth</a>
                            <div class="fb-like" data-href="http://convergesouth.com" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
                        </div>
                        <a href="#speakers" data-toggle="modal">Call for Speakers</a>

                    </div>
                </div>
            </div>
        </div>
        
        <div id="speakers" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1 id="myModalLabel">Call for Speakers</h1>
            </div>
        <div class="modal-body">
                <h3>We Need You</h3>
				<p>The 2013 ConvergeSouth call for speakers is now open! If you're interested in presenting at ConvergeSouth, please submit your information and ideas using the link below. We will need your session title, brief summary of what your session will cover and which category your presentation falls into - Content, Web or Social. Submissions will be accepted until June 1st and all speakers will be notified of status no later than June 30th.

Do you have a form already that they can use? Basically we need to capture name, phone, address, company, social addresses, presentation title, presentation description (200 words or so), brief bio, headshot and topic category.</p>

          
                <form action="http://cauley.us4.list-manage2.com/subscribe/post" method="POST">
                    <input type="hidden" name="u" value="720979f7ce2c2544872e3ae75">
                    <input type="hidden" name="id" value="75d8b4903f">                  
                    <div>
						<input type="text" class="input-small" name="MERGE1" id="MERGE1" size="25" value="" placeholder="First" required="required">
                    	<input type="text" class="input-small" name="MERGE2" id="MERGE2" size="25" value="" placeholder="Last" required="required">
					</div>
                    <input type="email" class="input-large" autocapitalize="off" autocorrect="off" name="MERGE0" id="MERGE0" size="25" value="" placeholder="Email Address" required="required" validate>
                    <div>
                        <input type="text" class="input-tiny" pattern="[0-9]*" id="MERGE3-area" name="MERGE3[area]" maxlength="3" size="3" value="" placeholder="###"> <input type="text" class="input-tiny" pattern="[0-9]*" id="MERGE3-detail1" name="MERGE3[detail1]" maxlength="3" size="3" value="" placeholder="###"> - <input type="text" class="input-mini" pattern="[0-9]*" id="MERGE3-detail2" name="MERGE3[detail2]" maxlength="4" size="4" value="" placeholder="####">
                    </div>
					<div>
                    	<input type="url" class="input-large" autocapitalize="off" autocorrect="off" name="MERGE4" id="MERGE4" size="25" value="" placeholder="Website">
					</div>
					<div>
                    	<input type="text" name="MERGE5" id="MERGE5" size="25" value="" placeholder="Session Name" required="required">
					</div>
					<div>
                        <!--[if lt IE 10]><label>Session Description</label><![endif]-->
                    <textarea name="MERGE6" id="MERGE6" cols="20" row="20" value="" placeholder="Session Description" required="required"></textarea>
					</div>
                        <!--[if lt IE 10]><label>Session Description</label><![endif]-->
                    <textarea name="MERGE7" id="MERGE7" cols="20" row="20" value="" placeholder="Questions or Comments"></textarea>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <input type="submit" class="btn btn-primary" name="submit" value="Sign Up"></form>
        </div>
    </div>
</div><!-- /.main -->
</div><!-- /.content -->
</div><!-- /.wrap -->