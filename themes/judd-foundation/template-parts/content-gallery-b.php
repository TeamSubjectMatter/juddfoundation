<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package judd-foundation
 */

?>

<article id="post-<?php the_ID(); ?>" class="galleryViewB">
	<h1><?php the_title(); ?></h1>
	<?php echo wpautop($post->post_content);?>
</article>

<article>

<?php 
	// query custom post types based on page slug 
	query_posts( array( 
					'post_type' => array('spaces'),
					'posts_per_page' => -1,
				 ) );

	while(have_posts()) : the_post(); 	

	//get thumbnail URL
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
	$thumb_url = $thumb_url_array[0];
?>
	<div class="block-4">
		<a href="<?php the_permalink(); ?>" class="">
        	<div class="overlay-content">
				<p><?php the_title(); ?></p>
			</div>
			<div class="img-thumb" style="background:url('<?php echo $thumb_url; ?>');    background-size: cover;
						    background-repeat: no-repeat;
						    background-position: center center;">
						</div>
        </a>
	</div>
<?php endwhile; ?>
</article>