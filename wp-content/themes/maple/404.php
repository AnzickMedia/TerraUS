<?php get_header(); maple_print_menu(); $maple_color_code = get_option("maple_style_color"); ?>

	<div class="container">
		<div class="entry-header">
			<div class="error-c">
				<img src="<?php echo esc_url(get_template_directory_uri() . "/images/error.png");?>" title="<?php the_title(); ?>"/>
				<br>
				<h1 class="heading-error"><?php
					if (function_exists('icl_t')){
						wp_kses_post(printf(esc_html__( "%s", "maple" ), stripslashes_from_strings_only(icl_t( 'maple', 'Oops! There is nothing here...', get_option('maple_404_heading')))));
					} else {
						wp_kses_post(printf(esc_html__( "%s", "maple" ), stripslashes_from_strings_only(get_option('maple_404_heading'))));
					}
				?></h1>
							
				<p class="text-error"><?php
					if (function_exists('icl_t')){
						wp_kses_post(printf(esc_html__( "%s", "maple" ), stripslashes_from_strings_only(icl_t( 'maple', "It seems we can't find what you're looking for. Perhaps searching one of the links in the above menu, can help.", get_option('maple_404_text')))));
					} else {
						wp_kses_post(printf(esc_html__( "%s", "maple" ), stripslashes_from_strings_only(get_option('maple_404_text'))));
					}
				?></p>
				
				<a href="<?php echo esc_url(home_url("/")); ?>" class="errorbutton"><?php
					if (function_exists('icl_t')){
						printf(esc_html__("%s","maple"), icl_t( 'maple', 'GO TO HOMEPAGE', get_option('maple_404_button_text')));
					} else {
						printf(esc_html__("%s","maple"), get_option('maple_404_button_text'));
					}
				?></a>
			</div>
			
		</div>
	</div>
<?php
$maple_styleColor = "#".esc_html(get_option("maple_style_color"));
$maple_bodyLayoutType = get_option("maple_body_layout_type");
$maple_headerType = get_option("maple_header_type");
?>
<div id="bodyLayoutType" class="maple_helper_div"><?php echo esc_html($maple_bodyLayoutType); ?></div>
<div id="headerType" class="maple_helper_div"><?php echo esc_html($maple_headerType); ?></div>
<?php 
	if (get_option("maple_body_shadow") == "on"){
		?>
			<div id="bodyShadowColor" class="maple_helper_div"><?php echo "#".esc_html(get_option("maple_body_shadow_color")); ?></div>
		<?php
	}
	$maple_headerStyleType = get_option("maple_header_style_type");
?>
<div id="templatepath" class="maple_helper_div"><?php echo esc_url(get_template_directory_uri())."/"; ?></div>
<div id="homeURL" class="maple_helper_div"><?php echo esc_url(home_url("/")); ?>/</div>
<div id="styleColor" class="maple_helper_div"><?php echo "#".esc_html(get_option("maple_style_color")); ?></div>	
<div id="headerStyleType" class="maple_helper_div"><?php echo esc_html($maple_headerStyleType); ?></div>
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
<div class="maple_helper_div" id="maple_links_color_hover"><?php echo esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_links_color_hover"))); ?></div>
<div class="maple_helper_div" id="maple_enable_images_magnifier"><?php echo esc_html(get_option('maple_enable_images_magnifier')); ?></div>
<div class="maple_helper_div" id="maple_thumbnails_hover_option"><?php echo esc_html(get_option('maple_thumbnails_hover_option')); ?></div>
<div id="homePATH" class="maple_helper_div"><?php echo ABSPATH; ?></div>
<div class="maple_helper_div" id="maple_menu_color">#<?php echo esc_html(get_option("maple_menu_color")); ?></div>
<div class="maple_helper_div" id="maple_fixed_menu"><?php echo esc_html(get_option("maple_fixed_menu")); ?></div>
<div class="maple_helper_div" id="maple_thumbnails_effect"><?php if (get_option("maple_animate_thumbnails") == "on") echo esc_html(get_option("maple_thumbnails_effect")); else echo "none"; ?></div>
<div class="maple_helper_div loadinger">
	<img alt="<?php esc_attr_e("loading", "maple"); ?>" src="<?php echo esc_url(get_template_directory_uri()). '/images/ajx_loading.gif' ?>">
</div>
<div class="maple_helper_div" id="permalink_structure"><?php echo esc_html(get_option('permalink_structure')); ?></div>
<div class="maple_helper_div" id="headerstyle3_menucolor">#<?php echo esc_html(get_option("maple_menu_color")); ?></div>
<div class="maple_helper_div" id="disable_responsive_layout"><?php echo esc_html(get_option('maple_disable_responsive')); ?></div>
<div class="maple_helper_div" id="filters-dropdown-sort"><?php esc_html_e('Sort Gallery','maple'); ?></div>
<div class="maple_helper_div" id="templatepath"><?php echo esc_url(get_template_directory_uri()); ?></div>
<div class="maple_helper_div" id="searcheverything"><?php echo esc_html(get_option("maple_enable_search_everything")); ?></div>
<div class="maple_helper_div" id="maple_header_shrink"><?php if (get_option('maple_fixed_menu') == 'on'){if (get_option('maple_header_after_scroll') == 'on'){if (get_option('maple_header_shrink_effect') == 'on'){echo "yes";} else echo "no";}} ?></div>
<div class="maple_helper_div" id="maple_header_after_scroll"><?php if (get_option('maple_fixed_menu') == 'on'){if (get_option('maple_header_after_scroll') == 'on'){echo "yes";} else echo "no";} ?></div>
<div class="maple_helper_div" id="maple_grayscale_effect"><?php echo esc_html(get_option("maple_enable_grayscale")); ?></div>
<div class="maple_helper_div" id="maple_enable_ajax_search"><?php echo esc_html(get_option("maple_enable_ajax_search")); ?></div>
<div class="maple_helper_div" id="maple_menu_add_border"><?php echo esc_html(get_option("maple_menu_add_border")); ?></div>
<div class="maple_helper_div" id="maple_content_to_the_top">
	<?php 
		if (is_singular() && get_post_meta(get_the_ID(), 'maple_enable_custom_header_options_value', true)=='yes') echo esc_html(get_post_meta(get_the_ID(), 'maple_content_to_the_top_value', true));
		else echo esc_html(get_option('maple_content_to_the_top')); 
	?>
</div>
<div class="maple_helper_div" id="maple_update_section_titles"><?php echo esc_html(get_option('maple_update_section_titles')); ?></div>
<?php
	if (function_exists('icl_t')){
		?>
		<div class="maple_helper_div" id="maple_wpml_current_lang"><?php echo ICL_LANGUAGE_CODE; ?></div>
		<?php
	}
?>
<?php 
	$standardfonts = array('Arial','Arial Black','Helvetica','Helvetica Neue','Courier New','Georgia','Impact','Lucida Sans Unicode','Times New Roman', 'Trebuchet MS','Verdana','');
	$importfonts = "";
	$maple_import_fonts = maple_get_import_fonts();

	foreach ($maple_import_fonts as $font){
		if (!in_array($font,$standardfonts)){
			$font = str_replace(" ","+",str_replace("|",":",$font));
			if ($importfonts=="") $importfonts .= $font;
			else {
				if (strpos($importfonts, $font) === false)
					$importfonts .= "|{$font}";
			}
		}
	}

	if ($importfonts!="") {
		$maple_import_fonts = $importfonts;
		maple_set_import_fonts($maple_import_fonts);
		maple_google_fonts_scripts();
	}

?>
<?php get_footer(); ?>