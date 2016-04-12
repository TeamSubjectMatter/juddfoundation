<?php
/**
 * Template Name: Section Landing 
 * @package judd-foundation
 */

get_header(); 
	
while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/content', 'hero-carousel' );
	get_template_part( 'template-parts/content', 'landing' );
endwhile; 
//get footer
get_footer();
