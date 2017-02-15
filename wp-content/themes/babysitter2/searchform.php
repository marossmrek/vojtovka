<!-- Searchform -->
<form method="get" class="search-form clearfix" action="<?php echo home_url(); ?>" >
	<div class="input-group">
		<input id="s" type="text" name="s" onfocus="if(this.value==''){this.value=''};" 
		onblur="if(this.value==''){this.value=''};" class="form-control" value="" placeholder="<?php _e( 'Search...', 'babysitter' ); ?>">
		<div class="input-group-btn">
			<button class="btn btn-secondary btn-block"><i class="fa fa-search"></i></button>
		</div>
	</div>
</form>
<!-- /Searchform -->