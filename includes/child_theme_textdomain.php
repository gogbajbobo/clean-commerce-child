<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 07/07/17
 * Time: 10:42
 */

// Load translation files from your child theme instead of the parent theme
function my_child_theme_locale() {
    load_child_theme_textdomain( 'clean-commerce-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_child_theme_locale' );

