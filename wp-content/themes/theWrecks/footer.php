<?php
/**
 * The template for displaying the footer
 */
?>

    <footer class="footer mid-black audio-bars" data-midnight="footer">
    	<div class="copyright">
            <!-- Design/Dev: <a class="hvr-underline-from-middle-small-black" href="http://patkavanaghjr.com" target="_blank">Pat Kavanagh</a>
            <br/> -->
            <span class="default-font">&copy;</span> <?php echo date('Y'); ?> The Wrecks. <span class="mobile-copy desktop">All Rights Reserved. <span class="default-font">||</span> Design/Dev: <a class="hvr-underline-from-middle-small-black" href="http://patkavanaghjr.com" target="_blank">Pat Kavanagh</a></span>
    	</div>
        <?php if( have_rows('footer_social_media','option') ): ?>
            <div class="social-media">
                <?php while ( have_rows('footer_social_media','option') ) : the_row(); 
                    $singleSocialLink = get_sub_field('social_media_link','option');
                    $singleSocialTitle = get_sub_field('social_media_title','option'); 
                ?>
                    <h2 class="hvr-underline-from-middle-footer"><a href="<?php echo $singleSocialLink; ?>" target="_blank"><?php echo $singleSocialTitle; ?></a></h2><br/>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </footer>
    <div class="clear"></div>
<?php wp_footer(); ?>
</div> <!--END DIV .wrapper-->
</body>
</html>
