<div class="container padding-10">
    <section class="tray index ranking">
        <div class="tray-title">
            <span class="icon icon-cinema"></span>
            <h5>
                <a href="<?= $slug; ?>"><?= $title; ?></a>
            </h5>
        </div>
        <div class="tray-content carousel">
           <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++; ?>
                <div class="ranking-item">
                    <a href="<?php the_permalink(); ?>">
                        <div class="ranking-item-thumbnail">
                            <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                 data-src="<?= op_get_thumb_url() ?>" alt="<?php the_title(); ?>"></img>
                        </div>
                        <div class="ranking-item-top top<?= $key ?>"><?= $key ?></div>
                    </a>
                </div>
            <?  endwhile; ?>
        </div>
    </section>
</div>
