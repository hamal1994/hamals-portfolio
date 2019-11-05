<?php 
function queueScripts() {
        wp_register_style("stylecustom", get_stylesheet_directory_uri() . "/style/css/custom.css");
        wp_enqueue_style('stylecustom');
        } 
        add_action( 'wp_enqueue_scripts', 'queueScripts' );