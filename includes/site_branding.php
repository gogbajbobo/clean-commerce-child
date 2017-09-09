<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 07/07/17
 * Time: 10:43
 */


/**
 * Site branding.
 *
 * @since 1.0.0
 */
function clean_commerce_site_branding() {

    ?>
    <div class="site-branding">

        <?php clean_commerce_the_custom_logo(); ?>

        <?php $show_title = clean_commerce_get_option( 'show_title' ); ?>
        <?php $show_tagline = clean_commerce_get_option( 'show_tagline' ); ?>
        <?php if ( true === $show_title || true === $show_tagline ) :  ?>
            <div id="site-identity">
                <?php if ( true === $show_title ) : ?>

                    <?php if ( is_front_page() && is_home() ) : ?>

                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

                    <?php else : ?>

                        <?php if ( is_front_page() ) : ?>
                            <p class="site-title"><?php bloginfo( 'name' ); ?></p>
                        <?php else : ?>
                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php endif; ?>

                    <?php endif; ?>
                <?php endif; ?>
                <?php if ( true === $show_tagline ) : ?>
                    <p class="site-description"><?php bloginfo( 'description' ); ?></p>
                <?php endif; ?>
            </div><!-- #site-identity -->
        <?php endif; ?>
    </div><!-- .site-branding -->
    <div id="right-header">
        <?php if ( has_nav_menu( 'header' ) ) : ?>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'header',
                'container'      => 'nav',
                'container_id'   => 'header-nav',
                'depth'          => 1,
            ) );
            ?>
        <?php endif; ?>

        <?php if ( clean_commerce_is_woocommerce_active() ) : ?>
            <div id="cart-section">
                <ul>
                    <?php cart_customlocation_html(); ?>
                </ul>
            </div> <!-- .cart-section -->
        <?php endif; ?>
    </div> <!-- #right-header -->
    <?php
}

function linkless_custom_logo_on_front() {

    $html = '';
    $switched_blog = false;

    if ( is_multisite() && ! empty( $blog_id ) && (int) $blog_id !== get_current_blog_id() ) {
        switch_to_blog( $blog_id );
        $switched_blog = true;
    }

    $custom_logo_id = get_theme_mod( 'custom_logo' );

    // We have a logo. Logo is go.
    if ( $custom_logo_id ) {
        $custom_logo_attr = array(
            'class'    => 'custom-logo',
            'itemprop' => 'logo',
        );

        /*
         * If the logo alt attribute is empty, get the site title and explicitly
         * pass it to the attributes used by wp_get_attachment_image().
         */
        $image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
        if ( empty( $image_alt ) ) {
            $custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
        }

        /*
         * If the alt attribute is not empty, there's no need to explicitly pass
         * it because wp_get_attachment_image() already adds the alt attribute.
         */

        if ( is_front_page() ) {

            $html = sprintf( '<span class="custom-logo-link">%1$s</span>',
                wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr )
            );

        } else {

            $html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
                esc_url( home_url( '/' ) ),
                wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr )
            );

        }

    }

    // If no logo is set but we're in the Customizer, leave a placeholder (needed for the live preview).
    elseif ( is_customize_preview() ) {
        $html = sprintf( '<a href="%1$s" class="custom-logo-link" style="display:none;"><img class="custom-logo"/></a>',
            esc_url( home_url( '/' ) )
        );
    }

    if ( $switched_blog ) {
        restore_current_blog();
    }

    return $html;

}
add_filter( 'get_custom_logo', 'linkless_custom_logo_on_front' );
