<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 05/08/17
 * Time: 16:11
 */

//Making jQuery to load from Google Library
function replace_jquery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, '1.12.4');
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'replace_jquery');
