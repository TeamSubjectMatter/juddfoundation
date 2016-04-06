<?php
/**
 * The template for displaying all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Single Column Utility 
 * @package judd-foundation
 */

get_header(); 

while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/content', 'hero' );
	get_template_part( 'template-parts/content', 'single-column' );

endwhile; // End of the loop.

get_footer();