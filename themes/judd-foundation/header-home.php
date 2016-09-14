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
<?php global $instagram_homepage_color_link; ?>
<?php global $random_link_color; ?>
<style>
.instagramRandomColor a { color: <?php echo $instagram_homepage_color_link;?> !important; font-weight: bold; }
.ctaRandomColor p a { color: <?php echo $instagram_homepage_color_link;?> !important;  }

</style>

<!-- Hotjar Tracking Code for http://juddfoundation.org/ -->

<script>
(function(h,o,t,j,a,r){
h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
h._hjSettings={hjid:278966,hjsv:5};
a=o.getElementsByTagName('head')[0];
r=o.createElement('script');r.async=1;
r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
a.appendChild(r);
})(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>

</head>

<?php if (has_post_thumbnail( ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'single-post-thumbnail' ); ?>
<?php endif; ?>

<body <?php body_class(); ?> style="background: url('<?php echo $image[0]; ?>') no-repeat center center fixed; background-size: cover;">
	<div class="overlay"  style="background-color: <?php echo $random_link_color ?>"></div>
	<!--<div class="top-bar" class="ctaRandomColor"><?php echo the_content(); ?></div>-->
	<nav id="site-navigation" class="primary-navigation" role="navigation">
		<div class="menu-container">
			<div class="logo"><i class="tsm-judd_logo"></i></div>
			<?php wp_nav_menu( array( 'menu' => 'Primary Navigation', 'walker' => new Child_Wrap() ) );?>
			<?php echo '<div class="right-menu">'; /*wp_nav_menu( array( 'menu' => 'Primary Right Navigation', 'walker' => new Child_Wrap() ) );*/get_search_form(); echo '</div>' ?>
		</div>
		<!--<i class="fa fa-search"></i>
		<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
		<div><input type="text" size="18" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="Search" class="btn" />
		</div>
		</form>-->
	</nav><!-- #site-navigation -->