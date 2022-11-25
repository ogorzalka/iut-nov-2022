<?php
add_action( 'add_meta_boxes', function() {
    add_meta_box(
        'project-datas',
        'Informations additionnelles projet',
        function($post) {
            get_template_part('admin/metaboxes/project', 'settings');
        },
        ['portfolio'],
        'side'
    );
});