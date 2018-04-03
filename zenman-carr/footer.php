<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the wrap div and all content
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 1.0
 */
?>

    <footer class="main-foot">
        <div class="main-foot__nav">
            <div class="nav__inner">
                <div class="footer__logo">
                    <a href="<?php bloginfo('url'); ?>" title="Carr Homepage"><img src="<?php echo get_bloginfo('template_url'); ?>/images/logo.png" alt=""></a>
                </div>
                <div class="footer__social">
                    <?php
                        $contact = get_bloginfo('template_url') . '/images/Contact_Icon.svg';
                        $facebook = get_bloginfo('template_url') . '/images/Facebook_Icon.svg';
                        $instagram = get_bloginfo('template_url') . '/images/Instagram_Icon.svg';
                        $linkedin = get_bloginfo('template_url') . '/images/LinkedIn_Icon.svg';
                        $twitter = get_bloginfo('template_url') . '/images/Twitter_Icon.svg';
                        $youtube = get_bloginfo('template_url') . '/images/Youtube_Icon.svg';
                    ?>
                    <?php if(get_field('contact_link_footer', 'option')) : ?>
                        <a class="contact" href="<?php the_field('contact_link_footer', 'option'); ?>"><?php echo get_data($contact); ?></a>
                    <?php endif; ?>
                    <?php if(get_field('facebook_link_footer', 'option')) : ?>
                        <a target="_blank" class="facebook" href="<?php the_field('facebook_link_footer', 'option'); ?>"><?php echo get_data($facebook); ?></a>
                    <?php endif; ?>
                    <?php if(get_field('twitter_link_footer', 'option')) : ?>
                        <a target="_blank" class="twitter" href="<?php the_field('twitter_link_footer', 'option'); ?>"><?php echo get_data($twitter); ?></a>
                    <?php endif; ?>
                    <?php if(get_field('linkedin_link_footer', 'option')) : ?>
                        <a target="_blank" class="linkedin" href="<?php the_field('linkedin_link_footer', 'option'); ?>"><?php echo get_data($linkedin); ?></a>
                    <?php endif; ?>
                    <?php if(get_field('instagram_link_footer', 'option')) : ?>
                        <a target="_blank" class="instagram" href="<?php the_field('instagram_link_footer', 'option'); ?>"><?php echo get_data($instagram); ?></a>
                    <?php endif; ?>
                    <?php if(get_field('youtube_link_footer', 'option')) : ?>
                        <a target="_blank" class="youtube" href="<?php the_field('youtube_link_footer', 'option'); ?>"><?php echo get_data($youtube); ?></a>
                    <?php endif; ?>
                </div>
                <?php
                    $attr = array(
                        'theme_location'  => 'foot-menu',
                        'container'       => 'nav',
                        'menu_class'      => 'menu'
                    );
                    wp_nav_menu($attr);
                ?>
            </div>
        </div>
    </footer><!-- // main-foot -->
<!-- sticky footer will fail if anything goes between the closing footer and .wrap -->
</div><!-- // wrap-all-the-things -->

<?php wp_footer(); //mandatory ?>

<?php the_field('before_closing_body', 'option'); ?>

<div id="js-youtube-popout-root" class="youtube-popout-root">

    <div class="js-youtube-popout popout-content">
        <div class="youtube-container">
            <div id="close" class="close">X</div>
        </div>
    </div>

</div>

</body>
</html>
