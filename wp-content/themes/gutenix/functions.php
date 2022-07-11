<?php
/**
 * Gutenix functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Gutenix
 */

if ( ! class_exists( 'Gutenix_Theme' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	class Gutenix_Theme_Setup {
		/**
		 * A reference to an instance of this class.
		 *
		 * @since 1.0.0
		 * @var   Gutenix_Theme_Setup
		 */
		private static $instance = null;

		/**
		 * Theme version
		 *
		 * @since 1.0.0
		 * @var   string
		 */
		public $version;

		/**
		 * Holder for CSS layout scheme.
		 *
		 * @since 1.0.0
		 * @var   array
		 */
		public $layout = array();

		/**
		 * Holder for current fonts manager module instance.
		 *
		 * @since 1.0.0
		 * @var   CX_Fonts_Manager
		 */
		public $fonts_manager = null;

		/**
		 * Holder for current customizer module instance.
		 *
		 * @since 1.0.0
		 * @var   Gutenix_CX_Customizer
		 */
		public $customizer = null;

		/**
		 * Holder for current dynamic_css module instance.
		 *
		 * @since 1.0.0
		 * @var   Gutenix_CX_Dynamic_CSS
		 */
		public $dynamic_css = null;

		/**
		 * Loaded modules
		 *
		 * @since 1.0.0
		 * @var   array
		 */
		public $modules = array();

		/**
		 * Sets up needed actions/filters for the theme to initialize.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			$template      = get_template();
			$theme_obj     = wp_get_theme( $template );
			$this->version = $theme_obj->get( 'Version' );

			// Load the theme modules.
			add_action( 'after_setup_theme', array( $this, 'framework_loader' ), -20 );

			// Sets up theme defaults and registers support for various WordPress features.
			add_action( 'after_setup_theme', array( $this, 'theme_setup' ), 5 );

			// Load the theme includes.
			add_action( 'after_setup_theme', array( $this, 'includes' ), 7 );

			// Load theme modules.
			add_action( 'after_setup_theme', array( $this, 'load_modules' ), 8 );

			// Register sidebars.
			add_action( 'widgets_init', array( $this, 'register_sidebars' ), 10 );

			// Initialization of customizer.
			add_action( 'after_setup_theme', array( $this, 'init_customizer' ), 10 );

			// Register public assets.
			add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ), 9 );

			// Enqueue scripts.
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 10 );

			// Enqueue styles.
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 10 );

			// Load backend scripts and styles
			add_action( 'admin_enqueue_scripts', array( $this, 'load_admin_scripts' ), 10 );
		}

		/**
		 * Load the theme modules.
		 *
		 * @since 1.0.0
		 */
		public function framework_loader() {

			require get_theme_file_path( 'inc/modules/loader.php' );

			new Gutenix_CX_Loader(
				array(
					get_theme_file_path( 'inc/modules/customizer/cherry-x-customizer.php' ),
					get_theme_file_path( 'inc/modules/fonts-manager/cherry-x-fonts-manager.php' ),
					get_theme_file_path( 'inc/modules/dynamic-css/cherry-x-dynamic-css.php' ),
				)
			);
		}

		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * @since 1.0.0
		 */
		public function theme_setup() {

			// Maximum allowed width for any content in the theme, like oEmbeds and images added to posts.  https://codex.wordpress.org/Content_Width
			global $content_width;
			if ( ! isset( $content_width ) ) {
				$content_width = 1200;
			}

			/*
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 * If you're building a theme based on Gutenix, use a find and replace
			 * to change 'gutenix' to the name of your theme in all the template files.
			 */
			load_theme_textdomain( 'gutenix', get_template_directory() . '/languages' );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
			 */
			add_theme_support( 'title-tag' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			 */
			add_theme_support( 'post-thumbnails' );

			// Register image sizes.
			$this->register_image_sizes();

			// Register nav menus.
			register_nav_menus( $this->get_config( 'menus' ) );

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );

			// Set up the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'gutenix_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			) ) );

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			/**
			 * Add support for core custom logo.
			 *
			 * @link https://codex.wordpress.org/Theme_Logo
			 */
			add_theme_support( 'custom-logo', apply_filters( 'gutenix_custom_logo_args', array(
				'width'       => 250,
				'height'      => 250,
				'flex-width'  => true,
				'flex-height' => true,
			) ) );

			// Add theme support for Custom Header.
			add_theme_support( 'custom-header', apply_filters( 'gutenix_custom_header_args', array(
				'default-image' 		=> '',
				'width' 				=> 1920,
				'height'				=> 100,
			) ) );

			/*
			 * This theme styles the visual editor to resemble the theme style.
			 */
			add_theme_support( 'editor-styles' );
			add_editor_style( 'editor-style.css' );

			// Set layout config.
			$this->layout = $this->get_config( 'layout' );

			// WooCommerce
			if( class_exists( 'WooCommerce' ) ) {
				add_theme_support( 'woocommerce' );
			}

		}

		/**
		 * Register image sizes, based on config.
		 *
		 * @since 1.0.0
		 */
		public function register_image_sizes() {
			$thumbs = $this->get_config( 'thumbnails' );

			if ( isset( $thumbs['post-thumbnail'] ) ) {

				set_post_thumbnail_size(
					$thumbs['post-thumbnail']['width'],
					$thumbs['post-thumbnail']['height'],
					$thumbs['post-thumbnail']['crop']
				);

				unset( $thumbs['post-thumbnail'] );
			}

			if ( empty( $thumbs ) ) {
				return;
			}

			foreach ( $thumbs as $name => $data ) {
				add_image_size( $name, $data['width'], $data['height'], $data['crop'] );
			}
		}

		/**
		 * Loads the theme files supported by themes and template-related functions/classes.
		 *
		 * @since 1.0.0
		 */
		public function includes() {
			/**
			 * Classes.
			 */
			require_once get_parent_theme_file_path( 'inc/classes/class-utils.php' );
			require_once get_parent_theme_file_path( 'inc/classes/class-svg-icons.php' );

			/**
			 * TGMPA init.
			 */
			require_once get_parent_theme_file_path( 'inc/tgmpa.php' );

			/**
			 * Custom template tags for this theme.
			 */
			require_once get_parent_theme_file_path( 'config/data-importer.php' );

			/**
			 * Custom template tags for this theme.
			 */
			require_once get_parent_theme_file_path( 'inc/template-tags.php' );

			/**
			 * Functions for display menus on the site.
			 */
			require_once get_theme_file_path( 'inc/template-menu.php' );

			/**
			 * Functions for handling how comments are displayed and used on the site.
			 */
			require_once get_parent_theme_file_path( 'inc/template-comment.php' );

			/**
			 * Related Posts Template Functions.
			 */
			require_once get_parent_theme_file_path( 'inc/template-related-posts.php' );

			/**
			 * Contextual functions for the header, footer, content and sidebar classes.
			 */
			require_once get_parent_theme_file_path( 'inc/context.php' );

			/**
			 * Custom functions that act independently of the theme templates.
			 */
			require_once get_parent_theme_file_path( 'inc/extras.php' );

			/**
			 * Functions which enhance the theme by hooking into WordPress.
			 */
			require_once get_parent_theme_file_path( 'inc/hooks.php' );

			/**
			 * Customizer additions.
			 */
			require_once get_parent_theme_file_path( 'inc/customizer.php' );

			/**
			 * Load Jetpack compatibility file.
			 */
			if ( defined( 'JETPACK__VERSION' ) ) {
				require_once get_parent_theme_file_path( 'inc/jetpack.php' );
			}

		}

		/**
		 * Load theme and child theme modules
		 *
		 * @since  1.0.0
		 * @return void
		 */
		public function load_modules() {

			require_once get_theme_file_path( 'inc/modules/base.php' );

			$allowed_modules  = $this->get_config( 'modules' );

			$disabled_modules = apply_filters( 'gutenix_disabled_modules', array() );

			if ( empty( $allowed_modules ) ) {
				return;
			}

			foreach ( $allowed_modules as $module => $childs ) {
				if ( ! in_array( $module, $disabled_modules ) ) {
					$this->load_module( $module, $childs );
				}
			}
		}

		/**
		 * Load theme and child theme module
		 *
		 * @since  1.0.0
		 * @param  string $module Module slug.
		 * @param  array  $childs Childs modules.
		 * @return void
		 */
		public function load_module( $module = '', $childs = array() ) {

			if ( ! file_exists( get_theme_file_path( $this->modules_base() . $module . '/module.php' ) ) ) {
				return;
			}

			require_once get_theme_file_path( $this->modules_base() . $module . '/module.php' );
			$class = $this->get_module_class( $module );

			if ( ! class_exists( $class ) ) {
				return;
			}

			$instance = new $class( $childs );

			$this->modules[ $instance->module_id() ] = $instance;

		}

		/**
		 * Modules base path
		 *
		 * @since  1.0.0
		 * @return string
		 */
		public function modules_base() {
			return 'inc/modules/';
		}

		/**
		 * Returns module class by name
		 *
		 * @since  1.0.0
		 * @param  string $name Module name
		 * @return string
		 */
		public function get_module_class( $name ) {

			$module = str_replace( ' ', '_', ucwords( str_replace( '-', ' ', $name ) ) );
			return 'Gutenix_' . $module . '_Module';
		}

		/**
		 * Register theme sidebars.
		 *
		 * @since  1.0.0
		 * @return void
		 */
		public function register_sidebars() {
			register_sidebar( array(
				'id' 				=> 'sidebar',
				'name' 				=> esc_html__( 'Sidebar', 'gutenix' ),
				'description' 		=> esc_html__( 'List of widgets to display on blog post pages', 'gutenix' ),
				'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
				'after_widget' 		=> '</aside>',
				'before_title' 		=> '<h5 class="widget-title">',
				'after_title' 		=> '</h5>',
				'before_wrapper' 	=> '<div id="%1$s" %2$s role="complementary">',
				'after_wrapper' 	=> '</div>',
				'is_global' 		=> true,
			) );

			register_sidebar( array(
				'id' 				=> 'footer-area',
				'name' 				=> esc_html__( 'Footer Area', 'gutenix' ),
				'description' 		=> '',
				'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
				'after_widget' 		=> '</aside>',
				'before_title' 		=> '<h5 class="widget-title">',
				'after_title' 		=> '</h5>',
				'before_wrapper' 	=> '<section id="%1$s" %2$s>',
				'after_wrapper' 	=> '</section>',
				'is_global' 		=> true,
			) );

			// Dynamic Sidebar Generator
			$sidebar_dynamic_generator = get_theme_mod( 'sidebar_dynamic_generator' );

			if( ! empty( $sidebar_dynamic_generator ) ) {
				foreach( explode('|', $sidebar_dynamic_generator) as $sidebar ) {
					if ( isset( $sidebar ) && ! empty( $sidebar ) ) {
						register_sidebar( array(
							'name' 				=> esc_html( $sidebar ),
							'id' 				=> gutenix_generate_slug( $sidebar, 45 ),
							'description' 		=> esc_html__('The sidebar widget area', 'gutenix'),
							'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
							'after_widget' 		=> '</aside>',
							'before_title' 		=> '<h5 class="widget-title">',
							'after_title' 		=> '</h5>',
							'before_wrapper' 	=> '<section id="%1$s" %2$s>',
							'after_wrapper' 	=> '</section>',
							'is_global' 		=> true,
						));
					}
				}
			}

			// Footer Widget Areas generator
			$footer_widgets_visible = get_theme_mod( 'footer_widgets_visible', false );

			if( false != $footer_widgets_visible ) {
				
				$count = get_theme_mod( 'footer_widget_areas_count', '4' );

				$i = 1;

				foreach ( range( 1, $count ) as $g ) {
					
					register_sidebar( array(
						'name' 				=> esc_html__('Footer Widget Area ', 'gutenix') . esc_html( $i ),
						'id' 				=> 'footer-widget-area-' . esc_attr( $i ),
						'description' 		=> esc_html__('The footer sidebar widget area', 'gutenix'),
						'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
						'after_widget' 		=> '</aside>',
						'before_title' 		=> '<h5 class="widget-title">',
						'after_title' 		=> '</h5>',
						'before_wrapper' 	=> '<section id="%1$s" %2$s>',
						'after_wrapper' 	=> '</section>',
						'is_global' 		=> true,
					) );
					
					$i++;
				}
			}

			if( class_exists( 'WooCommerce' ) ) {
				
				register_sidebar( array(
					'id' 				=> 'sidebar-shop',
					'name' 				=> esc_html__( 'Shop Sidebar', 'gutenix' ),
					'description'    => esc_html__( 'List of widgets to display on Shop pages', 'gutenix' ),
					'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
					'after_widget' 		=> '</aside>',
					'before_title' 		=> '<h5 class="widget-title">',
					'after_title' 		=> '</h5>',
					'before_wrapper' 	=> '<div id="%1$s" %2$s role="complementary">',
					'after_wrapper' 	=> '</div>',
					'is_global' 		=> true,
				) );

				register_sidebar( array(
					'id' 				=> 'sidebar-shop_filters_panel',
					'name'           => esc_html__( 'Shop Fixed Panel', 'gutenix' ),
					'description'    => esc_html__( 'To use a set of filters, you need to enable the Fixed Panel in the Customizer -> WooCommerce Theme -> Product Catalog -> ToolBar', 'gutenix' ),
					'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'   => '</aside>',
					'before_title'   => '<h5 class="widget-title">',
					'after_title'    => '</h5>',
					'before_wrapper' => '<div id="%1$s" %2$s role="complementary">',
					'after_wrapper'  => '</div>',
					'is_global'      => true,
				) );
			}
		}

		/**
		 * Run initialization of customizer.
		 *
		 * @since 1.0.0
		 */
		public function init_customizer() {
			$this->fonts_manager = new CX_Fonts_Manager();
			$this->customizer    = new CX_Customizer( gutenix_get_customizer_options() );
			$this->dynamic_css   = new CX_Dynamic_CSS( gutenix_get_dynamic_css_options() );
		}

		/**
		 * Load backend scripts and styles.
		 *
		 * @since 1.0.0
		 */
		public function load_admin_scripts() {
			wp_enqueue_style( 'gutenix-message', get_parent_theme_file_uri( 'assets/css/message.css' ), false, $this->version );
		}

		/**
		 * Register assets.
		 *
		 * @since 1.0.0
		 */
		public function register_assets() {
			
			wp_register_style( 'font-awesome', get_parent_theme_file_uri( 'assets/lib/font-awesome/css/font-awesome.min.css' ), array(), '4.7.0' );

			wp_register_script( 'jquery-ui-totop', get_parent_theme_file_uri( 'assets/lib/jquery-ui-totop/jquery.ui.totop.min.js' ), array( 'jquery' ), '1.2.0', true );
		}

		/**
		 * Enqueue styles.
		 *
		 * @since 1.0.0
		 */
		public function enqueue_styles() {
			wp_enqueue_style( 'font-awesome' );

			wp_enqueue_style( 'gutenix-dynamic-default', get_parent_theme_file_uri( 'assets/css/dynamic/dynamic-default.css' ), array(), $this->version );
			
			wp_enqueue_style( 'gutenix-theme-style', get_parent_theme_file_uri( 'assets/css/theme-style.css' ), array(), $this->version );

			wp_enqueue_style( 'gutenix-style', get_stylesheet_uri(), array(), $this->version );
			wp_style_add_data( 'gutenix-style', 'rtl', 'replace' );
		}

		/**
		 * Enqueue scripts.
		 *
		 * @since 1.0.0
		 */
		public function enqueue_scripts() {
			
			global $is_IE;

			if ( $is_IE ) {
				wp_enqueue_script( 'gutenix-skip-link-focus-fix', get_theme_file_uri(' assets/js/skip-link-focus-fix.js' ), array(), $this->version, true );
			}

			wp_enqueue_script( 'gutenix-navigation', get_theme_file_uri( 'assets/js/navigation.js' ), array(), $this->version, true );

			/**
			 * Filter the depends on main theme script.
			 *
			 * @since 1.0.0
			 * @var   array
			 */
			$depends = apply_filters( 'gutenix_theme_script_depends', array( 'jquery' ) );

			wp_enqueue_script( 'gutenix-cx-css-collector', get_parent_theme_file_uri( 'inc/modules/dynamic-css/assets/min/cx-css-collector.min.js' ), array( 'jquery' ), '1.0.0', true );

			wp_enqueue_script( 'gutenix-theme-script', get_theme_file_uri( 'assets/js/theme-script.js' ), $depends, $this->version, true );

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

			wp_localize_script( 'gutenix-theme-script', 'gutenixConfig', apply_filters(
				'gutenix_theme_script_variables',
				array(
					'labels' => array(
						'backButton' => esc_html__( 'Back', 'gutenix' ),
					),
					'breakpoints' => array(
						'xs' => 0,
						'md' => 768,
						'lg' => 1025,
						'xl' => 1200,
					),
					'mobilePanelBreakpoint'  => gutenix_get_mobile_panel_breakpoint(),
					'headerHamburgerLayouts' => Gutenix_Utils::get_header_hamburger_panel_layouts(),
					'toTop'                  => gutenix_theme()->customizer->get_value( 'show_totop_button' ),
				)
			) );
		}

		/**
		 * Returns specific theme configurations
		 *
		 * @since  1.0.0
		 * @param  string $config Config name to get.
		 * @return mixed
		 */
		public function get_config( $config ) {
			$file            = sprintf( 'config/%s.php', $config );
			$config_template = locate_template( array( $file ) );

			if ( $config_template ) {
				return include $config_template;
			}

			return false;
		}

		/**
		 * Do Elementor or Jet Theme Core location
		 *
		 * @since  1.0.0
		 * @param  string $location
		 * @param  string $fallback
		 * @return bool
		 */
		public function do_location( $location = null, $fallback = null ) {

			$handler = false;
			$done    = false;

			// Choose handler
			if ( function_exists( 'jet_theme_core' ) ) {
				$handler = array( jet_theme_core()->locations, 'do_location' );
			} elseif ( function_exists( 'elementor_theme_do_location' ) ) {
				$handler = 'elementor_theme_do_location';
			}

			// If handler is found - try to do passed location
			if ( false !== $handler ) {
				$done = call_user_func( $handler, $location );
			}

			if ( true === $done ) {
				// If location successfully done - return true
				return true;
			} elseif ( null !== $fallback ) {
				// If for some reasons location couldn't be done and passed fallback template name - include this template and return
				if ( is_array( $fallback ) ) {
					// fallback in name slug format
					get_template_part( $fallback[0], $fallback[1] );
				} else {
					// fallback with just a name
					get_template_part( $fallback );
				}
				return true;
			}

			// In other cases - return false
			return false;
		}

		/**
		 * Check if Gutenix Pro is activated.
		 *
		 * @since  1.0.0
		 * @return bool
		 */
		public function is_pro_activated() {
			return function_exists( 'gutenix_pro' );
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @return Gutenix_Theme_Setup
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}
	}

endif;

/**
 * Returns instance of main theme configuration class.
 *
 * @since  1.0.0
 * @return Gutenix_Theme_Setup
 */
function gutenix_theme() {
	return Gutenix_Theme_Setup::get_instance();
}

gutenix_theme();

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}