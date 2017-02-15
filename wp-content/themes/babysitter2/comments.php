<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Babysitter
 */

global $babysitter_data; 

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="reply-title">
			<?php
				printf( _nx( '1 comment', '%1$s comments', get_comments_number(), 'comments title', 'babysitter' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'babysitter' ); ?></h1>
			<div class="clearfix">
				<p class="nav-previous pull-left"><?php previous_comments_link( __( '&larr; Older Comments', 'babysitter' ) ); ?></p>
				<p class="nav-next pull-right"><?php next_comments_link( __( 'Newer Comments &rarr;', 'babysitter' ) ); ?></p>
			</div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php wp_list_comments('type=all&callback=babysitter_comments'); ?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'babysitter' ); ?></h1>
			<div class="clearfix">
				<p class="nav-previous pull-left"><?php previous_comments_link( __( '&larr; Older Comments', 'babysitter' ) ); ?></p>
				<p class="nav-next pull-right"><?php next_comments_link( __( 'Newer Comments &rarr;', 'babysitter' ) ); ?></p>
			</div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
	?>
		<div class="alert alert-info no-comments"><?php _e( 'Comments are closed.', 'babysitter' ); ?></div>
	<?php endif; ?>

	<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$comments_args = array(
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'title_reply'          => __( 'Leave a Reply', 'babysitter' ),
			'title_reply_to'       => __( 'Leave a Reply to %s', 'babysitter' ),
			'cancel_reply_link'    => __( 'Cancel Reply', 'babysitter' ),
			'label_submit'         => __( 'Post Comment', 'babysitter' ),

			'comment_field'        =>  '<p class="comment-form-comment form-group"><label for="comment">' . __( 'Comment', 'babysitter' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" class="form-control" aria-required="true">' .
			'</textarea></p>',

			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'must_log_in'          => '<div class="alert alert-warning">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), get_permalink($babysitter_data['babysitter__blog-login-page']) ) . '</div>',

			'fields' => apply_filters( 'comment_form_default_fields', array(

				'author' =>
					'<div class="row">' .
					'<div class="col-md-6">' .
					'<p class="comment-form-author form-group form-grop__icon"><i class="entypo user"></i>' .
					'<label for="author">' . __( 'Name', 'babysitter' ) . '</label> ' .
					( $req ? '<span class="required">*</span>' : '' ) .
					'<input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30"' . $aria_req . ' /></p>' .
					'</div>' .
					'</div>',

				'email' =>
					'<div class="row">' .
					'<div class="col-md-6">' .
					'<p class="comment-form-email form-group form-grop__icon"><i class="entypo mail"></i><label for="email">' . __( 'Email', 'babysitter' ) . '</label> ' .
					( $req ? '<span class="required">*</span>' : '' ) .
					'<input id="email" name="email" type="text" class="form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) .
					'" size="30"' . $aria_req . ' /></p>' .
					'</div>' .
					'</div>',

				'url' =>
					'<div class="row">' .
					'<div class="col-md-6">' .
					'<p class="comment-form-email form-group form-grop__icon"><i class="entypo globe"></i><label for="url">' . __( 'Website', 'babysitter' ) . '</label> ' .
					'<input id="url" name="url" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) .
					'"/></p>' .
					'</div>' .
					'</div>',
				)
			),
		);
		comment_form($comments_args);
	?>

</div><!-- #comments -->