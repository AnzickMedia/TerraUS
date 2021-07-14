<?php
/**
 * This file contain some general functions:
 * -enqueuing CSS and JS files
 * -inserting the JavaScript init code into the head
 * -set the default thumbnail size
 * -print pagination function
 * -register navigation menus function
 *
 */


/**
 * ADD THE ACTIONS
 */
add_action('admin_enqueue_scripts', 'maple_admin_init');
add_action('admin_head', 'maple_admin_head_add');
add_action('init', 'maple_menus' );
add_action('admin_menu', 'maple_add_theme_menu');
add_filter('nav_menu_css_class' , 'maple_special_nav_class' , 10 , 2);

add_theme_support('automatic-feed-links');


/**
 * Enqueues the JavaScript files needed depending on the current section.
 */
function maple_admin_init(){
	global $current_screen, $maple_data;
	
	wp_enqueue_media();
	wp_enqueue_script( 'gallery' );
	
	wp_register_script('maple-page-options',MAPLE_SCRIPT_URL.'page-options.js', array('jquery'));	
	wp_register_script('maple-options',MAPLE_SCRIPT_URL.'options.js', array('jquery'));
	
	wp_enqueue_script('jquery-ui-slider', array('jquery'));
	
	if($current_screen->base=='post'){
		//enqueue the script and CSS files for the TinyMCE editor formatting buttons
		wp_enqueue_script('jquery-ui-dialog', array('jquery'));
		wp_enqueue_script('maple-page-options');
		wp_enqueue_script('maple-colorpicker',MAPLE_SCRIPT_URL.'colorpicker.js', array('jquery'));

		//set the style files
		add_editor_style('lib/formatting-buttons/custom-editor-style.css');
		wp_enqueue_style('maple-page-style',MAPLE_CSS_URL.'page_style.css');
		wp_enqueue_style('maple-colorpicker-style',MAPLE_CSS_URL.'colorpicker.css');
		wp_enqueue_script('maple-ajaxupload',MAPLE_SCRIPT_URL.'ajaxupload.js', array('jquery'));
		wp_enqueue_script('maple-options');
		wp_enqueue_script('maple-options-des',MAPLE_SCRIPT_URL.'options_tw.js', array('jquery'));
	}

	if(isset($_GET['page']) && ( $_GET['page']==MAPLE_OPTIONS_PAGE || $_GET['page']==MAPLE_STYLE_OPTIONS_PAGE)){
		//enqueue the scripts for the Options page
		//wp_enqueue_script('jquery-ui-core', array('jquery'));
		wp_enqueue_script('jquery-ui-sortable', array('jquery'));
		wp_enqueue_script('jquery-ui-dialog', array('jquery'));
		wp_enqueue_script('maple-jquery-co',MAPLE_SCRIPT_URL.'jquery-co.js', array('jquery'));
		wp_enqueue_script('maple-ajaxupload',MAPLE_SCRIPT_URL.'ajaxupload.js', array('jquery'));
		wp_enqueue_script('maple-colorpicker',MAPLE_SCRIPT_URL.'colorpicker.js', array('jquery'));
		wp_enqueue_script('maple-options');
		wp_enqueue_script('maple-options-des',MAPLE_SCRIPT_URL.'options_tw.js', array('jquery'));
		wp_enqueue_script('maple-jquery-ui',MAPLE_SCRIPT_URL.'jquery-ui-1.12.1.custom.min.js', array('jquery'));

		//enqueue the styles for the Options page
		wp_enqueue_style('maple-admin-style',MAPLE_CSS_URL.'admin_style.css');
		wp_enqueue_style('maple-colorpicker-style',MAPLE_CSS_URL.'colorpicker.css');
		wp_enqueue_style('maple-jqueryui-style',MAPLE_CSS_URL.'cupertino/jquery-ui-1.12.1.custom.min.css');
		
		echo "<div class='maple_fixed_menu hidden'>".esc_html(get_option('maple_fixed_menu'))."</div>";
		echo "<div class='maple_header_after_scroll hidden'>".esc_html(get_option('maple_header_after_scroll'))."</div>";
		echo "<div class='maple_header_shrink_effect hidden'>".esc_html(get_option('maple_header_shrink_effect'))."</div>";

		if (get_option("maple_show_sec_footer") == "on"){
			if (get_option("maple_footer_display_logo") == "on"){
				echo "<div class='maple_footer_logo_type hidden'>".esc_html(get_option('maple_footer_logo_type'))."</div>";	
			}
			if (get_option("maple_footer_display_social_icons") == "on"){
				echo "<div class='maple_footer_display_social_icons hidden'>".get_option('maple_footer_display_social_icons')."</div>";	
			}
		}
	}

	if(defined('MAPLE_PORTFOLIO_POST_TYPE') && $current_screen->id==MAPLE_PORTFOLIO_POST_TYPE){
		//enqueue the scripts needed for the add/edit portfolio post
		wp_enqueue_script('maple-ajaxupload',MAPLE_SCRIPT_URL.'ajaxupload.js', array('jquery'));
		wp_enqueue_script('maple-options');
		wp_enqueue_media();
		wp_enqueue_script( 'custom-header' );
	}

	if($current_screen->id=='page'){
		//enqueue the scripts needed for the add/edit page page
		wp_enqueue_script('jquery-ui-sortable', array('jquery'));
		wp_enqueue_script('maple-options');
		wp_enqueue_script('maple-options2',MAPLE_SCRIPT_URL.'options.js', array('jquery'));
		wp_enqueue_script('maple-ajaxupload',MAPLE_SCRIPT_URL.'ajaxupload.js', array('jquery'));
	}

	if(isset($_GET['page']) && defined('MAPLE_PORTFOLIO_POST_TYPE') && $_GET['page']==MAPLE_PORTFOLIO_POST_TYPE){
		//wp_enqueue_script('jquery-ui-core', array('jquery'));
		wp_enqueue_script('jquery-ui-widget', array('jquery'));
		wp_enqueue_script('jquery-ui-sortable', array('jquery'));
		wp_enqueue_script('jquery-ui-dialog', array('jquery'));
		wp_enqueue_script('maple-ajaxupload',MAPLE_SCRIPT_URL.'ajaxupload.js', array('jquery'));
		wp_enqueue_script('maple-options');
		wp_enqueue_script('maple-custom-page',MAPLE_SCRIPT_URL.'custom-page.js', array('jquery'));
		//enqueue the styles for the Options page
		wp_enqueue_style('maple-admin-style',MAPLE_CSS_URL.'custom_page.css');
		wp_enqueue_style('jquery-ui-dialog');
	}

}

