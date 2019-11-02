<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DarkPress
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="card card-body comments-area">

	<?php
    // You can start editing here -- including this comment!
    if (have_comments()) :
        ?>
		<h2 class="comments-title">
			<?php
            $darkpress_comment_count = get_comments_number();
            if ('1' === $darkpress_comment_count) {
                printf(
                    /* translators: 1: title. */
                    esc_html__('One thought on &ldquo;%1$s&rdquo;', 'darkpress'),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf( // WPCS: XSS OK.
                    /* translators: 1: comment count number, 2: title. */
                    esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $darkpress_comment_count, 'comments title', 'darkpress')),
                    number_format_i18n($darkpress_comment_count),
                    '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
		</h2><!-- .comments-title -->

		<?php
		the_comments_navigation( array(
			'next_text' => esc_html__( 'Newer Comments', 'darkpress' ),
			'prev_text' => esc_html__( 'Older Comments', 'darkpress' ),
		) ); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'          => 'ul',
					'short_ping'     => true,
					'avatar_size'	 => 60,
					'callback'       => 'darkpress_comment'
				) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation( array(
			'next_text' => esc_html__( 'Newer Comments', 'darkpress' ),
			'prev_text' => esc_html__( 'Older Comments', 'darkpress' ),
		) );

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (! comments_open()) :
            ?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'darkpress'); ?></p>
			<?php
        endif;

    endif; ?>

	<?php if (comments_open()) : ?>
		<div class="darkpress-comment-form">
			<?php
                $darkpress_comment_field = '<div class="comment-form-textarea form-group col-md-12"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="form-control" placeholder="'. esc_attr__('Enter your comment...*', 'darkpress') .'"></textarea></div>';
                $darkpress_fields =  array(
                  'author' => '<div class="comment-form-author form-group col-md-4"><input id="author" placeholder="'. esc_attr__('Name *', 'darkpress') .'" name="author" type="text" value="' . esc_attr($commenter['comment_author']) .'" size="30" class="form-control" required /></div>',
                  'email'  => '<p class="comment-form-email form-group col-md-4"><input id="email" placeholder="'. esc_attr__('Email *', 'darkpress') .'" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) .'" size="30" class="form-control" required /></p>',
                  'url'    => '<p class="comment-form-url form-group col-md-4"><input id="url" placeholder="'. esc_attr__('Website', 'darkpress') .'" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) .'" size="30" class="form-control" /></p>',
                );

                comment_form(array(
                    'title_reply_before'   => '<h5 class="reply-title">',
                    'title_reply_after'    => '</h5>',
                    'title_reply'          => esc_html__('Leave a Reply', 'darkpress'),
                    'cancel_reply_link'    => esc_html__('Cancel', 'darkpress'),
                    'label_submit'         => esc_html__('Post Comment', 'darkpress'),
                    'class_submit'         => 'submit btn btn-primary comment-submit-btn',
                    'submit_field'         => '<div class="form-submit w-100 text-center">%1$s %2$s</div>',
                    'cancel_reply_before'  => '<small class="darkpress-cancel-reply">',
                    'class_form'           => 'comment-form row align-items-center',
                    'comment_notes_before' => '<div class="col-md-12 text-muted wb-comment-notes"><p>' . __('Your email address will not be published. Required fields are marked *', 'darkpress') . '</p></div>',
                    'comment_notes_after'  => '',
                    'comment_field'        => $darkpress_comment_field,
                    'fields'               => $darkpress_fields,
                ));
            ?>
		</div>
	<?php endif; ?>

</div><!-- #comments -->
