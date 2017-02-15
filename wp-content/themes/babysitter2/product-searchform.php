<form role="search" method="get" id="searchform" class="search-form clearfix" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<div class="input-group">
		<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="form-control" placeholder="<?php _e( 'Search for products', 'babysitter' ); ?>" />
		<div class="input-group-btn">
			<button class="btn btn-secondary btn-block"><i class="fa fa-search"></i></button>
		</div>
		<input type="hidden" name="post_type" value="product" />
	</div>
</form>