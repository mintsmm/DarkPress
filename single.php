<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DarkPress
 */

get_header();
?>

<div class="container mt-4">
	<div class="row">
		<div class="col-md-8">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">

				<?php
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', get_post_type());

                    ?>

					<div class="card card-body mb-4">
						<?php

                        the_post_navigation(array(
                            'prev_text' => esc_html__('&laquo; Previous Post', 'darkpress'),
                            'next_text' => esc_html__('Next Post &raquo;', 'darkpress'),
                        ));
                        
                        ?>
					</div>
					
					<?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

	

<?php

get_footer();
