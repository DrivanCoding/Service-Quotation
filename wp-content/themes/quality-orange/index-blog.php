<?php
$quality_orange_parent_current_options = wp_parse_args(get_option('quality_pro_options', array()), quality_theme_data_setup());
?>
<section id="section-block" class="news">
    <div class="container">
        <?php if (($quality_orange_parent_current_options['blog_heading']) || ($quality_orange_parent_current_options['home_blog_description'] != '' )) { ?>
            <div class="row">
                <div class="section-header">			
                    <?php if ($quality_orange_parent_current_options['blog_heading']) { ?>
                        <p><?php echo wp_kses_post($quality_orange_parent_current_options['blog_heading']); ?></p>
                    <?php } if ($quality_orange_parent_current_options['home_blog_description']) { ?>
                        <h1 class="widget-title"><?php echo wp_kses_post($quality_orange_parent_current_options['home_blog_description']); ?></h1>
                    <?php } ?>
                    <hr class="divider">
                </div>
            </div>
        <?php } ?>
        <!--Blog Content-->
       <?php 
        $quality_orange_current_options= wp_parse_args(get_option('quality_pro_options', array()), quality_orange_default_data());
        if ($quality_orange_current_options['blog_masonry3_layout_setting'] == 'masonry3') {
            quality_orange_blog_masonry3_layout();
        } else {
            quality_orange_blog_default_layout();
        }?>           		
    </div>
</section>