<?php
// Template Name: Blog Full Width
get_header();
quality_breadcrumbs();
?>
<section id="section-block" class="site-content">
    <div class="container">
        <div class="row">
            <!--Blog Posts-->
            <div class="col-md-12 col-sm-8 col-xs-12">
                <div class="news">
                    <?php
                    $quality_green_args = array('post_type' => 'post');
                    $quality_green_post_data = new WP_Query($quality_green_args);
                    if ($quality_green_post_data->have_posts()) : while ($quality_green_post_data->have_posts()): $quality_green_post_data->the_post();
                            get_template_part('content', '');
                        endwhile;
                        wp_reset_postdata();
                        ?>
                        <div class="paginations">
                            <?php
                            $GLOBALS['wp_query']->max_num_pages = $quality_green_post_data->max_num_pages;
                            the_posts_pagination(array(
                                'prev_text' => '<i class="fa fa-angle-double-left"></i>',
                                'next_text' => '<i class="fa fa-angle-double-right"></i>',
                            ));
                            ?>
                        </div>
                        <?php
                        if (wp_link_pages()) {
                            wp_link_pages();
                        }
                        ?>
                    <?php endif; ?>
                </div>
                <!--/Blog Content-->
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
