<!doctype html>
<html>
<head>Test</head>
<?php wp_head() ?>
<body>
<?php wp_body_open()?>
<header>
    <?php
    wp_nav_menu([
        'theme_location' => 'primary_nav'
    ]);
    ?>
</header>
