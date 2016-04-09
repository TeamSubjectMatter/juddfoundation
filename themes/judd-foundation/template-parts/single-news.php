<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Single Content Page 
 * @package judd-foundation
 */

get_header(); 
echo get_page_template_slug( $post->ID ); 
while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/content', 'hero-carousel' );
	get_template_part( 'template-parts/content', 'single-content' );

endwhile; // End of the loop.

get_footer();