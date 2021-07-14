<?php
/**
 * @package WordPress
 * @subpackage Maple
 */
?>
	
	<div id="big_footer" <?php if (get_option("maple_footer_full_width") == "on") echo " class='footer-full-width'"; ?>>

		<?php
		if (get_option("maple_show_primary_footer") == "on"){
			?>
			<div id="primary_footer">
			    	<div class="<?php if (get_option("maple_footer_full_width") == "off") echo "container"; ?> no-fcontainer">
			    	
	    		<?php
	    		
					if(get_option("maple_footer_number_cols") == "one"){ ?>
						<div class="footer_sidebar col-xs-12 col-md-12"><?php maple_print_sidebar('footer-one-column'); ?></div>
					<?php }
					if(get_option("maple_footer_number_cols") == "two"){ ?>
						<div class="footer_sidebar col-xs-12 col-md-6"><?php maple_print_sidebar('footer-two-column-left'); ?></div>
						<div class="footer_sidebar col-xs-12 col-md-6"><?php maple_print_sidebar('footer-two-column-right'); ?></div>
					<?php }
					if(get_option("maple_footer_number_cols") == "three"){
						if(get_option("maple_footer_columns_order") == "one_three"){ ?>
							<div class="footer_sidebar col-xs-12 col-md-4"><?php maple_print_sidebar('footer-three-column-left'); ?></div>
							<div class="footer_sidebar col-xs-12 col-md-4"><?php maple_print_sidebar('footer-three-column-center'); ?></div>
							<div class="footer_sidebar col-xs-12 col-md-4"><?php maple_print_sidebar('footer-three-column-right'); ?></div>
						<?php }
						if(get_option("maple_footer_columns_order") == "one_two_three"){ ?>
							<div class="footer_sidebar col-xs-12 col-md-4"><?php maple_print_sidebar('footer-three-column-left-1_3'); ?></div>
							<div class="footer_sidebar col-xs-12 col-md-8"><?php maple_print_sidebar('footer-three-column-right-2_3'); ?></div>
						<?php }
						if(get_option("maple_footer_columns_order") == "two_one_three"){ ?>
							<div class="footer_sidebar col-xs-12 col-md-8"><?php maple_print_sidebar('footer-three-column-left-2_3'); ?></div>
							<div class="footer_sidebar col-xs-12 col-md-4"><?php maple_print_sidebar('footer-three-column-right-1_3'); ?></div>
						<?php }
					}
					if(get_option("maple_footer_number_cols") == "four"){
						if(get_option("maple_footer_columns_order_four") == "one_four"){ ?>
							<div class="footer_sidebar col-xs-12 col-md-3"><?php maple_print_sidebar('footer-four-column-left'); ?></div>
							<div class="footer_sidebar col-xs-12 col-md-3"><?php maple_print_sidebar('footer-four-column-center-left'); ?></div>
							<div class="footer_sidebar col-xs-12 col-md-3"><?php maple_print_sidebar('footer-four-column-center-right'); ?></div>
							<div class="footer_sidebar col-xs-12 col-md-3"><?php maple_print_sidebar('footer-four-column-right'); ?></div>
						<?php }
						if(get_option("maple_footer_columns_order_four") == "two_one_two_four"){ ?>
							<div class="footer_sidebar col-xs-12 col-md-3"><?php maple_print_sidebar('footer-four-column-left-1_2_4'); ?></div>
							<div class="footer_sidebar col-xs-12 col-md-6"><?php maple_print_sidebar('footer-four-column-center-2_2_4'); ?></div>
							<div class="footer_sidebar col-xs-12 col-md-3"><?php maple_print_sidebar('footer-four-column-right-1_2_4'); ?></div>
						<?php }
						if(get_option("maple_footer_columns_order_four") == "three_one_four"){ ?>
							<div class="footer_sidebar col-xs-12 col-md-8"><?php maple_print_sidebar('footer-four-column-left-3_4'); ?></div>
							<div class="footer_sidebar col-xs-12 col-md-4"><?php maple_print_sidebar('footer-four-column-right-1_4'); ?></div>
						<?php }
						if(get_option("maple_footer_columns_order_four") == "one_three_four"){ ?>
							<div class="footer_sidebar col-xs-12 col-md-4"><?php maple_print_sidebar('footer-four-column-left-1_4'); ?></div>
							<div class="footer_sidebar col-xs-12 col-md-8"><?php maple_print_sidebar('footer-four-column-right-3_4'); ?></div>
						<?php }
					}
				?>
				</div>
				<?php
			        if (function_exists('dynamic_sidebar')){
				        dynamic_sidebar('bootom_footer_sidebar');
			        }
			    ?>
				 
				</div>
				    
					<?php
					
		}
	?>
    
    
    
    <?php
	    if (get_option("maple_show_sec_footer") == "on"){
		    ?>
		    <div id="secondary_footer">
				<div class="container">
					
					<?php
						/* FOOTER LOGOTYPE */
						if (get_option("maple_footer_display_logo") == 'on'){
						?>
						<a class="footer_logo align-<?php echo esc_attr(get_option("maple_footer_logo_alignment")); ?>" href="<?php echo esc_url(home_url("/")); ?>" tabindex="-1">
				        	<?php
				    			$alone = true;
			    				if (get_option("maple_footer_logo_retina_image_url") != ""){
				    				$alone = false;
			    				}
		    					?>
		    					<img class="footer_logo_normal <?php if (!$alone) echo "notalone"; ?>" style="position: relative;" src="<?php echo esc_url(get_option("maple_footer_logo_image_url")); ?>" alt="<?php esc_attr_e("", "maple"); ?>" title="<?php esc_attr_e("", "maple"); ?>">
			    					
			    				<?php 
			    				if (get_option("maple_footer_logo_retina_image_url") != ""){
			    				?>
				    				<img class="footer_logo_retina" style="display:none; position: relative;" src="<?php echo esc_url(get_option("maple_footer_logo_retina_image_url")); ?>" alt="<?php esc_attr_e("", "maple"); ?>" title="<?php esc_attr_e("", "maple"); ?>">
			    				<?php
		    					}
			    			?>
				        </a>
						<?php
						}
						
						/* FOOTER SOCIAL ICONS */
						if (get_option("maple_footer_display_social_icons") == "on"){
						?>
						<div class="social-icons-fa align-<?php echo esc_attr(get_option("maple_footer_social_icons_alignment")); ?>">
					        <ul>

							<?php
								$icons = array(array("houzz","Houzz"),array("facebook","Facebook"),array("twitter","Twitter"),array("tumblr","Tumblr"),array("stumbleupon","Stumble Upon"),array("flickr","Flickr"),array("linkedin","LinkedIn"),array("delicious","Delicious"),array("skype","Skype"),array("digg","Digg"),array("google-plus","Google+"),array("vimeo-square","Vimeo"),array("deviantart","DeviantArt"),array("behance","Behance"),array("instagram","Instagram"),array("wordpress","Wordpress"),array("youtube","Youtube"),array("reddit","Reddit"),array("soundcloud","SoundCloud"),array("pinterest","Pinterest"),array("dribbble","Dribbble"),array("vk","VK"),array("twitch","Twitch"),array("foursquare","Foursquare"),array("slack","Slack"),array("whatsapp","whatsapp"),array("line","Line"),array("weixin","weixin"),array("tripadvisor","tripadvisor"));
								foreach ($icons as $i){
									if (is_string(get_option("maple_icon-".$i[0])) && get_option("maple_icon-".$i[0]) != ""){
									?>
									<li>
										<a href="<?php echo esc_url(get_option("maple_icon-".$i[0])); ?>" target="_blank" class="<?php echo esc_attr(strtolower($i[0])); ?>" title="<?php echo esc_attr($i[1]); ?>"><i class="fab fa-<?php echo esc_attr(strtolower($i[0])); ?>"></i></a>
									</li>
									
									
									<?php
									}
								}
							?>

							<?php if ( is_string(get_option("maple_icon-envelope")) && get_option("maple_icon-envelope") != "" ){ ?>
								<li><a href="<?php echo esc_url(get_option("maple_icon-envelope"))?>" target="_blank" class="envelope" title="email"><i class="far fa-envelope"></i></a></li>
							<?php } ?>
							
							<?php if ( is_string(get_option("maple_icon-rss")) && get_option("maple_icon-rss") != "" ){ ?>
								<li><a href="<?php echo esc_url(get_option("maple_icon-rss"))?>" target="_blank" class="rss" title="rss"><i class="fa fa-rss-square"></i></a></li>
							<?php } ?>
							
							
						    </ul>
						</div>
						
						<?php
						}
						/* FOOTER CUSTOM TEXT */
						if (get_option("maple_footer_display_custom_text") == "on"){
						?>
						<div class="footer_custom_text <?php echo esc_attr(get_option("maple_footer_custom_text_alignment")); ?>"><?php echo do_shortcode(stripslashes(get_option("maple_footer_custom_text"))); ?></div>
						
						<?php
						}
						
						
					?>
				</div>
			</div>
		    <?php
	    }
    ?>
	</div>

