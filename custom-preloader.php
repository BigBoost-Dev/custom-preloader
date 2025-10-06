<?php
/**
 * Plugin Name: Custom Preloader
 * Description: Adds a custom preloader that displays a typing animation before the homepage loads.
 * Version: 1.0
 * Author: Vijayaraj Anandan
 */

// Enqueue custom preloader styles and scripts
function custom_preloader_assets() {
    wp_enqueue_style( 'custom-preloader-style', plugin_dir_url( __FILE__ ) . 'css/preloader.css' );
    wp_enqueue_script( 'custom-preloader-script', plugin_dir_url( __FILE__ ) . 'js/preloader.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'custom_preloader_assets' );

// Output Preloader HTML
function custom_preloader_html() {
    ?>
    <div id="preloader">
        <div class="preloader-content">
            <span id="preloader-text"></span>
        </div>
    </div>
    <?php
}
add_action( 'wp_body_open', 'custom_preloader_html' );