global $pagenow;
if (is_admin() && isset($_GET['activated']) && $pagenow == "themes.php" ) {
    //Do redirect
    header( 'Location: '.esc_url(admin_url()).'admin.php?page='.MAPLE_OPTIONS_PAGE.'&activated=true' ) ;
}


/**
 * Inserts scripts for initializing the JavaScript functionality for the relevant section.
 */
function maple_admin_head_add(){

	if(isset($_GET['page']) && $_GET['page']==MAPLE_OPTIONS_PAGE){
		//init the options js functionality
		$maple_admin_inline_script = (isset($maple_admin_inline_script)) ? $maple_admin_inline_script : "";
		$maple_admin_inline_script .= '
			jQuery(document).ready(function(){
				"use strict";
				jQuery(".slider").each(function(){
					var value = parseInt(jQuery(this).siblings(".slider-input").val());
					jQuery(this).empty().slider({
						range: "min",
						value: value,
						min: 0,
						max: 100,
						slide: function( event, ui ) {
							jQuery( "#"+jQuery(this).attr("title") ).val( ui.value + " px" );
						}
					});
				});
				mapleOptions.init({cookie:true});
			});
		';
		wp_add_inline_script('maple-admin', $maple_admin_inline_script, 'after');
	}
	
	if(isset($_GET['page']) && $_GET['page']==MAPLE_STYLE_OPTIONS_PAGE){
		//init the options js functionality
		
		$maple_admin_inline_script = (isset($maple_admin_inline_script)) ? $maple_admin_inline_script : "";
		$maple_admin_inline_script .= '
			jQuery(document).ready(function(){
				"use strict";
				jQuery(".slider").each(function(){
					var value = parseInt(jQuery(this).siblings(".slider-input").val());
					jQuery(this).empty().slider({
						range: "min",
						value: value,
						min: 0,
						max: 100,
						slide: function( event, ui ) {
							if (jQuery(this).hasClass("opacity-slider")){
								jQuery( "#"+jQuery(this).attr("title") ).val( ui.value + "%" );
							} else {
								jQuery( "#"+jQuery(this).attr("title") ).val( ui.value + " px" );	
							}
						}
					});
				});
				maple_StyleOptionsManager.init({cookie:true});
			});
		';
		if (isset($_GET['dgtt'])){
			$maple_admin_inline_script .= '
				jQuery(window).load(function(){
					jQuery("a[href=\'#tab_navigation-1-'.esc_js(esc_html($_GET['dgtt'])).'\']").click();
				});
			';
		}
		wp_add_inline_script('maple-admin', $maple_admin_inline_script, 'after');
	}
}

/**
 * Add the main setting menu for the theme.
 */

function maple_add_theme_menu(){
	add_theme_page( "Maple", "Maple Options", 'delete_pages', MAPLE_OPTIONS_PAGE, 'maple_theme_admin', null);
	add_theme_page( "Maple", "Maple Style Options", 'delete_pages', MAPLE_STYLE_OPTIONS_PAGE, 'maple_theme_style_options_admin', null);
}

/* ------------------------------------------------------------------------*
 * LOCALE AND TRANSLATION
 * ------------------------------------------------------------------------*/

load_theme_textdomain( 'maple', get_template_directory() . '/lang' );

/**
 * Returns a text depending on the settings set. By default the theme gets uses
 * the texts set in the Translation section of the Options page. If multiple languages enabled,
 * the default language texts are used from the Translation section and the additional language
 * texts are used from the added .mo files within the lang folder.
 * @param $textid the ID of the text
 */
function maple_text($textid){

	$locale=get_locale();
	$int_enabled=get_option("maple_enable_translation")=='on'?true:false;
	$default_locale=get_option("maple_def_locale");

	if($int_enabled && $locale!=$default_locale){
		//use translation - extract the text from a defined .mo file
		return $textid;
	}else{
		//use the default text settings
		return stripslashes(get_option("maple".$textid));
	}
}

/**
 * Register the main menu for the theme.
 */
function maple_menus() {
	register_nav_menu('PrimaryNavigation', 'Main Navigation');
	register_nav_menu('woonav', 'WooCommerce Menu');
	register_nav_menu('topbarnav', 'Top Bar Navigation');
}

function maple_special_nav_class($classes, $item){
    $classes[] = $item->object . "-" . $item->object_id;
    return $classes;
}

/**
 * Removes an item from an array by specifying its value
 * @param $array the array from witch to remove the item
 * @param $val the value to be removed
 * @return returns the initial array without the removed item
 */
function maple_remove_item_by_value($array, $val = '') {
	if (empty($array) || !is_array($array)) return false;
	if (!in_array($val, $array)) return $array;

	foreach($array as $key => $value) {
		if ($value == $val) unset($array[$key]);
	}

	return array_values($array);
}

