<?php
$supports = [
    'post-thumbnail' => [],
    'menus' => [],
    'widgets' => [],
];

foreach ($supports as $support => $args) {
    add_theme_support($support, $args);
}