<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package judd-foundation
 */

get_header(); 

while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/content', 'hero' );
	get_template_part( 'template-parts/content', 'search' );

endwhile; 

get_footer();