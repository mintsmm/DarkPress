<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DarkPress
 */

?>

<article id="post-<?php the_ID(); ?>" class="card mb-4" <?php post_class(); ?>>
	<header class="card-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="card-title">', '</h1>' );
		else :
			the_title( '<h2 class="card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="card-meta">
				<?php darkpress_posted_on();?>
					<span class="card-divider ml-1 mr-1">|</span>
				<?php darkpress_posted_by(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php darkpress_post_thumbnail(); ?>

	<div class="card-body">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'darkpress' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="card-link">' . esc_html__( 'Pages:', 'darkpress' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="card-footer">
		<?php darkpress_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