<?php

/* sets the type of pagination [scroll, autoscroll, paged, default] */
wp_reset_query();
$maple_reading_option = get_option('maple_blog_reading_type');
if (is_archive() || is_single() || is_search() || is_page_template('blog-template.php') || is_page_template('blog-masonry-template.php')) {

	$nposts = get_option('posts_per_page');

	$maple_more = 0;
	$maple_pag = 0;

	$orderby="";
	$category="";
	$nposts = "";
	$order = "";

	$maple_pag = $wp_query->query_vars['paged'];
	if (!is_numeric($maple_pag)) $maple_pag = 1;
	$max = 0;

	switch ($maple_reading_option){
		case "scrollauto": 

				// Add code to index pages.
				if( !is_singular() ) {	

					if (is_search()){

						$maple_reading_option = get_option('maple_blog_reading_type');
						$se = get_option("maple_enable_search_everything");

						$nposts = get_option('posts_per_page');

						$maple_pag = $wp_query->query_vars['paged'];
						if (!is_numeric($maple_pag)) $maple_pag = 1;

						if ($se == "on"){
							$args = array(
								'showposts' => get_option('posts_per_page'),
								'post_status' => 'publish',
								'paged' => $maple_pag,
								's' => esc_html($_GET['s'])
							);

						    $maple_the_query = new WP_Query( $args );

						    $args2 = array(
								'showposts' => -1,
								'post_status' => 'publish',
								'paged' => $maple_pag,
								's' => esc_html($_GET['s'])
							);

							$counter = new WP_Query($args2);

						} else {
							$args = array(
								'showposts' => get_option('posts_per_page'),
								'post_status' => 'publish',
								'paged' => $maple_pag,
								'post_type' => 'post',
								's' => esc_html($_GET['s'])
							);

						    $maple_the_query = new WP_Query( $args );

						    $args2 = array(
								'showposts' => -1,
								'post_status' => 'publish',
								'paged' => $maple_pag,
								'post_type' => 'post',
								's' => esc_html($_GET['s'])
							);

							$counter = new WP_Query($args2);
						}

						$max = ceil($counter->post_count / $nposts);
						$maple_paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;

					} else {

						$max = $wp_query->max_num_pages;
						$maple_paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;

					}
					
					$maple_inline_script = '
						jQuery(document).ready(function($){
							"use strict";
							if (jQuery("#reading_option").html() === "scrollauto" && !jQuery("body").hasClass("single")){ 
								window.maple_loadingPoint = 0;
								//monitor page scroll to fire up more posts loader
								window.clearInterval(window.maple_interval);
								window.maple_interval = setInterval("maple_monitorScrollTop()", 1000 );
							}
						});
					';
					wp_add_inline_script('maple', $maple_inline_script, 'after');

				} else {

				    $args = array(
	    				'showposts' => $nposts,
	    				'orderby' => $orderby,
	    				'order' => $order,
	    				'cat' => $category,
	    				'paged' => $maple_pag,
	    				'post_status' => 'publish'
	    			);

	    		    $maple_the_query = new WP_Query( $args );

		    		$max = $maple_the_query->max_num_pages;
		    		$maple_paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;

		    		$maple_inline_script = '
						jQuery(document).ready(function($){
							"use strict";
							if (jQuery("#reading_option").html() === "scrollauto" && !jQuery("body").hasClass("single")){ 
								window.maple_loadingPoint = 0;
								//monitor page scroll to fire up more posts loader
								window.clearInterval(window.maple_interval);
								window.maple_interval = setInterval("maple_monitorScrollTop()", 1000 );
							}
						});
					';
					wp_add_inline_script('maple', $maple_inline_script, 'after');

	    		}
			break;
		case "scroll": 

				// Add code to index pages.
				if( !is_singular() ) {	

					if (is_search()){

						$nposts = get_option('posts_per_page');

						$se = get_option("maple_enable_search_everything");

						if ($se == "on"){
							$args = array(
								'showposts' => get_option('posts_per_page'),
								'post_status' => 'publish',
								'paged' => $maple_pag,
								's' => esc_html($_GET['s'])
							);

						    $maple_the_query = new WP_Query( $args );

						    $args2 = array(
								'showposts' => -1,
								'post_status' => 'publish',
								'paged' => $maple_pag,
								's' => esc_html($_GET['s'])
							);

							$counter = new WP_Query($args2);

						} else {
							$args = array(
								'showposts' => get_option('posts_per_page'),
								'post_status' => 'publish',
								'paged' => $maple_pag,
								'post_type' => 'post',
								's' => esc_html($_GET['s'])
							);

						    $maple_the_query = new WP_Query( $args );

						    $args2 = array(
								'showposts' => -1,
								'post_status' => 'publish',
								'paged' => $maple_pag,
								'post_type' => 'post',
								's' => esc_html($_GET['s'])
							);

							$counter = new WP_Query($args2);
						}

						$max = ceil($counter->post_count / $nposts);
						$maple_pag = 1;

						$maple_pag = $wp_query->query_vars['paged'];
						if (!is_numeric($maple_pag)) $maple_pag = 1;

					} else {
						$max = $wp_query->max_num_pages;
						$maple_paged = $maple_pag;

					}


				} else {

					$orderby = "";
					$category = "";

				    $args = array(
	    				'showposts' => $nposts,
	    				'orderby' => $orderby,
	    				'order' => $order,
	    				'cat' => $category,
	    				'post_status' => 'publish'
	    			);

	    		    $maple_the_query = new WP_Query( $args );


		    		$max = $maple_the_query->max_num_pages;
		    		$maple_pag = 1;

					$maple_pag = $wp_query->query_vars['paged'];
					if (!is_numeric($maple_pag)) $maple_pag = 1;		    			    				
	    		}

			break;
	}
	?>
	<div class="maple_helper_div" id="loader-startPage"><?php echo esc_html($maple_pag); ?></div>
	<div class="maple_helper_div" id="loader-maxPages"><?php echo esc_html($max); ?></div>
	<div class="maple_helper_div" id="loader-nextLink"><?php echo next_posts($max, false); ?></div>
	<div class="maple_helper_div" id="loader-prevLink"><?php echo previous_posts($max, false); ?></div>
	<?php
}

