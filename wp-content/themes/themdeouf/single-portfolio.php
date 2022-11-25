<?php get_template_part('partials/head'); ?>
    <?php
        // do_action('tdo/mon_hook', 'Mon titre', 'mon contenu');
    ?>
    <?php while (have_posts()) : the_post(); ?>
        <article>
            <h1><?php echo apply_filters('tdo/the_title', get_the_title(), 'green'); ?></h1>
            <ul>
                <li>
                    <b>Date du projet&nbsp;:</b>
                    <?php echo get_post_meta(get_the_ID(), 'project_date', true); ?>
                </li>
                <li>
                    <b>Ville de réalisation&nbsp;:</b>
                    <?php the_field('project_city'); ?>
                </li>
            </ul>

            <h2>Galerie photo</h2>

            <?php foreach (get_field('project_gallery') as $gallery_item): ?>
                <div class="gallery">
                    <?php echo wp_get_attachment_image($gallery_item['ID'], 'medium')?>
                </div>
            <?php endforeach; ?>
            <ul>
                <?php while (have_rows('material')): the_row(); ?>
                    <li>
                        <b>Nom du matériaux&nbsp;:</b>
                        <?php the_sub_field('material_label'); ?>
                    </li>
                    <li>
                        <b>Quantité&nbsp;:</b>
                        <?php the_sub_field('material_qty'); ?>
                    </li>
                <?php endwhile; ?>
            </ul>
            <div>
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
<?php get_template_part('partials/foot') ?>