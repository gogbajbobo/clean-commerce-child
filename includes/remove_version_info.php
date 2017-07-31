<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 31/07/17
 * Time: 12:59
 */

remove_action('wp_head', 'wp_generator');

function remove_version_info() {
    return '';
}
add_filter('the_generator', 'remove_version_info');

if (!function_exists('remove_wp_ver_css_js')) {

    function remove_wp_ver_css_js($src) {

        if (strpos($src, 'ver=')) $src = remove_query_arg('ver', $src);
        return $src;
    }

    add_filter('style_loader_src', 'remove_wp_ver_css_js');
    add_filter('script_loader_src', 'remove_wp_ver_css_js');

}
