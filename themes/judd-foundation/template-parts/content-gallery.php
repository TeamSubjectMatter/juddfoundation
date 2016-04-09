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

<?php 
echo get_post_field( 'post_name', get_post() );
	// query custom post types based on page slug 
	query_posts( array( 
					
					'post_type' => array(get_post_field( 'post_name', get_post() ) ),
					'showposts' => 10
				 ) );
	while(have_posts()) : the_post(); 

	//get thumbnail URL
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
	$thumb_url = $thumb_url_array[0];
?>
	<div class="block-4">
		<a href="<?php the_permalink(); ?>" class="">
        	<img src="<?= $thumb_url; ?>">
			<div class="overlay">
				<p><?php the_title(); ?></p>
			</div>
        </a>
	</div>
<?php endwhile; ?>
</article>