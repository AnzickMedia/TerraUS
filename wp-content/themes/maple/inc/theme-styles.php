<?php
	
/*-----------------------------------------------------------------------------------*/
/*  Maple Theme Styles
/*-----------------------------------------------------------------------------------*/

function maple_custom_style() {
	
	global $maple_custom, $maple_styleColor, $post, $maple_import_fonts, $maple_header_bgstyle_pre, $maple_header_bgstyle_after;
	$maple_theid = get_the_ID();
	$maple_styleColor = "#".get_option("maple_style_color");
	if ("#".get_option("maple_style_color") != $maple_styleColor) $maple_styleColor = "#".get_option("maple_style_color");
	$maple_color_code = substr($maple_styleColor,1);
	$maple_styleColor_rgb = maple_hex2rgb($maple_styleColor);

	$maple_headerType = get_option("maple_header_type");
	
	$maple_header_bgstyle_pre = get_option('maple_header_style_light_dark', 'light') == 'light' ? 'light' : 'dark';
	$maple_header_bgstyle_after = get_option('maple_header_after_scroll_style_light_dark', 'light') == 'light' ? 'light' : 'dark';
	
	if (is_singular() && get_post_meta($maple_theid, 'maple_enable_custom_header_options_value', true) == 'yes'){
		$maple_header_bgstyle_pre = get_post_meta($maple_theid, 'maple_custom_header_pre_value', true);
		$maple_header_bgstyle_after = get_post_meta($maple_theid, 'maple_custom_header_after_value', true);
	}
	
	$maple_header_style_pre = $maple_header_bgstyle_pre == 'dark' ? 'light' : 'dark';
	$maple_header_style_after = $maple_header_bgstyle_after == 'dark' ? 'light' : 'dark';
	
	global $maple_import_fonts;
	
	$maple_style_data = "";
	
	$maple_style_data .= ".widget li a:after, .widget_nav_menu li a:after, .custom-widget.widget_recent_entries li a:after{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_p_color"))).";
	}
	body, p, .lovepost a, .widget ul li a, .widget p, .widget span, .widget ul li, .the_content ul li, .the_content ol li, #recentcomments li, .custom-widget h4, .widget.des_cubeportfolio_widget h4, .widget.des_recent_posts_widget h4, .custom-widget ul li a, .aio-icon-description, li, .smile_icon_list li .icon_description p{
		";
		$font = get_option('maple_p_font'); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "" ;
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."' ,sans-serif;
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('maple_p_size'), 10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_p_color"))).";
	}
	
	.map_info_text{
		";
		$font = get_option('maple_p_font'); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."' ,sans-serif;
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('maple_p_size')), 10)."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_p_color")))." !important;
	}
	
	a, .pageXofY .pageX, .pricing .bestprice .name, .filter li a:hover, .widget_links ul li a:hover, #contacts a:hover, .title-color, .ms-staff-carousel .ms-staff-info h4, .filter li a:hover, .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus, a.go-about:hover, .text_color, .navbar-nav .dropdown-menu a:hover, .profile .profile-name, #elements h4, #contact li a:hover, #agency-slider h5, .ms-showcase1 .product-tt h3, .filter li a.active, .contacts li i, .big-icon i, .navbar-default.dark .navbar-brand:hover,.navbar-default.dark .navbar-brand:focus, a.p-button.border:hover, .navbar-default.light-menu .navbar-nav > li > a.selected, .navbar-default.light-menu .navbar-nav > li > a.hover_selected, .navbar-default.light-menu .navbar-nav > li > a.selected:hover, .navbar-default.light-menu .navbar-nav > li > a.hover_selected:hover, .navbar-default.light-menu .navbar-nav > li > a.selected, .navbar-default.light-menu .navbar-nav > li > a.hover_selected, .navbar-default.light-menu .navbar-nav > .open > a,.navbar-default.light-menu .navbar-nav > .open > a:hover, .navbar-default.light-menu .navbar-nav > .open > a:focus, .light-menu .dropdown-menu > li > a:focus, a.social:hover:before, .symbol.colored i, .icon-nofill, .slidecontent-bi .project-title-bi p a:hover, .grid .figcaption a.thumb-link:hover, .tp-caption a:hover, .btn-1d:hover, .btn-1d:active, #contacts .tweet_text a, #contacts .tweet_time a, .social-font-awesome li a:hover, h2.post-title a:hover, .tags a:hover, .maple-button-color span, #contacts .form-success p, .nav-container .social-icons-fa a i:hover, .the_title h2 a:hover, .widget ul li a:hover, .nav-previous-nav1 a, .nav-next-nav1 a, .des-pages .postpagelinks, .widget_nav_menu .current-menu-item > a, .team-position, .nav-container .maple_minicart li a:hover, .metas-container i, .header_style2_contact_info .telephone-contact .email, .special_tabs.icontext .label.current i, .special_tabs.icontext .label.current a, .special_tabs.text .label.current a, .widget-contact-content i{
	  color: ".esc_html($maple_styleColor).";
	}
	.testimonials.style1 .testimonial span a{
		color: ".esc_html($maple_styleColor)." !important;
	}
	.testimonials .cover-test-img{background:rgba(".$maple_styleColor_rgb[0].",".$maple_styleColor_rgb[1].",".$maple_styleColor_rgb[2].",.8);}
	.aio-icon-read, .tp-caption a.text_color{color: ".esc_html($maple_styleColor)." !important;}
	
	#big_footer .social-icons-fa a i{color:#".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sec_footer_social_icons_color"))).";}
	#big_footer .social-icons-fa a i:hover{color:#".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sec_footer_social_icons_hover_color"))).";}
	
	.homepage_parallax .home-logo-text a.light:hover, .homepage_parallax .home-logo-text a.dark:hover, .widget li a:hover:before, .widget_nav_menu li a:hover:before, .footer_sidebar ul li a:hover:before, .custom-widget li a:hover:before, .single-portfolio .social-shares ul li a:hover i{
		color: ".esc_html($maple_styleColor)." !important;
	}
	
	.vc_tta-color-grey.vc_tta-style-classic .vc_active .vc_tta-panel-heading .vc_tta-controls-icon::after, .vc_tta-color-grey.vc_tta-style-classic .vc_active .vc_tta-panel-heading .vc_tta-controls-icon::before{
		border-color: ".esc_html($maple_styleColor)." !important;
	}
	#big_footer input.button{background-color: ".esc_html($maple_styleColor)." !important;}
	a.sf-button.hide-icon, .tabs li.current, .readmore:hover, .navbar-default .navbar-nav > .open > a,.navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus, a.p-button:hover, a.p-button.colored, .light #contacts a.p-button, .tagcloud a:hover, .rounded.fill, .colored-section, .pricing .bestprice .price, .pricing .bestprice .signup, .signup:hover, .divider.colored, .services-graph li span, .no-touch .hi-icon-effect-1a .hi-icon:hover, .hi-icon-effect-1b .hi-icon:hover, .no-touch .hi-icon-effect-1b .hi-icon:hover, .symbol.colored .line-left, .symbol.colored .line-right, .projects-overlay #projects-loader, .panel-group .panel.active .panel-heading, .double-bounce1, .double-bounce2, .maple-button-color-1d:after, .container1 > div, .container2 > div, .container3 > div, .cbp-l-caption-buttonLeft:hover, .cbp-l-caption-buttonRight:hover, .flex-control-paging li a.flex-active, .post-content a:hover .post-quote, .post-listing .post a:hover .post-quote, h2.post-title.post-link:hover, .maple-button-color-1d:after, .woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider-horizontal .ui-slider-range,.maple_little_shopping_bag .overview span.minicart_items, .nav-previous, .nav-next, .next-posts, .prev-posts, .btn-contact-left input, .single #commentform .form-submit #submit, a#send-comment, .errorbutton, .vc_tta.vc_general .vc_active .vc_tta-panel-title, .modal-popup-link .tooltip-content, .woocommerce span.onsale, .woocommerce-page span.onsale, .des-button-dark{
		background-color:".esc_html($maple_styleColor).";
	}
	.aio-icon-tooltip .aio-icon:hover:after{box-shadow:0 0 0 1px ".esc_html($maple_styleColor)." !important;}
	.cbp-nav-next:hover, .cbp-nav-prev:hover, .just-icon-align-left .aio-icon:hover, .aio-icon-tooltip .aio-icon:hover, .btn-contact-left.inversecolor input:hover{
		background-color:".esc_html($maple_styleColor)." !important;
	}
	
	
	.widget .slick-dots li.slick-active i, .style-light .slick-dots li.slick-active i, .style-dark .slick-dots li.slick-active i{color: ".esc_html($maple_styleColor)." !important;opacity: 1;}
	
	
	
	.woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce #content div.product form.cart .button, .woocommerce div.product form.cart .button, .woocommerce-page #content div.product form.cart .button, .woocommerce-page div.product form.cart .button, .woocommerce ul.products li.product .onsale, .woocommerce-page ul.products li.product .onsale, .top-bar .phone-mail li.text_field, .nav-previous-nav1:hover:before, .nav-next-nav1:hover:after{
		background-color:".esc_html($maple_styleColor).";
		color: #fff !important;
	}
	.nav-container a.button.maple_minicart_checkout_but:hover, .nav-container a.button.maple_minicart_cart_but:hover{
		background-color: ".esc_html($maple_styleColor)." !important;
		color: #fff !important;
		border: 2px solid ".esc_html($maple_styleColor)." !important;
		opacity: 1;
	}
	.maple-button-color-1d:hover, .maple-button-color-1d:active{
		border: 1px double ".esc_html($maple_styleColor).";
	}
	
	.maple-button-color{
		background-color:".esc_html($maple_styleColor).";
		color: ".esc_html($maple_styleColor).";
	}
	.cbp-l-caption-alignCenter .cbp-l-caption-buttonLeft:hover, .cbp-l-caption-alignCenter .cbp-l-caption-buttonRight:hover {
	    background-color:".esc_html($maple_styleColor)." !important;
	    border:2px solid ".esc_html($maple_styleColor)." !important;
	    color: #fff !important;
	}
	.widget_posts .tabs li.current{border: 1px solid ".esc_html($maple_styleColor).";}
	.hi-icon-effect-1 .hi-icon:after{box-shadow: 0 0 0 3px ".esc_html($maple_styleColor).";}
	.colored-section:after {border: 20px solid ".esc_html($maple_styleColor).";}
	.filter li a.active, .filter li a:hover, .panel-group .panel.active .panel-heading{border:1px solid ".esc_html($maple_styleColor).";}
	.navbar-default.light-menu.border .navbar-nav > li > a.selected:before, .navbar-default.light-menu.border .navbar-nav > li > a.hover_selected:before, .navbar-default.light-menu.border .navbar-nav > li > a.selected:hover, .navbar-default.light-menu.border .navbar-nav > li > a.hover_selected:hover, .navbar-default.light-menu.border .navbar-nav > li > a.selected, .navbar-default.light-menu.border .navbar-nav > li > a.hover_selected{
		border-bottom: 1px solid ".esc_html($maple_styleColor).";
	}
	
	
	
	.doubleborder{
		border: 6px double ".esc_html($maple_styleColor).";
	}
	
	
	.special_tabs.icon .current .maple_icon_special_tabs{
		background: ".esc_html($maple_styleColor).";
		border: 1px solid transparent;
	}
	.maple-button-color, .des-pages .postpagelinks, .tagcloud a:hover{
		border: 1px solid ".esc_html($maple_styleColor).";
	}
	
	.navbar-collapse ul.menu-depth-1 li:not(.maple_mega_hide_link) a, .dl-menuwrapper li:not(.maple_mega_hide_link) a, .gosubmenu, .nav-container .maple_minicart ul li,.navbar-collapse ul.menu-depth-1 li:not(.maple_mega_hide_link) a.main-menu-icon{";
		$font = get_option('maple_sub_menu_font'); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."', sans-serif;
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('maple_sub_menu_font_size'),10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_color'))).";";
		if (get_option('maple_sub_menu_uppercase') === 'on') $maple_style_data .= "text-transform: uppercase;\n";
		$maple_style_data .= "letter-spacing: ".esc_html(intval(get_option('maple_sub_menu_letter_spacing'),10))."px;
	}
	.dl-back{color: #".str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_color')).";}
	
	.navbar-collapse ul.menu-depth-1 li:not(.maple_mega_hide_link):hover > a, .dl-menuwrapper li:not(.maple_mega_hide_link):hover > a, .dl-menuwrapper li:not(.maple_mega_hide_link):hover > a, .dl-menuwrapper li:not(.maple_mega_hide_link):hover > .gosubmenu, .dl-menuwrapper li.dl-back:hover, .navbar-nav .dropdown-menu a:hover i, .dropdown-menu li.menu-item-has-children:not(.maple_mega_hide_link):hover > a:before{
		color: #".str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_color_hover')).";
	}
		
	
	
	.menu-simple ul.menu-depth-1, .menu-simple ul.menu-depth-1 ul, .menu-simple ul.menu-depth-1, .menu-simple #dl-menu ul{";
		$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sub_menu_bg_color")));
		$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_sub_menu_bg_opacity")))/100).") !important;
	}
	
	
	
	.navbar-collapse .maple_mega_menu ul.menu-depth-2, .navbar-collapse .maple_mega_menu ul.menu-depth-2 ul {background-color: transparent !important;} 
	
	.dl-menuwrapper li:not(.maple_mega_hide_link):hover > a{";
		$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sub_menu_bg_color_hover")));
		$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_sub_menu_bg_opacity")))/100).") !important;
	}
	
	.menu-simple li:not(.maple_mega_menu) li.menu-item-depth-1:hover > a, .menu-simple li.menu-item-depth-2:hover > a, .menu-simple li.menu-item-depth-3:hover > a{";
		$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sub_menu_bg_color_hover")));
		$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_sub_menu_bg_opacity")))/100).") !important;
	}
	
	.menu-square li:not(.maple_mega_menu) li.menu-item-depth-1:hover > a, .menu-square li.menu-item-depth-2:hover > a, .menu-square li.menu-item-depth-3:hover > a{";
		$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sub_menu_bg_color_hover")));
		$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_sub_menu_bg_opacity")))/100).") !important;
	}
	
	
	
				
	.navbar-collapse li:not(.maple_mega_menu) ul.menu-depth-1 li:not(:first-child){
		border-top: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_border_color'))).";
	}
	
	
	
	.navbar-collapse li.maple_mega_menu ul.menu-depth-2{
		border-right: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_border_color'))).";
	}
	.rtl .navbar-collapse li.maple_mega_menu ul.menu-depth-2{
		border-left: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_border_color'))).";
	}
		
	#dl-menu ul li:not(:last-child) a, .maple_sub_menu_border_color{
		border-bottom: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_border_color'))).";
	}
	
	.navbar-collapse > ul > li > a, .navbar-collapse .menu_style2_bearer > ul > li > a{";
		$font = get_option('maple_menu_font_pre_'.$maple_header_style_pre); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."', sans-serif;
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('maple_menu_font_size_pre_'.$maple_header_style_pre),10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_color_pre_'.$maple_header_style_pre))).";";
		if (get_option('maple_menu_uppercase_pre_'.$maple_header_style_pre) === 'on') $maple_style_data .= "text-transform: uppercase;\n"; else $maple_style_data .= "text-transform:none;\n";
		$maple_style_data .= "letter-spacing: ".esc_html(intval(get_option('maple_menu_letter_spacing_pre_'.$maple_header_style_pre),10))."px;
	}
	header.navbar .main-menu-icon{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_color_pre_'.$maple_header_style_pre))).";

	}
	.navbar-collapse > ul > li > a:hover, 
	.navbar-collapse > ul > li.current-menu-ancestor > a, 
	.navbar-collapse > ul > li.current-menu-item > a, 
	.navbar-collapse > ul > li > a.selected,
	.navbar-collapse > ul > li > a.hover_selected,
	.navbar-collapse .menu_style2_bearer > ul > li > a:hover, 
	.navbar-collapse .menu_style2_bearer > ul > li.current-menu-ancestor > a, 
	.navbar-collapse .menu_style2_bearer > ul > li.current-menu-item > a, 
	.navbar-collapse .menu_style2_bearer > ul > li > a.selected,
	.navbar-collapse .menu_style2_bearer > ul > li > a.hover_selected{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_color_hover_pre_'.$maple_header_style_pre)))." !important;
	}
	header.navbar-default.hover-line .navbar-nav > li:hover > a:before, header.hover-line.navbar-default .navbar-nav > li:hover > a.selected:before, header.hover-line.navbar-default .navbar-nav > li.current-menu-item > a:before, header.hover-line.header_after_scroll.navbar-default .navbar-nav > li.current-menu-item > a:before, header.hover-line.header_after_scroll.navbar-default .navbar-nav > li:hover > a:before, header.hover-line.header_after_scroll.navbar-default .navbar-nav > li:hover > a.selected:before{
		border-bottom-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_color_hover_pre_'.$maple_header_style_pre)))." !important;
	}
	
	header.navbar a.selected .main-menu-icon,
	header.navbar a.hover_selected .main-menu-icon{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_color_hover_pre_'.$maple_header_style_pre)))." !important;
	}
	header.navbar.header_after_scroll a.selected .main-menu-icon,
	header.navbar.header_after_scroll a.hover_selected .main-menu-icon{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_color_hover_after_'.$maple_header_style_after)))." !important;
	}
	.header.navbar .navbar-collapse ul li:hover a 
	{
		background: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_color_hover_pre_'.$maple_header_style_pre))).";
		color: #fff !important;
	}
	
	";	
	if (get_option('maple_menu_add_border_pre_'.$maple_header_style_pre) == "on"){
		$maple_style_data .= ".navbar-collapse ul.menu-depth-1, .nav-container .maple_minicart{border-top:1px solid #".str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_border_color_pre_'.$maple_header_style_pre))." !important;}";
	}
	
	$maple_style_data .= "
	
	
	
	.navbar-default .navbar-nav > li{
		padding-right:".esc_html(intval(get_option('maple_menu_side_margin_pre_'.$maple_header_style_pre),10))."px;
		padding-left:".esc_html(intval(get_option('maple_menu_side_margin_pre_'.$maple_header_style_pre),10))."px;
	}
	
	.navbar-default .navbar-nav > li > a{
		padding-top:".esc_html(intval(get_option('maple_menu_margin_top_pre_'.$maple_header_style_pre),10))."px;
		padding-bottom:".esc_html(intval(get_option('maple_menu_padding_bottom_pre_'.$maple_header_style_pre),10))."px;
		line-height:".esc_html(intval(get_option('maple_menu_margin_top_pre_'.$maple_header_style_pre),10))."px;
	}
	
	
	header .search_trigger, header .menu-controls, header .maple_dynamic_shopping_bag, header .header_social_icons.with-social-icons{
		padding-top:".esc_html(intval(get_option('maple_menu_margin_top_pre_'.$maple_header_style_pre),10))."px;
		padding-bottom:".esc_html(intval(get_option('maple_menu_padding_bottom_pre_'.$maple_header_style_pre),10))."px;
	}
	
	header.style2 .header_style2_menu{
		background-color: #".esc_html(get_option('maple_sub_menu_bg_color')).";
	}
	
	header:not(.header_after_scroll) .navbar-nav > li > ul{
		margin-top:".esc_html(intval(get_option('maple_menu_padding_bottom_pre_'.$maple_header_style_pre),10))."px;
	}

	header:not(.header_after_scroll) .dl-menuwrapper button:after{
		background: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_color_hover_pre_'.$maple_header_style_pre))).";
		box-shadow: 0 6px 0 #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_color_hover_pre_'.$maple_header_style_pre))).", 0 12px 0 #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_color_hover_pre_'.$maple_header_style_pre))).";
	}

	.maple_minicart_wrapper{
		padding-top: ".esc_html(intval(get_option('maple_menu_padding_bottom_pre_'.$maple_header_style_pre),10))."px;
	}
	
	
	
	li.maple_mega_hide_link > a, li.maple_mega_hide_link > a:hover{";
		$font = get_option('maple_label_menu_font'); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."' !important;
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('maple_label_menu_font_size'),10))."px !important;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_label_menu_color')))." !important;";
		if (get_option('maple_label_menu_uppercase') === 'on') $maple_style_data .= "text-transform: uppercase !important;\n";
		$maple_style_data .= "letter-spacing: ".esc_html(intval(get_option('maple_label_menu_letter_spacing'),10))."px !important;
	}
	
