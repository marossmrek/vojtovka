<?php 
global $babysitter_data; 

$page_header_parallax       = "";
$page_header_parallax_ratio = $babysitter_data['babysitter__page-header-parallax-ratio'];
if ($babysitter_data['babysitter__page-header-parallax-bg'] == 1) {
	$page_header_parallax = 'data-stellar-background-ratio="'.$page_header_parallax_ratio.'"';
}

// Page Heading on Single Job Page
if ( isset( $babysitter_data['babysitter__page-heading-single-job'] ) ) {
	$page_heading_on_single_job = $babysitter_data['babysitter__page-heading-single-job'];
} else {
	$page_heading_on_single_job = 1;
}

// Page Heading on Single Resume Page
if ( isset( $babysitter_data['babysitter__page-heading-single-resume'] ) ) {
	$page_heading_on_single_resume = $babysitter_data['babysitter__page-heading-single-resume'];
} else {
	$page_heading_on_single_resume = 1;
}

$page_heading_class = '';
if ( ( is_singular('job_listing') && $page_heading_on_single_job == 0 ) || ( is_singular('resume') && $page_heading_on_single_resume == 0 ) ) {
	$page_heading_class = 'hidden';
}
?>


<div class="page-heading" <?php echo esc_html( $page_header_parallax ) . esc_html( $page_heading_class ); ?>>
	<div class="container">

		<div class="row">
			<div class="col-md-6">

				<?php 
				// check for WooCommerce. If true, load WooCommerce custom layout
				if (class_exists('woocommerce') && ((is_woocommerce() == "true") || (is_checkout() == "true") || (is_cart() == "true") || (is_account_page() == "true") )){ ?>
				
				<h1>
					<?php if ( is_search() ) : ?>
						<?php printf( __( 'Search Results: &ldquo;%s&rdquo;', 'babysitter' ), get_search_query() ); ?>
					<?php elseif ( is_tax() ) : ?>
						<?php echo single_term_title( "", false ); ?>
					<?php elseif ( is_shop() ) : ?>
						<?php
							$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );

							echo apply_filters( 'the_title', ( $shop_page_title = get_option( 'woocommerce_shop_page_title' ) ) ? $shop_page_title : $shop_page->post_title );
						?>
					<?php else : ?>
						<?php the_title(); ?>
					<?php endif; ?>
					<?php if ( get_query_var( 'paged' ) ) : ?>
						<?php printf( __( '&nbsp;&ndash; Page %s', 'babysitter' ), get_query_var( 'paged' ) ); ?>
					<?php endif; ?>
				</h1>
				
				<?php // Standard Heading
				} else { ?>

					<?php if(is_home()){ ?>
						<h1><?php echo $babysitter_data['opt-blog-title']; ?></h1>
					<?php } elseif(is_search()) { ?>
						<h1><?php echo sprintf( __( '%s Search Results for ', 'babysitter' ), $wp_query->found_posts ); echo '<span>"' . get_search_query() . '"</span>'; ?></h1>
					
					<?php } elseif ( is_author() ) { ?>
						<?php 
							global $author;
							$userdata = get_userdata($author);
						?>
							<h1><?php echo $userdata->display_name; ?></h1>
							
					<?php } elseif ( is_404() ) { ?>
						<h1><?php printf( __( 'Page not found', 'babysitter' )); ?></h1>
					
					<?php } elseif ( is_category() ) { ?>
						<h1><?php printf( __( 'Category Archives: %s', 'babysitter' ), '<span>"' . single_cat_title( '', false ) . '"</span>' ); ?></h1>
						
					<?php } elseif ( is_tax('portfolio_category') ) { ?>
						<h1><?php $terms_as_text = get_the_term_list( $post->ID, 'portfolio_category', '', ', ', '' ) ;
						echo strip_tags($terms_as_text); ?></h1>

					<?php } elseif ( is_tax('job_listing_category') ) { ?>
						<?php $taxonomy = get_taxonomy( get_queried_object()->taxonomy ); ?>
					<?php if( $taxonomy ) : ?>
						<h1><?php echo esc_attr( $taxonomy->labels->singular_name ); ?>: '<?php echo single_cat_title( '', false ); ?>'</h1>
					<?php endif; ?>

					<?php } elseif ( is_tax('job_listing_type') ) { ?>
						<?php $taxonomy = get_taxonomy( get_queried_object()->taxonomy ); ?>
					<?php if( $taxonomy ) : ?>
						<h1><?php echo esc_attr( $taxonomy->labels->singular_name ); ?>: '<?php echo single_cat_title( '', false ); ?>'</h1>
					<?php endif; ?>

					<?php } elseif ( is_tax('resume_category') ) { ?>
						<?php $taxonomy = get_taxonomy( get_queried_object()->taxonomy ); ?>
					<?php if( $taxonomy ) : ?>
						<h1><?php echo esc_attr( $taxonomy->labels->singular_name ); ?>: '<?php echo single_cat_title( '', false ); ?>'</h1>
					<?php endif; ?>

					<?php } elseif ( is_tax('resume_skill') ) { ?>
						<?php $taxonomy = get_taxonomy( get_queried_object()->taxonomy ); ?>
					<?php if( $taxonomy ) : ?>
						<h1><?php echo esc_attr( $taxonomy->labels->singular_name ); ?>: '<?php echo single_cat_title( '', false ); ?>'</h1>
					<?php endif; ?>

					<?php } elseif ( is_post_type_archive('job_listing') ) { ?>
						<h1><?php printf( __( 'All Jobs', 'babysitter' )); ?></h1>

					<?php } elseif ( is_post_type_archive('resume') ) { ?>
						<h1><?php printf( __( 'All Resumes', 'babysitter' )); ?></h1>
					
					<?php } elseif ( is_day() ) { ?>
						<h1><?php printf( __( 'Day: %s', 'babysitter' ), '<span>' . get_the_date() . '</span>' ); ?></h1>
						
					<?php } elseif ( is_month() ) { ?>	
						<h1><?php printf( __( 'Month: %s', 'babysitter' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'babysitter' ) ) . '</span>' ); ?></h1>
						
					<?php } elseif ( is_year() ) { ?>	
						<h1><?php printf( __( 'Year: %s', 'babysitter' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'babysitter' ) ) . '</span>' ); ?></h1>
							
					<?php } elseif ( is_tag() ) { ?>
						<h1><?php printf( __( 'Tag Archives: %s', 'babysitter' ), '<span>"' . single_cat_title( '', false ) . '"</span>' ); ?></h1>
					
					<?php } else { ?>
						<h1><?php the_title(); ?></h1>
					<?php } ?>

					<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
				
				<?php } ?>
			</div>
			<div class="col-md-6">
				<?php 
				// Breadcrumb
				if (function_exists( 'breadcrumb_trail' ) && $babysitter_data['breadcrumbs'] == 1 ) {
					breadcrumb_trail();
				}?>
			</div>
		</div>
	</div>
</div>
