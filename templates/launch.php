
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
                            <form class="form-inline"  action="http://convergesouth.us2.list-manage1.com/subscribe/post" method="post" target="_blank" onsubmit="hide" novalidate >
							    <input type="hidden" name="u" value="0766100c790c84b9c49ab7e2f">
							    <input type="hidden" name="id" value="b3bf94802e">
                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email">
	                            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary">
                            </form>
                            <p class="small"><a href="http://convergesouth.com/termsandconditions">Terms & Conditions</a></p>
                            
                            <div class="social">
                                <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://convergesouth.com" data-text="Want to go to ConvergeSouth 2013" data-related="convergesouth" data-hashtags="cs2013">Tweet</a>
                                <a href="https://twitter.com/convergesouth" class="twitter-follow-button" data-show-count="false" data-show-screen-name="True">Follow @convergesouth</a>
                            <div class="fb-like" data-href="http://convergesouth.com" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
                            </div>
                            <a class="btn btn-speakers" href="http://jdcauley.typeform.com/to/nDgKZC">Call for Speakers</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.main -->
    </div><!-- /.content -->
</div><!-- /.wrap -->
