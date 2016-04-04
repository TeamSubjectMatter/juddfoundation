<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package judd-foundation
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php the_post_thumbnail(); ?>

	<section>
	
		<h1><?php the_title(); ?></h1>
	
		<div class="entry-content">
		<?php the_content(); ?>
		</div><!-- .entry-content -->

	</section>

</article>
