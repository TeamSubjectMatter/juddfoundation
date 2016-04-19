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
	</header>
	<section class="block-1">	
	<?php 
	// query custom post types based on page slug 
	query_posts( array( 
					'post_type' => array('Pressroom Content'),
					'posts_per_page' => -1,
				 ) );

	while(have_posts()) : the_post(); 
		
		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail', true);
		$thumb_url = $thumb_url_array[0];
	?>


		<div class="block-3">
			<div class="img-contain">
				<a href="<?= $thumb_url; ?>"  rel="lightbox" title="<?php the_content();?><?php echo get_sub_field('copyright');?>" data-download="<?php echo get_field('file');?>">
		        	<div class="img-thumb" style="background:url(' <?php echo $thumb_url;?>'); background-size: cover; background-repeat: no-repeat; background-position: center center;">
					</div>
					<div class="overlay-content">
						<p><?php the_title(); ?></p>
					</div>
		        </a>
		    </div>
		</div>


	<?php endwhile;?>
	</section>
</article>