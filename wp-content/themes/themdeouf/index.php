<?php
    get_template_part('partials/head', null, [
        'foo' => 'bar',
    ]);
?>
    <h1>Test</h1>
<?php echo $args['foo']; ?>
<?php get_template_part('partials/foot') ?>