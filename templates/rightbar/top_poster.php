<div class="related-block">
    <div id="sponsor-right" class="ff-banner hidden"></div>
    <?php $loop =0; while ($query->have_posts()) : $query->the_post(); $loop++; ?>
    <div class="related-item">
        <a href="<?php the_permalink(); ?>">
            <img class="related-item-thumbnail"
                 src="<?= op_get_poster_url() ?>"
                 data-src="<?= op_get_poster_url() ?>"
                 alt="<?php the_title(); ?>">
        </a>
        <div class="related-item-meta">
            <a href="<?php the_permalink(); ?>">
                <div class="related-item-title"><?php the_title(); ?></div>
            </a>
            <span class="related-item-update"><?= op_get_episode() ?></span>
            <span class="related-item-views"><?= op_get_post_view() ?> lượt xem</span>
        </div>
    </div>
    <?php endwhile; ?>
</div>
