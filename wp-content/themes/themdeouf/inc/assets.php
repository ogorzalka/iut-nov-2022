<?php
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('tdo_styles', get_stylesheet_directory_uri() . '/assets/css/app.css');
});

add_action('enqueue_block_editor_assets', function() {
    wp_enqueue_script(
        'tdo_editor',
        get_stylesheet_directory_uri(). '/assets/js/editor.js',
        ['wp-blocks', 'wp-dom-ready', 'wp-edit-post', 'wp-hooks']
    );
});