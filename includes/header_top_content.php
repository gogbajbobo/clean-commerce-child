<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 16/11/17
 * Time: 16:48
 */

if ( ! function_exists( 'clean_commerce_header_top_content' ) ) :

    /**
     * Header Top.
     *
     * @since 1.0.0
     */
    function clean_commerce_header_top_content() {
        $contact_number        = clean_commerce_get_option( 'contact_number' );
        $contact_email         = clean_commerce_get_option( 'contact_email' );
        $show_social_in_header = clean_commerce_get_option( 'show_social_in_header' );

        if ( empty( $contact_number ) && empty( $contact_email ) ) {
            $contact_status = false;
        }
        else {
            $contact_status = true;
        }

        if ( false === $contact_status && ( false === clean_commerce_get_option( 'show_social_in_header' ) || false === has_nav_menu( 'social' ) ) ) {
            return;
        }
        ?>
        <div id="tophead">
            <div class="container">
                <div id="quick-contact">
                    <ul>
                        <?php if ( ! empty( $contact_number ) ) :
							$cnumber_clean = preg_replace( '/\D+/', '', esc_attr( $contact_number ) );
                            ?>
                            <li class="quick-call">
                                <a href="<?php echo esc_url( 'tel:' . $cnumber_clean ); ?>"><?php echo esc_html( $contact_number ); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if ( ! empty( $contact_email ) ) : ?>
                            <li class="quick-email">
                                <a href="<?php echo esc_url( 'mailto:' . $contact_email ); ?>"><?php echo esc_html( antispambot( $contact_email ) ); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div> <!-- #quick-contact -->

                <?php if ( true === $show_social_in_header && has_nav_menu( 'social' ) ) : ?>
                    <div class="header-social-wrapper">
                        <?php the_widget( 'Clean_Commerce_Social_Widget' ); ?>
                    </div><!-- .header-social-wrapper -->
                <?php endif; ?>

            </div> <!-- .container -->
        </div><!--  #tophead -->
        <?php
    }

endif;

add_action( 'clean_commerce_action_before_header', 'clean_commerce_header_top_content', 5 );
