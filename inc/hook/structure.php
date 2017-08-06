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

if ( ! function_exists( 'clean_commerce_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
	function clean_commerce_doctype() {
		?><!DOCTYPE html> <html lang="ru-RU"><?php
	}
endif;

if ( ! function_exists( 'clean_commerce_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
	function clean_commerce_head() {
		?>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="http://maxbook.local/~grimax/krikuz/xmlrpc.php">
		<?php
	}
endif;


