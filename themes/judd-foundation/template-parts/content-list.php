<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package judd-foundation
 */

?>

<article>
	<h1><?php the_title(); ?></h1>
</article>

<?php
echo "post type=" . get_post_field( 'post_name', get_post() ) ;
	// query custom post types based on page slug 
	query_posts( array( 
					'post_type' => array(get_post_field( 'post_name', get_post() ) )
				 ) );
	while(have_posts()) : the_post(); 
?>

	<img src="<?php echo $image; ?>" class="img-responsive" alt="" />

	<h2><?php echo $heading; ?></h2>

	<?php echo $text; ?>

			<p><a href="<?php echo $link; ?>">More<?php echo $more; ?></a></p>

		<?php endwhile; ?>
		
		</article>
		<div class="nav-previous alignleft"><?php next_posts_link( 'Previous Page' ); ?></div>
		<div class="nav-next alignright"><?php previous_posts_link( 'Next Page' ); ?></div>