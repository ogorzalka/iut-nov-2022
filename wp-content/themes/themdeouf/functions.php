<?php
define('DS', DIRECTORY_SEPARATOR);

add_theme_support('post-thumbnails');
add_theme_support('menus');

require dirname(__FILE__) . DS . 'inc' . DS . 'assets.php';
require dirname(__FILE__) . DS . 'inc' . DS . 'post_types.php';
require dirname(__FILE__) . DS . 'inc' . DS . 'taxonomy.php';
require dirname(__FILE__) . DS . 'inc' . DS . 'menus.php';

//add_action('tdo/mon_hook', function($title, $content) {
//    echo "<h1>{$title}</h1>";
//    echo "<p>{$content}</p>";
//}, 10, 2);
/*
add_filter('the_content', function($content) {
    return str_replace('example', '<b>example</b>', $content);
});

add_filter('tdo/the_title', function($title, $color) {
    return sprintf('<span style="color: %s">%s</span>', $color, $title);
}, 10, 2);
*/