/*
	.nav-container .maple_minicart li a:hover {";
		$font = get_option('maple_label_menu_font'); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_label_menu_color')))." !important;
		text-decoration: none;
	}
*/
	.nav-container .maple_minicart li a{";
		$font = get_option('maple_sub_menu_font'); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('maple_sub_menu_font_size'),10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_color'))).";";
		if (get_option('maple_sub_menu_uppercase') === 'on') $maple_style_data .= "text-transform: uppercase;\n";
		$maple_style_data .= "letter-spacing: ".esc_html(intval(get_option('maple_sub_menu_letter_spacing')),10)."px;
	}
	
	.dl-trigger{";
		$font = get_option('maple_menu_font_pre_'.$maple_header_style_pre); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."' !important;
		font-weight: ".esc_html($font[1])." !important;
		font-size: ".esc_html(intval(get_option('maple_menu_font_size_pre_'.$maple_header_style_pre),10))."px;";
		if (get_option('maple_menu_uppercase_pre_'.$maple_header_style_pre) === 'on') $maple_style_data .= "text-transform: uppercase;\n";
		$maple_style_data .= "letter-spacing: ".esc_html(intval(get_option('maple_menu_letter_spacing_pre_'.$maple_header_style_pre),10))."px;
	}
	
	.maple_minicart, .maple_minicart_wrapper{";
		$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sub_menu_bg_color")));
		$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_sub_menu_bg_opacity")))/100).") !important;
	}
	
	.page_content a, header a, #big_footer a{";
		$font = get_option('maple_links_font'); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('maple_links_size'), 10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_links_color")))."
	}
	.page_content a:hover, header a:hover, #big_footer a:hover, .page-template-blog-masonry-template .posts_category_filter li:hover,.page-template-blog-masonry-template .posts_category_filter li:active,.page-template-blog-masonry-template .posts_category_filter li:focus,.metas-container a:hover{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_links_color_hover"))).";
		background-color: #".esc_html( is_array(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_links_bg_color_hover"))) ? "" : str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_links_bg_color_hover")) ).";
	}
	
	h1{";
		$font = get_option('maple_h1_font'); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('maple_h1_size'), 10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_h1_color"))).";
	}
	
	h2{";
		$font = get_option('maple_h2_font'); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('maple_h2_size'), 10))."px;
		color: #".esc_html(get_option('maple_h2_color')).";
	}
	
	h3{";
		$font = get_option('maple_h3_font'); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('maple_h3_size'), 10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_h3_color"))).";
	}
	
	h4{";
		$font = get_option('maple_h4_font'); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('maple_h4_size'), 10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_h4_color"))).";
	}
	.widget h2 > .widget_title_span, .wpb_content_element .wpb_accordion_header a, .custom-widget h4, .widget.des_cubeportfolio_widget h4, .widget.des_recent_posts_widget h4{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_h4_color"))).";
	}
	.ult-item-wrap .title h4{font-size: 16px !important;}
	.wpb_content_element .wpb_accordion_header.ui-accordion-header-active a{color: ".esc_html($maple_styleColor).";}
	h5{";
		$font = get_option('maple_h5_font'); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('maple_h5_size'), 10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_h5_color"))).";
	}
	
	h6{";
		$font = get_option('maple_h6_font'); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('maple_h6_size'), 10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_h6_color"))).";
	}
		
	header.navbar{";
		switch (get_option('maple_headerbg_type_'.$maple_header_bgstyle_pre)){
			case "color":
				$color = maple_hex2rgb( str_replace( "__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_headerbg_color_".$maple_header_bgstyle_pre) ));
				$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_headerbg_opacity_".$maple_header_bgstyle_pre)))/100).");";
			break;
			case "image":
				$maple_style_data .= "background-repeat:no-repeat; background-position:center center; -o-background-size: cover !important; -moz-background-size: cover !important; -webkit-background-size: cover !important; background-size: cover !important;";
				$maple_style_data .= "background: url(" . esc_url(get_option("maple_headerbg_image_".$maple_header_bgstyle_pre)) . ") no-repeat fixed !important; background-size: cover !important;";  
			break;
			case "pattern":
				$maple_style_data .= "background: url('" . esc_url(get_template_directory_uri()) . "/images/maple_patterns/" . get_option("maple_headerbg_pattern_".$maple_header_bgstyle_pre) . "') 0 0 repeat !important;";
			break;
			case "custom_pattern":
				$maple_style_data .= "background: url('" . esc_url(get_option("maple_headerbg_custom_pattern_".$maple_header_bgstyle_pre)) . "') 0 0 repeat !important;";
			break;
		}
	$maple_style_data .= "
	}
	
	body#boxed_layout{";
		switch (get_option("maple_bodybg_type")){
			case "image":
				$maple_style_data .= "background-repeat:no-repeat; background-position:center center; -o-background-size: cover !important; -moz-background-size: cover !important; -webkit-background-size: cover !important; background-size: cover !important;width: 100%;height: 100%;
	background-attachment: fixed !important;";
				$maple_style_data .= "background: url(" . esc_url(get_option("maple_bodybg_type_image")) . ") no-repeat;";  
			break;
			case "color":
	 			$maple_style_data .= "background-color: #" . esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_bodybg_type_color"))) . ";";
			break;
		}
	$maple_style_data .= "
	}
	
	header .header_style2_contact_info{";
		if (get_option("maple_logo_margin_top")) 
			$maple_style_data .= "margin-top: " . str_replace(" ", "", get_option("maple_logo_margin_top")) . " !important;margin-bottom: " . str_replace(" ", "", get_option("maple_logo_margin_top")) . " !important;
	}
	
	header .navbar-header{";
		if (get_option("maple_logo_margin_top")) 
			$maple_style_data .= "margin-top: " . str_replace(" ", "", get_option("maple_logo_margin_top")) . ";margin-bottom: " . str_replace(" ", "", get_option("maple_logo_margin_top")) . ";"; 
		if (get_option("maple_logo_margin_left")) $maple_style_data .= "margin-left: " . str_replace(" ", "", get_option("maple_logo_margin_left")) . ";"; 
		if (get_option("maple_logo_height")) $maple_style_data .= "height:" . get_option("maple_logo_height") . ";";
	$maple_style_data .= "
	}
	header a.navbar-brand img{max-height: ".esc_html(intval(get_option('maple_logo_height'),10))."px;}";
			
	$header_after_scroll = false;
	if (get_option('maple_fixed_menu') == 'on'){
		if (get_option('maple_header_after_scroll') == 'on'){
			$header_after_scroll = true;
			$maple_style_data .= "
			header.navbar.header_after_scroll, header.header_after_scroll .navbar-nav > li.maple_mega_menu > .dropdown-menu, header.header_after_scroll .navbar-nav > li:not(.maple_mega_menu) .dropdown-menu{";
				switch (get_option('maple_headerbg_after_scroll_type_'.$maple_header_bgstyle_after)){
					case "color":
						$color = maple_hex2rgb( str_replace( "__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_headerbg_after_scroll_color_".$maple_header_bgstyle_after) ));
						$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_headerbg_after_scroll_opacity_".$maple_header_bgstyle_after)))/100).")";
					break;
					case "image":
						$maple_style_data .= "background-repeat:no-repeat; background-position:center center; -o-background-size: cover !important; -moz-background-size: cover !important; -webkit-background-size: cover !important; background-size: cover !important;";
						$maple_style_data .= "background: url(" . esc_url(get_option("maple_headerbg_after_scroll_image_".$maple_header_bgstyle_after)) . ") no-repeat fixed !important; background-size: cover !important;";  
					break;
					case "pattern":
						$maple_style_data .= "background: url('" . esc_url(get_template_directory_uri()) . "/images/maple_patterns/" . get_option("maple_headerbg_after_scroll_pattern_".$maple_header_bgstyle_after) . "') 0 0 repeat !important;";
					break;
					case "custom_pattern":
						$maple_style_data .= "background: url('" . esc_url(get_option("maple_headerbg_after_scroll_custom_pattern_".$maple_header_bgstyle_after)) . "') 0 0 repeat !important;";
					break;
				}
			$maple_style_data .= "
			}
			";
			$header_shrink = false;
			if (get_option('maple_fixed_menu') == 'on'){
				if (get_option('maple_header_after_scroll') == 'on'){
					if (get_option('maple_header_shrink_effect') == 'on'){
						$header_shrink = true;
						$maple_style_data .= "header.header_after_scroll a.navbar-brand img.logo_after_scroll{max-height: ". esc_html(intval(get_option('maple_logo_reduced_height'),10))."px;}";
					}
				}
			}
			
			$maple_style_data .= "
			header.header_after_scroll .navbar-collapse ul.menu-depth-1 li:not(.maple_mega_hide_link) a, header.header_after_scroll .dl-menuwrapper li:not(.maple_mega_hide_link) a, header.header_after_scroll .gosubmenu {
				color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_color'))).";
			}
			header.header_after_scroll .dl-back{color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_color'))).";}
			
			header.header_after_scroll .navbar-collapse ul.menu-depth-1 li:not(.maple_mega_hide_link):hover > a, header.header_after_scroll .dl-menuwrapper li:not(.maple_mega_hide_link):hover > a, header.header_after_scroll .dl-menuwrapper li:not(.maple_mega_hide_link):hover > a, header.header_after_scroll .dl-menuwrapper li:not(.maple_mega_hide_link):hover > header.header_after_scroll .gosubmenu, header.header_after_scroll .dl-menuwrapper li.dl-back:hover, header.header_after_scroll.navbar .nav-container .dropdown-menu li:hover{
				color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_color_hover'))).";
			}
			
			
			header.header_after_scroll .navbar-collapse .maple_mega_menu ul.menu-depth-2, header.header_after_scroll .navbar-collapse .maple_mega_menu ul.menu-depth-2 ul {background-color: transparent !important;} 
			
			.maple-push-sidebar-content h4{
				color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sliding_panel_titles_color'))).";

			}
			header li:not(.maple_mega_menu) ul.menu-depth-1 li:hover, header li.maple_mega_menu li.menu-item-depth-1 li:hover, header #dl-menu ul li:hover ,header.header_after_scroll li:not(.maple_mega_menu) ul.menu-depth-1 li:hover, header.header_after_scroll li.maple_mega_menu li.menu-item-depth-1 li:hover, header.header_after_scroll #dl-menu ul li:hover{";
				$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sub_menu_bg_color_hover")));
				$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_sub_menu_bg_opacity")))/100).") !important;
			}
			
		
			
			header.header_after_scroll .navbar-collapse li:not(.maple_mega_menu) ul.menu-depth-1 li:not(:first-child){
				border-top: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_border_color'))).";
			}
			header.header_after_scroll .navbar-collapse li.maple_mega_menu ul.menu-depth-2{
				border-right: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_border_color'))).";
			}
			header.header_after_scroll #dl-menu li:not(:last-child) a, header.header_after_scroll #dl-menu ul li:not(:last-child) a{
				border-bottom: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_border_color'))).";
			}
			
			.header_after_scroll .navbar-collapse > ul > li > a, .header_after_scroll .navbar-collapse .menu_style2_bearer > ul > li > a{";
				$font = get_option('maple_menu_font_after_'.$maple_header_style_after); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
				$maple_style_data .= "
				font-family: '".wp_kses_post($font[0])."';
				font-weight: ".esc_html($font[1]).";
				font-size: ".esc_html(intval(get_option('maple_menu_font_size_after_'.$maple_header_style_after),10))."px;
				color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_color_after_'.$maple_header_style_after))).";";
				if (get_option('maple_menu_uppercase_after_'.$maple_header_style_after) === 'on') $maple_style_data .= "text-transform: uppercase;\n"; else $maple_style_data .= "text-transform:none;\n";
				$maple_style_data .= "letter-spacing: ".esc_html(intval(get_option('maple_menu_letter_spacing_after_'.$maple_header_style_after),10))."px;
			}
			
			.header_after_scroll .navbar-collapse > ul > li > a:hover,
			.header_after_scroll .navbar-collapse > ul > li.current-menu-ancestor > a,
			.header_after_scroll .navbar-collapse > ul > li.current-menu-item > a,
			.header_after_scroll .navbar-collapse > ul > li > a.selected,
			.header_after_scroll .navbar-collapse > ul > li > a.hover_selected,
			.header_after_scroll .navbar-collapse .menu_style2_bearer > ul > li > a:hover,
			.header_after_scroll .navbar-collapse .menu_style2_bearer > ul > li.current-menu-ancestor > a,
			.header_after_scroll .navbar-collapse .menu_style2_bearer > ul > li.current-menu-item > a,
			.header_after_scroll .navbar-collapse .menu_style2_bearer > ul > li > a.selected,
			.header_after_scroll .navbar-collapse .menu_style2_bearer > ul > li > a.hover_selected{
				color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_color_hover_after_'.$maple_header_style_after)))." !important;
			}
			
			header.navbar-default.hover-line .navbar-nav > li:hover > a:before, header.hover-line.navbar-default .navbar-nav > li:hover > a.selected:before, header.hover-line.navbar-default .navbar-nav > li.current-menu-item > a:before, header.hover-line.header_after_scroll.navbar-default .navbar-nav > li.current-menu-item > a:before, header.hover-line.header_after_scroll.navbar-default .navbar-nav > li:hover > a:before, header.hover-line.header_after_scroll.navbar-default .navbar-nav > li:hover > a.selected:before{
				border-bottom-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_color_hover_after_'.$maple_header_style_after)))." !important;
			}
			.header_after_scroll .dl-menuwrapper button:after{
				background: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_color_hover_after_'.$maple_header_style_after))).";
				box-shadow: 0 6px 0 #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_color_hover_after_'.$maple_header_style_after))).", 0 12px 0 #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_color_hover_after_'.$maple_header_style_after))).";
			}";
			
			if (get_option('maple_menu_add_border_after_'.$maple_header_style_after) == "on"){
				$maple_style_data .= ".header_after_scroll .navbar-collapse ul.menu-depth-1, .header_after_scroll .nav-container .maple_minicart{border-top:3px solid #".str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_menu_border_color_after_'.$maple_header_style_after))." !important;}";
			}
			$maple_style_data .= "
			header.header_after_scroll li.maple_mega_hide_link > a, header.header_after_scroll li.maple_mega_hide_link > a:hover{
				color: #".esc_html(get_option('maple_label_menu_after_scroll_color'))." !important;
			}";
			
			$header_shrink = false;
			if (get_option('maple_fixed_menu') == 'on'){
				if (get_option('maple_header_after_scroll') == 'on'){
					if (get_option('maple_header_shrink_effect') == 'on'){
						$header_shrink = true;
						$maple_style_data .= "
						header.header_after_scroll.navbar-default .navbar-nav > li > a {
							padding-top:".esc_html(intval(get_option('maple_menu_margin_top_after_'.$maple_header_style_after),10))."px;
							padding-bottom:".esc_html(intval(get_option('maple_menu_padding_bottom_after_'.$maple_header_style_after),10))."px;
							line-height:".esc_html(intval(get_option('maple_menu_margin_top_after_'.$maple_header_style_after),10))."px;
						}
						header.header_after_scroll.navbar-default .navbar-nav > li{
							padding-right:".esc_html(intval(get_option('maple_menu_side_margin_after_'.$maple_header_style_after),10))."px;
							padding-left:".esc_html(intval(get_option('maple_menu_side_margin_after_'.$maple_header_style_after),10))."px;
						}
						
						
						
						
						header.header_after_scroll .search_trigger, header.header_after_scroll .menu-controls, header.header_after_scroll .maple_dynamic_shopping_bag, header.header_after_scroll .header_social_icons.with-social-icons{
							padding-top:".esc_html(intval(get_option('maple_menu_margin_top_after_'.$maple_header_style_after),10))."px;
							padding-bottom:".esc_html(intval(get_option('maple_menu_padding_bottom_after_'.$maple_header_style_after),10))."px;
						}
						
						header.header_after_scroll .navbar-nav > li > ul{
							margin-top:".esc_html(intval(get_option('maple_menu_padding_bottom_after_'.$maple_header_style_after),10))."px;
						}
					
						header.header_after_scroll .maple_minicart_wrapper{
							padding-top:".esc_html(intval(get_option('maple_menu_padding_bottom_after_'.$maple_header_style_after),10))."px;
						}
						";
					}
				}
			}
		}
	}
		
		
	$header_shrink = false;
	if (get_option('maple_fixed_menu') == 'on'){
		if (get_option('maple_header_after_scroll') == 'on'){
			if (get_option('maple_header_shrink_effect') == 'on'){
				$header_shrink = true;
				$maple_style_data .= "
				header.header_after_scroll .header_style2_contact_info{";
					if (get_option("maple_logo_after_scroll_margin_top")) $maple_style_data .= "margin-top: " . str_replace(" ", "", get_option("maple_logo_after_scroll_margin_top")) . " !important;margin-bottom: " . str_replace(" ", "", get_option("maple_logo_after_scroll_margin_top")) . " !important;
				}
				header.header_after_scroll .navbar-header{";
					if (get_option("maple_logo_after_scroll_margin_top")) $maple_style_data .= "margin-top: " . str_replace(" ", "", get_option("maple_logo_after_scroll_margin_top")) . ";margin-bottom: " . str_replace(" ", "", get_option("maple_logo_after_scroll_margin_top")) . ";"; 
					if (get_option("maple_logo_after_scroll_margin_left")) $maple_style_data .= "margin-left: " . str_replace(" ", "", get_option("maple_logo_after_scroll_margin_left")) . ";"; 
					if (get_option("maple_logo_reduced_height")) $maple_style_data .= "height:" . get_option("maple_logo_reduced_height") . ";"; 
					else {
						if (get_option("maple_logo_height")) $maple_style_data .= "height:" . get_option("maple_logo_height") . ";";
					}
				$maple_style_data .= "
				}
				
				@media only screen and (max-width: 767px){

				body header.header_after_scroll .nav-container .navbar-header{";
					if (get_option("mobile_maple_logo_after_scroll_margin_top")) $maple_style_data .= "margin-top: " . str_replace(" ", "", get_option("mobile_maple_logo_after_scroll_margin_top")) . "!important;margin-bottom: " . str_replace(" ", "", get_option("mobile_maple_logo_after_scroll_margin_top")) . "!important;"; 
					if (get_option("mobile_maple_logo_after_scroll_margin_left")) $maple_style_data .= "margin-left: " . str_replace(" ", "", get_option("mobile_maple_logo_after_scroll_margin_left")) . "!important;"; 
					if (get_option("mobile_maple_logo_reduced_height")) $maple_style_data .= "height:" . get_option("mobile_maple_logo_reduced_height") . "!important;"; 
					else {
						if (get_option("mobile_maple_logo_height")) $maple_style_data .= "height:" . get_option("mobile_mobile_maple_logo_height") . "!important;";
					}
				$maple_style_data .= "
				}
				body header.header_after_scroll a.navbar-brand img,
				body header.header_after_scroll a.navbar-brand img.logo_after_scroll{max-height: ".esc_html(intval(get_option('mobile_maple_logo_reduced_height'),10))."px;}
				}
				
				header.header_after_scroll a.navbar-brand h1{
					font-size: " . str_replace(" ", "", get_option("maple_logo_after_scroll_size")) . " !important;
				}
				";
			}
		}
	}
	
	if (get_option("maple_info_above_menu") == "on"){
		$color = maple_hex2rgb( str_replace( "__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_topbar_bg_color") ));
		$maple_style_data .= "
		header .top-bar .top-bar-bg, header .top-bar #lang_sel a.lang_sel_sel, header .top-bar #lang_sel > ul > li > ul > li > a{
			background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_topbar_bg_opacity")))/100).");
		}
		header .top-bar ul.phone-mail li, header .top-bar ul.phone-mail li i{
			color: #".esc_html( str_replace( "__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_topbar_text_color") )).";
		}
		header .top-bar a, header .top-bar ul.phone-mail li a{
			color: #".esc_html( str_replace( "__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_topbar_links_color") ))." !important;
		}
		header .top-bar a:hover, header .top-bar ul.phone-mail li a:hover{
			color: #".esc_html( str_replace( "__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_topbar_links_hover_color") ))." !important;
		}
		header .top-bar .social-icons-fa li a{
			color: #".esc_html( str_replace( "__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_topbar_social_color") ))." !important;
		}
		header .top-bar .social-icons-fa li a:hover{
			color: #".esc_html( str_replace( "__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_topbar_social_hover_color") ))." !important;
		}
		header .top-bar *{
			border-color: #".esc_html( str_replace( "__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_topbar_borders_color") ))." !important;
		}
		header .top-bar .down-button{
			border-color: transparent rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_topbar_bg_opacity")))/100).") transparent transparent !important;
		}
		header .top-bar.opened .down-button{
			border-color: transparent #fff transparent transparent !important;
		}
		";
	}
	$maple_style_data .= "
	#primary_footer > .container, #primary_footer > .no-fcontainer{
		padding-top:".esc_html(intval(get_option('maple_primary_footer_padding_top'),10))."px;
		padding-bottom:".esc_html(intval(get_option('maple_primary_footer_padding_bottom'),10))."px;
	}
	#primary_footer{";
		switch (get_option("maple_footerbg_type")){
			case "image":
				$maple_style_data .= "background-repeat:no-repeat; background-position:center center; -o-background-size: cover !important; -moz-background-size: cover !important; -webkit-background-size: cover !important; background-size: cover !important;";
				$maple_style_data .= "background: url(" . esc_url(get_option("maple_footerbg_image")) . ") no-repeat; background-size: cover !important;";  
			break;
			case "color":
				$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_footerbg_color")));
				$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_footerbg_color_opacity")))/100).");";
			break;
			case "pattern":
				$maple_style_data .= "background: url('" . esc_url(get_template_directory_uri()) . "/images/maple_patterns/" . esc_html(get_option("maple_footerbg_pattern")) . "') 0 0 repeat !important;";
			break;
			case "custom_pattern":
				$maple_style_data .= "background: url('" . esc_url(get_option("maple_footerbg_custom_pattern")) . "') 0 0 repeat !important;";
			break;
		}
	$maple_style_data .= "
	}

	#primary_footer input, #primary_footer textarea{";
		switch (get_option("maple_footerbg_type")){
			case "image": case "pattern": case "custom_pattern":
				$maple_style_data .= "background: transparent;";  
			break;
			case "color":
				$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_footerbg_color")));
				$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_footerbg_color_opacity")))/100).");";
			break;
		}
	$maple_style_data .= "
	}
	header.header_not_fixed ul.menu-depth-1,
	header.header_not_fixed ul.menu-depth-1 ul,
	header.header_not_fixed ul.menu-depth-1 ul li,
	header.header_not_fixed #dl-menu ul{";
		$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sub_menu_bg_color")));
		$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_sub_menu_bg_opacity")))/100).") !important;
	}

	header.header_not_fixed li:not(.maple_mega_menu) ul.menu-depth-1 li:hover, header.header_not_fixed li.maple_mega_menu li.menu-item-depth-1 li:hover, header.header_not_fixed #dl-menu ul li:hover{";
		$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sub_menu_bg_color_hover")));
		$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_sub_menu_bg_opacity")))/100).") !important;
	}

	#primary_footer input, #primary_footer textarea{
		border: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_footerbg_borderscolor"))).";
	}
	#primary_footer hr, .footer_sidebar ul li, #big_footer .forms input, #big_footer .recent_posts_widget_2 .recentcomments_listing li{
		border-top: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_footerbg_borderscolor")))." !important;
	}
	
	.footer_sidebar ul li:last-child, #big_footer .recent_posts_widget_2 .recentcomments_listing li:last-child{
		border-bottom: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_footerbg_borderscolor")))." !important;
	}
	#primary_footer a{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_footerbg_linkscolor"))).";
	}
	
	#primary_footer, #primary_footer p, #big_footer input, #big_footer textarea{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_footerbg_paragraphscolor"))).";
	}
	
	#primary_footer .footer_sidebar > h4, #primary_footer .footer_sidebar > .widget > h4 {
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_footerbg_headingscolor"))).";
	}
	
	#secondary_footer{";
		switch (get_option("maple_sec_footerbg_type")){
			case "image":
				$maple_style_data .= "background-repeat:no-repeat; background-position:center center; -o-background-size: cover !important; -moz-background-size: cover !important; -webkit-background-size: cover !important; background-size: cover !important;";
				$maple_style_data .= "background: url(" . esc_url(get_option("maple_sec_footerbg_image")) . ") no-repeat fixed !important; background-size: cover !important;";  
			break;
			case "color":
				$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sec_footerbg_color")));
				$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_sec_footerbg_color_opacity")))/100).");";
			break;
			case "pattern":
				$maple_style_data .= "background: url('" . esc_url(get_template_directory_uri()) . "/images/maple_patterns/" . esc_html(get_option("maple_sec_footerbg_pattern")) . "') 0 0 repeat !important;";
			break;
			case "custom_pattern":
				$maple_style_data .= "background: url('" . esc_url(get_option("maple_sec_footerbg_custom_pattern")) . "') 0 0 repeat !important;";
			break;
		}
		$maple_style_data .= "
		padding-top:".esc_html(intval(get_option('maple_secondary_footer_padding_top'),10))."px;
		padding-bottom:".esc_html(intval(get_option('maple_secondary_footer_padding_bottom'),10))."px;
	}";
	
	if (get_option("maple_show_sec_footer") == "on"){
		if (get_option("maple_footer_display_logo") == "on"){
			if (get_option('maple_footer_logo_type') == "text"){
				$maple_style_data .= "
				#secondary_footer .footer_logo .logo{";
					$font = get_option('maple_sec_footer_logo_font'); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
					$maple_style_data .= "
					font-family: '".wp_kses_post($font[0])."';
					font-weight: ".esc_html($font[1]).";
					font-size: ".esc_html(intval(get_option('maple_sec_footer_logo_font_size'), 10))."px;
					color: #".esc_html(get_option('maple_sec_footer_logo_font_color')).";
				}
				#secondary_footer .footer_logo .logo:hover{
					color: #".esc_html(get_option('maple_sec_footer_logo_font_hover_color')).";
				}";
			}
		}
	}
	$maple_style_data .= "
	

	header #dl-menu ul{";
				$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sub_menu_bg_color")));
				$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_sub_menu_bg_opacity")))/100).") !important;
			}
	
	header ul.menu-depth-1,
			header ul.menu-depth-1 ul,
			header ul.menu-depth-1 ul li,
			header.header_after_scroll ul.menu-depth-1,
			header.header_after_scroll ul.menu-depth-1 ul,
			header.header_after_scroll ul.menu-depth-1 ul li,
			header.header_after_scroll #dl-menu ul{";
				$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sub_menu_bg_color")));
				$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_sub_menu_bg_opacity")))/100).") !important;
			}
	
	
	#secondary_footer .social-icons-fa a i{
		font-size: ".esc_html(intval(get_option('maple_sec_footer_social_icons_size'),10))."px !important;
		line-height: ".esc_html(intval(get_option('maple_sec_footer_social_icons_size'),10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sec_footer_social_icons_color"))).";
	}
	#secondary_footer .social-icons-fa a i:before{
		font-size: ".esc_html(intval(get_option('maple_sec_footer_social_icons_size'),10))."px;
	}
	#secondary_footer .social-icons-fa a:hover i{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sec_footer_social_icons_hover_color"))).";
		
	}
	
	/* Mobile Header Options */
	@media only screen and (max-width: 767px){
		body header .nav-container .navbar-header{";
			if (get_option("mobile_maple_logo_margin_top")) 
				$maple_style_data .= "margin-top: " . str_replace(" ", "", get_option("mobile_maple_logo_margin_top")) . "!important;margin-bottom: " . str_replace(" ", "", get_option("mobile_maple_logo_margin_top")) . "!important;"; 
			if (get_option("mobile_maple_logo_margin_left")) $maple_style_data .= "margin-left: " . str_replace(" ", "", get_option("mobile_maple_logo_margin_left")) . "!important;"; 
			if (get_option("mobile_maple_logo_height")) $maple_style_data .= "height:" . get_option("mobile_maple_logo_height") . "!important;";
		$maple_style_data .= "
		}
		body header a.navbar-brand img,
		body header a.navbar-brand img{max-height: ".esc_html(intval(get_option('mobile_maple_logo_height'),10))."px;}
	}
	
	#maple_website_load .introloading_logo{
		margin-left:  ".esc_html(intval(get_option('intro_maple_logo_margin_left')))."px !important;
	}
	
	#maple_website_load .introloading_logo{
		margin-top:  ".esc_html(intval(get_option('intro_maple_logo_margin_top')))."px !important;
	}
	
	#maple_website_load .introloading_logo img{
		height	:  ".esc_html(intval(get_option('intro_maple_logo_height')))."px !important;
	}
	
	.footer_logo .footer_logo_retina,
	.footer_logo .footer_logo_normal{
		height	:  ".esc_html(intval(get_option('footer_maple_logo_height')))."px !important;
	}
	
	#secondary_footer .footer_logo{
		margin-bottom: ".esc_html(intval(get_option('footer_maple_logo_margin')))."px !important;
	}
	
	header .search_input{";
		$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_search_input_background_color")));
		$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_search_input_background_opacity")))/100).");
	}
	header .search_input input.search_input_value{";
		$font = get_option("maple_search_input_font"); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; 	if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
	}
	header .search_input input.search_input_value, header .search_close{
		font-size: ".esc_html(intval(get_option("maple_search_input_font_size"),10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_search_input_font_color"))).";
	}
	header .search_input .ajax_search_results ul{";
		$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_search_result_background_color")));
		$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_search_result_background_opacity")))/100).");
	}
	header .search_input .ajax_search_results ul li.selected{";
		$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_search_selected_result_background_color")));
		$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_search_result_background_opacity")))/100).");
	}
	header .search_input .ajax_search_results ul li{
		border-bottom: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_search_result_borders"))).";
	}
	header .search_input .ajax_search_results ul li a{";
		$font = get_option("maple_search_input_font"); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; 	if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option("maple_search_result_font_size"),10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_search_result_font_color")))."
	}
	header .search_input .ajax_search_results ul li.selected a{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_search_selected_result_font_color")))."
	}
	header .search_input .ajax_search_results ul li a span, header .search_input .ajax_search_results ul li a span i{";
		$font = get_option("maple_search_result_details_font"); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option("maple_search_result_details_font_size"),10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_search_result_details_font_color")))."
	}
	header .search_input .ajax_search_results ul li.selected a span{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_search_selected_result_details_font_color")))."
	}";
	
	if (is_user_logged_in() && get_option("maple_fixed_menu") == "on"){
		global $wpdb;
		$res = $wpdb->get_results( $wpdb->prepare("SELECT meta_value FROM $wpdb->usermeta WHERE user_id=%d AND meta_key=%s", get_current_user_id(), 'show_admin_bar_front'), OBJECT );
		
		if ($res && $res[0]->meta_value == "true"){
			$maple_style_data .= "
			body:not(.vc_editor) header:not(.headerclone) { top:32px !important; }
			@media screen and (max-width:782px) {
				body:not(.vc_editor) header:not(.headerclone), body:not(.vc_editor) header:not(.headerclone) .down-button {
					top:45px !important;
				}
/*
				body:not(.vc_editor) header:not(.headerclone) .top-bar-bg{
					margin-top: 44px !important;
				}
*/
				#wpadminbar{position: fixed;}
			}
			";
		}
	}
	
	$loader = (is_page_template() && get_post_meta(get_the_ID(), 'maple_enable_custom_header_options_value', true) == "yes") ? get_post_meta(get_the_ID(), 'maple_enable_website_loading_value', true) : get_option("maple_enable_website_loader");
	if ($loader == "on"){
		$maple_style_data .= "
		body #maple_website_load, #maple_website_load .load2 .loader:before, #maple_website_load .load2 .loader:after, #maple_website_load .load3 .loader:after{background: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_background"))).";}
		
		.loading-css{
			border-right: 2px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";
			border-top: 2px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";
		}
		
		.ball-pulse>div, .ball-pulse-sync>div, .ball-scale>div, .ball-rotate>div, .ball-rotate>div:before, .ball-clip-rotate>div, .ball-clip-rotate-pulse>div:first-child, .ball-beat>div, .ball-scale-multiple>div, .ball-triangle-path>div, .ball-pulse-rise>div, .ball-grid-beat>div, .ball-grid-pulse>div, .ball-spin-fade-loader>div, .ball-zig-zag>div, .ball-zig-zag-deflect>div, .line-scale>div, .line-scale-party>div, .line-scale-pulse-out>div, .line-scale-pulse-out-rapid>div, .line-spin-fade-loader>div, .square-spin>div, .pacman>div:nth-child(3),.pacman>div:nth-child(4),.pacman>div:nth-child(5),.pacman>div:nth-child(6), .cube-transition>div, .ball-rotate>div:after, .ball-rotate>div:before, #maple_website_load .load3 .loader:before, #maple_website_load .load3 .loader:before{background-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}

		.ball-clip-rotate>div{border-top-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";border-left-color: #". esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";border-right-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}

		.ball-clip-rotate-pulse>div:last-child, .ball-clip-rotate-multiple>div:last-child{border-top-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";border-bottom-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}
		
		.ball-clip-rotate-multiple>div{border-right-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";border-left-color:#". esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}

		.ball-triangle-path>div, .ball-scale-ripple>div, .ball-scale-ripple-multiple>div{border-color:#".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}
		
		.pacman>div:first-of-type, .pacman>div:nth-child(2){border-top-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";border-left-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";border-bottom-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}
		
		.load2 .loader{box-shadow:inset 0 0 0 1em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}";
		$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color")));
		$maple_style_data .= "
		.load3 .loader{background:#".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";background:-moz-linear-gradient(left, #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color")))." 10%, rgba(".esc_html($color[0].",".$color[1].",".$color[2]).", 0) 42%);background:-webkit-linear-gradient(left, #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color")))." 10%, rgba(".esc_html($color[0].",".$color[1].",".$color[2]).", 0) 42%);background:-o-linear-gradient(left, #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color")))." 10%, rgba(".esc_html($color[0].",".$color[1].",".$color[2]).", 0) 42%);background:-ms-linear-gradient(left, #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color")))." 10%, rgba(".esc_html($color[0].",".$color[1].",".$color[2]).", 0) 42%);background:linear-gradient(to right, #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color")))." 10%, rgba(".esc_html($color[0].",".$color[1].",".$color[2]).", 0) 42%);}
			
		.load6 .loader{font-size:50px;text-indent:-9999em;overflow:hidden;width:1em;height:1em;border-radius:50%;position:relative;-webkit-transform:translateZ(0);-ms-transform:translateZ(0);transform:translateZ(0);-webkit-animation:load6 1.7s infinite ease;animation:load6 1.7s infinite ease}@-webkit-keyframes 'load6'{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg);box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}5%,95%{box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}10%,59%{box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.087em -0.825em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.173em -0.812em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.256em -0.789em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.297em -0.775em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}20%{box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.338em -0.758em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.555em -0.617em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.671em -0.488em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.749em -0.34em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}38%{box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.377em -0.74em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.645em -0.522em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.775em -0.297em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.82em -0.09em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg);box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}}@keyframes 'load6'{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg);box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}5%,95%{box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}10%,59%{box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.087em -0.825em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.173em -0.812em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.256em -0.789em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.297em -0.775em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}20%{box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.338em -0.758em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.555em -0.617em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.671em -0.488em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.749em -0.34em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}38%{box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.377em -0.74em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.645em -0.522em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.775em -0.297em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", -0.82em -0.09em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg);box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).", 0 -0.83em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_color"))).";}}";
		
		if (get_option("maple_enable_website_loader_percentage") == "on"){
			$maple_style_data .= "
			body #maple_website_load .percentage{";
				$font = get_option("maple_loader_percentage_font"); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
				$maple_style_data .= "
				font-family: '".wp_kses_post($font[0])."', sans-serif;
				font-weight: ".esc_html($font[1]).";
				font-size: ".esc_html(intval(get_option("maple_loader_percentage_font_size"),10))."px;
				color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_loader_percentage_font_color"))).";
			}
			";
		}
	}
	
	$maple_style_data .= "
	.maple_breadcrumbs, .maple_breadcrumbs a, .maple_breadcrumbs span{";
		$font = get_option("maple_breadcrumbs_font"); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; 		if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_breadcrumbs_color"))).";
		font-size: ".esc_html(intval(get_option("maple_breadcrumbs_size"),10))."px;
	}

	#menu_top_bar > li ul{background: #".str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_topbar_submenu_bg_color")).";}
	#menu_top_bar > li ul li:hover{background: #".str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_topbar_submenu_bg_hover_color")).";}
	#menu_top_bar > li ul a{color: #".str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_topbar_submenu_text_color"))." !important;}
	#menu_top_bar > li ul a:hover, #menu_top_bar > li ul li:hover > a{color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_topbar_submenu_text_hover_color")))." !important;}
	
	.navbar-collapse ul.menu-depth-1 li:not(.maple_mega_hide_link) a, .dl-menuwrapper li:not(.maple_mega_hide_link) a, .gosubmenu, .nav-container .maple_minicart ul li{";
		$font = get_option('maple_sub_menu_font'); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$maple_style_data .= "
		font-family: '".wp_kses_post($font[0])."', sans-serif;
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('maple_sub_menu_font_size'),10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_color'))).";";
		if (get_option('maple_sub_menu_uppercase') === 'on') $maple_style_data .= "text-transform: uppercase;\n";
		$maple_style_data .= "letter-spacing: ".esc_html(intval(get_option('maple_sub_menu_letter_spacing'),10))."px;
	}
	
	header li:not(.maple_mega_menu) ul.menu-depth-1 li:hover, header li.maple_mega_menu li.menu-item-depth-1 li:hover, header #dl-menu ul li:hover ,header.header_after_scroll li:not(.maple_mega_menu) ul.menu-depth-1 li:hover, header.header_after_scroll li.maple_mega_menu li.menu-item-depth-1 li:hover, header.header_after_scroll #dl-menu ul li:hover{";
				$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sub_menu_bg_color_hover")));
				$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_sub_menu_bg_opacity")))/100).") !important;
			}
			
	header.navbar .dl-menuwrapper .main-menu-icon{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_color'))).";

	}		
			
			
	header li:not(.maple_mega_menu) ul.menu-depth-1 li:hover, header li.maple_mega_menu li.menu-item-depth-1 li:hover, header #dl-menu ul li:hover ,header.header_after_scroll li:not(.maple_mega_menu) ul.menu-depth-1 li:hover, header.header_after_scroll li.maple_mega_menu li.menu-item-depth-1 li:hover, header.header_after_scroll #dl-menu ul li:hover{";
				$color = maple_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sub_menu_bg_color_hover")));
				$maple_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("maple_sub_menu_bg_opacity")))/100).") !important;
			}
	.navbar-collapse ul.menu-depth-1 li:not(.maple_mega_hide_link) a.main-menu-icon{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option('maple_sub_menu_color')))." !important;
	}
	
	header.navbar .nav-container .maple_right_header_icons  i, header .menu-controls i{color: #". str_replace( "__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_header_icons_color_".$maple_header_bgstyle_pre) )." !important;}
	
	header.navbar .nav-container .maple_right_header_icons i:hover, header .menu-controls .maple_right_header_icons i:hover{color: #". str_replace( "__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_header_icons_hover_color_".$maple_header_bgstyle_pre) )." !important;}
	
	header.header_after_scroll.navbar .nav-container .maple_right_header_icons i, header .menu-controls .maple_right_header_icons i{color: #". str_replace( "__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_header_after_scroll_icons_color_".$maple_header_bgstyle_after) )." !important;}
	
	header.header_after_scroll.navbar .nav-container .maple_right_header_icons i:hover, header .menu-controls .maple_right_header_icons i:hover{color: #".esc_html( str_replace( "__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_header_after_scroll_icons_hover_color_".$maple_header_bgstyle_after) ))." !important;}";
	
	
	
	
	
	//sliding panel
	$maple_style_data .= "
		.maple-push-sidebar.maple-push-sidebar-right{background-color:#".str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sliding_panel_background_color"))." !important;}
		
		.maple-push-sidebar .widget h2 > .widget_title_span, .maple-push-sidebar .wpb_content_element .wpb_accordion_header a, .maple-push-sidebar .custom-widget h4, .maple-push-sidebar .widget.des_cubeportfolio_widget h4, .maple-push-sidebar .widget.des_recent_posts_widget h4, .maple-push-sidebar, .maple-push-sidebar .widget h4{
			";
			$font = get_option("maple_sliding_panel_titles_font"); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
			$maple_style_data .= "
			font-family: '".wp_kses_post($font[0])."';
			font-weight: ".esc_html($font[1]).";
			color: #".str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sliding_panel_titles_color"))." !important;
			font-size: ".esc_html(intval(get_option("maple_sliding_panel_titles_font_size"),10))."px;
		}
		
		.maple-push-sidebar a:not(.vc_btn3 a){
			";
			$font = get_option("maple_sliding_panel_links_font"); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
			$maple_style_data .= "
			font-family: '".wp_kses_post($font[0])."';
			font-weight: ".esc_html($font[1]).";
			color: #".str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sliding_panel_links_color"))." !important;
			font-size: ".esc_html(intval(get_option("maple_sliding_panel_links_font_size"),10))."px;
		}
		
		.maple-push-sidebar a:not(.vc_btn3):hover{
			color: #".str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sliding_panel_links_color_hover"))." !important;
		}
		
		.maple-push-sidebar p, .widget-contact-info-content, .maple-push-sidebar a:not(.vc_btn3){
			";
			$font = get_option("maple_sliding_panel_p_font"); $maple_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
			$maple_style_data .= "
			font-family: '".wp_kses_post($font[0])."';
			font-weight: ".esc_html($font[1]).";
			color: #".str_replace("__USE_THEME_MAIN_COLOR__", $maple_color_code, get_option("maple_sliding_panel_p_color"))." !important;
			font-size: ".esc_html(intval(get_option("maple_sliding_panel_p_font_size"),10))."px;
		}
	";
	
	if (get_option("enable_custom_css") == "on"){
		$maple_customcss = get_option("maple_custom_css");
		if (gettype($maple_customcss) === "string" && $maple_customcss != "") {
			$maple_style_data .= stripslashes($maple_customcss);
		}
	}

	wp_add_inline_style('maple-style', $maple_style_data);
	
}
add_action( 'wp_enqueue_scripts', 'maple_custom_style', 2 );

?>