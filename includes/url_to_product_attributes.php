<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 13/11/17
 * Time: 12:38
 */

/**
 * Show term URL
 */
add_filter( 'woocommerce_attribute', 'make_product_atts_linkable', 10, 3 );
function make_product_atts_linkable( $text, $attribute, $values ) {
    $new_values = array();
    foreach ( $values as $value ) {

        if ( $attribute['is_taxonomy'] ) {
            $term = get_term_by( 'name', $value, $attribute['name'] );
            $url = get_term_meta( $term->term_id, 'attribute_url', true );

            if ( ! empty( $url ) ) {
                $val = '<a href="' . esc_url( $url ) . '" title="' . esc_attr( $value ) . '">' . $value . '</a>';
                array_push( $new_values, $val );
            } else {
                array_push( $new_values, $value );
            }
        } else {
            $matched = preg_match_all( "/\[([^\]]+)\]\(([^)]+)\)/", $value, $matches );

            $url = home_url( '/' ) . $matches[2][0];

            if ( $matched && count( $matches ) == 3 ) {
                $val = '<a target="_blank" href="' . esc_url( $url ) . '" title="' . esc_attr( $matches[1][0] ) . '">' . sanitize_text_field( $matches[1][0] ) . '</a>';

                array_push( $new_values, $val );
            } else {
                array_push( $new_values, $value );
            }
        }
    }

    $text = implode( ', ', $new_values );

    return $text;
}
