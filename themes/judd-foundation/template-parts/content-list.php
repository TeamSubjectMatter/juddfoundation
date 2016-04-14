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
<?php //global $random_link_color; ?>
<?php
// query custom post types based on page slug 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( array( 
				'post_type' => array(get_post_field( 'post_name', get_post() )),
				'posts_per_page'=>3,
				'paged' => $paged 
			 ) );
while(have_posts()) : the_post(); 
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
	$thumb_url = $thumb_url_array[0];
?>
<article>
	<div class="hero" style='background-image: url("<?php echo $thumb_url; ?>");'></div>

	<h2><?php the_title(); ?></h2>
	<p><?php echo get_field('date'); $
	$id =get_the_ID(); 
	$term_list= wp_get_post_terms($post->ID, 'programs');
	if($term_list):
		echo 'category';
	print_r($term_list);
	else: 
		echo 'none';
	endif;

	foreach($term_list as $term_single) {
echo $term_single->name; //do something here
}
	?></p>
	<?php the_excerpt(); ?>
	<p>
		<a href="<?php the_permalink(); ?>">Read More</a>
	</p>


</article>
<?php endwhile; ?>

<div class="pagination">
	<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
	<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
</div>