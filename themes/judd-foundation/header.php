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

<?php global $random_link_color; ?>

</head>

<body <?php body_class(); ?>>
	<div class="container">
		<div class="navigation-overlay">
			<nav id="site-navigation" class="primary-navigation" role="navigation">
				<div class="menu-container">
					<?php wp_nav_menu( array( 'menu' => 'Primary Navigation', 'walker' => new Child_Wrap() ) );?>
					<?php echo '<div class="right-menu">'; wp_nav_menu( array( 'menu' => 'Primary Right Navigation', 'walker' => new Child_Wrap() ) );get_search_form(); echo '</div>' ?>
				</div>
			</nav>
		</div>
		<header>
			<section class="header-container">
				<div class="header-left">
					<h1>
						<a href="<?= home_url(); ?>">
						<span style="color: <?php echo $random_link_color ?>;">JUDD</span> 
						</a> 
						<?php

							if ($post) {

								$parentID = $post->post_parent; 
								$post_type = get_post_type_object( get_post_type($post) );
								$pageTemplate = get_page_template();

								$pageArray = explode("/", $pageTemplate); 

								$pageTemplate = end($pageArray);
								if($post_type->label !== 'Pages'){
									//echo "/ " . $post_type->label;
									if('programs' == get_post_type()){
										echo "<a class= 'parent-link' href=\"".get_site_url()."/foundation/programs/\">/ ". $post_type->label."</a>";
									}
									else if('spaces' == get_post_type()){
										echo "<a class= 'parent-link' href=\"".get_site_url()."/space\">/ ". $post_type->label."</a>";
									}
								} else
								if($parentID != null && $parentID != 0){
									echo "<a class= 'parent-link' href=\"" . get_the_permalink($post->post_parent) . "\"> / ". get_the_title( $post->post_parent ) . "</a>";
								} else {
									echo "<a class= 'parent-link' href=\"" . get_the_permalink($post->ID) . "\"> / ". get_the_title( $post->ID ) . "</a>";
								}		
							}				
						?>
					</h1>
				</div>
				<div class="header-right">
					<i class="fa fa-bars fa-3x"></i>
				</div>

				
				<?php
					//don't do this for the Donald Judd > Art Page or the search results page 
					if (!is_search() &&  $post->ID != 104):
				?>
				<div class="sub-nav">				
					<?php 

					if($post) {
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
						endif;
					}
					?>
				</div>
				<?php endif;?>	
			</section>
		</header>
		