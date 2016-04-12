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

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<?php global $instagram_homepage_color_link; ?>
<style>
.instagramRandomColor a { color: <?php echo $instagram_homepage_color_link;?> !important; font-weight: bold; }
.ctaRandomColor p  { color: <?php echo $instagram_homepage_color_link;?> !important;  }
</style>
</head>

<?php if (has_post_thumbnail( ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'single-post-thumbnail' ); ?>
<?php endif; ?>

<body <?php body_class(); ?> style="background: url('<?php echo $image[0]; ?>') no-repeat center center fixed; background-size: cover;">
	<div class="overlay"></div>
	<div class="top-bar" class="ctaRandomColor"><?php echo the_content(); ?></div>
	<nav id="site-navigation" class="primary-navigation" role="navigation">
		<div class="menu-container">
			<?php wp_nav_menu( array( 'menu' => 'Primary Navigation', 'walker' => new Child_Wrap() ) ); get_search_form(); ?>
		</div>
		<!--<i class="fa fa-search"></i>
		<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
		<div><input type="text" size="18" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="Search" class="btn" />
		</div>
		</form>-->
	</nav><!-- #site-navigation -->