<div class="project-meta-box">
    <div class="project-meta-box-head">
        <p>Veuillez renseigner les champs ci-dessous</p>
    </div>

    <div class="form-field form-required term-name-wrap">
        <label for="project-date">Date</label>
        <input name="project_date" id="project-date" type="date" value="<?php echo get_post_meta($post->ID, 'project-date', true); ?>" aria-required="true" aria-describedby="project-date">
        <p class="howto">Indiquez la date du projet</p>
    </div>
</div>