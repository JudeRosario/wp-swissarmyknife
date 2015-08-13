<?php
/*
Plugin Name: Lists in a Shortcode
Description: MU Plugin that lets you get lists of posts, pages and sites in a network
Author: Jude Rosario
Author URI: http://premium.wpmudev.org/
Version: 1.1
*/


add_shortcode( 'list-posts', 'post_listing_shortcode' );

function post_listing_shortcode( $atts ) {


    extract( shortcode_atts( array (
        'type' => 'post',
        'order' => 'date',
        'orderby' => 'title',
        'posts_per_page' => -1,
        'category' => '',
        'post_status' => 'published',
    ), $atts ) );



    $options = array(
        'post_type' => $type,
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $posts_per_page,
        'category_name' => $category,
        'post_status' => $post_status,
    );

    $query = new WP_Query( $options );


    ob_start();
    if ( $query->have_posts() ) { ?>
        <ul class="post-listing">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul> <?php 
    }
    ob_end_flush();
}


add_shortcode( 'list-sites', 'sites_listing_shortcode' );

function sites_listing_shortcode( $atts ) {


    extract( shortcode_atts(  array(
            'network_id' => 1,
            'public'     => null,
            'archived'   => null,
            'mature'     => null,
            'spam'       => null,
            'deleted'    => null,
            'limit'      => -1,
            'offset'     => 0,
        ), $atts ) );



    $options = array(
        'network_id' => $network_id,
        'public' => $public,
        'archived' => $archived,
        'mature' => $mature,
        'spam' => $spam,
        'deleted' => $deleted,
        'limit' => $limit,
    );

    $sites = wp_get_sites( $options );


    ob_start();
    if ( ! empty($sites) ) { ?>
        <ul class="sites-listing"> <?
            foreach($sites as $site) 
             switch_to_blog( $site['blog_id'] ); ?>
                <li id="site-<?php echo $site['blog_id']; ?>">
                    <a href="<?php echo get_bloginfo('url'); ?>"><?php echo get_bloginfo('name'); ?></a>
                </li><?
             restore_current_blog();
            endforeach; ?>
        </ul> <?php 
    }
    ob_end_flush();
}

?>