$maple_styleColor = "#".esc_html(get_option("maple_style_color"));
$maple_bodyLayoutType = get_option("maple_body_layout_type");
$maple_headerType = get_option("maple_header_type");
?>
</div> <!-- END OF MAIN -->
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
<div id="homeURL" class="maple_helper_div"><?php echo esc_url(home_url("/")); ?></div>
<div id="styleColor" class="maple_helper_div"><?php echo "#".esc_html(get_option("maple_style_color")); ?></div>	
<div id="headerStyleType" class="maple_helper_div"><?php echo esc_html($maple_headerStyleType); ?></div>
<div class="maple_helper_div" id="reading_option"><?php 
	if ($maple_reading_option == "scrollauto"){
		if (wp_is_mobile())
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

	if (is_string($maple_import_fonts)) $maple_import_fonts = explode( "|", $maple_import_fonts);
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

	if (get_option("maple_enable_gotop") == "on"){
		?>
		<p id="back-top"><a href="#home"><i class="fa fa-angle-up"></i></a></p>
		<?php
	}
	
	maple_get_team_profiles_content();
	maple_get_custom_inline_css();

	if (get_option("maple_body_type") == "body_boxed"){
		?>
		</div>
		<?php
	}
	
	wp_footer(); 
?>
    	
</body>
</html>
