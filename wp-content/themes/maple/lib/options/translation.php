<?php

$maple_translation_options= array( array(
"name" => "Language Settings",
"type" => "title",
"img" => MAPLE_IMAGES_URL."icon_translate.png"
),

array(
"type" => "open",
"subtitles"=>array(array("id"=>"general", "name"=>"General"), array("id"=>"projects", "name"=>"Projects"), array("id"=>"blog", "name"=>"Blog"), array("id"=>"comment", "name"=>"Comments"), array("id"=>"search", "name"=>"Search"), array("id"=>"page404", "name"=>"404"))
),

/* ------------------------------------------------------------------------*
 * GENERAL TEXTS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'general'
),

array(
	"name" => "Breadcrumbs Home",
	"id" => "maple_breadcrumbs_home_text",
	"type" => "text",
	"std" => "Home"
),

array(
	"name" => "You are here text",
	"id" => "maple_you_are_here",
	"type" => "text",
	"std" => "You are here:"
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * PROJECTS TEXTS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'projects'
),

array(
"name" => "Next Project",
"id" => "maple_next_single_proj",
"type" => "text",
"std" => "Next Project"
),

array(
"name" => "Previous Project",
"id" => "maple_prev_single_proj",
"type" => "text",
"std" => "Previous Project"
),

array(
"name" => "Share Project Text",
"id" => "maple_share_proj_text",
"type" => "text",
"std" => "SHARE THIS PROJECT"
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * BLOG TEXTS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'blog'
),

array(
"name" => "Read more text",
"id" => "maple_read_more",
"type" => "text",
"std" => "read more"
),

array(
"name" => "Previous Post (Blogs/Archives)",
"id" => "maple_previous_text",
"type" => "text",
"std" => "Previous posts"
),

array(
"name" => "Next Post (Blogs/Archives)",
"id" => "maple_next_text",
"type" => "text",
"std" => "Next posts"
),

array(
"name" => "Previous Post (Single)",
"id" => "maple_single_previous_text",
"type" => "text",
"std" => "Previous post"
),

array(
"name" => "Next Post (Single)",
"id" => "maple_single_next_text",
"type" => "text",
"std" => "Next post"
),

array(
"name" => "By text",
"id" => "maple_by_text",
"type" => "text",
"std" => "by"
),

array(
"name" => "In text",
"id" => "maple_in_text",
"type" => "text",
"std" => "In"
),

array(
"name" => "Tags text",
"id" => "maple_tags_text",
"type" => "text",
"std" => "Tags"
),

array(
"name" => "Load More Posts text",
"id" => "maple_load_more_posts_text",
"type" => "text",
"std" => "Load More Posts"
),

array(
"name" => "No more posts text",
"id" => "maple_no_more_posts_text",
"type" => "text",
"std" => "No more posts to load."
),

array(
"name" => "Loading Posts text",
"id" => "maple_loading_posts_text",
"type" => "text",
"std" => "Loading posts..."
),

array(
"name" => "Share Post Text",
"id" => "maple_share_post_text",
"type" => "text",
"std" => "SHARE THIS"
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * COMMENTS TEXTS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'comment'
),


array(
"name" => "No comments text",
"id" => "maple_no_comments_text",
"type" => "text",
"std" => "No comments"
),

array(
"name" => "Comment text",
"id" => "maple_comment_text",
"type" => "text",
"std" => "comment"
),

array(
"name" => "Comments text",
"id" => "maple_comments_text",
"type" => "text",
"std" => "comments"
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * SEARCH TEXTS
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=>'search'
),

array(
"name" => "Search box text",
"id" => "maple_search_box_text",
"type" => "text",
"std" => "Find what you want..."
),

array(
"name" => "Search results text",
"id" => "maple_search_results_text",
"type" => "text",
"std" => "Search results for"
),

array(
"name" => "No results found text",
"id" => "maple_no_results_text",
"type" => "text",
"std" => "No results found."
),

array(
"name" => "Next results text",
"id" => "maple_next_results",
"type" => "text",
"std" => "Next results"
),

array(
"name" => "Previous results text",
"id" => "maple_previous_results",
"type" => "text",
"std" => "Previous results"
),

array(
"type" => "close"),


/* ------------------------------------------------------------------------*
 * 404
 * ------------------------------------------------------------------------*/

array(
"type" => "subtitle",
"id"=> "page404"
),

array(
	"name" => "Heading Text",
	"id" => "maple_404_heading",
	"type"=>"text",
	"std" => "Oops! There is nothing here..."
),

array(
	"name" => "Text",
	"id" => "maple_404_text",
	"type"=>"text",
	"std" => "It seems we can't find what you're looking for. Perhaps searching one of the links in the above menu, can help."
),

array(
	"name" => "Button Text",
	"id" => "maple_404_button_text",
	"type"=>"text",
	"std" => "GO TO HOMEPAGE"
),

array("type"=>"close"),


array(
"type" => "close"));

maple_add_options($maple_translation_options);