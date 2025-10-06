<?php
/**
 * Plugin Name: Custom Preloader
 * Description: Adds a custom preloader that displays a typing animation before the homepage loads.
 * Version: 1.0
 * Author: Vijayaraj Anandan
 */

function custom_preloader_should_load() {
    return is_front_page() || is_home();
}

// Enqueue custom preloader styles and scripts
function custom_preloader_assets() {
    if ( ! custom_preloader_should_load() ) {
        return;
    }

    wp_enqueue_style( 'custom-preloader-style', plugin_dir_url( __FILE__ ) . 'css/preloader.css' );
    wp_enqueue_script( 'custom-preloader-script', plugin_dir_url( __FILE__ ) . 'js/preloader.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'custom_preloader_assets' );

// Output Preloader HTML
function custom_preloader_html() {
    if ( ! custom_preloader_should_load() ) {
        return;
    }

    $logo_html = function_exists( 'get_custom_logo' ) ? get_custom_logo() : '';

    if ( empty( $logo_html ) ) {
        $site_title = get_bloginfo( 'name' );
        if ( ! empty( $site_title ) ) {
            $logo_html = '<span class="preloader-site-title">' . esc_html( $site_title ) . '</span>';
        }
    }
    ?>
    <div id="preloader">
        <div class="preloader-content">
            <span id="preloader-text-initial"></span>
            <span id="preloader-text-secondary"></span>
            <?php if ( ! empty( $logo_html ) ) : ?>
                <span id="preloader-logo" aria-hidden="true"><?php echo wp_kses_post( $logo_html ); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <?php
}
add_action( 'wp_body_open', 'custom_preloader_html' );
