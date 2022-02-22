<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file. 
* Wordpress will use those functions instead of the original functions then.
*/

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 99 );
function theme_enqueue_styles() {
	wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
	wp_enqueue_style('child-style', get_stylesheet_directory_uri().'/style.css');
	wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
    wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.3.1.slim.min.js', array( 'jquery' ),'',true );
    wp_enqueue_script( 'boot2','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array( 'jquery' ),'',true );
    wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array( 'jquery' ),'',true );
	wp_enqueue_script('custom-js', get_stylesheet_directory_uri().'/js/custom.js');
}

// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Shortcode to showcase products on home page using WP query
function product_listing() {
	ob_start();
    $query = new WP_Query( array(
        'post_type' => 'product',
        'posts_per_page' => 3,
    ) );
    if ( $query->have_posts() ) { ?>
     <div class="text-by-img container">
        <div class="home-product-showcase row">
            <?php
                while ( $query->have_posts() ) : $query->the_post();
                $term = get_queried_object();
            ?>
            <div class="current-products col-sm-4 col-md-4 col-xs-12">
               <div class="post-showcase">
                    <div class="parallel-openings">
                      <div><?php echo get_the_post_thumbnail( get_the_ID(), 'full' ) ?></div>
                      <h4><?php the_title(); ?></h4>
                      <p><?php the_excerpt(); ?></p>
					  <a href="<?php echo get_permalink(); ?>" class="avia-button avia-color-theme-color-subtle">Read More</a>
                    </div>
               </div>
            </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
    </div>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}
add_shortcode( 'product_listing_shortcode', 'product_listing' );

// Shortcode to showcase products on home page using WP query
function blog_listing() {
	ob_start();
    $query = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => 3,
    ) );
    if ( $query->have_posts() ) { ?>
     <div class="text-by-img container">
        <div class="home-blog-showcase row">
            <?php
                while ( $query->have_posts() ) : $query->the_post();
                $term = get_queried_object();
            ?>
            <div class="current-blogs col-sm-4 col-md-4 col-xs-12">
               <div class="post-showcase">
                    <div class="parallel-openings">
                      <div><?php echo get_the_post_thumbnail( get_the_ID(), 'full' ) ?></div>
                      <h4><?php the_title(); ?></h4>
                      <p><?php the_excerpt(); ?></p>
					  <a href="<?php echo get_permalink(); ?>" class="avia-button avia-color-theme-color-subtle">Read More</a>
                    </div>
               </div>
            </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
    </div>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}
add_shortcode( 'blog_listing_shortcode', 'blog_listing' );

