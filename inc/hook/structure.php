<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Clean_Commerce
 */

/*
     * Customize <head />
     * grimax
     */

if ( ! function_exists( 'clean_commerce_head' ) ) :
    /**
     * Header Codes.
     *
     * @since 1.0.0
     */
    function clean_commerce_head() {
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--        <link rel="profile" href="http://gmpg.org/xfn/11">-->
<!--        <link rel="pingback" href="--><?php //bloginfo( 'pingback_url' ); ?><!--">-->
        <?php
    }
endif;


