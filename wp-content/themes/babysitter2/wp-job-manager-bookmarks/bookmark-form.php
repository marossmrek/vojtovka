<?php global $wp; ?>

<form method="post" action="<?php echo defined( 'DOING_AJAX' ) ? '' : esc_url( remove_query_arg( array( 'page', 'paged' ), add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) ) ); ?>" class="job-manager-form wp-job-manager-bookmarks-form">

	<?php if ( $is_bookmarked ) : ?>
		<div><a class="remove-bookmark" href="<?php echo wp_nonce_url( add_query_arg( 'remove_bookmark', absint( $post->ID ), get_permalink() ), 'remove_bookmark' ); ?>"><?php _e( 'Remove Bookmark', 'babysitter' ); ?></a> <a class="bookmark-notice bookmarked" href="#"><?php printf( __( 'This %s is bookmarked!', 'babysitter' ), $post_type->labels->singular_name ); ?></a></div>
	<?php else : ?>
		<div><a class="bookmark-notice" href="#"><?php printf( __( 'Bookmark This %s', 'babysitter' ), ucwords( $post_type->labels->singular_name ) ); ?></a></div>
	<?php endif; ?>

	<div class="bookmark-details">
		<p>
			<label for="bookmark_notes"><?php _e( 'Notes:', 'babysitter' ); ?></label><textarea name="bookmark_notes" class="form-control" id="bookmark_notes" cols="25" rows="3"><?php echo esc_textarea( $note ); ?></textarea>
		</p>
		<p>
			<?php wp_nonce_field( 'update_bookmark' ); ?>
			<input type="hidden" name="bookmark_post_id" value="<?php echo absint( $post->ID ); ?>" />
			<input type="submit" class="btn btn-secondary btn-sm" name="submit_bookmark" value="<?php echo $is_bookmarked ? __( 'Update Bookmark', 'babysitter' ) : __( 'Add Bookmark', 'babysitter' ); ?>" />
		</p>
	</div>
</form>