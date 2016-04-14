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
	
	<p class="label">Sort By</p>
	<ul class="dropdown">
		<p id="title">Art Type:</p>
		<li class="dropdown-list"><a href="#">All</a></li>
			<?php $terms= get_terms('art_type');
			  foreach ( $terms as $term ) {
				echo '<li class="dropdown-list" data-filter=".'.$term->name.'"><a href="#">'.$term->name.'</a></li>';
			}
			?>
	</ul>
		<?php 
			$args = array(
				'post_parent' => get_the_ID(),
				'post_status' => 'publish'
				);
			$child_page = get_children( $args);
			if($child_page):
				echo '<div class="sub-nav">';
					foreach($child_page as $child){
						$childID = $child->ID;
						echo '<h2 class="breadcrum"><a class="nav" href="'.get_the_permalink($childID).'"';
						if($childID == $post->ID){
							echo "current";
						} 
						echo '>' .get_the_title($childID).'</a></h2>';
					}
				echo '</div>';
			endif;
		?>
</article>
<article class="grid">

<?php 
	// query custom post types based on page slug 
	query_posts( array( 
					'post_type' => array(get_post_field( 'post_name', get_post() ) ),
					'posts_per_page' => -1,
					'orderby'        => 'iconic rand',
					'order'			 => 'DESC'
				 ) );
	while(have_posts()) : the_post(); 

	//get thumbnail URL
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail', true);
	$thumb_url = $thumb_url_array[0];
	
	$id=get_the_ID();
	$terms = get_the_terms( $id , 'art_type' );
	
?>
	<div class="block-4 grid-item <?php  foreach ( $terms as $term ) {echo $term->name;}?>">
			<a href="<?= $thumb_url; ?>"  rel="lightbox" title="<?php the_content();?><?php echo get_field('copyright');?>">
	        	<img src="<?= $thumb_url; ?>">
				<div class="overlay-content">
					<p><?php the_title(); ?><br/><?php echo get_field('date') ?></p>
					
				</div>
	        </a>
	</div>
<?php endwhile; ?>
</article>