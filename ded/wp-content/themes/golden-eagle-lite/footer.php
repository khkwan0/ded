<div class="clear"></div>
<!--Start Footer-->
<div class="footer">
    <?php
    /* A sidebar in the footer? Yep. You can can customize
     * your footer with four columns of widgets.
     */
    get_sidebar('footer');
    ?>
</div>
<div class="footer-bottom">
    <p style="float:left;" class="tag-line"><?php echo get_bloginfo('title'); ?>-<?php echo get_bloginfo('description'); ?></p>
    <?php if (goldeneagle_get_option('goldeneagle_footertext') != '') { ?>
        <p class="copyright"><?php echo goldeneagle_get_option('goldeneagle_footertext'); ?></p> 
    <?php } else { ?>
        <p class="copyright">Golden Eagle WordPress Theme Designed by <a href="http://www.inkthemes.com">InkThemes.com</a></p>
    <?php } ?>
</div>
<!--End Footer-->
</div>
</div>
<!-- container -->
<?php wp_footer(); ?>
</body>
</html>
