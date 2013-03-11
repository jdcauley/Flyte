
<div class="wrap container" role="document">
    <div class="content row">
        <div class="main <?php echo roots_main_class(); ?>" role="main">
            <div class="container-narrow">
                <div class="row">
                    <div class="jumbotron">
                        <div class="launch">
                            <a href="<?php echo home_url(); ?>/"><img class="cs-logo" alt="<?php bloginfo('name'); ?>" src="<?php bloginfo('template_directory'); ?>/assets/img/cs.png"></a>
                            <?php while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                            <?php endwhile; ?>
                            <div class="social">
                                <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://convergesouth.com" data-text="Want to go to ConvergeSouth 2013" data-related="convergesouth" data-hashtags="cs2013">Tweet</a>
                                <a href="https://twitter.com/convergesouth" class="twitter-follow-button" data-show-count="false" data-show-screen-name="True">Follow @convergesouth</a>
                                <div class="fb-like" data-href="http://convergesouth.com" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.main -->
    </div><!-- /.content -->
</div><!-- /.wrap -->
