<?php 
function queueScripts() {
        wp_register_style("style", get_stylesheet_directory_uri() . "/css/style.css", '', '1.0.0');
        wp_enqueue_style('style');
        } 
        add_action( 'wp_enqueue_scripts', 'queueScripts' );