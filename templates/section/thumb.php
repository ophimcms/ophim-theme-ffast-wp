<div class="container">
    <section class="tray index">
        <div class="tray-title">
            <span class="icon icon-cinema"></span>
            <h5>
                <a href="<?= $slug; ?>"><?= $title; ?></a>
            </h5>
            <a href="<?= $slug; ?>" class="more">Xem tất cả &nbsp; <i class="icon icon-film-none"></i>
            </a>
        </div>
        <div class="tray-content carousel">
           <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++; ?>
                <div class="tray-item" id="film-id-<?= get_the_ID() ?>">
                    <a href="<?php the_permalink(); ?>">
                        <img class="tray-item-thumbnail"
                             src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                             data-src="<?= op_get_thumb_url() ?>" alt="<?php the_title(); ?>">
                        <div class="tray-item-description">
                            <span class="tray-item-quality"><?= op_get_quality() ?></span>
                            <div class="tray-item-title"><?php the_title(); ?></div>
                            <div class="tray-item-meta-info">
                                <div class="tray-film-views"><?= op_get_post_view() ?> xem</div>
                                <div class="tray-film-likes">
                                    <?= op_get_episode() ?>
                                </div>
                            </div>
                        </div>
                        <div class="tray-item-play-button">
                            <i class="icon-play"></i>
                        </div>
                        <div class="tray-item-audio"><?= op_get_lang() ?></div>
                    </a>
                     <?php if(op_get_trailer_url()): ?>
                        <div class="tray-item-trailer" data-id="<?= get_the_ID() ?>" title="Xem trailer">
                            <i class="icon-youtube"></i>
                        </div>
                     <?php endif ?>
                </div>
            <?  endwhile; ?>
        </div>
    </section>
</div>
