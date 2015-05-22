<?php
/**
 * The Template for displaying all single posts.
 *
 */
?>
<?php get_header(); ?>
<div class="clear"></div>
<div class="page-content single_page">
    <div class="eleven columns alpha">
        <div class="content-bar">
            <!-- Start the Loop. -->
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <!--post Start-->
                    <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <div class="post single">
                        <div class="post_content"> 
                            <?php the_content(); ?>
                            <div class="clear"></div>
                            <?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:', 'golden_eagle') . '</span>', 'after' => '</div>')); ?>
                            <?php if (has_tag()) { ?>
                                <div class="tag">
                                    <?php the_tags('Post Tagged with ', ', ', ''); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <ul class="post_meta">
                            <li class="posted_by"><span>&nbsp;<?php the_author_posts_link(); ?></span></li>
                            <li class="post_date"><span>on&nbsp;<?php echo get_the_time('M, d, Y') ?></span></li>
                            <li class="post_category"><span></span>&nbsp;<?php the_category(', '); ?></li>
                            <li class="postc_comment"><span>&nbsp;<?php comments_popup_link('No Comments.', '1 Comment.', '% Comments.'); ?></span></li>
                        </ul>
                    </div>
                    <!--post End-->
                <?php endwhile;
            else: ?>
                <div class="post">
                    <p>
                <?php _e('Sorry, no posts matched your criteria.', 'golden_eagle'); ?>
                    </p>
                </div>
            <?php endif; ?>
            <!--End Loop-->
            <nav id="nav-single">
                <span class="nav-previous">
                <?php previous_post_link('%link', __('<span class="meta-nav">&larr;</span> Previous Post ', 'golden_eagle')); ?>
                </span>
                <span class="nav-next">
            <?php next_post_link('%link', __('Next Post <span class="meta-nav">&rarr;</span>', 'golden_eagle')); ?>
                </span>
            </nav>
            <!--Start Comment box-->
            <?php comments_template(); ?>
            <!--End Comment box-->
        </div>
    </div>
    <div class="five columns omega">
        <!--Start Sidebar-->
<?php get_sidebar(); ?>
        <!--End Sidebar-->
    </div>
</div>
</div>
<?php get_footer(); ?> 