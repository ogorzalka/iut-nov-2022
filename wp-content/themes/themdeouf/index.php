<?php get_template_part('partials/head'); ?>
    <?php
        // do_action('tdo/mon_hook', 'Mon titre', 'mon contenu');
    ?>
    <?php while (have_posts()) : the_post(); ?>
        <article>
            <h1><?php the_title(); ?></h1>
            <div>
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
<?php get_template_part('partials/foot') ?>