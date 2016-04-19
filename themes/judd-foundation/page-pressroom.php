<?php
/**
 * The template for displaying all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Press Room
 * @package judd-foundation
 */

get_header(); 

get_template_part( 'template-parts/content', 'hero' );
get_template_part( 'template-parts/content', 'pressroom' );

get_footer();

