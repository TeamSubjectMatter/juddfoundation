<?php
/**
 * The template for displaying all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Template Name: No hero
 * @package judd-foundation
 */

get_header(); 

get_template_part( 'template-parts/content', 'short-hero' );
get_template_part( 'template-parts/content', 'single-column' );

get_footer();