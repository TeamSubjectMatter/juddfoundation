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

<footer>
	<section class="footer-container">
		<div class="footer-left">
			<?php wp_nav_menu( array( 'menu' => 'Global Footer Left Navigation' ) ); ?>
		</div>
		<div class="footer-right">
			<?php wp_nav_menu( array( 'menu' => 'Global Footer Right Navigation' ) ); ?>
		</div>
	</section>
</footer>

<?php wp_footer(); ?>

</body>
</html>
