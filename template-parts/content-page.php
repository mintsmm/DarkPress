<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DarkPress
 */

?>

<article id="post-<?php the_ID(); ?>" class="card mb-4" <?php post_class(); ?>>
	<header class="card-header">
		<?php the_title( '<h1 class="card-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php darkpress_post_thumbnail(); ?>

	<div class="card-body">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="card-link">' . esc_html__( 'Pages:', 'darkpress' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="card-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'darkpress' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
