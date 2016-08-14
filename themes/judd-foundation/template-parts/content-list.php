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

<!-- News page filters posts using url query -->
<?php if(get_post( $post )->post_name == 'news') : 
	$type_filter = get_query_var( 'filter' );?>
	<article id="post-<?php the_ID(); ?>" class="nav-3">
		<div>
			<p class="label">Sort By</p>
			<ul class="dropdown">
				<p id="title">News Type:</p>
				<a href="<?php the_permalink(); ?>" style="text-decoration:none;"><li class="dropdown-list">All</li></a>
					<?php $terms= get_terms('news_type');
				  	foreach ( $terms as $term ) {
							echo '<a href="'.get_permalink().'?filter='.$term->slug.'" style="text-decoration:none;"><li class="dropdown-list">'.$term->name.'</li></a>';
						}
					?>
			</ul>
		</div>
	</article>
<?php endif; ?>

<?php //global $random_link_color; ?>
<?php
// posts_per_page and filtering depending on page name
if(get_post( $post )->post_name == 'programs'){
	$args = array( 
					'post_type' => array(get_post_field( 'post_name', get_post() )),
					'posts_per_page'=> 10,
					'paged' => $paged 
				 );
} else if(get_post( $post )->post_name == 'news'){
	$args = array( 
					'news_type' => $type_filter,
					'post_type' => array(get_post_field( 'post_name', get_post() )),
					'posts_per_page'=> 3,
					'paged' => $paged 
				 );
} else {
	$args = array( 
					'post_type' => array(get_post_field( 'post_name', get_post() )),
					'posts_per_page'=> 3,
					'paged' => $paged 
				 );
}

// query custom post types based on page slug 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( $args );
while(have_posts()) : the_post(); 
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
	$thumb_url = $thumb_url_array[0];
?>
<article>
	<a href="<?php the_permalink(); ?>"><div class="hero" style='background-image: url("<?php echo $thumb_url; ?>");'></div></a>

	<h2><?php the_title(); ?></h2>
	<p><strong><?php 
        if(get_field('date_location_time')){
        echo get_field('date_location_time') . " | ";
        }
	$term_list= wp_get_post_terms($post->ID, 'program_type');

	$i = 0;
	foreach($term_list as $term_single) {
		if($i > 1) 
			echo ", ";
		echo $term_single->name . " "; //do something here
		$i++;
	}
	?></strong></p>
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