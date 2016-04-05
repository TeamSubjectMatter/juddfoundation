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

	<?php the_content(); ?>

</article>

<article>
	<div class-"gallery-view">
	<?php if( have_rows('gallery_view') ): ?>
    <?php while ( have_rows('gallery_view') ) : the_row(); ?>  
		<?php $post_object = get_sub_field('gallery_item'); ?>
        <?php if( $post_object ): ?>
        <?php $post = $post_object; setup_postdata( $post ); ?>
        <a href="<?php the_permalink(); ?>" class="">
        <?php the_post_thumbnail('', array('class' => 'img-responsive')); ?></a>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
	<?php endwhile; ?>
    <?php endif; ?>
	</div>
</article>



