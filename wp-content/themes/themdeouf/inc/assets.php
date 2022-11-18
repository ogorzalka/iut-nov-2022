<?php
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('tdo_styles', get_stylesheet_directory_uri() . '/assets/css/app.css');
});