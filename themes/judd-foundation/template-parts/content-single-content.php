<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package judd-foundation
 */

?>

<article id="post-<?php the_ID(); ?>" class="singleContent">

	<section class="page-content-area">
		<h1><?php the_title(); ?></h1>
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
		<!-- For Spaces -->
		<?php if (the_field('location')): ?>
		<p><?php the_field('location'); ?></p>
		<?php endif; ?>

		<?php echo wpautop($post->post_content); ?>

	</section>

	<section class="right-sidebar">
	<?php if( have_rows('sidebar_content_blocks') ): ?>
		<ul>
		<?php while( have_rows('sidebar_content_blocks') ): the_row();  ?>

			<li class="thumbs">

		  		<?php $post_object = get_sub_field('sidebar_post'); ?> 
                <?php if( $post_object ): ?>
                    <?php $post = $post_object; setup_postdata( $post ); ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); ?>
                    <a class="right-side-images" href="<?php the_permalink(); ?>">
						<div class="overlay-content">
							<p><?php the_title(); ?></p>
						</div>
						<div class="img-thumb" style="background:url('<?php echo $image[0]; ?>');    background-size: cover;
						    background-repeat: no-repeat;
						    background-position: center center;">
						</div>
					</a>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
			</li>
		<?php endwhile; ?>
		</ul>
		<div class="right-sidebar-content"><?php get_field("right_side_bar_content")?></div>
	<?php endif; ?>
   </section>
</article>