<?php
if (!function_exists('quality_orange_header_classic_layout')) :

    function quality_orange_header_classic_layout() {

        $quality_orange_current_options = wp_parse_args(get_option('quality_pro_options', array()), quality_theme_data_setup());
        ?>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header index5">
            <div class="container">
                <?php 
                if($quality_orange_current_options['text_title'] ==false && $quality_orange_current_options['upload_image_logo']!='' && !(has_custom_logo()) )
                { ?> 
                    <a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>">
                        <img src="<?php echo esc_url($quality_orange_current_options['upload_image_logo']); ?>" style="height:<?php if($quality_orange_current_options['height']!='') { echo absint($quality_orange_current_options['height']); }  else { "80"; } ?>px; width:<?php if($quality_orange_current_options['width']!='') { echo absint($quality_orange_current_options['width']); }  else { "200"; } ?>px;" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>" />
                    </a>
                    <?php
                }   
                elseif(has_custom_logo() )
                { ?>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>">
                        <?php
                        if ( has_custom_logo() ) 
                        {   
                            $quality_orange_custom_logo_id = get_theme_mod( 'custom_logo' );
                            $quality_orange_post_status=get_post_status ( $quality_orange_custom_logo_id );
                            $quality_orange_my_options = get_option('quality_pro_options');
                            $quality_orange_my_options['upload_image_logo'] = '';
                            update_option('quality_pro_options', $quality_orange_my_options);
                            $quality_orange_image = wp_get_attachment_image_src( $quality_orange_custom_logo_id , 'full' );
                            echo '<img src="'.esc_url($quality_orange_image[0]).'" alt="'. esc_attr(get_bloginfo( 'title' )).'" />';
                        }?>
                    </a>
                <?php
                }
                if($quality_orange_current_options['text_title'] ==true && get_theme_mod('header_text')==false)
                { 
                    if((get_option('blogname')!='') || (get_option('blogdescription')!=''))
                    {?>
                    <div class="site-title">
                        <?php
                        if(get_option('blogname')!='')
                        {?>
                            <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php bloginfo( 'name' ); ?>
                            </a></h2>
                        <?php
                        }
                        $quality_orange_description = get_bloginfo( 'description', 'display' );
                        if(get_option('blogdescription')!='')
                        {
                            if ( $quality_orange_description || is_customize_preview() )
                            {
                                ?>
                            <p class="site-description"><?php echo $quality_orange_description; ?></p>
                            <?php
                            }
                        }
                    ?></div>
                <?php } 
                } 
                else{
                ?>
                        <div class="site-title site-branding-text">
                            <?php
                            if(get_option('blogname')!='')
                            {?>
                                <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <?php bloginfo( 'name' ); ?>
                                </a></h2>
                                
                            <?php
                            }
                            $quality_orange_description = get_bloginfo( 'description', 'display' );
                            if(get_option('blogdescription')!='')
                            {
                                if ( $quality_orange_description || is_customize_preview() )
                                { ?>
                                    <p class="site-description"><?php echo $quality_orange_description; ?></p>
                                <?php }
                            }?>
                        </div><?php } ?>
            </div>
        </div> 
        <nav class="navbar navbar-custom navbar5" role="navigation">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                <span class="sr-only"><?php echo esc_html__('Toggle navigation', 'quality-orange'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="container-fluid padding-0">               
                <div class="collapse navbar-collapse" id="custom-collapse">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => 'nav-collapse collapse navbar-inverse-collapse',
                        'menu_class' => 'nav navbar-nav navbar-left',
                        'fallback_cb' => 'quality_fallback_page_menu',
                        'walker' => new quality_nav_walker()
                            )
                    );
                    ?>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <?php
    }

endif;

