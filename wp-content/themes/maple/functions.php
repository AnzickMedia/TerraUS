<?php
/**
 * @package WordPress
 * @subpackage Maple
 */
	
	add_action( 'after_setup_theme', 'maple_setup' );
	
	function maple_setup(){
		
		add_action( 'vc_before_init', 'maple_vcSetAsTheme' );
		function maple_vcSetAsTheme() {
		    vc_set_as_theme(true);
		}
		if (function_exists( 'set_revslider_as_theme' )){
			add_action( 'init', 'maple_set_revslider_as_theme' );
			function maple_set_revslider_as_theme() {
				set_revslider_as_theme();
			}
		}
		
	//body class
	function maple_custom_body_class($classes, $class){
		if (is_singular() && get_post_meta(get_the_ID(), 'maple_enable_custom_header_options_value', true)=='yes'){
			if (get_post_meta(get_the_ID(), 'maple_content_to_the_top_value', true) == "off") $classes[] = "content_after_header";
		}
		else {
			if (get_option('maple_content_to_the_top') == "off") $classes[] = "content_after_header";
		}
		return $classes;
	}
	
	add_filter( 'body_class', 'maple_custom_body_class', 10, 2 );
			
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );
		add_editor_style("/css/layout-style.css");
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		load_theme_textdomain( 'maple', get_template_directory() . '/languages' );
			
		$locale = get_locale();
		$locale_file = get_template_directory() . "/languages/$locale.php";
		if ( is_readable( $locale_file ) )
			require_once( $locale_file );
		/*
	
		/**
		 * Set the content width based on the theme's design and stylesheet.
		 */
		if ( ! isset( $content_width ) )
			$content_width = 1170;
		
		//WMPL
		/**
		 * register panel strings for translation
		 */
		if (function_exists ( 'icl_register_string' )){
			require_once (get_template_directory().'/inc/theme-wpml.php');
		}
		//\WMPL
		
		//declare some global variables that will be used everywhere
		global $maple_new_meta_boxes,
		$maple_new_meta_post_boxes,
		$maple_new_meta_portfolio_boxes,
		$maple_buttons,
		$maple_data;
		$maple_new_meta_boxes=array();
		$maple_new_meta_post_boxes=array();
		$maple_new_meta_portfolio_boxes=array();
		$maple_buttons=array();
		$maple_data=new stdClass();
		
		
		/*----------------------------------------------------------------
		 *  DEFINE THE MAIN CONSTANTS
		 *---------------------------------------------------------------*/
		
		$my_theme = wp_get_theme();
		define("MAPLE_VERSION", $my_theme->Version);
		//define the main paths and URLs
		define("MAPLE_LIB_PATH", get_template_directory() . '/lib/');
		define("MAPLE_LIB_URL", get_template_directory_uri().'/lib/');
		define("MAPLE_JS_PATH", get_template_directory_uri().'/js/');
		define("MAPLE_CSS_PATH", get_template_directory_uri().'/css/');
	
		define("MAPLE_FUNCTIONS_PATH", MAPLE_LIB_PATH . 'functions/');
		define("MAPLE_FUNCTIONS_URL", MAPLE_LIB_URL.'functions/');
		define("MAPLE_CLASSES_PATH", MAPLE_LIB_PATH.'classes/');
		define("MAPLE_OPTIONS_PATH", MAPLE_LIB_PATH.'options/');
		define("MAPLE_WIDGETS_PATH", MAPLE_LIB_PATH.'widgets/');
		define("MAPLE_SHORTCODES_PATH", MAPLE_LIB_PATH.'shortcodes/');
		define("MAPLE_PLUGINS_PATH", MAPLE_LIB_PATH.'plugins/');
		define("MAPLE_UTILS_URL", MAPLE_LIB_URL.'utils/');
		
		define("MAPLE_IMAGES_URL", MAPLE_LIB_URL.'images/');
		define("MAPLE_CSS_URL", MAPLE_LIB_URL.'css/');
		define("MAPLE_SCRIPT_URL", MAPLE_LIB_URL.'script/');
		define("MAPLE_PATTERNS_URL", get_template_directory_uri().'/images/maple_patterns/');
		$uploadsdir=wp_upload_dir();
		define("MAPLE_UPLOADS_URL", $uploadsdir['url']);
		define("MAPLE_SEPARATOR", '|*|');
		define("MAPLE_OPTIONS_PAGE", 'maple_options');
		define("MAPLE_STYLE_OPTIONS_PAGE", 'maple_style_options');
	
		/*----------------------------------------------------------------
		 *  INCLUDE THE FUNCTIONS FILES
		 *---------------------------------------------------------------*/
				
		require_once (MAPLE_FUNCTIONS_PATH.'general.php');  //some main common functions
		require_once (MAPLE_FUNCTIONS_PATH.'stylesheet.php');  //some main common functions
		add_action('wp_enqueue_scripts', 'maple_style', 1);
		add_action('wp_enqueue_scripts','maple_custom_head', 2);
		add_action('wp_enqueue_scripts', 'maple_scripts', 10);
	
		
		require_once (MAPLE_FUNCTIONS_PATH.'sidebars.php');  //the sidebar functionality
		if ( isset($_GET['page']) && $_GET['page'] == MAPLE_OPTIONS_PAGE ){
			require_once (MAPLE_CLASSES_PATH.'tw-options-manager.php');  //the theme options manager functionality
		}
		if ( isset($_GET['page']) && $_GET['page'] == MAPLE_STYLE_OPTIONS_PAGE ){
			require_once (MAPLE_CLASSES_PATH.'tw-style-options-manager.php');  //the theme options manager functionality
		}
		
			
		require_once (MAPLE_CLASSES_PATH.'tw-custom-data-manager.php');  
		require_once (MAPLE_CLASSES_PATH.'tw-custom-page.php');  
		require_once (MAPLE_CLASSES_PATH.'tw-custom-page-manager.php');  
		require_once (MAPLE_FUNCTIONS_PATH.'custom-pages.php');  //the comments functionality
		require_once (MAPLE_FUNCTIONS_PATH.'comments.php');  //the comments functionality
		require_once (MAPLE_WIDGETS_PATH.'widgets.php');  //the widgets functionality
		if (function_exists('maple_add_widgets')) maple_add_widgets();
		require_once (MAPLE_FUNCTIONS_PATH.'options.php');  //the theme options functionality
		
		
		if (is_admin()){
			require_once (MAPLE_FUNCTIONS_PATH. 'meta.php');  //adds the custom meta fields to the posts and pages
			add_action('admin_enqueue_scripts','maple_admin_style');
		}
		$functions_path = get_template_directory() . '/functions/';
		
		add_filter('woocommerce_add_to_cart_fragments' , 'maple_woocommerce_header_add_to_cart_fragment' );
		
		// Declare sidebar widget zone
		if (function_exists('register_sidebar')) {
			register_sidebar(array(
				'name' => esc_html__( 'Blog Sidebar', 'maple' ),
				'id'   => 'sidebar-widgets',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>'
			));
		}
		
		if (!function_exists('maple_wp_pagenavi')){ 
			$including = $functions_path. 'wp-pagenavi.php';
		    require_once($including);
		}
		
		/* ------------------------------------------------------------------------ */
		/* Misc
		/* ------------------------------------------------------------------------ */
		// Post Thumbnail Sizes
		if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
		
		if ( function_exists( 'add_image_size' ) ) {
			add_image_size( 'maple_blog', 1000, 563, true );				// Standard Blog Image
			add_image_size( 'maple_mini', 80, 80, true ); 				// used for widget thumbnail
			add_image_size( 'maple_portfolio', 600, 400, true );			// also for blog-medium
			add_image_size( 'maple_regular', 500, 500, true ); 
			add_image_size( 'maple_wide', 1000, 500, true ); 
			add_image_size( 'maple_tall', 500, 1000, true );
			add_image_size( 'maple_widetall', 1000, 1000, true ); 
		}
		
		/* tgm plugin activator */
		/**
		 * Include the TGM_Plugin_Activation class.
		 */
		require_once get_template_directory() . '/lib/functions/class-tgm-plugin-activation.php';
		
		add_action( 'tgmpa_register', 'maple_register_required_plugins' );	
		
		if ( class_exists('VCExtendAddonClass')){
			// Finally initialize code
			new VCExtendAddonClass();
		}
		
		if (get_option("maple_enable_smooth_scroll") == "on"){
			update_option('ultimate_smooth_scroll','enable');
		} else update_option('ultimate_smooth_scroll','disable');
		add_filter( 'woocommerce_enqueue_styles', '__return_false' );
	}
	
	function maple_admin_style(){
		wp_enqueue_style('maple-fa-painel', MAPLE_CSS_PATH .'backcss.css');
		wp_enqueue_script( 'maple-admin', MAPLE_JS_PATH .'maple-admin.js', array(), '1',$in_footer = true);
	}
	
	
	
	function maple_wpml_filter_langs( $languages ) {
		foreach ( $languages as $k => $language ) {                                       
			$lang_code = explode ( '-' , $languages[$k]['language_code'] );
			$languages[$k]['native_name']     = ucfirst( $lang_code[0] );
			$languages[$k]['translated_name'] = ucfirst( $lang_code[0] );
		}	
		return $languages;
	}
	add_filter( 'icl_ls_languages', 'maple_wpml_filter_langs' );
	add_filter('wpml_add_language_selector', 'maple_wpml_filter_langs');
	

	/*-----------------------------------------------------------------------------------*/
	/*  THEME REQUIRES
	/*-----------------------------------------------------------------------------------*/
	require_once (get_template_directory().'/inc/theme-styles.php');
	
	
	function maple_custom_head(){
		wp_enqueue_script('maple-html5trunk', get_template_directory_uri().'/js/html5.js', '1');
		wp_script_add_data( 'maple-html5trunk', 'conditional', 'lt IE 9' );
	}
	
	function maple_style() {		
		wp_enqueue_style( 'maple-style', get_template_directory_uri().'/style.css', array(), '1' );
	}
	
	function maple_slug_post_classes( $classes, $class, $post_id ) {
		$maple_is_portfolio = array_search( 'type-portfolio', $classes );
		if ( is_single( $post_id ) && false !== $maple_is_portfolio ) {
			$classes[] = 'container';
		}
		if (is_sticky( $post_id )) $classes[] = 'sticky';	 
		return $classes;
	}
	add_filter( 'post_class', 'maple_slug_post_classes', 10, 3 );
	
	/*-----------------------------------------------------------------------------------*/
	/*  LOAD THEME SCRIPTS
	/*-----------------------------------------------------------------------------------*/
	function maple_scripts(){
	
		if (!is_admin()){
			global $vc_addons_url, $post;
			
			if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
			
	   	    wp_enqueue_script( 'maple_utils', MAPLE_JS_PATH .'utils.js', array('jquery'),'1.0',$in_footer = true);
	  	    wp_enqueue_script( 'maple', MAPLE_JS_PATH .'maple.js', array('jquery'), '1',$in_footer = true);
	  	    
	  		wp_enqueue_script('cubeportfolio-jquery-js',$in_footer = false);
			wp_enqueue_style('cubeportfolio-jquery-css',$in_footer = false);
			
			
			if (class_exists('Ultimate_VC_Addons')) {
				wp_enqueue_script('ultimate', plugins_url().'/Ultimate_VC_Addons/assets/min-js/ultimate.min.js', array('jquery'),'3.19.5');
				wp_enqueue_style('ultimate-style-min', plugins_url().'/Ultimate_VC_Addons/assets/min-css/ultimate.min.css', '3.19.5');
			}
			
			if (is_single()){
				wp_enqueue_style( 'prettyphoto'); wp_enqueue_script( 'prettyphoto'); 
			}
			if (isset($post->ID)) $template = get_post_meta( $post->ID, '_wp_page_template' ,true );
						
			if (isset($template) && ( $template == 'template-blank.php' || $template == 'template-home.php' ) || is_404()){
				if (class_exists('Ultimate_VC_Addons')) {
					wp_enqueue_script('ultimate', plugins_url().'/Ultimate_VC_Addons/assets/min-js/ultimate.min.js', array('jquery'),'3.19.5');
					wp_enqueue_style('ultimate-style-min', plugins_url().'/Ultimate_VC_Addons/assets/min-css/ultimate.min.css','3.19.5');
					wp_enqueue_script('ultimate-script');
					wp_enqueue_script('ultimate-vc-params');
				}
			}
			if (isset($template) && ($template == 'one-page-template.php' || $template == 'template-home.php')){
				wp_enqueue_script('googleapis');
			}

			if (isset($template) && ($template == 'blog-masonry-template.php' || $template == 'blog-template.php')){
				wp_enqueue_script( 'maple-blog', MAPLE_JS_PATH .'blog.js', array('jquery'), '1',$in_footer = true);
			}
			
			wp_dequeue_style( 'wp-mediaelement' );
			wp_dequeue_script( 'wp-mediaelement' ); 
			
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/*  FUNCTION FOR INSTALL AND REGISTER THEME PLUGINS
	/*-----------------------------------------------------------------------------------*/
	function maple_register_required_plugins() {
	
		$plugins = array(
	
			// This is an example of how to include a plugin pre-packaged with a theme
				
				array(
					'name'      => esc_html('Contact Form 7','maple'),
					'slug'      => esc_html('contact-form-7','maple'),
					'required'  => false,
				),
				
				array(
					'name'      => esc_html('Widget Importer & Exporter','maple'),
					'slug'      => esc_html('widget-importer-exporter','maple'),
					'required'  => false,
				),
				
				array(
					'name'      => esc_html('Really Simple CAPTCHA','maple'),
					'slug'      => esc_html('really-simple-captcha','maple'),
					'required'  => false,
				),
				
				array(
					'name'      => esc_html('WooCommerce','maple'),
					'slug'      => esc_html('woocommerce','maple'),
					'required'  => false,
				),
				
				array(
					'name'      => esc_html('Easy Theme and Plugin Upgrades','maple'),
					'slug'      => esc_html('easy-theme-and-plugin-upgrades','maple'),
					'required'  => false,
				),
				
				array(
					'name'      => esc_html('Classic Editor','maple'),
					'slug'      => esc_html('classic-editor','maple'),
					'required'  => false,
				),
				
				array(
					'name'          => 'WPBakery Visual Composer',
					'slug'          => 'js_composer',
					'source'        => 'http://treethemes.net/plugins/maple/js_composer.zip',
					'required'      => true,
					'version'       => '6.2.0'
				),
				array(
					'name'      	=> 'Revolution Slider',
					'slug'     	 	=> 'revslider',
					'source'        => 'http://treethemes.net/plugins/revslider.zip',
					'required'  	=> true,
					'version'       => '6.2.17'
				),
				
				array(
					'name'          => 'Ultimate Addons for Visual Composer',
					'slug'          => 'Ultimate_VC_Addons',
					'source'        => 'http://treethemes.net/plugins/Ultimate_VC_Addons.zip',
					'required'      => true,
					'version'       => '3.19.5'
				),
				array(
					'name'      	=> 'Maple Custom Post Types',
					'slug'     	 	=> 'maple_custom_post_types',
					'source'        => 'http://treethemes.net/plugins/maple_custom_post_types.zip',
					'required'  	=> true,
					'version'       => '2.3.1'
				),
				
				array(
					'name'      	=> 'Meks Easy Photo Feed Widget',
					'slug'     	 	=> 'meks-easy-instagram-widget',
					'source'        => 'http://treethemes.net/plugins/meks-easy-instagram-widget.zip',
					'required'  	=> true,
					'version'       => '3.0'
				),
				
				array(
					'name'      	=> 'Envato Market',
					'slug'     	 	=> 'envato-market',
					'source'        => 'http://treethemes.net/plugins/envato-market.zip',
					'required'  	=> true,
					'version'       => '2.0.3'
				),
				
				array(
					'name'          => 'Cube Portfolio',
					'slug'          => 'cubeportfolio',
					'source'        => 'http://treethemes.net/plugins/cubeportfolio.zip',
					'required'      => true,
					'version'       => '3.8.1'
				)
				
		);
	
		// Change this to your theme text domain, used for internationalising strings
		$config = array(
			'domain'       		=> 'maple',         	// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',
			'parent_slug'  => 'themes.php',            			// Parent menu slug.
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       			=> esc_html__( 'Install Required Plugins', 'maple' ),
				'menu_title'                       			=> esc_html__( 'Install Plugins', 'maple' ),
				'installing'                       			=> esc_html__( 'Installing Plugin: %s', 'maple' ), // %1$s = plugin name
				'oops'                             			=> esc_html__( 'Something went wrong with the plugin API.', 'maple' ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'maple' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'maple' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'maple' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'maple' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'maple' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'maple' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'maple' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'maple' ), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'maple' ),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'maple' ),
				'return'                           			=> esc_html__( 'Return to Required Plugins Installer', 'maple' ),
				'plugin_activated'                 			=> esc_html__( 'Plugin activated successfully.', 'maple' ),
				'complete' 									=> esc_html__( 'All plugins installed and activated successfully. %s', 'maple' ), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);
	
		tgmpa( $plugins, $config );
	
	}
	

	
	/*-----------------------------------------------------------------------------------*/
	/*  THEME REQUIRES
	/*-----------------------------------------------------------------------------------*/

 	
 	if (file_exists(get_stylesheet_directory().'/inc/theme-header.php')) require_once (get_stylesheet_directory().'/inc/theme-header.php');
 	else require_once (get_template_directory().'/inc/theme-header.php');
 	
 	if (file_exists(get_stylesheet_directory().'/inc/theme-walker-menu.php')) require_once (get_stylesheet_directory().'/inc/theme-walker-menu.php');
 	else require_once (get_template_directory().'/inc/theme-walker-menu.php');
 	

 	
 	if (file_exists(get_stylesheet_directory().'/inc/theme-breadcrumb.php')) require_once (get_stylesheet_directory().'/inc/theme-breadcrumb.php');
 	else require_once (get_template_directory().'/inc/theme-breadcrumb.php');
 	
 	if (file_exists(get_stylesheet_directory().'/inc/theme-menu.php')) require_once (get_stylesheet_directory().'/inc/theme-menu.php');
 	else require_once (get_template_directory().'/inc/theme-menu.php');
 	
 	if (file_exists(get_stylesheet_directory().'/inc/theme-woocart.php')) require_once (get_stylesheet_directory().'/inc/theme-woocart.php');
 	else require_once (get_template_directory().'/inc/theme-woocart.php');
 	
	
	
	/*-----------------------------------------------------------------------------------*/
	/*  HEX TO RGB
	/*-----------------------------------------------------------------------------------*/
	function maple_hex2rgb($hex = "000000") {
		if (is_array($hex)) $hex = "000000";
		$hex = str_replace("#", "", $hex);
		
		if(strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}
		$rgb = array($r, $g, $b);
		//return implode(",", $rgb); // returns the rgb values separated by commas
		return $rgb; // returns an array with the rgb values
	}



	function maple_get_string_between($string, $start, $end){
	    $string = " ".$string;
	    $ini = strpos($string,$start);
	    if ($ini == 0) return "";
	    $ini += strlen($start);
	    $len = strpos($string,$end,$ini) - $ini;
	    return substr($string,$ini,$len);
	}
	
	/* Remove VC Modules */
	if (function_exists('vc_remove_element')){
		vc_remove_element('vc_carousel');
		vc_remove_element('vc_posts_slider');
		vc_remove_element('vc_gallery');
		vc_remove_element('vc_images_carousel');
		vc_remove_element('vc_button');
		vc_remove_element('vc_cta_button');
	}
	
	
	/*-----------------------------------------------------------------------------------*/
	/*  INCLUDE ADDONS IN MAPLE THEME
	/*-----------------------------------------------------------------------------------*/
	function maple_content_shortcoder($post_content, $loadglobally = false){
		
		$dependancy = array('jquery');
		global $vc_addons_url;

			
		if (isset($vc_addons_url) && $vc_addons_url != ""){
			
			$js_path = 'assets/min-js/';
			$css_path = 'assets/min-css/';
			$ext = '.min';
			$isAjax = true;
			$ultimate_smooth_scroll = get_option('ultimate_smooth_scroll');
	
			// register js
			wp_register_script('ultimate-script',$vc_addons_url.'assets/min-js/ultimate.min.js',array('jquery', 'jquery-ui-core' ), '3.19.5', false);
			wp_register_script('ultimate-appear',$vc_addons_url.$js_path.'jquery-appear'.$ext.'.js',array('jquery'), '3.19.5');
			wp_register_script('ultimate-custom',$vc_addons_url.$js_path.'custom'.$ext.'.js',array('jquery'), '3.19.5');
			wp_register_script('ultimate-vc-params',$vc_addons_url.$js_path.'ultimate-params'.$ext.'.js',array('jquery'), '3.19.5');
			if($ultimate_smooth_scroll === 'enable') {
				$smoothScroll = 'SmoothScroll-compatible.min.js';
			}
			else {
				$smoothScroll = 'SmoothScroll.min.js';
			}
			wp_register_script('ultimate-smooth-scroll',$vc_addons_url.'assets/min-js/'.$smoothScroll,array('jquery'),'3.19.5',true);
			wp_register_script("ultimate-modernizr",$vc_addons_url.$js_path.'modernizr-custom'.$ext.'.js',array('jquery'),'3.19.5');
			wp_register_script("ultimate-tooltip",$vc_addons_url.$js_path.'tooltip'.$ext.'.js',array('jquery'),'3.19.5');
	
			// register css
			wp_register_style('ultimate-animate',$vc_addons_url.$css_path.'animate'.$ext.'.css',array(),'3.19.5');
			wp_register_style('ultimate-style',$vc_addons_url.$css_path.'style'.$ext.'.css',array(),'3.19.5');
			wp_register_style('ultimate-style-min',$vc_addons_url.'assets/min-css/ultimate.min.css',array(),'3.19.5');
			wp_register_style('ultimate-tooltip',$vc_addons_url.$css_path.'tooltip'.$ext.'.css',array(),'3.19.5');
	
			$ultimate_smooth_scroll = get_option('ultimate_smooth_scroll');
			if($ultimate_smooth_scroll == "enable" || $ultimate_smooth_scroll === 'enable') {
				wp_enqueue_script('ultimate-smooth-scroll');
			}
	
			if(function_exists('vc_is_editor')){
				if(vc_is_editor()){
					wp_enqueue_style('vc-fronteditor',$vc_addons_url.'assets/min-css/vc-fronteditor.min.css');
				}
			}
	
			$ultimate_global_scripts = ($loadglobally) ? 'enable' : bsf_get_option('ultimate_global_scripts');

			if($ultimate_global_scripts === 'enable') {
				
				wp_enqueue_script('ultimate-modernizr');
				wp_enqueue_script('jquery_ui');
				wp_enqueue_script('masonry');
				if(defined('DISABLE_ULTIMATE_GOOGLE_MAP_API') && (DISABLE_ULTIMATE_GOOGLE_MAP_API == true || DISABLE_ULTIMATE_GOOGLE_MAP_API == 'true'))
					$load_map_api = false;
				else
					$load_map_api = true;
				if($load_map_api)
					wp_enqueue_script('googleapis');
				wp_enqueue_script('ultimate-script');
				wp_enqueue_script('ultimate-modal-all');
				wp_enqueue_script('jquery.shake',$vc_addons_url.$js_path.'jparallax'.$ext.'.js');
				wp_enqueue_script('jquery.vhparallax',$vc_addons_url.$js_path.'vhparallax'.$ext.'.js');
	
				wp_enqueue_style('ultimate-style-min');
				wp_enqueue_style("ult-icons");
				wp_enqueue_style('ultimate-vidcons',$vc_addons_url.'assets/fonts/vidcons.css');
				wp_enqueue_script('jquery.ytplayer',$vc_addons_url.$js_path.'mb-YTPlayer'.$ext.'.js');
	
				$Ultimate_Google_Font_Manager = new Ultimate_Google_Font_Manager;
				$Ultimate_Google_Font_Manager->enqueue_selected_ultimate_google_fonts();
	
				return false;
			}
	
			if(!is_404() && !is_search()){
	
				if(stripos($post_content, 'font_call:'))
				{
					preg_match_all('/font_call:(.*?)"/',$post_content, $display);
					enquque_ultimate_google_fonts_optimzed($display[1]);
				}
				
				if( stripos( $post_content, '[swatch_container') || 
				    stripos( $post_content, '[ultimate_modal'))
				{
					wp_enqueue_script('ultimate-modernizr');
				}

				if( stripos( $post_content, '[ultimate_exp_section') ||
					stripos( $post_content, '[info_circle') ) {
					wp_enqueue_script('jquery_ui');
					wp_enqueue_script('ultimate-vc-params');
					wp_enqueue_script('info-circle');
				}

				if( stripos( $post_content, '[icon_timeline') ) {
					wp_enqueue_script('masonry');
				}

				if($isAjax == true) { // if ajax site load all js
					wp_enqueue_script('masonry');
				}

				if( stripos( $post_content, '[ultimate_google_map') ) {
					if(defined('DISABLE_ULTIMATE_GOOGLE_MAP_API') && (DISABLE_ULTIMATE_GOOGLE_MAP_API == true || DISABLE_ULTIMATE_GOOGLE_MAP_API == 'true'))
						$load_map_api = false;
					else
						$load_map_api = true;
					if($load_map_api)
						wp_enqueue_script('googleapis');
				}

				if( stripos( $post_content, '[ult_range_slider') ) {
					wp_enqueue_script('jquery-ui-mouse');
					wp_enqueue_script('jquery-ui-widget');
					wp_enqueue_script('jquery-ui-slider');
					wp_enqueue_script('ult_range_tick');
					wp_enqueue_script('ult_ui_touch_punch');
				}

				wp_enqueue_script('ultimate-script');

				if( stripos( $post_content, '[ultimate_modal') ) {
					//$modal_fixer = get_option('ultimate_modal_fixer');
					//if($modal_fixer === 'enable')
						//wp_enqueue_script('ultimate-modal-all-switched');
					//else
						wp_enqueue_script('ultimate-modal-all');
				}
				
				$ultimate_css = "enable";
	
				if ($ultimate_css == "enable"){
					wp_enqueue_style('ultimate-style-min');
					if( stripos( $post_content, '[ultimate_carousel') ) {
						wp_enqueue_style("ult-icons");
					}
				}
				
				wp_enqueue_script( 'ultimate-row-bg', $vc_addons_url.$js_path . 'ultimate_bg' . $ext . '.js' );
			}
		}
	}	

	/*-----------------------------------------------------------------------------------*/
	/*  REQUIRED FOR WOOCOMMERCE CART
	/*-----------------------------------------------------------------------------------*/
	require_once (get_template_directory().'/inc/theme-woocart.php');
	
	
	function maple_allowed_tags() {
		global $allowedtags, $allowedposttags;
		$allowedtags['option'] = array('style'=>array(), 'id'=>array(), 'name'=>array(), 'class'=>array(), 'value'=>array(), 'selected'=>array());
		$allowedtags['input'] = array('style'=>array(), 'id'=>array(), 'name'=>array(), 'class'=>array(), 'value'=>array(), 'selected'=>array(), 'type'=>array(), 'onchange'=>array(), 'placeholder'=>array());
		$allowedtags['label'] = array('for'=>array());
		$allowedtags['iframe'] = array('style'=>array(), 'src'=>array(), 'allowfullscreen'=>array());
		$allowedposttags['div']['aria-hidden'] = array();
		$allowedposttags['div']['style'] = array();
		$allowedtags = array_merge($allowedtags, $allowedposttags);
	}
	add_action('init', 'maple_allowed_tags', 10);

	function maple_get_the_woo(){
		global $woocommerce;
		return isset($woocommerce) ? $woocommerce : array(); 
	}

	/*-----------------------------------------------------------------------------------*/
	/*  LOAD GOOGLE FONTS
	/*-----------------------------------------------------------------------------------*/
	function maple_fonts_url() {
		global $maple_import_fonts;
		
		$aux = array();
		foreach ($maple_import_fonts as $font){
			$aux[] = str_replace("|", ":", str_replace(" ", "+", $font));
		}
		
		$aux = array_unique($aux);
		
		if(($key = array_search("Helvetica+Neue", $aux)) !== false) {
		    unset($aux[$key]);
		}
		if(($key = array_search("Helvetica", $aux)) !== false) {
		    unset($aux[$key]);
		}
		
		$maple_import_fonts = implode("|", $aux);
	    $font_url = '';
	    /*
	    Translators: If there are characters in your language that are not supported
	    by chosen font(s), translate this to 'off'. Do not translate into your own language.
	     */
	    if ( 'off' !== _x( 'on', 'Google font: on or off', 'maple' ) ) {
	        $font_url = add_query_arg( 'family', $maple_import_fonts, "//fonts.googleapis.com/css" );
	    }
	    return $font_url;
	}
	
	function maple_google_fonts_scripts() {
	    wp_enqueue_style( 'maple-google-fonts', maple_fonts_url(), '' );
	}
	
	function maple_get_custom_inline_css(){
		global $maple_inline_css;
		wp_enqueue_style('maple-custom-style', MAPLE_CSS_PATH .'maple-custom.css',99);
		wp_add_inline_style('maple-custom-style', $maple_inline_css);
	}
	
	function maple_set_custom_inline_css($css){
		global $maple_inline_css;
		$tw_theme_main_color = "#".get_option('maple_style_color');
		$maple_inline_css .= str_replace( '__USE_THEME_MAIN_COLOR__', $tw_theme_main_color, $css );
	}
	
	function maple_set_team_profiles_content($content){
		global $maple_team_profiles;
		if (!isset($maple_team_profiles)) $maple_team_profiles = '';
		$maple_team_profiles .= $content;
	}
	
	function maple_get_team_profiles_content(){
		global $maple_team_profiles;
		if (isset($maple_team_profiles)){
			$maple_team_profiles = wp_kses_no_null( $maple_team_profiles, array( 'slash_zero' => 'keep' ) );
			$maple_team_profiles = wp_kses_normalize_entities($maple_team_profiles);
			$maple_team_profiles = wp_kses_normalize_entities($maple_team_profiles);
			echo wp_kses_hook($maple_team_profiles, 'post', array());
		}
	}
	
	
	