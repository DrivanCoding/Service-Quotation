<?php
$quality_blue_current_options = wp_parse_args(get_option('quality_pro_options', array()), quality_blue_default_data());?>
<section id="section-block" class="news <?php if ($quality_blue_current_options['blog_listed_layout_setting'] == 'listed') {echo 'list-view';}?>">
    <div class="container">
        <?php
        $quality_blue_parent_current_options = wp_parse_args(get_option('quality_pro_options', array()), quality_theme_data_setup());
        if (($quality_blue_parent_current_options['blog_heading']) || ($quality_blue_parent_current_options['home_blog_description'] != '' )) {
            ?>
            <div class="row">
                <div class="section-header">            
                    <?php if ($quality_blue_parent_current_options['blog_heading']) { ?>
                        <p><?php echo wp_kses_post($quality_blue_parent_current_options['blog_heading']); ?></p>
                    <?php } if ($quality_blue_parent_current_options['home_blog_description']) { ?>
                        <h1 class="widget-title"><?php echo wp_kses_post($quality_blue_parent_current_options['home_blog_description']); ?></h1>
                    <?php } ?>
                    <hr class="divider">
                </div>
            </div>
        <?php } ?>
        <div class="row">
        <?php if ($quality_blue_current_options['blog_listed_layout_setting'] == 'listed') {
            quality_blue_blog_listed_layout();
        } else {
            quality_blue_blog_default_layout();
        }?>
        </div>
    </div>
    <!-- /Quality Blog Section ---->
</section>