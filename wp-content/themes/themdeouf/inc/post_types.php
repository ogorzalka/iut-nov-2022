<?php
add_action('init', function () {
    register_post_type('portfolio', [
        'labels' => [
           'singular' => 'Portfolio',
            'name' => 'Portfolio',
        ],
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);
});