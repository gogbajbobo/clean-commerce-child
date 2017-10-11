<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 04/08/17
 * Time: 14:30
 */


function clean_commerce_posted_on() {
    $show_meta_date   = true;
    $show_meta_author = true;

    $posted_on = '';
    if ( true === $show_meta_date ) {
        $posted_on = time_string_for_post();
    }

    $byline = '';
    if ( true === $show_meta_author ) {
        $byline = sprintf(
            '%s',
//				'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
            '<span class="author vcard"><span class="fn n">' . esc_html( get_the_author() ) . '</span></span>'
        );
    }

    if ( ! empty( $posted_on ) ) {
        echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
    }
    if ( ! empty( $byline ) ) {
        echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
    }

}

function time_string_for_post() {

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( 'c' ) ),
        esc_html( get_the_modified_date() )
    );

    return sprintf(
        '%s',
//				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        $time_string
    );

}