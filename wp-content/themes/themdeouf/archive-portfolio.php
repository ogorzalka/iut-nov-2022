<?php get_template_part('partials/head'); ?>
<?php while (have_posts()) : the_post(); ?>
    <article>
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('thumbnail'); ?>
        <?php endif; ?>
        <h1><?php the_title(); ?></h1>
        <div>
            <?php the_content(); ?>
        </div>
    </article>
<?php endwhile; ?>
<?php get_template_part('partials/foot') ?>