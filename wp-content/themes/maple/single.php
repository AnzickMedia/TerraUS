<?php
/**
 * @package WordPress
 * @subpackage Maple
 */

get_header(); maple_print_menu(); ?>
	
	<?php 
		if (have_posts()) {
			the_post(); 
			$maple_type = get_post_type();
			$maple_portfolio_permalink = get_option("maple_portfolio_permalink");
			switch ($maple_type){
				case "post":
					get_template_part('post-single', 'single');
				break;
				case $maple_portfolio_permalink:
					get_template_part('proj-single', 'single');
				break;
				default:
					the_content();
				break;
			}
		}
	?>
	
<?php get_footer(); ?>