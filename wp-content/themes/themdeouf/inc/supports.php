<?php
$supports = [
    'post-thumbnails' => [],
    'menus' => [],
    'widgets' => [],
];

foreach ($supports as $support => $args) {
    if (count($args) === 0) {
        add_theme_support($support);
    } else {
        add_theme_support($support, $args);
    }
}