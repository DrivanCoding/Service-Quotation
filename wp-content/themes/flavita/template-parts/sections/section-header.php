<?php
if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-header" id="custom-header" rel="home">
		<img src="<?php esc_url(header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
	</a>
<?php endif; ?>

<!--===// Start: Header
=================================-->
<header id="header-section" class="header header-seven">
	<div class="navigator-wrapper">
		<!--===// Start: Mobile Toggle
		=================================-->
		<div class="theme-mobile-nav <?php echo esc_attr(gradiant_sticky_menu()); ?>"> 
			<div class="av-container">
				<div class="av-columns-area">
					<div class="av-column-12">
						<div class="theme-mobile-menu">
							<div class="mobile-logo">
								<div class="logo">
									 <?php do_action('gradiant_logo_content'); ?>
								</div>
							</div>
							<div class="menu-toggle-wrap">
								<div class="mobile-menu-right"><ul class="header-wrap-right"></ul></div>
								<div class="hamburger hamburger-menu">
									<button type="button" class="toggle-lines menu-toggle">
										<div class="top-bun"></div>
										<div class="meat"></div>
										<div class="bottom-bun"></div>
									</button>
								</div>
							</div>
							<div id="mobile-m" class="mobile-menu">
								<button type="button" class="header-close-menu close-style"></button>
							</div>
							<div id="mob-h-top" class="mobi-head-top"></div>
						</div>
					</div>
				</div>
			</div>        
		</div>
		<!--===// End: Mobile Toggle
		=================================-->        

		<!--===// Start: Navigation
		=================================-->
		<div class="nav-area d-none d-av-block">
			<div class="navbar-full">
				<div class="av-container">
					<div class="av-columns-area">
						<div class="av-column-2 my-auto">
							<div class="logo">
								 <?php do_action('gradiant_logo_content'); ?>
							</div>
						</div>
						<div class="av-column-10 my-auto">
							<div class="theme-menu">
								<div class="menu-right">
									<ul class="header-wrap-right">
										<?php
											 do_action('gradiant_header_contact');
											 do_action('gradiant_navigation_button');
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="navbar-area <?php echo esc_attr(gradiant_sticky_menu()); ?> d-none d-av-block">
			<div class="av-container">
				<div class="av-columns-area">
					<div class="av-column-4 my-auto">
						<div class="menu-right menu-left">
							<ul class="header-wrap-right">
								<li class="widget-wrap">
									<div class="widget-wrp">
										<?php do_action('gradiant_abv_hdr_social'); ?>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="av-column-8 my-auto">
						<div class="theme-menu">
							<nav class="menubar">
								 <?php do_action('gradiant_primary_navigation'); ?>                      
							</nav>
							<div class="menu-right">
								<ul class="header-wrap-right">
									<?php 
										do_action('gradiant_navigation_cart');
										do_action('gradiant_navigation_search');
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===// End:  Navigation
		=================================-->
	</div>
</header>
<!-- End: Header
=================================-->
	

<?php
	if ( !is_page_template( 'templates/template-homepage.php' ) ) {
		gradiant_breadcrumbs_style();  
	}	
?>