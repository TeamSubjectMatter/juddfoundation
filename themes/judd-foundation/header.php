<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package judd-foundation
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="container">
		<div class="navigation-overlay">
			<nav id="site-navigation" class="primary-navigation" role="navigation">
				<div class="menu-container">
					<?php wp_nav_menu( array( 'menu' => 'Primary Navigation', 'walker' => new Child_Wrap() ) ); get_search_form(); ?>
				</div>
			</nav>
		</div>
		<header>
			<section class="header-container">
				<div class="header-left">
					<h1><a href="<?= home_url(); ?>"><span class="<?php the_field("logo_color"); ?>">JUDD</span></a> <?php the_field("site_section"); ?></h1>
				</div>
				<div class="header-right">
					<i class="fa fa-bars fa-3x"></i>
				</div>
			</section>
		</header>