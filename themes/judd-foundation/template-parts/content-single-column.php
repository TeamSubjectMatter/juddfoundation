<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package judd-foundation
 */

?>

<article id="post-<?php the_ID(); ?>" class="singleColumn">
	<header>
		<h1><?php the_title(); ?></h1>
		<h2><?php the_content(); ?></h2>
	</header>
	
	<?php while( have_rows('content_blocks') ): the_row(); ?>

	<section class="block-1">
		<h3><?= get_sub_field('title'); ?></h3>
		<h4><?= get_sub_field('content'); ?></h4>
	</section>

	<?php endwhile; ?>

</article>