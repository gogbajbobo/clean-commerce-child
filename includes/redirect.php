<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 07/07/17
 * Time: 10:45
 */


// redirect to home if page is /my-account

add_action( 'wp', 'redirect' );

function redirect() {
    if ( is_page('my-account') && !is_user_logged_in() ) {
        wp_redirect( home_url('/') );
        die();
    }
}


