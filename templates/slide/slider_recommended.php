<div class="container">
    <section class="tray index top staff-pick">
        <div class="tray-title">
            <span class="icon icon-cinema"></span>
            <h5>
                <a href="/"><?= $title ?></a>
            </h5>
        </div>
        <div class="tray-content index">
            <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++ ?>
            <?if($key ==1) : ?>
            <div class="hot-item">
                <a href="<?php the_permalink(); ?>">
                    <div class="hot-item-thumbnail">
                        <img
                                src="<?= op_get_poster_url() ?>">
                        <div class="hot-item-views"><?= op_get_post_view() ?> xem</div>
                    </div>
                    <div class="tray-item-description">
                        <span class="tray-item-quality"><?= op_get_quality() ?></span>
                        <span class="hot-item-imdb">
                                    <i class="icon icon-star-double"></i> <?= op_get_rating()/10 ?> </span>
                        <span class="tray-item-point">
                                    <i class="icon-star"></i> <?= op_get_rating()/10 ?> </span>
                        <h3 class="hot-item-title"><?php the_title(); ?></h3>
                        <h4 class="hot-item-name"><?= op_get_original_title() ?></h4>
                        <div class="tray-item-meta-info">
                            <div class="tray-film-views"><?= op_get_post_view() ?> xem</div>
                            <div class="tray-film-likes"> <?= op_get_episode() ?></div>
                        </div>
                    </div>
                    <div class="tray-item-audio"><?= op_get_lang() ?></div>
                </a>
            </div>
            <?php else : ?>
            <div class="tray-item" id="film-id-<?= get_the_ID() ?>">
                <a href="<?php the_permalink(); ?>">
                    <img class="tray-item-thumbnail pick-thumbnail"
                         src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                         data-src="<?= op_get_poster_url() ?>"
                         alt="<?php the_title(); ?>">
                    <img class="tray-item-thumbnail pick-poster"
                         src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                         data-src="<?= op_get_poster_url() ?>"
                         alt="<?php the_title(); ?>">
                    <div class="tray-item-description">
                        <span class="tray-item-quality"><?= op_get_quality() ?></span>
                        <span class="tray-item-point">
                                    <i class="icon-star"></i> <?= op_get_rating()/10 ?> </span>
                        <div class="tray-item-title"><?php the_title(); ?></div>
                        <div class="tray-item-meta-info">
                            <div class="tray-film-views"><?= op_get_post_view() ?> xem</div>
                            <div class="tray-film-likes"> <?= op_get_episode() ?></div>
                        </div>
                    </div>
                    <div class="tray-item-audio"><?= op_get_lang() ?></div>
                </a>
            </div>
            <?php endif ?>
            <?php endwhile; ?>
        </div>
    </section>
</div>
