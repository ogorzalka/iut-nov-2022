<?php
add_action( 'add_meta_boxes', function() {
    add_meta_box(
        'project-datas',
        'Informations additionnelles projet',
        function() {
            get_template_part('admin/metaboxes/project', 'settings');
        },
        ['portfolio'],
        'side'
    );
});

add_action('save_post', function($post_id) {
   if (!isset($_POST['project_date'])) {
       return;
   }

   $project_date = $_POST['project_date'];
   update_post_meta($post_id, 'project_date', $project_date);
});
