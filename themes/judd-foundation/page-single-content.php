<?php
/**
 * Template Name: Single Content
 * 
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.

 *
 * @link https://codex.wordpress.org/Template_Hierarchy

 * @package judd-foundation
 */

get_header(); 

get_template_part( 'template-parts/content', 'hero-carousel' );
get_template_part( 'template-parts/content', 'single-content' );

get_footer();