<?php
/*
 * Template Name: Sample Template
 * Description: A template to showase advanced custom field
 * Author: Hemant Nagori
 */
get_header(); 

?>

<div id="primary" class="site-content acf-showcase">
	<div id="content" role="main">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12"> 
					<?php 
						$image = get_field('image');
						if( !empty( $image ) ): ?>
						    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<?php the_field('content'); ?>
				</div>
			</div>
		</div>
	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
