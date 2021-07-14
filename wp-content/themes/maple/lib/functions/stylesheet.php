<?php
function maple_styles(){

	 if (!is_admin()){
		
		wp_enqueue_style('maple-blog', MAPLE_CSS_PATH .'blog.css'); 
	 	wp_enqueue_style('maple-bootstrap', MAPLE_CSS_PATH .'bootstrap.css');
		wp_enqueue_style('maple-icons', MAPLE_CSS_PATH .'icons-font.css');
		wp_enqueue_style('maple-component', MAPLE_CSS_PATH .'component.css');
		wp_enqueue_style('maple-selectwoo', MAPLE_CSS_PATH .'selectWoo.min.css');
		
		wp_enqueue_style('maple-IE', MAPLE_CSS_PATH .'IE.css');	
		wp_style_add_data('maple-IE','conditional','lt IE 9');
		
		wp_enqueue_style('maple-editor', get_template_directory_uri().'/editor-style.css');
		wp_enqueue_style('maple-woo-layout', MAPLE_CSS_PATH .'maple-woo-layout.css');
		wp_enqueue_style('maple-woo', MAPLE_CSS_PATH .'maple-woocommerce.css');
		wp_enqueue_style('maple-ytp', MAPLE_CSS_PATH .'mb.YTPlayer.css');
		wp_enqueue_style('maple-retina', MAPLE_CSS_PATH .'retina.css');
		
	}
}
add_action('wp_enqueue_scripts', 'maple_styles', 1);

?>