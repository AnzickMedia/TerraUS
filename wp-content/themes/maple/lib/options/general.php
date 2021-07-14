<?php

$sides = get_option('maple_sidebar_name_names');
if (is_string($sides)) $sides = explode(MAPLE_SEPARATOR, $sides);
$outputsidebars = array(array("id"=>"defaultblogsidebar", "name" => "Blog Sidebar"));
if (!empty($sides)){
	foreach ($sides as $s){
		if ($s != ""){
			array_push($outputsidebars, array("id"=>$s, "name"=>$s));
		}
	}	
}

$ultimate_gf = array();
$querygf = get_option('ultimate_selected_google_fonts');
if (isset($querygf) && is_array($querygf)){
	foreach (get_option('ultimate_selected_google_fonts') as $font){
		array_push($font, $ultimate_gf);
	}	
}

$page_on_front = 0;
if (get_option('show_on_front') == "page") $page_on_front = get_option('page_on_front');

$google_fonts = maple_get_all_google_fonts();

$maple_fonts_array = maple_fonts_array_builder();
$maple_portfolio_types = maple_portfolio_types();
$maple_projects = maple_get_proj();

$maple_general_options= array( array(
	"name" => "General",
	"type" => "title",
	"img" => MAPLE_IMAGES_URL."icon_general.png"
),

array(
	"type" => "open",
	"subtitles"=>array(array("id"=>"main", "name"=>"Main Settings"), array("id"=>"projects", "name"=>"Projects"), array("id"=>"blog", "name"=>"Blog"), array("id"=>"archives", "name"=>"Archives"), array("id"=>"shop", "name"=>"Shop"))
),

/* ------------------------------------------------------------------------*
 * MAIN SETTINGS
 * ------------------------------------------------------------------------*/

array(
	"type" => "subtitle",
	"id"=>'main'
),

array(
	"type" => "documentation",
	"text" => "<h3>Smooth Scroll</h3>"
),

array(
	"name" => "Enable Smooth Scroll",
	"id" => "maple_enable_smooth_scroll",
	"type" => "checkbox",
	"std" => 'on'
),

array(
	"type" => "documentation",
	"text" => "<h3>Website Loading</h3>"
),

array(
	"name" => "Enable Website Loading",
	"id" => "maple_enable_website_loader",
	"type" => "checkbox",
	"std" => 'off'
),

array(
	"id" => "maple_website_loader",
	"name" => "Loader Type",
	"type" => "website_loaders",
	"options" => array("id"=>"ball-pulse"),
	"std" => "ball-pulse"
),

array(
	"name" => "Show Loading Percentage ?",
	"id" => "maple_enable_website_loader_percentage",
	"type" => "checkbox",
	"std" => 'off'
),

array(
	"name" => "Show Logo ?",
	"id" => "maple_enable_website_loader_logo",
	"type" => "checkbox",
	"std" => 'off'
),

array(
	"type" => "documentation",
	"text" => "<h3>Update Address on Scroll</h3>"
),

array(
	'name' => 'Update Address ?',
	'type' => 'checkbox',
	'id' => "maple_update_section_titles",
	'std' => 'off',
	'desc' => 'Updates the Address with the Sections Title (on One Pages). Ex.: httpx://xxxxx.xxx/#About'
),


array(
	"type" => "documentation",
	"text" => "<h3>Go To Top</h3>"
),

array(
	"name" => "Enable Go To Top button",
	"id" => "maple_enable_gotop",
	"type" => "checkbox",
	"std" => 'on'
),

array(
	"type" => "documentation",
	"text" => "<h3>Images with Grayscale Effect</h3>"
),

array(
	"name" => "Enable Grayscale Effect on Images",
	"id" => "maple_enable_grayscale",
	"type" => "checkbox",
	"std" => 'off'
),

array(
"type" => "close"),


/* ------------------------------------------------------------------------*
 * Projects
 * ------------------------------------------------------------------------*/

array(
	"type" => "subtitle",
	"id"=>'archives'
),


array(
	"type" => "documentation",
	"text" => "<h3>HomePage with Posts Listing</h3>"
),

array(
	"name" => "Primary Title",
	"id" => "maple_index_primary_title",
	"type" => "text"
),

array(
	"name" => "Secondary Title",
	"id" => "maple_index_secondary_title",
	"type" => "text",
	"desc" => "If set, will display this as a secondary title."
),

array(
	"type" => "documentation",
	"text" => "<h3>Blog Archive</h3>"
),

array(
	"name" => "Secondary Title",
	"id" => "maple_archive_secondary_title",
	"type" => "text",
	"desc" => "If set, will display this as a secondary title."
),

array(
	"name" => "Sidebar ?",
	"id" => "maple_blog_archive_sidebar",
	"type" => "select",
	"options" => array(array("id"=>"none", "name"=>"None"), array("id"=>"left", "name"=>"Left"), array("id"=>"right", "name"=>"Right")),
	"std"=>"none"
),

array(
	"name" => "Choose your Sidebar",
	"id" => "maple_blog_archive_sidebars_available",
	"type" => "select",
	"options" => $outputsidebars
),

array(
	"name" => "Blog Style",
	"id" => "maple_blog_archive_style",
	"type" => "select",
	"options" => array(array("id"=>"normal","name"=>"Normal style"), array("id"=>"masonry","name"=>"Masonry style")),
	"std" => "normal"
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * Blog
 * ------------------------------------------------------------------------*/

array(
	"type" => "subtitle",
	"id"=>'blog'
),

array(
	"type" => "documentation",
	"text" => "<h3>Blog Reading Option</h3>"
),

array(
	"name" => "Reading Type",
	"id" => "maple_blog_reading_type",
	"type" => "select",
	"options" => array(array('id'=>'default','name'=>'Default'), array('id'=>'paged','name'=>'Pagination'), array('id'=>'dropdown', 'name'=>'Pagination Dropdown List'), array('id'=>'scroll','name'=>'Load More'), array('id'=>'scrollauto','name'=>'Auto Load More')),
	"std" => 'paged'
),

array(
	"type" => "documentation",
	"text" => "<h3>Blog - Single Post Options</h3>"
),

array(
	"name" => "Primary Title",
	"id" => "maple_blog_single_primary_title",
	"type" => "text",
	"std" => "Blog"
),

array(
	"name" => "Secondary Title",
	"id" => "maple_blog_secondary_title",
	"type" => "text",
	"desc" => "If set, will display this as a secondary title."
),


array(
	"name" => "Sidebar ?",
	"id" => "maple_blog_single_sidebar",
	"type" => "select",
	"options" => array(array("id"=>"none", "name"=>"None"), array("id"=>"left", "name"=>"Left"), array("id"=>"right", "name"=>"Right")),
	"std"=>"right"
),

array(
	"name" => "Choose your Sidebar",
	"id" => "maple_sidebars_available",
	"type" => "select",
	"options" => $outputsidebars
),

array(
	"name" => "Enlarge Images on Single Post",
	"id" => "maple_enlarge_images",
	"type" => "checkbox",
	"std" => 'off',
	"desc" => 'If "ON" PrettyPhoto effect will be available.'
),

array(
	"name" => "Show Social Shares ?",
	"id" => "maple_post_single_social_shares",
	"type" => "checkbox",
	"std" => "on"
),

array(
	"name" => "Socials",
	"id" => "maple_post_single_socials",
	"type" => "multicheck",
	"options" => array(array("id"=>"facebook", "name"=>"Facebook"), array("id"=>"twitter","name"=>"Twitter"), array("id"=>"linkedin", "name"=>"LinkedIn"), array("id"=>"googleplus","name"=>"Google+"), array("id"=>"pinterest", "name"=>"Pinterest"), array("id"=>"tumblr","name"=>"Tumblr"), array("id"=>"email", "name"=>"Email")),
	"class" => "",
	"std" => "facebook,twitter,linkedin,googleplus,pinterest,tumblr,email"
),



array(
"type" => "close"),


/* ------------------------------------------------------------------------*
 * Projects
 * ------------------------------------------------------------------------*/

array(
	"type" => "subtitle",
	"id"=>'projects'
),

array(
	"type" => "documentation",
	"text" => "<h3>Projects Display</h3>"
),


array(
	"name" => "Portfolio Permalink",
	"id" => "maple_portfolio_permalink",
	"type" => "text",
	"std" => "portfolio",
	"desc" => "Change the \"/portfolio/\" bit of the projects' permalink. <br/><strong>Max. 20 characters, can not contain capital letters or spaces.</strong>"
),

array(
	"name" => "Project Single Layout Option",
	"id" => "maple_single_layout",
	"type" => "select",
	"options" => array(array('id'=>'left_media', 'name'=>'Media on the Left'),array('id'=>'full_media', 'name'=>'Media occupies the container\'s full length'), array('id'=>'fullwidth_media', 'name'=>'Media occupies the window\'s length')),
	"std" => 'full_media'
),

array(
	"name" => "Show Social Shares ?",
	"id" => "maple_project_single_social_shares",
	"type" => "checkbox",
	"std" => "on"
),

array(
	"name" => "Socials",
	"id" => "maple_project_single_socials",
	"type" => "multicheck",
	"options" => array(array("id"=>"facebook", "name"=>"Facebook"), array("id"=>"twitter","name"=>"Twitter"), array("id"=>"linkedin", "name"=>"LinkedIn"), array("id"=>"googleplus","name"=>"Google+"), array("id"=>"pinterest", "name"=>"Pinterest"), array("id"=>"tumblr","name"=>"Tumblr"), array("id"=>"email", "name"=>"Email")),
	"class" => "",
	"std" => "facebook,twitter,linkedin,googleplus,pinterest,tumblr,email"
),

array(
	"type" => "close"
),

/* shop */
array(
	"type" => "subtitle",
	"id" => "shop"
),

array(
	"type" => "documentation",
	"text" => "<h3>WooCommerce Shop</h3><br/><p>These titles will appear on Product Pages (either single products and categories/tags)</p>"
),

array(
	"name" => "Shop Primary Title",
	"id" => "maple_shop_primary_title",
	"type" => "text",
	"std" => "Shop"
),

array(
	"name" => "Shop Secondary Title",
	"id" => "maple_shop_secondary_title",
	"type" => "text",
	"desc" => "If set, will display this as a secondary title."
),

array(
	"name" => "Sidebar ?",
	"id" => "maple_woo_sidebar_scheme",
	"type" => "select",
	"options" => array(array("id"=>"none", "name"=>"None"), array("id"=>"left", "name"=>"Left"), array("id"=>"right", "name"=>"Right")),
	"std"=>"right"
),

array(
	"name" => "Choose your Sidebar",
	"id" => "maple_woo_sidebar",
	"type" => "select",
	"options" => $outputsidebars
),


array(
	"name" => "xxxxxxxx",
	"id" => 'ultimate_selected_google_fonts',
	"type" => "fakeinput",
	"std" => $ultimate_gf
),

array(
	"name" => "xxxxxxxxy",
	"id" => 'page_on_front',
	"type" => "fakeinput",
	"std" => $page_on_front,
	"el_class" => "show_on_front"
),

array(
	"type" => "close"
),

array(
"type" => "close"));

maple_add_options($maple_general_options);