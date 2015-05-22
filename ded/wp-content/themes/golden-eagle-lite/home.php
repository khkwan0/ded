<?php get_header(); ?>
<div class="clear"></div>
<div class="page-content">
    <div class="eleven columns alpha">
        <div class="content-bar">
            <!-- Start the Loop. -->
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                            <?php goldeneagle_get_thumbnail(250, 170); ?>
                        <?php } else { ?>
                            <?php goldeneagle_get_image(250, 170); ?> 
                            <?php
                        }
                        ?>	                      
                        <div class="post_content">
                            <h1 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>  
                            <?php the_excerpt(); ?>
                            <div class="clear"></div>
                            <?php if (has_tag()) { ?>
                                <div class="tag">
                                    <?php the_tags('Post Tagged with ', ', ', ''); ?>
                                </div>
                            <?php } ?>
                            <a class="read_more" href="<?php the_permalink() ?>">Read More</a>
                            <ul class="post_meta">
                                <li class="posted_by"><span>By&nbsp;<?php the_author_posts_link(); ?></span></li>
                                <li class="post_date"><span>On&nbsp;<?php echo get_the_time('M, d, Y') ?></span></li>
                                <li class="post_category"><span></span>&nbsp;<?php the_category(', '); ?></li>
                                <li class="postc_comment"><span>&nbsp;<?php comments_popup_link('No Comments.', '1 Comment.', '% Comments.'); ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <!--End post-->
                <?php endwhile;
            else:
                ?>
                <div class="post">
                    <p>
                <?php _e('Sorry, no posts matched your criteria.', 'golden_eagle'); ?>
                    </p>
                </div>
        <?php endif; ?>
            <!--End Loop-->
            <div class="clear"></div>
            <nav id="nav-single"> <span class="nav-previous">
                    <?php next_posts_link(__('&larr; Older posts', 'golden_eagle')); ?>
                </span> <span class="nav-next">
            <?php previous_posts_link(__('Newer posts &rarr;', 'golden_eagle')); ?>
                </span> </nav>
        </div>
    </div>
    <div class="five columns alpha">
        <!--Start Sidebar-->
<?php get_sidebar(); ?>
        <!--End Sidebar-->
    </div>
</div>
</div>
<?php get_footer(); ?>