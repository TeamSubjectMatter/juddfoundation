<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package judd-foundation
 */
 if ( has_post_thumbnail()) {
$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
	$thumb_url = $thumb_url_array[0];
 }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail()) { ?>
    <a href="<?php the_permalink(); ?>"><div class="hero" style='background-image: url("<?php echo $thumb_url; ?>");'></div></a>
    <?php } ?>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php judd_foundation_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
            <?php 
            the_title( '<span class="screen-reader-text">"', '"</span>', false );
            the_excerpt(); ?>
	<p>
		<a href="<?php the_permalink(); ?>">Read More</a>
	</p>
            
		<?php
//			the_content( sprintf(
//				/* translators: %s: Name of current post. */
//				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'judd-foundation' ), array( 'span' => array( 'class' => array() ) ) ),
//				the_title( '<span class="screen-reader-text">"', '"</span>', false )
//			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'judd-foundation' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->


</article><!-- #post-## -->
