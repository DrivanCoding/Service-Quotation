<div class="footer-two">
    <?php do_action('gradiant_above_footer'); ?>
</div>
</div> 
 <!--===// Start: Footer
    =================================-->
<?php 
$flavita_footer_effect_enable	= get_theme_mod('footer_effect_enable','1');
?>	
    <footer id="footer-section" class="footer-two footer-section  <?php if($flavita_footer_effect_enable=='1'): echo esc_attr_e('footer-effect-active','flavita'); endif; ?>">
		<?php 
			$flavita_footer_middle_content	= get_theme_mod('footer_widget_middle_content','<i class="fa fa-whatsapp"></i>');		
			if(is_active_sidebar( 'gradiant-footer-1' )  || is_active_sidebar( 'gradiant-footer-2' )  || is_active_sidebar( 'gradiant-footer-3' )) { 
		?>
        <div class="footer-main">
            <div class="av-container">
			   <div class="av-columns-area">
					<?php if ( is_active_sidebar( 'gradiant-footer-1' ) ) : ?>
						<div class="av-column-6 col-md-6 mb-xl-0 mb-4 pr-md-5">
						   <?php dynamic_sidebar( 'gradiant-footer-1'); ?>
						</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'gradiant-footer-2' ) ) : ?>
						<div class="av-column-3 col-md-6 mb-xl-0 mb-4 pl-md-5">
						   <?php dynamic_sidebar( 'gradiant-footer-2'); ?>
						</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'gradiant-footer-3' ) ) : ?>
						<div class="av-column-3 col-md-6 mb-xl-0 mb-4">
							<?php dynamic_sidebar( 'gradiant-footer-3'); ?>
						</div>
					<?php endif; ?>
				</div>	       
            </div>
			<?php if(!empty($flavita_footer_middle_content)): ?>
				<div class="footer-info-overwrap"><div class="icon"><?php echo wp_kses_post($flavita_footer_middle_content); ?></div></div>
			<?php endif; ?>	
        </div>
		
		<?php
			}
			$flavita_footer_first_img 	= get_theme_mod('footer_first_img',esc_url(get_template_directory_uri() .'/assets/images/logo2.png'));
			if ( function_exists( 'gradiant_get_social_icon_default' ) ) :
				$flavita_footer_social_icons 	= get_theme_mod('footer_social_icons',gradiant_get_social_icon_default());
			else:
				$flavita_footer_social_icons 	= get_theme_mod('footer_social_icons');
			endif;	
			$flavita_copyright 	= get_theme_mod('footer_third_custom','Copyright &copy; [current_year] [site_title] | Powered by [theme_author]');
			if(!empty($flavita_footer_first_img) || !empty($flavita_footer_social_icons)  || !empty($flavita_copyright)) {
		?>
			<div class="footer-copyright">
				<div class="av-container">
					<div class="av-columns-area">
							<div class="av-column-4 av-md-column-6 text-md-left text-center">
								<div class="widget-left">
									<?php  if ( ! empty( $flavita_footer_first_img ) ){ ?>
										<div class="logo">
											<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title"><img src="<?php echo esc_url($flavita_footer_first_img); ?>"></a>
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="av-column-4 av-md-column-6 text-md-center text-center">
								<div class="widget-center">
									<?php if( $flavita_footer_social_icons!='' ){ ?>
										<aside class="share-toolkit widget widget_social_widget">
											<a href="#" class="toolkit-hover"><i class="fa fa-share-alt"></i></a>
											<ul>
												<?php
													$flavita_footer_social_icons = json_decode($flavita_footer_social_icons);
													foreach($flavita_footer_social_icons as $social_item){	
													$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'gradiant_translate_single_string', $social_item->icon_value, 'Footer section' ) : '';	
													$social_link = ! empty( $social_item->link ) ? apply_filters( 'gradiant_translate_single_string', $social_item->link, 'Footer section' ) : '';
												?>
													<li><a href="<?php echo esc_url( $social_link ); ?>"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
												<?php } ?>
											</ul>
										</aside>
									<?php } ?>
								</div>
							</div>
							<div class="av-column-4 av-md-column-6 text-av-right text-md-left text-center">
								<div class="widget-right">                          
									<?php 	
										$flavita_copyright_allowed_tags = array(
											'[current_year]' => date_i18n('Y'),
											'[site_title]'   => get_bloginfo('name'),
											'[theme_author]' => sprintf(__('<a href="https://www.nayrathemes.com/flavita-free/" target="_blank">Flavita</a>', 'flavita')),
										);
									?>                        
									<div class="copyright-text">
										<?php
											echo apply_filters('gradiant_footer_copyright', wp_kses_post(gradiant_str_replace_assoc($flavita_copyright_allowed_tags, $flavita_copyright)));
										?>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		<?php } ?>
    </footer>
    <!-- End: Footer
    =================================-->
    
    <!-- ScrollUp -->
	<?php 
		$flavita_hs_scroller 	= get_theme_mod('hs_scroller','1');		
		if($flavita_hs_scroller == '1') :
	?>
		<button type=button class="scrollup"><i class="fa fa-arrow-up"></i></button>
	<?php endif; ?>
</div>
<?php 
wp_footer(); ?>
</body>
</html>
