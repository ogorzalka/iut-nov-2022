<?php
add_action( 'add_meta_boxes', function() {
    add_meta_box(
        'project-datas',
        'Informations additionnelles projet',
        'project_render_meta_box',
        ['portfolio'],
        'side'
    );
});

function project_render_meta_box() {
    ?>
    <div class="project-meta-box">
        <div class="project-meta-box-head">
            <p>Veuillez renseigner les champs ci-dessous</p>
        </div>
    </div>
    <?php
}