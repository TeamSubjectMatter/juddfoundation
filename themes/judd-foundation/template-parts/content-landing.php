<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package judd-foundation
 */

?>

<article id="page-<?php the_ID(); ?>" class="sectionLanding">
	<header>
		<h1><?php the_title(); ?></h1>
		<h2><?php the_content(); ?></h2>
	</header>
	
	<?php while( have_rows('content_blocks') ): the_row(); ?>
	<section class="block-3">
		<a href="<?php echo get_sub_field('link');?>"><img src="<?= get_sub_field('image'); ?>" class="img-responsive" alt="<?= "" ?>" /></a>
		<h3><?= get_sub_field('heading'); ?></h3>
		<h4><?= get_sub_field('text'); ?></h4>
		<h5><a href="<?php echo get_sub_field('link');?>" class="gold">Read More</a></h5>
	</section>
	<?php endwhile; ?>

</article>