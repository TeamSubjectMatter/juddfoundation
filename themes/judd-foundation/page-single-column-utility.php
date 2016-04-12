<?php
/**
 * The template for displaying all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Single Column Utility 
 * @package judd-foundation
 */

get_header(); 

get_template_part( 'template-parts/content', 'hero-carousel' );
get_template_part( 'template-parts/content', 'single-column' );

get_footer();