<div class="container padding-10">
    <section class="tray index trailer">
        <div class="tray-title">
            <span class="icon icon-cinema"></span>
            <h5>
                <a href="<?= $slug; ?>"><?= $title; ?></a>
            </h5>
        </div>
        <div class="tray-content carousel">
           <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++; ?>
                <?if($key ==1) : ?>
                    <div class="trailer-item" data-id="<?= get_the_ID() ?>">
                        <a href="<?php the_permalink(); ?>" class="card">
                            <div class="trailer-poster card-image img-responsive"><img
                                    src="<?= op_get_poster_url() ?>"
                                    alt="<?php the_title(); ?>">
                                <div class="solid solid-visible"><span class="icon icon-play-o"></span></div>
                                <div class="solid"><span class="icon icon-play-png"></span></div>
                            </div>
                            <div class="card-content bg-gradient"></div>
                        </a>
                        <h3 class="trailer-title"><?php the_title(); ?></h3>
                    </div>
                <?php else : ?>
                    <div class="trailer-item" data-id="<?= get_the_ID() ?>">
                        <a href="<?php the_permalink(); ?>" class="card">
                            <div class="trailer-poster card-image img-responsive"><img
                                    src="<?= op_get_poster_url() ?>"
                                    alt="<?php the_title(); ?>">
                                <div class="solid solid-visible"><span class="icon icon-play-o-sm"></span></div>
                                <div class="solid"><span class="icon icon-play-png-sm"></span></div>
                            </div>
                        </a>
                        <h3 class="trailer-title"><?php the_title(); ?></h3>
                    </div>
                 <?php endif ?>
            <?  endwhile; ?>
        </div>
    </section>
</div>
