<?php

add_action('init', function () {
    register_taxonomy('customer', 'portfolio', [
        'labels' => [
            'name' => 'Clients',
            'singular_name' => 'Client',
        ],
        'hierarchical' => true,
    ]);
    register_taxonomy('project_type', 'portfolio', [
        'labels' => [
            'name' => 'Types de projet',
            'singular_name' => 'Type de projet',
        ],
    ]);
});