<?php
/**
 * Template Name: Section Landing 
 * @package judd-foundation
 */

get_header(); 
	
while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/content', 'hero' );
	get_template_part( 'template-parts/content', 'landing' );
endwhile; 

get_footer();
