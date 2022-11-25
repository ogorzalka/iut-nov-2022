<?php

add_action( 'widgets_init', function() {
    register_sidebar([
       'name' => __( 'Homepage', 'themdeouf'),
        'id' =>'sidebar-home',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ]);
});