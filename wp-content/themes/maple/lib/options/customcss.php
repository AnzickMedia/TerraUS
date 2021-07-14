<?php
	
	$maple_general_options= array( array(
		"name" => "Custom CSS",
		"type" => "title",
		"img" => MAPLE_IMAGES_URL."icon_general.png"
	),
	
	array(
		"type" => "open",
		"subtitles"=>array(array("id"=>"customcss", "name"=>"Custom CSS"))
	),
	
	
	
	/* ------------------------------------------------------------------------*
	 * CUSTOM CSS
	 * ------------------------------------------------------------------------*/
	
	array(
		"type" => "subtitle",
		"id"=>'customcss'
	),
	
	array(
		"type" => "documentation",
		"text" => "You can use this textarea to add your custom CSS. This will be loaded last so it will override the other CSS from the theme. Tags will be striped."
	),
	
	array(
		"name" => "Apply Custom CSS",
		"id" => "enable_custom_css",
		"type" => "checkbox",
		"std" => "on"
	),
	
	array(
		"id" => "maple_custom_css",
		"type" => "textarea",
		"params" => "maple_rich_editor"
	),
			
	array(
		"type" => "close"
	));
	
	maple_add_options($maple_general_options);
	
?>