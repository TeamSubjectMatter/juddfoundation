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
	<h1><?php the_title(); ?></h1>
</article>

<article>
	<div class="column-one">
		<?php the_field('column_1_text'); ?>
	</div>

	<div class="column-two">
		<?php the_field('column_2_text'); ?>
	</div>
</article>