<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if( $featured_posts = get_field('related_project') ): ?>
        <ul>
            <?php foreach( $featured_posts as $post ): ?>
                <?php
                setup_postdata( $GLOBALS['post'] =& $post );
                ?>
                <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
</div>
