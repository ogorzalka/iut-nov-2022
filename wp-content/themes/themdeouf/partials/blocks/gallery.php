<div style="padding: 20px; background: #ebebeb">
    <div style="display: flex">
        <div>
            <InnerBlocks />
        </div>
        <?php if ($photos = get_field('photos')): ?>
            <ul>
                <?php foreach ($photos as $photo):?>
                    <li>
                        <img src="<?php echo $photo['url']; ?>" width="250" alt="">
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
