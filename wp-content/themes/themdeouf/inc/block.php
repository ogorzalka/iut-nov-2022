<?php

add_action('init', function() {
    register_block_style('core/button', [
        'name' => 'shadow',
        'label' => 'Ombré',
    ]);
});


/**
 * Load Blocks
 */
add_action( 'init', function() {
    register_block_type( get_stylesheet_directory() . '/blocks/gallery/block.json' );
    register_block_type( get_stylesheet_directory() . '/blocks/portfolio/block.json' );
} );


acf_register_block_type([
    'name' => 'gallery',
    'title' => 'Galerie photo',
    //'icon' => 'dashicons-phot',
    'category' => 'basic',
    'keywords' => 'ombré',
    'render_template' => get_stylesheet_directory() . '/partials/blocks/gallery.php',
    'supports' => [
        'jsx' => true
    ],
]);