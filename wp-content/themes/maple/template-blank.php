<?php
/*
Template Name: Blank Template (No header nor footer)
*/
get_header(); //the_post();
$theid = (isset($maple_uc_id)) ? $maple_uc_id : get_the_ID();
$post = get_post($theid);
if (class_exists('Ultimate_VC_Addons')) {
	if(stripos($post->post_content, 'font_call:')){
		preg_match_all('/font_call:(.*?)"/',$post->post_content, $display);
		enquque_ultimate_google_fonts_optimzed($display[1]);
	}
	maple_google_fonts_scripts();
}
?>
<div class="page-template page-template-template-blank page-template-template-blank-php <?php echo esc_attr("the-id-is-$theid"); ?>">
	<div class="fullwindow_content container">
		<div class="tb-row">
			<div class="tb-cell">
				<?php 
					if (function_exists('wpb_js_remove_wpautop') == true)
						echo wpb_js_remove_wpautop($post->post_content);
					else echo wp_kses_post($post->post_content); 
					/* custom element css */
					$shortcodes_custom_css = get_post_meta( $theid, '_wpb_shortcodes_custom_css', true );
					if ( ! empty( $shortcodes_custom_css ) ) {
						maple_set_custom_inline_css($shortcodes_custom_css);
					}
				?>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
<div id="templatepath" class="maple_helper_div"><?php  echo get_template_directory_uri()."/"; ?></div>
<div id="homeURL" class="maple_helper_div"><?php echo esc_url(home_url('/')); ?>/</div>
<div id="styleColor" class="maple_helper_div"><?php $maple_styleColor = "#".get_option("maple"."_style_color"); echo esc_html($maple_styleColor);?></div>	
<div id="headerStyleType" class="maple_helper_div"><?php $maple_headerStyleType = get_option("maple"."_header_style_type"); echo esc_html($maple_headerStyleType); ?></div>
<div class="maple_helper_div" id="reading_option"><?php 
	$maple_reading_option = get_option('maple_blog_reading_type');
	if ($maple_reading_option == "scrollauto"){
		$detect = new maple_Mobile_Detect();
		if ($detect->isMobile())
			$maple_reading_option = "scroll";
	}
	echo esc_html($maple_reading_option); 
?></div>
<?php
	$maple_color_code = get_option("maple_style_color");
?>
<div class="maple_helper_div" id="maple_no_more_posts_text"><?php
	if (function_exists('icl_t')){
		printf(esc_html__("%s", "maple"), icl_t( 'maple', 'No more posts to load.', get_option('maple_no_more_posts_text')));
	} else {
		printf(esc_html__("%s", "maple"), get_option('maple_no_more_posts_text'));
	}
?></div>
<div class="maple_helper_div" id="maple_load_more_posts_text"><?php
	if (function_exists('icl_t')){
		printf(esc_html__("%s", "maple"), icl_t( 'maple', 'Load More Posts', get_option('maple_load_more_posts_text')));
	} else {
		printf(esc_html__("%s", "maple"), get_option('maple_load_more_posts_text'));
	}
?></div>
<div class="maple_helper_div" id="maple_loading_posts_text"><?php
	if (function_exists('icl_t')){
		printf(esc_html__("%s", "maple"), icl_t( 'maple', 'Loading posts.', get_option('maple_loading_posts_text')));
	} else {
		printf(esc_html__("%s", "maple"), get_option('maple_loading_posts_text'));
	}
?></div>
<div class="maple_helper_div" id="maple_links_color_hover"><?php echo str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_links_color_hover")); ?></div>
<div class="maple_helper_div" id="maple_enable_images_magnifier"><?php echo get_option('maple_enable_images_magnifier'); ?></div>
<div class="maple_helper_div" id="maple_thumbnails_hover_option"><?php echo get_option('maple_thumbnails_hover_option'); ?></div>
<div class="maple_helper_div" id="maple_menu_color">#<?php echo get_option("maple"."_menu_color"); ?></div>
<div class="maple_helper_div" id="maple_fixed_menu"><?php echo get_option("maple"."_fixed_menu"); ?></div>
<div class="maple_helper_div" id="maple_thumbnails_effect"><?php if (get_option("maple"."_animate_thumbnails") == "on") echo get_option("maple_thumbnails_effect"); else echo "none"; ?></div>
<div class="maple_helper_div" id="permalink_structure"><?php echo get_option('permalink_structure'); ?></div>
<div class="maple_helper_div" id="headerstyle3_menucolor">#<?php echo get_option("maple"."_menu_color"); ?></div>
<div class="maple_helper_div" id="disable_responsive_layout"><?php echo get_option('maple_disable_responsive'); ?></div>
<div class="maple_helper_div" id="filters-dropdown-sort"><?php esc_html_e('Sort Gallery','maple'); ?></div>
<div class="maple_helper_div" id="searcheverything"><?php echo get_option("maple"."_enable_search_everything"); ?></div>
<div class="maple_helper_div" id="maple_header_shrink"><?php if (get_option('maple_fixed_menu') == 'on'){if (get_option('maple_header_after_scroll') == 'on'){if (get_option('maple_header_shrink_effect') == 'on'){echo "yes";} else echo "no";}} ?></div>
<div class="maple_helper_div" id="maple_header_after_scroll"><?php if (get_option('maple_fixed_menu') == 'on'){if (get_option('maple_header_after_scroll') == 'on'){echo "yes";} else echo "no";} ?></div>
<div class="maple_helper_div" id="maple_grayscale_effect"><?php echo get_option("maple"."_enable_grayscale"); ?></div>
<div class="maple_helper_div" id="maple_enable_ajax_search"><?php echo get_option("maple"."_enable_ajax_search"); ?></div>
<div class="maple_helper_div" id="maple_menu_add_border"><?php echo get_option("maple"."_menu_add_border"); ?></div>
</div>