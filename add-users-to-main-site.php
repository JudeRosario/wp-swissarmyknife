<?php
/*
Plugin Name: Add network users to main site
Description: MU Plugin that adds users across the network subscribers in the main site. 
Author: Jude Rosario
Author URI: http://premium.wpmudev.org/
Version: 1.1
*/


function wpms_add_user_to_main_site( $user_id = null ) {

	global $wpdb; 

	    if ( ! is_multisite() )
	        return ;

	    if ( ! $user_id )
        	$user_id = get_current_user_id() ;
	
		if ( defined( 'BLOG_ID_CURRENT_SITE' ) ) 
	        $main_site = BLOG_ID_CURRENT_SITE;
	   	else 
	   		$main_site = 1;      
	
	add_user_to_blog( $main_site, $user_id, 'subscriber' );
}

add_action( 'wpmu_new_user', 'wpms_add_user_to_main_site');