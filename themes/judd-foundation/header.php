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
<!-- ADD FAVICON PACKAGE -->
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/android-icon-48x48.png" sizes="48x48">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/android-icon-72x72.png" sizes="72x72">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/android-icon-144x144.png" sizes="144x144">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/android-icon-192x192.png" sizes="192x192">
<link rel="Shortcut Icon" href="' . get_stylesheet_directory_uri() . '/images/favicon/favicon.ico" type="image/x-icon" />
<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/ms-icon-70x70.png">
<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/ms-icon-144x144.png">
<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/ms-icon-150x150.png">
<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri() ?>/images/favicon/ms-icon-310x310.png">
<!-- END FAVICON PACKAGE -->
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/favicon.ico" />
<?php wp_head(); ?>

<?php global $random_link_color; ?>

</head>

<body <?php body_class(); ?>>
	<div class="container">
		<div class="navigation-overlay" style="background-color: <?php echo $random_link_color ?>">
			<nav id="site-navigation" class="primary-navigation" role="navigation">
				<div class="menu-container">
					<div class="close"><i class="fa fa-bars fa-3x"></i></div>
					<?php wp_nav_menu( array( 'menu' => 'Primary Navigation', 'walker' => new Child_Wrap() ) ); ?>
					<?php echo '<div class="right-menu">'; /*wp_nav_menu( array( 'menu' => 'Primary Right Navigation', 'walker' => new Child_Wrap() ) );*/get_search_form(); echo '</div>' ?>
				</div>
			</nav>
		</div>
		<header>
			<section class="header-container">
				<div class="header-left">
					<h1>
						<a href="<?= home_url(); ?>">
                                                   <i class="tsm-judd_logo"></i> 
						</a> 
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

							if ($post) {

								$parentID = $post->post_parent; 
								$post_type = get_post_type_object( get_post_type($post) );
								$pageTemplate = get_page_template();

								$pageArray = explode("/", $pageTemplate); 

								$pageTemplate = end($pageArray);
								if($post_type->label !== 'Pages'){
									//echo "/ " . $post_type->label;
									if('programs' == get_post_type()){
										echo "<a class= 'parent-link' href=\"".get_site_url()."/foundation/programs/\"><span class='breaker'>". $post_type->label.  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></a>"."";
									}
									else if('spaces' == get_post_type()){
										echo "<a class= 'parent-link' href=\"".get_site_url()."/spaces\"><span class='breaker'>". $post_type->label. "</span></a>";
									}
								} else
								if($parentID != null && $parentID != 0){
									echo "<a class= 'parent-link' href=\"" . get_the_permalink($post->post_parent) . "\"><span class='breaker'>". get_the_title( $post->post_parent ) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>"."";
								} else {
									echo ""; // "<class= 'parent-link' href=\"" . get_the_permalink($post->ID) . "\"><span class='breaker'>". get_the_title( $post->ID ) . "</span>";
								}		
							}				
						?>
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
		