<?php
/*
Plugin Name: Custom Signup text
Description: MU Plugin that adds sanity to the wp-signup.php. 
Author: Jude Rosario
Author URI: http://premium.wpmudev.org/
Version: 1.1
*/

function themename_wp_signup_text( $translated_text, $untranslated_text, $domain ) {
    global $pagenow;

    if ( is_multisite() && $pagenow === 'wp-signup.php' ) {

    switch ( $untranslated_text ) {
            case 'Welcome back, %s. By filling out the form below, you can <strong>add another site to your account</strong>. There is no limit to the number of sites you can have, so create to your heart&#8217;s content, but write responsibly!' :
            $translated_text = __( 'Welcome back, %s. By filling out the form below, you can add another site to your account.' , 'theme_text_domain' );
            break;

            case 'If you&#8217;re not going to use a great site domain, leave it for a new user. Now have at it!' :
            $translated_text = __( ' ' , 'theme_text_domain' );
            break;
        }
    }

    return $translated_text;
}

add_filter( 'gettext', 'themename_wp_signup_text', 20, 3 );