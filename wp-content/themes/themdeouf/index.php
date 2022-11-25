<?php get_template_part('partials/head'); ?>
    <?php
        // do_action('tdo/mon_hook', 'Mon titre', 'mon contenu');
    ?>
    <?php while (have_posts()) : the_post(); ?>
        <article>
            <h1><?php echo apply_filters('tdo/the_title', get_the_title(), 'green'); ?></h1>
            <div>
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
<?php get_template_part('partials/foot') ?>