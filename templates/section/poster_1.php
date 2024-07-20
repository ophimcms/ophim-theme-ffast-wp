<div class="container">
    <section class="tray index episode">
        <div class="tray-title">
            <span class="icon icon-cinema"></span>
            <h5>
                <a href="<?= $slug; ?>"><?= $title; ?></a>
            </h5>
            <a href="<?= $slug; ?>" class="more">Xem tất cả &nbsp; <i
                    class="icon icon-film-none"></i>
            </a>
        </div>
        <div class="tray-content carousel index">

            <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++; ?>
                <div class="tray-item">
                    <a href="<?php the_permalink(); ?>">
                        <img class="tray-item-thumbnail"
                             src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                             data-src="<?= op_get_poster_url() ?>"
                             alt="<?php the_title(); ?> <?= op_get_episode() ?>">
                        <div class="tray-item-description">
                            <div class="tray-episode-name"><?= op_get_episode() ?></div>
                            <div class="tray-item-title"><?php the_title(); ?></div>
                        </div>
                        <div class="tray-item-audio"></div>
                    </a>
                </div>
                <?  endwhile; ?>
        </div>
    </section>
</div>
