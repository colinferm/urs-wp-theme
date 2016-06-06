<?php
get_header();
the_post();

if (in_category('podcast')) {
	get_template_part('single','podcast');
} else {
	get_template_part('single','basic');
}
	
get_footer();
?>
