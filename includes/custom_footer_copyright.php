<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 07/07/17
 * Time: 10:46
 */


/**
 * Footer copyright.
 *
 * @since 1.0.0
 */
function clean_commerce_footer_copyright() {

    // Check if footer is disabled.
    $footer_status = apply_filters( 'clean_commerce_filter_footer_status', true );
    if ( true !== $footer_status ) {
        return;
    }

    // Copyright content.
    $copyright_text = clean_commerce_get_option( 'copyright_text' );
    $copyright_text = apply_filters( 'clean_commerce_filter_copyright_text', $copyright_text );
    if ( ! empty( $copyright_text ) ) {
        $copyright_text = wp_kses_data( $copyright_text );
    }

    // Powered by content.
//    $powered_by_text = sprintf( esc_html__( 'Clean Commerce by %s', 'clean-commerce' ), '<a target="_blank" rel="designer" href="http://wenthemes.com/">' . esc_html__( 'WEN Themes', 'clean-commerce' ) . '</a>' );

    $show_social_in_footer = clean_commerce_get_option( 'show_social_in_footer' );

    $column_count = 0;

    if ( $copyright_text ) {
        $column_count++;
    }
//    if ( $powered_by_text ) {
//        $column_count++;
//    }
    if ( true === $show_social_in_footer && has_nav_menu( 'social' ) ) {
        $column_count++;
    }
    ?>

    <div class="colophon-inner colophon-grid-<?php echo esc_attr( $column_count ); ?>">

        <?php if ( ! empty( $copyright_text ) ) : ?>
            <div class="colophon-column">
                <div class="copyright">
                    <?php echo $copyright_text; ?>
                </div><!-- .copyright -->
            </div><!-- .colophon-column -->
        <?php endif; ?>

        <?php if ( true === $show_social_in_footer && has_nav_menu( 'social' ) ) : ?>
            <div class="colophon-column">
                <div class="footer-social">
                    <?php the_widget( 'Clean_Commerce_Social_Widget' ); ?>
                </div><!-- .footer-social -->
            </div><!-- .colophon-column -->
        <?php endif; ?>

        <!--        --><?php //if ( ! empty( $powered_by_text ) ) : ?>
        <!--            <div class="colophon-column">-->
        <!--                <div class="site-info">-->
        <!--                    --><?php //echo $powered_by_text; ?>
        <!--                </div>-->
        <!--            </div>-->
        <!--        --><?php //endif; ?>

    </div><!-- .colophon-inner -->

    <?php
}