if (!function_exists('quality_orange_header_default_layout')) :

    function quality_orange_header_default_layout() {
        $quality_orange_current_options = wp_parse_args(get_option('quality_pro_options', array()), quality_theme_data_setup());
        ?>
        <nav class="navbar navbar-custom" role="navigation">
            <div class="container-fluid padding-0">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <?php 
                if($quality_orange_current_options['text_title'] ==false && $quality_orange_current_options['upload_image_logo']!='' && !(has_custom_logo()) )
                { ?> 
                    <a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>">
                        <img src="<?php echo esc_url($quality_orange_current_options['upload_image_logo']); ?>" style="height:<?php if($quality_orange_current_options['height']!='') { echo absint($quality_orange_current_options['height']); }  else { "80"; } ?>px; width:<?php if($quality_orange_current_options['width']!='') { echo absint($quality_orange_current_options['width']); }  else { "200"; } ?>px;" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>" />
                    </a>
                    <?php
                }   
                elseif(has_custom_logo() )
                { ?>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>">
                        <?php
                        if ( has_custom_logo() ) 
                        {   
                            $quality_orange_custom_logo_id = get_theme_mod( 'custom_logo' );
                            $quality_orange_post_status=get_post_status ( $quality_orange_custom_logo_id );
                            $quality_orange_my_options = get_option('quality_pro_options');
                            $quality_orange_my_options['upload_image_logo'] = '';
                            update_option('quality_pro_options', $quality_orange_my_options);
                            $quality_orange_image = wp_get_attachment_image_src( $quality_orange_custom_logo_id , 'full' );
                            echo '<img src="'.esc_url($quality_orange_image[0]).'" alt="'. esc_attr(get_bloginfo( 'title' )).'" />';
                        }?>
                    </a>
                <?php
                }
                if($quality_orange_current_options['text_title'] ==true && get_theme_mod('header_text')==false)
                { 
                    if((get_option('blogname')!='') || (get_option('blogdescription')!=''))
                    {?>
                    <div class="site-title">
                        <?php
                        if(get_option('blogname')!='')
                        {?>
                            <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php bloginfo( 'name' ); ?>
                            </a></h2>
                        <?php
                        }
                        $quality_orange_description = get_bloginfo( 'description', 'display' );
                        if(get_option('blogdescription')!='')
                        {
                            if ( $quality_orange_description || is_customize_preview() )
                            {
                                ?>
                            <p class="site-description"><?php echo $quality_orange_description; ?></p>
                            <?php
                            }
                        }
                    ?></div>
                <?php } 
                } 
                else{
                ?>
                        <div class="site-title site-branding-text">
                            <?php
                            if(get_option('blogname')!='')
                            {?>
                                <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <?php bloginfo( 'name' ); ?>
                                </a></h2>
                                
                            <?php
                            }
                            $quality_orange_description = get_bloginfo( 'description', 'display' );
                            if(get_option('blogdescription')!='')
                            {
                                if ( $quality_orange_description || is_customize_preview() )
                                { ?>
                                    <p class="site-description"><?php echo $quality_orange_description; ?></p>
                                <?php }
                            }?>
                        </div><?php } ?>

                   

                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                            <span class="sr-only"><?php echo esc_html__('Toggle navigation', 'quality-orange'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                </div>
                 <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="custom-collapse">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container' => 'nav-collapse collapse navbar-inverse-collapse',
                            'menu_class' => 'nav navbar-nav navbar-right',
                            'fallback_cb' => 'quality_fallback_page_menu',
                            'walker' => new quality_nav_walker()
                                )
                        );
                        ?>
                </div><!-- /.navbar-collapse -->

            </div><!-- /.container-fluid -->
        </nav>
        <?php
    }
endif;

/**
 * Masonry 2 Column blog Layout
 */
