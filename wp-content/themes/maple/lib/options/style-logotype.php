<?php
	
	$maple_fonts_array = maple_fonts_array_builder();
	
	$maple_style_general_options= array( array(
		"name" => "Logotype",
		"type" => "title",
	),
	
	array(
		"type" => "open",
		"subtitles"=>array(array("id"=>"logotype", "name"=>"Logotype"))
	),
	
	/* ------------------------------------------------------------------------*
	 * LOGO OPTIONS
	 * ------------------------------------------------------------------------*/
	
	
	array(
		"type" => "subtitle",
		"id" => 'logotype'
	),
	
	array(
		"type" => "documentation",
		"text" => "<h3>Logo on Primary Header</h3>"
	),
	
	array(
		"name" => "Margin Top",
		"id" => "maple_logo_margin_top",
		"type" => "slider",
		"std" => "30px",
		"desc" => "Choose a top margin for your logo."
	),
	
	array(
		"name" => "Margin Left",
		"id" => "maple_logo_margin_left",
		"type" => "slider",
		"std" => "0px",
		"desc" => "Choose a left margin for your logo."
	),
	
	array(
		"name" => "Height",
		"id" => "maple_logo_height",
		"type" => "text",
		"desc" => "Insert the height of your logo (pixels).",
		"std"=>"18px"
	),
	
	array(
		"type" => "documentation",
		"text" => "<h3>Logo on Header After Scroll & Shrinked</h3>"
	),
	
	array(
		"name" => "Margin Top After Scroll",
		"id" => "maple_logo_after_scroll_margin_top",
		"type" => "slider",
		"std" => "18px",
		"desc" => "Choose a top margin for your logo."
	),
	
	array(
		"name" => "Margin Left After Scroll",
		"id" => "maple_logo_after_scroll_margin_left",
		"type" => "slider",
		"std" => "0px",
		"desc" => "Choose a left margin for your logo."
	),
	
	array(
		"name" => "Height",
		"id" => "maple_logo_reduced_height",
		"type" => "text",
		"desc" => "Insert the height of the header (pixels) after scroll.",
		"std" => "18px"
	),
	
	
	/* ------------------------------------------------------------------------*
	 * LOGO MOBILE OPTIONS
	 * ------------------------------------------------------------------------*/
	 
	 
	array(
		"type" => "documentation",
		"text" => "<h3>Mobile Logo on Primary Header </h3>"
	),
	
	array(
		"name" => "Margin Top",
		"id" => "mobile_maple_logo_margin_top",
		"type" => "slider",
		"std" => "18px",
		"desc" => "Choose a top margin for your logo."
	),
		
	array(
		"name" => "Height",
		"id" => "mobile_maple_logo_height",
		"type" => "text",
		"desc" => "Insert the height of your logo (pixels).",
		"std"=>"18px"
	),
	
	array(
		"type" => "documentation",
		"text" => "<h3>Mobile Logo on Header After Scroll & Shrinked</h3>"
	),
	
	array(
		"name" => "Margin Top After Scroll",
		"id" => "mobile_maple_logo_after_scroll_margin_top",
		"type" => "slider",
		"std" => "18px",
		"desc" => "Choose a top margin for your logo."
	),
	
	array(
		"name" => "Height",
		"id" => "mobile_maple_logo_reduced_height",
		"type" => "text",
		"desc" => "Insert the height of the header (pixels) after scroll.",
		"std" => "18px"
	),
	
	array(
		"type" => "documentation",
		"text" => "<h3>Intro Logo</h3>"
	),
	
	array(
		"name" => "Margin Top",
		"id" => "intro_maple_logo_margin_top",
		"type" => "slider",
		"std" => "5px"
	),
	
	array(
		"name" => "Margin Left",
		"id" => "intro_maple_logo_margin_left",
		"type" => "slider",
		"std" => "25px"
	),
	
	array(
		"name" => "Height",
		"id" => "intro_maple_logo_height",
		"type" => "text",
		"desc" => "Insert the height of the header (pixels) after scroll.",
		"std" => "18px"
	),
	
	
	
	array(
		"type" => "documentation",
		"text" => "<h3>Footer Logo</h3>"
	),
	
	array(
		"name" => "Margin",
		"id" => "footer_maple_logo_margin",
		"type" => "slider",
		"std" => "20px"
	),
	
	array(
		"name" => "Height",
		"id" => "footer_maple_logo_height",
		"type" => "text",
		"desc" => "Insert the height of the header (pixels) after scroll.",
		"std" => "18px"
	),
	
	array(
		"type" => "close"
	),
	
	/*close array*/
	
	array(
		"type" => "close"
	));
	
	maple_add_style_options($maple_style_general_options);
	
?>