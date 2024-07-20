<section class="cinema bg-black">
    <div class="tray-title has-background">
        <h5>
            <a href="<?= $slug; ?>"><?= $title; ?></a>
        </h5>
        <a href="<?= $slug; ?>">
            <span class="mark mark-popcorn icon icon-popcorn"></span>
        </a>
    </div>
    <div class="cinema-container">
        <div id="phim-chieu-rap" class="cinema-content">
            <div class="grid-container grid-flow tray-poster phim-chieu-rap">
               <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++; ?>
                    <div class="cinema-item">
                        <a href="<?php the_permalink(); ?>" class="card card-inset">
                            <div class="card-image img-responsive">
                                <img src="<?= op_get_thumb_url() ?>" alt="<?php the_title(); ?>">
                                <div class="solid">
                                    <span class="icon icon-play-png"></span>
                                </div>
                            </div>
                            <div class="card-content bg-gradient">
                                <p style="margin-bottom: 10px;">
                                    <label class="label label-main label-xs"><?= op_get_quality() ?></label>
                                    <span class="pull-right" style="font-size: 15px; color: rgb(255, 255, 255);">
                                            <i class="icon-star" style="color: rgb(232, 145, 5);"></i> <?= op_get_rating()/10 ?> </span>
                                </p>
                                <h3 class="title"><?php the_title(); ?></h3>
                                <p class="subtitle text-inline">
                                    <?= op_get_regions() ?>
                                </p>
                            </div>
                        </a>
                    </div>
                <?  endwhile; ?>
            </div>
        </div>
    </div>
</section>
