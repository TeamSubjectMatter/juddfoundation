<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package judd-foundation
 */

?>
</div>
<?php
	global $random_link_color;
	$page = get_page_by_title( 'terms-and-conditions' );


?>

<style>
.instagramRandomColorFooter a { color: <?php echo $random_link_color;?> !important; font-weight: bold; }
</style>

<footer>
	<section class="footer-container">
		<nav id="site-navigation" class="global-foot-left-navigation" role="navigation">
			<?php wp_nav_menu( array( 'menu' => 'Global Footer Left Navigation' ) ); ?>
		</nav>
		<nav id="site-navigation" class="global-foot-right-navigation" role="navigation">
			<?php wp_nav_menu( array( 'menu' => 'Global Footer Right Navigation' ) ); ?>
		</nav>
	</section>
	<section class="footer-container pad10">
		<nav  class="global-foot-left-navigation-bottom" role="navigation">
			<!-- link to terms-and-conditions -->
      <a href="<?php echo get_page_link(3103); ?>">&copy; <?php echo date("Y"); ?> Judd Foundation</a>
		</nav>
		<nav id="site-navigation" class="global-foot-right-navigation" role="navigation">
			<?php wp_nav_menu( array( 'menu' => 'Global Footer Right icons' ) ); ?>
		</nav>
	</section>
</footer>

<?php wp_footer(); ?>
</body>
</html>
