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
					<h1>
						<a href="<?= home_url(); ?>">
						<span class="<?php the_field("logo_color"); ?>">JUDD</span>
						</a> 
						<?php the_field("site_section"); ?>
						<?php
						$parentID = $post->post_parent; 
						$post_type = get_post_type_object( get_post_type($post) );
						if($post_type->label !== 'Pages'){
							echo $post_type->label;
							} 
						if($parentID):
							echo get_the_title( $post->post_parent );
						endif;
						?>
					</h1>
				</div>
				<div class="header-right">
					<i class="fa fa-bars fa-3x"></i>
				</div>

				<div class="sub-nav">				
					<?php 
					$parentID = $post->post_parent;
					if($parentID):
						$args = array(
							'post_parent' => $post->post_parent,
							'post_status' => 'publish'
							);
						$child_page = get_children( $args);
						foreach($child_page as $child){
							$childID = $child->ID;
							echo '<h2 class="breadcrum"><a href="'.get_the_permalink($childID).'" class=';
							if($childID == $post->ID){
								echo "current";
							} 
							echo '>' .get_the_title($childID).'</a></h2>';
						}
						endif;?>
				</div>	
					<div class="sub-nav">				
					<?php 
						$args = array(
							'post_parent' => $post->ID,
							'post_status' => 'publish'
							);
						$child_page = get_children( $args);
						foreach($child_page as $child){
							$childID = $child->ID;
							echo '<h2 class="breadcrum"><a href="'.get_the_permalink($childID).'" class=';
							if($childID == $post->ID){
								echo "current";
							} 
							echo '>' .get_the_title($childID).'</a></h2>';
						}
?>
				</div>
			</section>
		</header>