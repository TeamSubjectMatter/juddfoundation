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
<?php global $random_color_link; echo $random_color_link;?>
<footer>
	<section class="footer-container">
		<nav id="site-navigation" class="global-foot-left-navigation" role="navigation">
			<?php wp_nav_menu( array( 'menu' => 'Global Footer Left Navigation' ) ); ?>
		</nav>
		<nav id="site-navigation" class="global-foot-right-navigation" role="navigation">
			<?php wp_nav_menu( array( 'menu' => 'Global Footer Right Navigation' ) ); ?>
		</nav>
	</section>
</footer>

<?php wp_footer(); ?>
asdf
</body>
</html>