if (!function_exists('quality_orange_blog_masonry3_layout')) :

    function quality_orange_blog_masonry3_layout() { ?>
    <div class="row" id="blog-masonry">         
            <?php
            $quality_orange_current_options = wp_parse_args(get_option('quality_pro_options', array()), quality_theme_data_setup());
            $quality_orange_args = array('post_type' => 'post', 'posts_per_page' => 6, 'post__not_in' => get_option("sticky_posts"));
            $quality_orange_post_type_data = new WP_Query($quality_orange_args);
            while ($quality_orange_post_type_data->have_posts()):
                $quality_orange_post_type_data->the_post();
                ?>  
                <div class="item">
                    <article class="post" <?php post_class(); ?>>
                        <?php if (has_post_thumbnail()): ?> 
                            <figure class="post-thumbnail">
                                <?php $quality_orange_defalt_arg = array('class' => "img-responsive"); ?>
                                <a  href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('', $quality_orange_defalt_arg); ?>
                                </a>
                            </figure>
                        <?php endif; ?> 
                        <div class="post-content">
                            <?php if ($quality_orange_current_options['home_meta_section_settings'] == 0) { ?>
                            <div class="item-meta">
                                <a class="author-image item-image" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_avatar(get_the_author_meta('user_email'), $size = '40'); ?></a>
                                <?php echo ' '; ?><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html(get_the_author()); ?></a>
                                <br>
                                <a class="entry-date" href="<?php echo esc_url(get_month_link(get_post_time('Y'), get_post_time('m'))); ?>">
                                    <?php echo esc_html(get_the_date()); ?></a>
                            </div>
                            <?php } ?>
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </header>   
                            <div class="entry-content">
                                <?php the_content(__('Read More', 'quality-orange')); ?>
                            </div>
                            <?php if ($quality_orange_current_options['home_meta_section_settings'] == 0) { ?>
                                <hr />
                                <div class="entry-meta">
                                    <span class="comment-links"><a href="<?php the_permalink(); ?>"><?php comments_number(__('No Comments', 'quality-orange'), __('One comment', 'quality-orange'), __('% comments', 'quality-orange')); ?></a></span>
                                    <?php
                                    $quality_orange_cat_list = get_the_category_list();
                                    if (!empty($quality_orange_cat_list)) {
                                        ?>
                                        <span class="cat-links"><?php esc_html_e('In', 'quality-orange'); ?><?php the_category(' '); ?></span>
                                        <?php } ?>

                                </div>
                            <?php } ?>
                        </div>
                    </article>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>  
            <!--/Blog Content-->
        </div>
        <?php
    }
endif;

/**
 * default blog Layout
 */
if (!function_exists('quality_orange_blog_default_layout')) :

    function quality_orange_blog_default_layout() {?>
        <div class="row">
        <?php $quality_orange_current_options = wp_parse_args(get_option('quality_pro_options', array()), quality_theme_data_setup());
            $quality_orange_args = array('post_type' => 'post', 'posts_per_page' => 4, 'post__not_in' => get_option("sticky_posts"));
            query_posts($quality_orange_args);
            if (query_posts($quality_orange_args)) {
                while (have_posts()):the_post(); {
                        $quality_orange_recent_expet = get_the_excerpt();
                        ?>
                    
                        <div class="col-md-6 col-sm-6 col-xs-12" id="blog-default">
                            <article class="post">                              
                                <?php
                                $quality_orange_defalt_arg = array('class' => "img-responsive");
                                if (has_post_thumbnail()):
                                    ?>
                                    <figure class="post-thumbnail">
                                        <?php the_post_thumbnail('', $quality_orange_defalt_arg); ?>
                                    </figure>
                                <?php endif; ?> 

                                <div class="post-content">  
                                    <?php if ($quality_orange_current_options['home_meta_section_settings'] == '' || $quality_orange_current_options['home_meta_section_settings'] == false) { ?>
                                        <div class="item-meta">
                                            <a class="author-image item-image" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_avatar(get_the_author_meta('user_email'), $quality_orange_size = '40'); ?></a>
                                            <?php echo ' '; ?><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html(get_the_author()); ?></a>
                                            <br>
                                            <a class="entry-date" href="<?php echo esc_url(get_month_link(get_post_time('Y'), get_post_time('m'))); ?>">
                                                <?php echo esc_html(get_the_date()); ?></a>
                                        </div>
                                    <?php } ?>
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    </header>   
                                    <div class="entry-content">
                                        <?php the_content(__('Read More', 'quality-orange')); ?>
                                    </div>
                                    <?php if ($quality_orange_current_options['home_meta_section_settings'] == '' || $quality_orange_current_options['home_meta_section_settings'] == false) { ?>
                                        <hr />
                                        <div class="entry-meta">
                                            <span class="comment-links"><?php comments_popup_link( esc_html__('Leave a comment', 'quality-orange' ) ); ?></span>
                                            <?php
                                            $quality_orange_cat_list = get_the_category_list();
                                            if (!empty($quality_orange_cat_list)) {
                                                ?>
                                                <span class="cat-links"><?php esc_html_e('In', 'quality-orange'); ?><?php the_category(' '); ?></span>
                                            <?php } ?>

                                        </div>
                                    <?php } ?>
                                </div>              
                            </article>
                        </div>
                        <?php
                    } endwhile;
            }?>
        </div>
        <?php
    }
endif;