<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package judd-foundation
 */

?>
<?php get_page_children( $page_id, $pages ) ?>



<article id="page-<?php the_ID(); ?>" class="twoColumn">
	<!--<h2><?php the_title(); ?></h2>-->
	<div class="column-one">
		<?php the_field('column_1_text'); ?>
	</div>

	<div class="column-two">
		<?php the_field('column_2_text'); ?>
	</div>
</article>